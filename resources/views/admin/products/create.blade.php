@extends('admin.layouts.app_admin')

@section('content')
	<div class="container-fluid">
		<x-admin.breadcrumb title="Создание товара" : parent="Главная" : active="Товары"></x-admin.breadcrumb>
		<div class="row">
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Заполните информацию</h6>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.product.store') }}" method="post">
							@csrf
							@include('admin.products.partials.form')
							<input type="hidden" name="created_by" value="{{ Auth::id() }}">
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