<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<?php $segments = ''; ?>
		@foreach(Request::segments() as $segment)
			<?php $segments .= '/'.$segment; ?>
			@if ($loop->last)
				<li class="breadcrumb-item active" aria-current="page">
					{{ ucfirst($segment) }}
				</li>
			@else
			<li class="breadcrumb-item">
				<a href="{{ $segments }}">{{ ucfirst($segment) }}</a>
			</li>
			@endif
		@endforeach

	</ol>
</nav>
