@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="content post-page">
			<div class="row">
				<div class="col-lg-3">
					<h3 class="mb-0">{{ $post->title }}</h3>
					<div class="mb-1 text-muted">{{ $post->getDate() }}</div>
				</div>
				<div class="col-lg-9">
					{{ $post->content }}
				</div>
			</div>
		</div>
	</div>
@endsection