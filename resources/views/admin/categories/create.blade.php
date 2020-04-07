@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<x-admin.breadcrumb title="Создание категории" : parent="Главная" : active="Категории"></x-admin.breadcrumb>

		<hr>

		<form action="{{ route('admin.category.store') }}" method="post">
			@csrf
			@include('admin.categories.partials.form')
		</form>
	</div>
@endsection