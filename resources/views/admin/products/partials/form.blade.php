<div class="form-group">
    <label for="published">Статус</label>
    <select class="form-control" name="published" id="published">
        @if (isset($product->id))
            <option value="0" @if ($product->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($product->published == 1) selected="" @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Название новости" value="{{ $product->title ?? "" }}" required>
</div>

<div class="form-group">
    <label for="slug">Символьный код</label>
    <input type="text" class="form-control" id="slug" name="slug" placeholder="Автоматическая генерация" value="{{ $product->slug ?? "" }}" readonly="">
</div>

<div class="form-group">
    <label for="categories">Родительская категория</label>
    <select class="form-control" name="categories[]" multiple="">
        @include('admin.products.partials.categories', ['product_categories' => $product_categories])
    </select>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="text" class="form-control" id="price" name="price" placeholder="Цена" value="{{ $product->price ?? "" }}" required>
</div>

<div class="form-group">
    <label for="description_short">Краткое описание</label>
    <textarea class="form-control" id="description_short" name="description_short">{{ $product->description_short ?? '' }}</textarea>
</div>

<div class="form-group">
    <label for="description">Полное описание</label>
    <textarea class="form-control" id="editor" name="description">{{ $product->description ?? '' }}</textarea>
</div>

<div class="form-group">
    <label for="meta_title">Мета заголовок</label>
    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="SEO заголовок" value="{{ $product->meta_title ?? "" }}">
</div>

<div class="form-group">
    <label for="meta_description">Мета описание</label>
    <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Мета описание" value="{{ $product->meta_description ?? "" }}">
</div>

<div class="form-group">
    <label for="meta_keyword">Ключевые слова</label>
    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{ $product->meta_keyword ?? "" }}">
</div>

<button type="submit" class="btn btn-primary">Сохранить</button>

