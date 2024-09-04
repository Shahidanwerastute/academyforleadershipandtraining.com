@if ($paginator->hasPages())
	<div class="uk-pagination uk-margin-medium-top">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
		@else
			<li rel="prev"><a href="{{ $paginator->previousPageUrl() }}"><span><i class="uk-icon-angle-double-left"></i></span></a></li>
		@endif

		{{-- Pagination Elements --}}
		@foreach ($elements as $element)
			{{-- "Three Dots" Separator --}}
			@if (is_string($element))
				<li class="uk-disabled"><span>{{ $element }}</span></li>
			@endif

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li class="uk-active"><span class="number">{{ $page }}</span></li>
					@else
						<li><a href="{{ $url }}"><span class="number">{{ $page }}</span></a></li>
					@endif
				@endforeach
			@endif
		@endforeach

		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
			<li rel="next"><a href="{{ $paginator->nextPageUrl() }}"><i class="uk-icon-angle-double-right"></i></a></li>
		@else
			<li class="uk-disabled"><span><i class="uk-icon-angle-double-right"></i></span></li>
		@endif
	</div>
@endif