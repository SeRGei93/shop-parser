@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<x-admin.breadcrumb title="Редактирование категории" : parent="Главная" : active="Категории"></x-admin.breadcrumb>

		<hr>

		<form action="{{ route('admin.category.update', $category) }}" method="post">
			<input type="hidden" name="_method" value="put">
			@csrf
			@include('admin.categories.partials.form')
		</form>
	</div>
@endsection