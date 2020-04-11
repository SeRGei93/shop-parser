@extends('admin.layouts.app_admin')

@section('content')
	<div class="container-fluid">
		<x-admin.breadcrumb title="Редактирование новости" : parent="Главная" : active="Новости"></x-admin.breadcrumb>
		<div class="row">
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Внесите изменения</h6>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.article.update', $article) }}" method="post">
							<input type="hidden" name="_method" value="put">
							@csrf
							@include('admin.articles.partials.form')
							<input type="hidden" name="modified_by" value="{{ Auth::id() }}">
						</form>
					</div>
				</div>
			</div>
		</div>

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