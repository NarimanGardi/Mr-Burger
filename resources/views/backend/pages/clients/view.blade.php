@extends('backend.app')
@section('title', __('طرف حسابەکان'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">خشتەی طرف حسابەکان</h4>
            </div>
        </div>
        <div class="row g-4">
            <div>
                <h6>{{ $client->name }} : ناوی طرف حساب</h6>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('clients.show',$client->id) }}" method="GET" autocomplete="off">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="گەڕان..."
                                    aria-label="Search" aria-describedby="button-addon-search"
                                    value="{{ request('search') }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample">
                                        <span class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                data-feather="calendar" class=" text-primary"></i></span>
                                        <input type="text" class="form-control border-primary bg-transparent"
                                            name="start_date" placeholder="ڕێکەوتی دەسپێک"
                                            value="{{ request('start_date') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample1">
                                        <span class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                data-feather="calendar" class=" text-primary"></i></span>
                                        <input type="text" class="form-control border-primary bg-transparent"
                                            name="end_date" placeholder="ڕێکەوتی کۆتا" value="{{ request('end_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                <button class="btn btn-outline-secondary m-1" type="submit" id="button-addon-search">
                                    <i class="bx bx-search"></i>
                                </button>
                                <a href="{{ route('clients.show',$client->id) }}" class="btn btn-outline-secondary m-1"
                                    type="button">
                                    <i class="bx bx-reset"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>پارەی</th>
                                    <th>بری پارە</th>
                                    <th>جۆری کردار</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->action }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">هیچ داتایەک نەدۆزرایەوە</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="m-3">
                        {{ $transactions->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
