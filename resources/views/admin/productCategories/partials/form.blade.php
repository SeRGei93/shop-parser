<div class="form-group">
    <label for="published">Статус</label>
    <select class="form-control" name="published" id="published">
        @if (isset($product_category->id))
            <option value="0" @if ($product_category->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($product_category->published == 1) selected="" @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="title">Название</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Название категории" value="{{ $product_category->title ?? "" }}" required>
</div>

<div class="form-group">
    <label for="slug">Символьный код</label>
    <input type="text" class="form-control" id="slug" name="slug" placeholder="Автоматическая генерация" value="{{ $product_category->slug ?? "" }}" readonly="">
</div>

<div class="form-group">
    <label for="description">Полное описание</label>
    <textarea class="form-control" id="editor" name="description">{{ $product_category->description ?? '' }}</textarea>
</div>

<div class="form-group">
    <label for="parent_id">Родительская категория</label>
    <select class="form-control" name="parent_id" id="parent_id">
        <option value="0">-- без родительской категории --</option>
        @include('admin.productCategories.partials.categories', ['product_categories' => $product_categories])

    </select>
</div>



<button type="submit" class="btn btn-primary">Сохранить</button>

