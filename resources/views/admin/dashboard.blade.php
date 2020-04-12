@extends('admin.layouts.app_admin')

@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Категорий</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories_count }}</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-fw fa-folder fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Материалов</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $articles_count }}</div>
							</div>
							<div class="col-auto">
								<i class="far fa-newspaper fa-2x text-gray-300"></i>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Посетителей</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>

							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Сегодня</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar-day fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Категории</h6>
						<a href="{{ route('admin.article-category.create') }}" class="btn btn-primary btn-icon-split btn-sm float-right">
							<span class="icon text-white-50">
							  <i class="fas fa-plus"></i>
							</span>
							<span class="text">Добавить категорию</span>
						</a>

					</div>
					<ul class="list-group list-group-flush">
						@foreach($categories as $category)
							<li class="list-group-item">
								<a href="{{ route('admin.article-category.edit', $category) }}">{{ $category->title }} </a>({{ $category->articles()->count() }})
							</li>
						@endforeach

					</ul>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Последние новости</h6>
						<a href="{{ route('admin.article.create') }}" class="btn btn-primary btn-icon-split btn-sm float-right">
							<span class="icon text-white-50">
							  <i class="fas fa-plus"></i>
							</span>
							<span class="text">Добавить новость</span>
						</a>
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