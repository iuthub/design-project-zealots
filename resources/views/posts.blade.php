@extends('layouts.app')
@section('content')
<div class="content-wrapper page-block">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 block-title-wrap">
				<h2 class="block-title">Posts</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
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
			<div class="col-lg-12">
				{{ $posts->links() }}
			</div>
		</div>
	</div>
</div>

@endsection