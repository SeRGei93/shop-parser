@foreach($product_categories as $category_list)
	<option value="{{ $category_list->id ?? '' }}"
			@isset($product_category->id)
			@if ($product_category->parent_id == $category_list->id)
			selected=""
			@endif

			@if ($product_category->id == $category_list->id)
			hidden=""
			@endif

			@endisset
	>
		{!! $delimiter ?? "" !!} {{ $category_list->title }}
	</option>

	@if (count($category_list->children) > 0)
		@include('admin.productCategories.partials.categories', [
			'product_categories' => $category_list->children,
			'delimiter' => ' - ' . $delimiter
		])
	@endif

@endforeach