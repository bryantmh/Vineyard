@extends('layout')

@section('content')
	
	   <div class="card mx-auto" style="width: 40em;">
			<div class="card-body">
    			<h2 class="card-title">Create a Post</h2>
        		{!! form($form) !!}
        	</div>
        </div>
        <div class="scroll">
	 		@foreach ($posts as $post)

		        <div class="card mx-auto" style="width: 40em;">
				  	<div class="card-body">
					    <h2 class="card-title">{{ $post->description }}</h2>
					    <img class="card-img-bottom" src="./storage/memes/{{ $post->filepath }}" >
				  	</div>
				</div>

	        @endforeach
	       	{{ $posts->links() }}
	    </div>

@endsection
