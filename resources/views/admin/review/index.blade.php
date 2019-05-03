@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover" style="margin-top: 20px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Product</th>
						<th scope="col">Rating</th>
						<th scope="col">Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($reviews as $review)
					<tr>
						<th scope="row"> {{ $review->id }} </th>
						<td> {{ $review->getAuthorName() }} </td>
						<td> {{ $review->getAuthorEmail() }} </td>
						<td> {{ $review->product->name }}</td>
						<td> {{ $review->rating }} </td>
						<td> {{ $review->getStatus() }} </td>
						<td><a href="{{ route("review.update", ["id" => $review->id]) }}"><i class="far fa-edit"></i></a>
							<a href="#" data-id={{ $review->id }} class="delete-item">
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