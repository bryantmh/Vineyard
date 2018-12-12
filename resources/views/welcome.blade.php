{{$doit = true}}

@extends('layout')

@section('content')
<div class="page-content" id="main-content" role="main" style="margin-top: 8em;">
	<div class="scroll">
		@foreach ($posts as $post)
		<a name="{{$post->id}}"></a>
		<div class="card mx-auto" style="width: 50em; margin-bottom: 1em; padding-left: 2em; padding-right: 2em;" >
			<div id='meme{{$post->id}}' style=" padding-bottom: 1.5em;">
				<div class="row">
					<div class="col-10" style="padding-left: 0px;">
						<h2 class="card-title">{{ $post->description }}</h2>
					</div>
					<div class="col" style="text-align: right;">
						<button class='far fa-edit btn btn-secondary' style="padding-top: .3em;padding-left: .5em;padding-right: .3em;padding-bottom: .4em;margin-bottom: .5em; margin-top: .5em;" onclick="modifyPost({{$post->id}})"></button>
					</div>
				</div>
				<img class="card-img-bottom" src="./storage/memes/{{ $post->filepath }}" href="#{{$post->id}}">
			</div>
			<div id='updateMeme{{$post->id}}' style="display: none;">
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
			<div>
				{!! form($formComment) !!}
				<input type="hidden" value="{{$post->id}}" class="test">
				<button type="button" class="btn hideCommentsBtn" id="listview{{$post->id}}" onclick="listviewfunc({{$post->id}})" value="Hide Comments" style="width: 12em; margin-bottom: 2em; margin-top: -3.55em; margin-left: 5em;">
				</button>
			</div>
			<div style="margin-bottom: 1em;" id="comments-list{{$post->id}}" class="scroll">
				@foreach($comments as $comment)
				@if($comment->post_id == $post->id)
				<div class="card mx-auto" style="width: 46em;">
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
