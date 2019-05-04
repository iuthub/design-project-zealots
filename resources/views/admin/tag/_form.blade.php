<form method="POST" action="{{ route($form_url, ["id" => $model->id]) }}" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="name">Tag</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $model->name }}" required minlength="5" maxlength="100">

				@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</form>