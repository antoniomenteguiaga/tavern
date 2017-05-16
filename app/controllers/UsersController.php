<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

	/**
	 * Displays the form for account creation
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function getCreate()
	{
		//return View::make(Config::get('confide::signup_form'));
		return View::make('users.create',array('title'=>"Create User"));
	}


	/**
	 * Stores new account
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function postIndex()
	{
		$repo = App::make('UserRepository');
		$user = $repo->signup(Input::all());

		if ($user->id) {
			if (Config::get('confide::signup_email')) {
				Mail::queueOn(
					Config::get('confide::email_queue'),
					Config::get('confide::email_account_confirmation'),
					compact('user'),
					function ($message) use ($user) {
						$message
							->to($user->email, $user->username)
							->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
					}
				);
			}

			if(Input::get('brainhex')){
				return Redirect::to('brainhex')
					->with('notice', Lang::get('confide::confide.alerts.account_created'));
			}
			return Redirect::action('UsersController@getLogin')
				->with('notice', Lang::get('confide::confide.alerts.account_created'));
		} else {
			$error = $user->errors()->all(':message');

			return Redirect::action('UsersController@getCreate')
				->withInput(Input::except('password'))
				->with('error', $error);
		}
	}

	/**
	 * Displays the login form
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function getLogin()
	{
		if (Confide::user()) {
			return Redirect::intended('users/profile/'.Confide::user()->id);
		} else {
			return View::make('users.login',array('title'=>"Login"));
		}
	}

	public function getProfile($id)
	{
		$user = User::find($id);
		return View::make('users.show',array('title'=>$user->username,'user'=>$user));
	}

	/**
	 * Attempt to do login
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function postLogin()
	{
		$repo = App::make('UserRepository');
		$input = Input::all();

		if ($repo->login($input)) {
			if(array_get($input,'goBack')) return Redirect::back();
			//return Redirect::intended('users/profile/'.Confide::user()->id);
			return Redirect::intended('/');
		} else {
			if ($repo->isThrottled($input)) {
				$err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
			} elseif ($repo->existsButNotConfirmed($input)) {
				$err_msg = Lang::get('confide::confide.alerts.not_confirmed');
			} else {
				$err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
			}

			return Redirect::action('UsersController@getLogin')
				->withInput(Input::except('password'))
				->with('error', $err_msg);
		}
	}

	/**
	 * Attempt to confirm account with code
	 *
	 * @param  string $code
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function getConfirm($code)
	{
		if (Confide::confirm($code)) {
			$notice_msg = Lang::get('confide::confide.alerts.confirmation');
			return Redirect::action('UsersController@getLogin')
				->with('notice', $notice_msg);
		} else {
			$error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
			return Redirect::action('UsersController@getLogin')
				->with('error', $error_msg);
		}
	}

	/**
	 * Displays the forgot password form
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function getForgot()
	{
		return View::make(Config::get('confide::forgot_password_form'));
	}

	/**
	 * Attempt to send change password link to the given email
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function postForgot()
	{
		if (Confide::forgotPassword(Input::get('email'))) {
			$notice_msg = Lang::get('confide::confide.alerts.password_forgot');
			return Redirect::action('UsersController@getLogin')
				->with('notice', $notice_msg);
		} else {
			$error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
			return Redirect::action('UsersController@postForgot')
				->withInput()
				->with('error', $error_msg);
		}
	}

	/**
	 * Shows the change password form with the given token
	 *
	 * @param  string $token
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function getReset($token)
	{
		return View::make(Config::get('confide::reset_password_form'))
			->with('token', $token);
	}

	/**
	 * Attempt change password of the user
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function postReset()
	{
		$repo = App::make('UserRepository');
		$input = array(
			'token'                 =>Input::get('token'),
			'password'              =>Input::get('password'),
			'password_confirmation' =>Input::get('password_confirmation'),
		);

		// By passing an array with the token, password and confirmation
		if ($repo->resetPassword($input)) {
			$notice_msg = Lang::get('confide::confide.alerts.password_reset');
			return Redirect::action('UsersController@getLogin')
				->with('notice', $notice_msg);
		} else {
			$error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
			return Redirect::action('UsersController@getReset', array('token'=>$input['token']))
				->withInput()
				->with('error', $error_msg);
		}
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return  Illuminate\Http\Response
	 */
	public function getLogout()
	{
		Confide::logout();

		return Redirect::back();
	}
}