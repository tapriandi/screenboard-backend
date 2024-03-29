@extends('layouts.app')

@section('title', 'Brands')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Brands</h1>
                <div class="section-header-button">
                    <a href="{{ route('brand.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Brands</a></div>
                    <div class="breadcrumb-item">All Brand</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('brand.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search brand"
                                                name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Icon</th>
                                            <th>Banner</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($brands as $brand)
                                            <tr>

                                                <td>{{ $brand->name }}</td>
                                                <td>
                                                    @foreach ($brand->categories as $category)
                                                        - {{ $category->name }} <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($brand->icon)
                                                        <img src="{{ asset('brand/' . $brand->icon) }}" alt=""
                                                            style="height:50px; width:100px; object-fit:cover;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($brand->banner)
                                                        <img src="{{ asset('brand/' . $brand->banner) }}" alt=""
                                                            style="height:50px; width:100px; object-fit:cover;">
                                                    @endif
                                                </td>
                                                <td>{{ $brand->description }}</td>
                                                <td>{{ $brand->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('brand.edit', $brand->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('brand.destroy', $brand->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right" style="padding-top: 15px">
                                    {{ $brands->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
