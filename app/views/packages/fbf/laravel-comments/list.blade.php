@if (!$comments->isEmpty())
{{-- Lazy eager load the user data for each comment, this is for --}}
{{-- performance reasons to mitigate against the n+1 query problem --}}
<?php $comments->load('user'); ?>
<ol>
	@foreach ($comments as $comment)
	<li id="C{{ $comment->id }}">
		{{ nl2br(htmlspecialchars($comment->comment, null, 'UTF-8')) }}
		<ul class="inline-list">
			<li>--{{{ $comment->user->username }}} at {{ $comment->getDate() }}</li>
			<li><a href="#C{{ $comment->id }}">Permalink</a></li>
		</ul>
	</li>
	@endforeach
</ol>
@else
<p class="no-comments">
{{ trans('laravel-comments::messages.no_comments') }}
</p>
@endif
