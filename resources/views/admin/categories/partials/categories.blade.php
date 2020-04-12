@foreach($article_categories as $category_list)
	<option value="{{ $category_list->id ?? '' }}"
	@isset($article_category->id)
		@if ($article_category->parent_id == $category_list->id)
		    selected=""
		@endif

		@if ($article_category->id == $category_list->id)
			hidden=""
		@endif

	@endisset
	>
		{!! $delimiter ?? "" !!} {{ $category_list->title }}
	</option>
	
	@if (count($category_list->children) > 0)
		@include('admin.categories.partials.categories', [
			'article_categories' => $category_list->children,
			'delimiter' => ' - ' . $delimiter
		])
	@endif
	
@endforeach