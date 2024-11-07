@extends('backend.app')
@section('title', __('تێچووەکان'))
@section('content')
    <style>
        .table tbody tr td {
            white-space: normal !important;

        }
    </style>
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">خشتەی تێچووەکان</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <a href="{{ route('techus.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    زیادکردنی تێچوو
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('techus.index') }}" method="GET" autocomplete="off">
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
                                <a href="{{ route('techus.index') }}" class="btn btn-outline-secondary m-1" type="button">
                                    <i class="bx bx-reset"></i>
                                </a>
                            </div>
                        </form>
                        @if (request('search') || request('start_date') || request('end_date'))
                            <div class="d-flex justify-content-center">
                                <form action="{{ route('techus.report') }}" method="GET" class="d-inline">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                                    <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                                    <button class="btn btn-outline-secondary m-1" type="submit">
                                        <i class="bx bx-printer"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h4 class="text-center">$ {{ number_format($totalAmount) }} : کۆی تێچووەکان</h4>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ناوی سەرفکەر</th>
                                    <th>جۆری تێچوو</th>
                                    <th>بری پارە</th>
                                    <th>تێبینی</th>
                                    <th>ڕێکەوت</th>
                                    <th>نوێکراوەتەوە لە</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($techus as $techu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $techu->name }}</strong></td>
                                        <td>{{ $techu->type }}</td>
                                        <td>$ {{ number_format($techu->amount) }}</td>
                                        <td>{{ $techu->comment }}</td>
                                        <td>{{ $techu->date }}</td>
                                        <td>{{ $techu->updated_at }}</td>
                                        <td>
                                            @canany('edit-techu', 'delete-techu', 'view-techu')
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                    <div class="dropdown-menu">
                                                        @can('edit-techu')
                                                            <a class="dropdown-item"
                                                                href="{{ route('techus.edit', $techu->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> گۆڕانکاری</a>
                                                        @endcan
                                                        @can('view-techu')
                                                            <a class="dropdown-item"
                                                                href="{{ route('techus.show', $techu->id) }}"><i
                                                                    class="bx bx-printer me-1"></i> چاپکردن</a>
                                                        @endcan
                                                        @can('delete-techu')
                                                            <form action="{{ route('techus.destroy', $techu->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-name="کڵاێنتە"
                                                                    class="dropdown-item show_confirm"><i
                                                                        class="bx bx-trash me-1"></i> سڕینەوە</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endcanany
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">هیچ داتایەک نەدۆزرایەوە</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="m-3">
                        {{ $techus->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
