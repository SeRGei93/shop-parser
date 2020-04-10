@foreach($categories as $category)
	@if ($category->children->where('published', 1)->count())
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="{{ url("/blog/category/$category->slug") }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{ $category->title }} <span class="caret"></span>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				@foreach ($category->children as $children)
					<a class="dropdown-item" href="{{ url("/blog/category/$children->slug") }}">{{$children->title}}</a>
				@endforeach


			</div>
	@else
		<li class="nav-item">
			<a href="{{ url("/blog/category/$category->slug") }}" class="nav-link">{{ $category->title }}</a>
	@endif
		</li>
@endforeach