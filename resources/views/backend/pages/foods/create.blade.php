@extends('backend.app')
@section('title', __('زیادکردنی خواردن'))
@section('content')
    <div class="page-content">
        <div class="container-xxxl flex-grow-1 container-p-y">
            <h4 class="fw-bold mb-4"><span class="text-muted fw-light">زیادکردنی خواردن</span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">

                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label for="name" class="form-label">ناو</label>
                                        <input class="form-control" type="text" id="name" name="name" autofocus
                                            value="{{ old('name') }}" />
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label for="description" class="form-label">وردەکاری</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label for="price" class="form-label">نرخ</label>
                                        <input class="form-control" type="number" id="price" name="price"
                                            value="{{ old('price') }}" />
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">بەردەستبوون</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="available_yes"
                                                    name="is_available" value="1" checked
                                                    {{ old('is_available') == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="available_yes">بەڵێ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="available_no"
                                                    name="is_available" value="0"
                                                    {{ old('is_available') == '0' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="available_no">نەخێر</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label for="image" class="form-label">وێنە</label>
                                        <input class="form-control" type="file" id="image" name="image" />
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">زیادکردن</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>
@endsection
