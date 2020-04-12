@foreach($product_categories as $cat)
	<option value="{{ $cat->id ?? '' }}"
		@isset($product->id)
			@if ($product->categories->contains('id', $cat->id))
				selected="selected"
			@endif
		@endisset
	>
		{!! $delimiter ?? "" !!} {{ $cat->title }}
	</option>
	
	@if (count($cat->children) > 0)
		@include('admin.products.partials.categories', [
			'product_categories' => $cat->children,
			'delimiter' => ' - ' . $delimiter
		])
	@endif
	
@endforeach