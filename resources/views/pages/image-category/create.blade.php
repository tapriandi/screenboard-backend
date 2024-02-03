@extends('layouts.app')

@section('title', 'Create Image Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Image Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Images Category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Image Category</h2>
                <div class="card">
                    <form action="{{ route('image-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pt-5">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input required type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{--  --}}

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hashtag
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input required name="hashtag" type="text"
                                        placeholder="Enter hashtags, separated by commas"
                                        class="form-control @error('hashtag') is-invalid @enderror">
                                    @error('hashtag')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Images
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <select required class="form-control select2 @error('image_id') is-invalid @enderror"
                                        name="image_id">
                                        <option value="">-- Select Image --</option>
                                        @foreach ($images as $image)
                                            <option value="{{ $image->id }}">
                                                {{ $image->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Icon
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="icon"
                                        @error('icon') is-invalid @enderror>
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
