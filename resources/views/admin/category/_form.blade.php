<form method="POST" action="{{ route("category.create") }}">
	@csrf
	<div class="col-lg-6">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" class="@error('name') is-invalid @enderror">

			@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="slug">Slug</label>
			<input type="text" class="form-control" class="@error('slug') is-invalid @enderror">

			@error('slug')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<label for="desc">Description</label>
			<textarea name="desc" class="form-control"></textarea>
		</div>
	</div>





</form>