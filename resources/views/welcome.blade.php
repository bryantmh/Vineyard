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
				  	<div id='meme{{$post->id}}'>
				  		<div class="row">
				  			<div class="col-10">
						    <h2 class="card-title">{{ $post->description }}</h2>
						    </div>
						    <div class="col">
						    	<button class='far fa-edit btn btn-secondary' style="    padding-top: .3em;padding-left: .5em;padding-right: .3em;padding-bottom: .3em;margin-bottom: .5em; margin-top: .5em;" onclick="modifyPost({{$post->id}})"></button>
						    </div>
						</div>
					    <img class="card-img-bottom" src="./storage/memes/{{ $post->filepath }}" href="#{{$post->id}}">
				  	</div>
				  	<div id='updateMeme{{$post->id}}' style="display: none;">
				  		<div class="card mx-auto" style="width: 40em;">
				  			<div class="card-body">
						  		<h2 class="card-title">Edit the Post</h2> 
						  		{{ Form::model($post, array('route' => array('modifyPost', $post->id))) }}
						  		{{ Form::hidden('id') }}
						  		<div class="form-group">
						  		{{ Form::label('description', 'Description', array('class' => 'control-label'))}}
						  		{{ Form::textarea('description',null, array('class' => 'form-control')) }}
						  	</div>
						  		<div class="form-group">
						  		{{ Form::label('upload_image', 'Upload Image', array('class' => 'control-label'))}}
						  		{{ Form::file('upload_image', array('class' => 'form-control')) }}
						  		</div>
						  		{{ Form::Submit('Save Changes')}}
						  		{{ Form::close() }}
						  	</div>
						  </div>
						</div>
				  		<div class="card mx-auto" style="width: 30em;; padding: .5em;border-collapse: 'collapse'">
				  			<div class="row">
					  		<div class="col">
					  			<button type="button" class="btn btn-secondary leaveAComment" id="leave-a-comment{{$post->id}}" onclick="formview({{$post->id}})" value="Leave A Comment!">
					  			</button>
					  		</div>
					  		<div class="col">
					  			<button type="button" class="btn hideCommentsBtn" id="listview{{$post->id}}" onclick="listviewfunc({{$post->id}})" value="Hide Comments">
					  			</button>
					  		</div>
					  	</div>
					  	</div>
					  	<div id="comments-form{{$post->id}}" style="display: none; ">
				  	</div>
				  		<div style="margin-bottom: 1em;" id="comments-list{{$post->id}}" class="scroll">
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
