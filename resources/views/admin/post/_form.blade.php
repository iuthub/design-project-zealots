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
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $model->title }}" required minlength="5" maxlength="100">

				@error('title')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $model->slug }}" required minlength="5" maxlength="20">

				@error('slug')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="custom-file">
					<label for="thumbnail">Set thumbnail</label>
					<input type="file" class="form-control-file" name="thumbnail" id="thumbnail" accept="image/*">
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			@if ($model->thumbnail)
				<img src="{{ $model->thumbnail }}" style="width: 200px; height: 150px; margin-top: 10px; display: block;">
				<code>{{ $model->thumbnail }}</code>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" class="form-control @error('content') is-invalid @enderror" value="{{ $model->content }}" required> {{ $model->content }}</textarea>
				@error('content')
					<div class="alert alert-danger ">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</form>

<script>

</script>