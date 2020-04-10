@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		<x-admin.breadcrumb title="Список категорий" : parent="Главная" : active="Категории"></x-admin.breadcrumb>

		<hr>

		<a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right mb-2">
			<i class="fa fa-plus-square-o"></i> Создать категорию
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

				@forelse($categories as $key => $category)
					<tr>
						<td>{{ $category->title }}</td>
						<td>{{ $category->published }}</td>
						<td>
							<form action="{{ route('admin.category.destroy', $category) }}" onsubmit="if(confirm('Удалить?')){ return true }else{ return false}" method="post">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<a href="{{ route('admin.category.edit', [$category]) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
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

				<tfoot>
					<tr>
						<td colspan="3">
							<nav aria-label="Page navigation example">
								<ul class="pagination pull-right">
									{{ $categories->links() }}
								</ul>
							</nav>
						</td>
					</tr>
				</tfoot>

		</table>

	</div>


@endsection