@extends('layout')

@section('content')
<div class="small-12 columns">
	<h1>Other's Characters</h1>
	Here are the characters you've adventured with in the past. Y'know, just in case.
	<center>
		<table>
			<tr>
				<th>Character</th>
				<th>Owner</th>
				<th>Level</th>
				<th>Class</th>
				<th>Ruleset</th>
				<th>Games</th>
				<th>Options</th>
			</tr>
			@foreach($characters as $character)
			<tr>
				<td><a href="#">{{$character->name}}</a></td>
				<td><a href="#">{{$character->user->username}}</a></td>
				<td>{{$character->level}}</td>
				<td>{{$character->class}}</td>
				<td>{{$character->rules}}</td>
				<td></td>
				<td><button class="tiny">Favorite</button></td>
			</tr>
			@endforeach
		</table>
	</center>
</div>
@stop
