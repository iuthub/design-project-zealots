@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ route("product.create") }} "><button type="button" class="btn btn-primary">Create Product</button></a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover" style="margin-top: 20px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Price</th>
						<th scope="col">Desc</th>
						<th scope="col">Category</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<th scope="row"> {{ $product->id }} </th>
						<td> {{ $product->name }} </td>
						<td> {{ $product->price }} </td>
						<td> {{ $product->desc }} </td>
						<td>{{ $product->category->name }}</td>
						<td><a href="{{ route("product.update", ["id" => $product->id]) }}"><i class="far fa-edit"></i></a>
							<a href="#" data-id={{ $product->id }} class="delete-item">
								<i class="fas fa-trash-alt"></i>
							</a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$("document").ready( function(){
		$(".delete-item").click(function(){
			let id = $(this).attr("data-id");
			if(confirm("Are your sure, you want to delete this?")){
				window.location.href = window.location.href+"/delete/"+id;
			}
		});
	});
</script>
@endsection