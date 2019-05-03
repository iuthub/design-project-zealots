@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ route("post.create") }} "><button type="button" class="btn btn-primary">Create Post</button></a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover" style="margin-top: 20px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Title</th>
						<th scope="col">Slug</th>
						<th scope="col">Status</th>
						<th scope="col">Thumbnail</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
					<tr>
						<th scope="row"> {{ $post->id }} </th>
						<td> {{ $post->title }} </td>
						<td> {{ $post->slug }} </td>
						<td> {{ $post->getStatus() }}</td>
						<td> 
							@if ($post->thumbnail)
								<img src="{{ $post->thumbnail }}" style="width: 200px; height: 150px; display: block;">
							@endif
						</td>
						<td><a href="{{ route("post.update", ["id" => $post->id]) }}"><i class="far fa-edit"></i></a>
							<a href="#" data-id={{ $post->id }} class="delete-item">
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