@extends('layout')

@section('content')
	<div id="transferModal" class="reveal-modal small" data-reveal>
		<h1>Transfer Character<a href="#" class="close-reveal-modal right">&times;</a></h1>
		<form>
			<label>Transfer Character to...</label>
			<input type="text">
			<label>Are you sure? This can not be undone.</label>
			<input type="checkbox">
			<input type="submit" class="button expand">
		</form>
	</div>
	<div id="deleteModal" class="reveal-modal small" data-reveal>
		<h1>Deleting Character<a href="#" class="close-reveal-modal right">&times;</a></h1>
		<form>
			<label>Are you sure? This can not be undone.</label>
			<input type="checkbox">
			<input type="submit" class="button expand">
		</form>
	</div>
	<div class="small-12 columns">
		<h1>My Characters</h1>
		<center>
		<table>
			<tr>
				<th>Character</th>
				<th>Level</th>
				<th>Class</th>
				<th>Experience Points</th>
				<th>Ruleset</th>
				<th>Games</th>
				<th colspan="3">Options</th>
			</tr>
			<tr>
				<td><a href="#">Jack</a></td>
				<td>21</td>
				<td>Wizard</td>
				<td>50000</td>
				<td>Pathfinder</td>
				<td>Shaza, Shaza2</td>
				<td><a class="button tiny" href="edit_jack.html">Edit</a></td>
				<td><button href="#" data-reveal-id="transferModal" class="tiny">Transfer</button></td>
				<td><button href="#" data-reveal-id="deleteModal" class="tiny">Delete</button></td>
			</tr>
			<tr>
				<td><a href="#">Jen Erehek</a></td>
				<td>3</td>
				<td>Rogue</td>
				<td>3000</td>
				<td>Dungeons and Dragons 3.5</td>
				<td>Game A, Game B, Game 3</td>
				<td><a class="button tiny" href="edit_jack.html">Edit</a></td>
				<td><button href="#" data-reveal-id="transferModal" class="tiny">Transfer</button></td>
				<td><button href="#" data-reveal-id="deleteModal" class="tiny">Delete</button></td>
			</tr>
		</table>
	</center>
	</div>
@stop
