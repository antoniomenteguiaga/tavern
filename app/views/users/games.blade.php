@extends('layout')

@section('content')
	<div class="small-12 columns">
		<h1>Accept and Reject Players</h1>
		<center>
		<table>
			<tr>
				<th>Player</th>
				<th>Game</th>
				<th>Rules</th>
				<th>Genre</th>
				<th>Match</th>
				<th>Party Match</th>
				<th># of Players</th>
				<th>Max Players</th>
				<th colspan="2">Options</th>
			</tr>
			<tr>
				<td><a href="player.html">Minthee</a></td>
				<td><a href="game_page.html">Skalding Shackles</a></td>
				<td>Pathfinder</td>
				<td>Fantasy</td>
				<td>87%</td>
				<td>73%</td>
				<td>3</td>
				<td>5</td>
				<td><button class="tiny success">Accept</button></td>
				<td><button class="tiny alert">Reject</button></td>
			</tr>
			<tr>
				<td><a href="player.html">Minthee</a></td>
				<td><a href="game_page.html">Bluffing Shires</a></td>
				<td>Microlite20</td>
				<td>Cyberpunk</td>
				<td>73%</td>
				<td>87%</td>
				<td>5</td>
				<td>10</td>
				<td><button class="tiny success">Accept</button></td>
				<td><button class="tiny alert">Reject</button></td>
			</tr>
		</table>
	</center>
	</div>
@stop
