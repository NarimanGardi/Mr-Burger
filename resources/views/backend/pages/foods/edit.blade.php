@extends('backend.app')
@section('title', __('گۆڕانکاری لە مقاول'))
@section('content')
    <div class="page-content">
        <div class="container-xxxl flex-grow-1 container-p-y">
            <h4 class="fw-bold mb-4"><span class="text-muted fw-light">گۆڕانکاری لە مقاول</span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('clients.update', $client->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label for="name" class="form-label">ناو</label>
                                        <input class="form-control" type="text" id="name" name="name" autofocus
                                            value="{{ $client->name }}" />
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label for="debt" class="form-label">قەرز</label>
                                        <input class="form-control" type="number" id="debt" name="debt"
                                            value="{{ $client->debt }}" />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">گۆڕانکاری</button>
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