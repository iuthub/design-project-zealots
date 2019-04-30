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
				<label for="price">Price</label>
				<input type="number" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $model->price ? $model->price : 0 }}"required>

				@error('price')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="category_id">
					<label for="">Select category</label>
					<select name="category_id" id="category_id" class="form-control" required="">
						<option value="" disabled>Select category</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>

						@endforeach
					</select>
				</div>
			</div>
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
