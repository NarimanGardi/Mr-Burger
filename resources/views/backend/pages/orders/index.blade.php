@extends('backend.app')
@section('title', __('داواکاریەکان'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">داواکاریەکان</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <a href="{{ route('orders.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    زیادکردنی داواکاری
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('orders.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="گەڕان..."
                                    aria-label="Search" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="bx bx-search"></i></button>
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary" type="button"
                                    id="button-addon2">
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
                                    <th>ژمارەی داوا</th>
                                    <th>ناوی مقاول</th>
                                    <th>خواردنەکان</th>
                                    <th>بارودۆخ</th>
                                    <th>کۆی گشتی</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $loop?->iteration }}</td>
                                        <td><strong>{{ $order?->order_number }}</strong></td>
                                        <td>{{ $order?->client?->name ?? 'نەدراوە' }}</td>
                                        <td>
                                            @foreach ($order?->foods as $food)
                                                <span>{{ $food?->name }} (x{{ $food?->pivot?->amount }})</span><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($order?->status === 'pending')
                                                <span class="badge bg-label-warning me-1">چاوەڕوانە</span>
                                            @elseif ($order?->status === 'completed')
                                                <span class="badge bg-label-success me-1">تەواو بوو</span>
                                            @elseif ($order?->status === 'canceled')
                                                <span class="badge bg-label-danger me-1">هەڵوەشایەوە</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($order?->total, 0) }} IQD</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 " data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('orders.show', $order->id) }}"><i
                                                            class="bx bx-show me-1"></i> وردەکاری</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('orders.edit', $order?->id) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> گۆڕانکاری
                                                    </a>
                                                    <form action="{{ route('orders.destroy', $order?->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-name="داواکاریەکە"
                                                            class="dropdown-item show_confirm">
                                                            <i class="bx bx-trash me-1"></i> سڕینەوە
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">هیچ داواکاریەک نەدۆزرایەوە</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="m-3">
                        {{ $orders->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
