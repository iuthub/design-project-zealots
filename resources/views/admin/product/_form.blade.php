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
			<div class="form-group" id="images">
				<hr>
				<h2>Product images</h2>

				@if ($form_url == "product.update")
					@foreach ($model->images as $image)
					<div class="form-group slide-item">
						<fieldset>

								<button type="button" class="btn btn-warning remove-item" style="float: right;" data-id="{{ $image->id }}">Delete image</button>
								<img src="{{ $image->url }}" alt="" style="height: 220px; width: 300px;">
								<p>Title: {{ $image->title }}</p>
								<p>Caption: {{ $image->caption }}</p>
						</fieldset>
					</div>
					@endforeach
				@else
					<fieldset>
						<legend>Image</legend>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="custom-file">
									<label for="images">Select image</label>
									<input type="file" class="form-control-file" name="images[]" id="images" accept="image/*">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title[]" class="form-control" />
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="caption">Caption</label>
								<textarea name="caption[]" class="form-control"></textarea>
							</div>
						</div>
					</fieldset>
				@endif

				<button id="add-item" class="btn btn-primary" style="margin: 0 auto; display: block;" type=button>Add item</button>
				<input type="hidden" name="delete-ids" id="delete-ids" value="">

			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</form>

<script>
	function removeItem(){
		$(".remove-item").click(function(){

			let id = $(this).attr("data-id");

			if(id){
				let delete_ids = $("#delete-ids").val();

				if(delete_ids)
					delete_ids = delete_ids.split(", ");
				else
					delete_ids = [];
				
				delete_ids.push(id);
				$("#delete-ids").val(delete_ids.join(", "));
			}


			$(this).parent().detach();
		});
	}

	$(document).ready(function(){
		removeItem();
		$("#add-item").click(function() {
			let itemsList = $("#images");
			var fieldset = `<fieldset>
			<legend>Image</legend>
					<button type="button" class="btn btn-warning remove-item" style="float: right;">Delete item</button>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="custom-file">
									<label for="images">Select image</label>
									<input type="file" class="form-control-file" name="images[]" id="images" accept="image/*">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title[]" class="form-control" />
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="caption">Caption</label>
								<textarea name="caption[]" class="form-control"></textarea>
							</div>
						</div>
				</fieldset>`;

			itemsList.append(fieldset);
			removeItem();
		});
	})
</script>