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
		<div class="col-lg-12" id="items">
			<fieldset name="item[]">
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="image" class="form-control" />
				</div>
				<div class="form-group">
					<label for="url">Url</label>
					<input type="text" name="url" class="form-control" />
				</div>
			</fieldset>

			<button id="add-item" class="btn btn-primary" style="margin: 0 auto; display: block;" type=button>Add item</button>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;">
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</form>
<style>
	fieldset{
		margin: 20px; 0;
	}
	
</style>

<script>

	function removeItem(){
		$(".remove-item").click(function(){
			$(this).parent().detach();
		});
	}

	$(document).ready(function(){
		$("#add-item").click(function() {
			let itemsList = $("#items");
			var fieldset = `<fieldset name="item[]">
					<button type="button" class="btn btn-warning remove-item" style="float: right;">Delete item</button>
					<div class="form-group" style="margin-top: 20px;">
						<label for="image">Image</label>
						<input type="file" name="image" class="form-control" />
					</div>
					<div class="form-group">
						<label for="url">Url</label>
						<input type="text" name="url" class="form-control" />
					</div>
				</fieldset>`;

			itemsList.append(fieldset);
			removeItem();
		});
	})
</script>