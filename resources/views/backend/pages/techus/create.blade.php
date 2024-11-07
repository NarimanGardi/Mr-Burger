@extends('backend.app')
@section('title', __('زیادکردنی تێچوو'))
@section('content')
    <div class="page-content">
        <div class="container-xxxl flex-grow-1 container-p-y">
            <h4 class="fw-bold mb-4"><span class="text-muted fw-light">زیادکردنی تێچوو</span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('techus.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label for="name" class="form-label">ناو</label>
                                        <select class="form-select" id="name" name="name">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->name }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-8">
                                        <label for="type" class="form-label">جۆری تێچوو</label>
                                        <select class="form-select" id="type" name="type">
                                            @foreach ($techuTypes as $techus)
                                                <option value="{{ $techus->name }}">{{ $techus->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="amount" class="form-label">بری پارە</label>
                                        <input class="form-control" type="number" id="amount" name="amount"
                                            value="{{ old('amount') }}" />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="amount" class="form-label">ڕێکەوتی سەرفکردن</label>
                                        <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample1">
                                            <span
                                                class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                    data-feather="calendar" class=" text-primary"></i></span>
                                            <input type="text" class="form-control border-primary bg-transparent"
                                                name="date" placeholder="ڕێکەوت" value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="amount" class="form-label">تێبینی</label>
                                        <textarea name="comment" class="form-control" cols="30" rows="10"> {{ old('comment') }} </textarea>
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
