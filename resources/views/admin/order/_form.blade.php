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
		<div class="col-lg-12">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th style="width: 5%">#</th>
						<th>Product</th>
						<th>Price</th>
						<th style="width: 20%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($model->products as $index => $product)
						<tr>
							<td>{{ $index+1 }}</td>
							<td>{{ $product->name }}</td>
							<td>${{ $product->price }}</td>
							<td><span class="btn btn-danger remove-item" data-id="{{ $product->id }}">Remove from order</span></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		
		<input type="hidden" name="delete-ids" id="delete-ids" value="">
		<div class="col-lg-12">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>

</form>

<script>


	$(document).ready( function() {
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


			$(this).parent().parent().detach();
		});
	});

</script>