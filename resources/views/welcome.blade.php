@extends('layout')

@section('content')

    <div class="content">
        <div class="title">
            Vineyard Laravel
        </div>

        {!! form($form) !!}

 		@foreach ($posts as $post)

	        <div class="card" style="width: 40em;">
			  	<div class="card-body">
				    <h5 class="card-title">{{ $post->description }}</h5>
				    <img class="card-img-bottom" src="./storage/memes/{{ $post->filepath }}" >
				   
			  	</div>
			</div>

        @endforeach
    </div>

@endsection
