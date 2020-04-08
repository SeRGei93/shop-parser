@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<x-admin.breadcrumb title="Редактирование новости" : parent="Главная" : active="Новости"></x-admin.breadcrumb>

		<hr>

		<form action="{{ route('admin.article.update', $article) }}" method="post">
			<input type="hidden" name="_method" value="put">
			@csrf
			@include('admin.articles.partials.form')
			<input type="hidden" name="modified_by" value="{{ Auth::id() }}">
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