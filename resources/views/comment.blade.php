<div class="card mx-auto" style="width: 40em; margin-top: 1em; margin-bottom: 1em;">
	<form method="POST" action="{{route('storeComment')}}" style="padding: 1em;" id="commentFormId">
		{{ csrf_field()}}
		<div class="form-row">
			<div class="col-7">
  				<input type='text' class='form-control' name='comment' placeholder="Leave a comment!">
			</div>
			<input type='text' name='post_id' hidden="true">
			<div class="col">
  				<input type='text' name='user_id' hidden="true" value="28">
  				<button type="submit" class="btn btn-danger submit_class" style="margin: .5em;" onsubmit="return false">Comment</button>
			</div>
		</div>
	</form>
</div> 