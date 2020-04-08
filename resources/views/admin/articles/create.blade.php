@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<x-admin.breadcrumb title="Создание новости" : parent="Главная" : active="Новости"></x-admin.breadcrumb>

		<hr>

		<form action="{{ route('admin.article.store') }}" method="post">
			@csrf
			@include('admin.articles.partials.form')
			<input type="hidden" name="created_by" value="{{ Auth::id() }}">
		</form>
	</div>
@endsection

@push('scripts')
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
	<script>
        CKEDITOR.replace( 'editor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
	</script>
@endpush