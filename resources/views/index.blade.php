@extends('layouts.app')
@section('content')
<div class="content container">
	<div class="products page-block">
		<div class="row">
			<div class="col-lg-12">
				<h2>Recently added products</h2>
				<a href="#" class="btn btn-primary all-list">All products</a>
			</div>
		</div>
		<div class="row">
			@foreach ($products as $product)
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">{{ $product->name }}</h5>
						<p class="card-text">{{ $product->desc }}</p>
						<a href="{{ route("cart.add", ["id" => $product->id])}}" class="btn btn-success">Add to cart</a>
						<a href="{{ route("site.product", ["id" => $product->id])}}" class="btn btn-primary">View</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="blog page-block">
		<div class="row">
			<div class="col-lg-12">
				<h2>Blog</h2>
				<a href="#" class="btn btn-primary all-list">All post</a>
			</div>
		</div>
		<div class="row">
			@foreach($posts as $post)
				<div class="col-md-6">
					<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative post-item">
						<div class="col p-4 d-flex flex-column position-static">
							<h3 class="mb-0">{{ $post->title }}</h3>
							<div class="mb-1 text-muted">{{ $post->getDate() }}</div>
							<p class="card-text mb-auto">{{ $post->getExcerpt() }}</p>
							<a href="{{ route("site.post", ["id" => $post->id ]) }}" class="stretched-link">Continue reading</a>
						</div>
						<div class="col-auto d-none d-lg-block">
							@if ($post->thumbnail)
								<img src="{{ $post->thumbnail }}" alt="" class="bd-placeholder-img" width="200" height="250">
							@else
								<img src="img/no-image.svg" alt="" class="bd-placeholder-img" width="200" height="250">
							@endif
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection