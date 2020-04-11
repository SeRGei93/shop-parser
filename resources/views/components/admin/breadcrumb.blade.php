{{--<h2>{{ $title }}</h2>--}}

{{--<nav aria-label="breadcrumb">--}}
{{--    <ol class="breadcrumb">--}}
{{--        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ $parent }}</a></li>--}}
{{--        <li class="breadcrumb-item active" aria-current="page">{{ $active }}</li>--}}
{{--    </ol>--}}
{{--</nav>--}}


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ $parent }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $active }}</li>
        </ol>
    </nav>

{{--    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
</div>

