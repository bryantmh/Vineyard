@extends('layout')

@section('content')
	<div class="page-content" id="main-content" role="main">
	   <div class="card mx-auto" style="width: 40em;">
			<div class="card-body">
    			<h2 class="card-title">Create a Post</h2>
        		{!! form($form) !!}
        	</div>
        </div>
        <div class="scroll">
	 		@foreach ($posts as $post)

		        <div class="card mx-auto" style="width: 40em;margin-bottom: 1em;" >
				  	<div >
					    <h2 class="card-title">{{ $post->description }}</h2>
					    <img class="card-img-bottom" src="./storage/memes/{{ $post->filepath }}" href="#{{$post->id}}">
				  	</div>
				  		<div class="card mx-auto" style="width: 30em;; padding: .5em;border-collapse: 'collapse'">
				  			<div class="row">
					  		<div class="col">
					  			<button type="button" class="btn btn-secondary" id="leave-a-comment{{$post->id}}" onclick="formview({{$post->id}})">
					  				Leave A Comment!
					  			</button>
					  		</div>
					  		<div class="col">
					  			<button type="button" class="btn hideCommentsBtn" id="listview{{$post->id}}" onclick="listviewfunc({{$post->id}})">
					  				Hide Comments
					  			</button>
					  		</div>
					  	</div>
					  	</div>
					  	<div id="comments-form{{$post->id}}" style="display: none;d ">
				  		<div class="card mx-auto" style="width: 30em; margin-top: 1em; margin-bottom: 1em;">
				  			<form method="POST" action="{{route('storeComment')}}" style="padding: 1em;">
				  				
				  				<div class="form-row">
				  					<div class="col-7">
						  				<label for="comment"></label>
						  				<input type='text' class='form-control' name='comment' placeholder="Leave a comment!">
					  				</div>
					  				{{csrf_field()}}
					  				<input type='text' name='post_id' hidden="true"
					  				value="{{$post->id}}">
					  			
					  				<div class="col">
						  				<input type='text' name='user_id' hidden="true"
						  				value="28">
						  				<button type="submit" class="btn btn-successsubmit_class" style="margin: .5em;"
						  				>Comment</button>
					  			</div>
					  			</div>
				  			</form>
				  		</div> 
				  	</div>
				  		<div style="margin-bottom: 1em;" id="comments-list{{$post->id}}">
			       		@foreach($comments as $comment)
				       		@if($comment->post_id == $post->id)
				       		<div class="card mx-auto" style="width: 30em;">
				       			<div class="card-body">
				       				<div>{{ $comment->comment }}</div>
				       				<div>
				       					@foreach($users as $user)
				       					{{$user->name}}
					       					@if($comment->user_id == $user->id)
					       						{{$user->name}}
					       					@endif
				       					@endforeach
				       				</div>
				       			</div>
				       		</div>
				       		@endif
			       		@endforeach
			       	</div>
				</div>

	        @endforeach
	       	{{ $posts->links() }}
	    </div>
	</div>
@endsection
