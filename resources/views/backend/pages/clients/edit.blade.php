@extends('backend.app')
@section('title', __('گۆڕانکاری لە کڵایەنت'))
@section('content')
<div class="page-content">
    <div class="container-xxxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">گۆڕانکاری لە کڵایەنت</span></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('clients.update',$client->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label for="name" class="form-label">ناو</label>
                                    <input class="form-control" type="text" id="name" name="name" autofocus
                                        value="{{ $client->name }}" />
                                </div>
                                <select class="form-select" id="type" name="type">
                                    <option value="کارمەند" {{ $client->type == 'کارمەند' ? 'selected' : '' }}>کارمەند</option>
                                    <option value="مشتەری" {{ $client->type == 'مشتەری' ? 'selected' : '' }}>مشتەری</option>
                                    <option value="سەرمایەگوزار" {{ $client->type == 'سەرمایەگوزار' ? 'selected' : '' }}>سەرمایەگوزار</option>
                                    <option value="بەرێوبەر" {{ $client->type == 'بەرێوبەر' ? 'selected' : '' }}>بەرێوبەر</option>
                                </select>
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
