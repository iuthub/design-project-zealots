<form method="POST" action="{{ route($form_url, ["id" => $model->id]) }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $model->name }}" required minlength="5" maxlength="100">

				@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $model->slug }}"required minlength="5" maxlength="20">

				@error('slug')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="custom-file">
					<input type="file" name="thumbnail" class="custom-file-input" id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
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
				<label for="desc">Description</label>
				<textarea name="desc" class="form-control @error('desc') is-invalid @enderror" value="{{ $model->desc }}" required minlength="10"> {{ $model->desc }}</textarea>
				@error('desc')
					<div class="alert alert-danger ">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</form>
