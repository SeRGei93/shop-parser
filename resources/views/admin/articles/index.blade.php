@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		<x-admin.breadcrumb title="Список новостей" : parent="Главная" : active="Новости"></x-admin.breadcrumb>

		<hr>

		<a href="{{ route('admin.article.create') }}" class="btn btn-primary pull-right mb-2">
			<i class="fa fa-plus-square-o"></i> Создать новость
		</a>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Наименование</th>
					<th>Публикация</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>

				@forelse($articles as $key => $article)
					<tr>
						<td>{{ $article->title }}</td>
						<td>{{ $article->published }}</td>
						<td>
							<form action="{{ route('admin.article.destroy', $article) }}" onsubmit="if(confirm('Удалить?')){ return true }else{ return false}" method="post">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<a href="{{ route('admin.article.edit', [$article]) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
								<button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
							</form>

						</td>
					</tr>

				@empty

					<tr>
						<td colspan="3" class="text-center"><h5>Данные отсутствуют</h5></td>
					</tr>

				@endforelse()

			</tbody>
			@if (!isset($articles))
				<tfoot>
					<tr>
						<td colspan="3">
							<nav aria-label="Page navigation example">
								<ul class="pagination pull-right">
									{{ $articles->links }}
								</ul>
							</nav>
						</td>
					</tr>
				</tfoot>
			@endif
		</table>




	</div>


@endsection