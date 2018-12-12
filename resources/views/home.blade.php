@extends('layout')

@section('content')
	
	<div class="homeGradient">
		<div class="page-content" id="main-content" role="main" style="text-align: center;">
			<h1 style="font-size: 5em;">Memes. Simplified.</h1>
			<h4>Join our growing community.</h4><br><br>
			<a style="font-size: 2em;" class="btn btn-secondary" href="./feed" role="button">Enter the Vineyard</a>
		</div>
		<span style="align-self: flex-end; position: absolute; right: 70;"><img style="height: 70%;" src="{{asset('img/vine.png')}}"></span>
	</div>

@endsection
