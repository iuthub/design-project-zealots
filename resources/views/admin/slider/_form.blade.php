<style>
	fieldset{
		margin: 20px 0;
	}

	.slide-item img{
		width: 300px;
		height: 220px;
	}
	
</style>

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
				<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $model->slug }}" required maxlength="20">

				@error('slug')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-12" id="items">
			<hr>
			<h2>Slider items</h2>

			@if ($form_url == "slider.update")
				@foreach ($model->items as $item)
					<fieldset>
						<div class="form-group slide-item">
							<button type="button" class="btn btn-warning remove-item" style="float: right;" data-id="{{ $item->id }}">Delete item</button>
							<img src="{{ $item->image }}" alt="" style="height: 220px; width: 300px;">
							<p>URL: {{ $item->url }}</p>
							<p>Text: {{ $item->text }}</p>

						</div>
					</fieldset>
				@endforeach

			@else
				<fieldset>
					<div class="form-group">
						<label for="media">Image</label>
						<input type="file" name="media[]" class="form-control" accept="image/*"/>
					</div>
					<div class="form-group">
						<label for="url">Url</label>
						<input type="text" name="url[]" class="form-control" />
					</div>
					<div class="form-group">
						<label for="url">Text</label>
						<textarea name="text[]" class="form-control"></textarea>
					</div>
				</fieldset>
			@endif

			<button id="add-item" class="btn btn-primary" style="margin: 0 auto; display: block;" type=button>Add item</button>



		</div>
	</div>
	<input type="hidden" name="delete-ids" id="delete-ids" value="">
	<div class="row" style="margin-top: 20px;">
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
			let itemsList = $("#items");
			var fieldset = `<fieldset>
					<button type="button" class="btn btn-warning remove-item" style="float: right;">Delete item</button>
					<div class="form-group" style="margin-top: 20px;">
						<label for="media">Image</label>
						<input type="file" name="media[]" class="form-control" accept="image/*" />
					</div>
					<div class="form-group">
						<label for="url">Url</label>
						<input type="text" name="url[]" class="form-control" />
					</div>
					<div class="form-group">
						<label for="url">Text</label>
						<textarea name="text[]" class="form-control"></textarea>
					</div>
				</fieldset>`;

			itemsList.append(fieldset);
			removeItem();
		});
	})
</script>