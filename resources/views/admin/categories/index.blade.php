@extends('admin.layouts.app_admin')

@section('content')
	<div class="container-fluid">

		<x-admin.breadcrumb title="Список категорий" : parent="Главная" : active="Категории"></x-admin.breadcrumb>

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Удалите или измените</h6>
				<a href="{{ route('admin.article-category.create') }}" class="btn btn-primary btn-icon-split btn-sm float-right">
					<span class="icon text-white-50">
					  <i class="fas fa-plus"></i>
					</span>
					<span class="text">Добавить категорию</span>
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>Наименование</th>
							<th>Публикация</th>
							<th>Действие</th>
						</tr>
						</thead>
						<tbody>

						@forelse($article_categories as $key => $article_category)
							<tr>
								<td>{{ $article_category->title }}</td>
								<td>{{ $article_category->published }}</td>
								<td>
									<form action="{{ route('admin.article-category.destroy', $article_category) }}" onsubmit="if(confirm('Удалить?')){ return true }else{ return false}" method="post">
										@csrf
										<input type="hidden" name="_method" value="DELETE">

										<a href="{{ route('admin.article-category.edit', [$article_category]) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
										<button type="submit" class="btn"><i class="fas fa-trash"></i></button>
									</form>

								</td>
							</tr>

						@empty

							<tr>
								<td colspan="3" class="text-center"><h5>Данные отсутствуют</h5></td>
							</tr>

						@endforelse()

						</tbody>

						<tfoot>
						<tr>
							<td colspan="3">
								<nav aria-label="Page navigation example">
									<ul class="pagination pull-right">
										{{ $article_categories->links() }}
									</ul>
								</nav>
							</td>
						</tr>
						</tfoot>

					</table>
				</div>
			</div>
		</div>
	</div>
@endsection