@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		<div class="row">

			<div class="col-sm-3">
				<div class="jumbotron">
					<p><span class="badge badge-primary">Категорий {{ $categories_count }}</span></p>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="jumbotron">
					<p><span class="badge badge-primary">Материалов {{ $articles_count }}</span></p>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="jumbotron">
					<p><span class="badge badge-primary">Посетителей 0</span></p>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="jumbotron">
					<p><span class="badge badge-primary">Сегодня 0</span></p>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.category.create') }}" class="btn btn-primary">Создать категорию</a>
					</div>
					<ul class="list-group list-group-flush">
						@foreach($categories as $category)
							<li class="list-group-item">
								<a href="{{ route('admin.category.edit', $category) }}">{{ $category->title }} </a>({{ $category->articles()->count() }})
							</li>
						@endforeach

					</ul>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<a href="{{ route('admin.article.create') }}" class="btn btn-primary">Создать материал</a>
					</div>
					<ul class="list-group list-group-flush">
						@foreach($articles as $article)
							<li class="list-group-item">
								<a href="{{ route('admin.article.edit', $article) }}">{{ $article->title }} </a>({{ $article->categories()->pluck('title')->implode(', ') }})
							</li>
						@endforeach

					</ul>
				</div>
			</div>

		</div>
	</div>
@endsection