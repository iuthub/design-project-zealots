<form method="POST" action="{{ route($form_url, ["id" => $model->id]) }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<div class="status">
					<label for="">Set status</label>
					<select name="status" id="status" class="form-control">
						@foreach($statuses as $status)
							@if ($status == $model->status)
								<option value="{{ $status }}" selected="selected">{{ ucfirst($status) }}</option>
							@else
								<option value="{{ $status }}">{{ ucfirst($status) }}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="radio">
				<label>Score</label>
				<br>
				@for ($i = 1; $i <= 5; $i++)
					@if ($model->rating == $i)
						<label><input type="radio" name="rating" value="{{ $i }}" checked>{{ $i }}</label>
					@else
						<label><input type="radio" name="rating" value="{{ $i }}">{{ $i }}</label>
					@endif
				@endfor
			</div>
		</div>
	</div>
	@if (!$model->user_id)
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required maxlength="100" value="{{ $model->name }}">

					@error('name')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required maxlength="100" value="{{ $model->email }}">

					@error('email')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $model->phone }}">

					@error('phone')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
		</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="comment">Comment</label>
				<textarea name="comment" class="form-control @error('comment') is-invalid @enderror" required value="{{ $model->comment }}">{{ $model->comment }}</textarea>
				@error('comment')
					<div class="alert alert-danger ">{{ $message }}</div>
				@enderror
			</div>
		</div>
	</div>
	<button typ="submit" class="btn btn-success">Save</button>
</form>

<script>

</script>