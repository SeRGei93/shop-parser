<div class="form-group">
    <label for="published">Статус</label>
    <select class="form-control" name="published" id="published">
        @if (isset($article->id))
            <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Название новости" value="{{ $article->title ?? "" }}" required>
</div>

<div class="form-group">
    <label for="slug">Символьный код</label>
    <input type="text" class="form-control" id="slug" name="slug" placeholder="Автоматическая генерация" value="{{ $article->slug ?? "" }}" readonly="">
</div>

<div class="form-group">
    <label for="categories">Родительская категория</label>
    <select class="form-control" name="categories[]" multiple="">
        <option value="0">-- без родительской категории --</option>
        @include('admin.articles.partials.categories', ['categories' => $categories])

    </select>
</div>

<div class="form-group">
    <label for="description_short">Краткое описание</label>
    <textarea class="form-control" id="description_short" name="description_short">{{ $article->description_short ?? '' }}</textarea>
</div>

<div class="form-group">
    <label for="description">Полное описание</label>
    <textarea class="form-control" id="editor" name="description">{{ $article->description ?? '' }}</textarea>
</div>

<div class="form-group">
    <label for="meta_title">Мета заголовок</label>
    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="SEO заголовок" value="{{ $article->meta_title ?? "" }}">
</div>

<div class="form-group">
    <label for="meta_description">Мета описание</label>
    <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Мета описание" value="{{ $article->meta_description ?? "" }}">
</div>

<div class="form-group">
    <label for="meta_keyword">Ключевые слова</label>
    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{ $article->meta_keyword ?? "" }}">
</div>

<button type="submit" class="btn btn-primary">Сохранить</button>

