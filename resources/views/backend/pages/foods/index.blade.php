@extends('backend.app')
@section('title', __('خواردنەکان'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">خواردنەکان</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <a href="{{ route('foods.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    زیادکردنی خواردن
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('foods.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="گەڕان..."
                                    aria-label="Search" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="bx bx-search"></i></button>
                                <a href="{{ route('foods.index') }}" class="btn btn-outline-secondary" type="button"
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
                                    <th>ناو</th>
                                    <th>وردەکاری</th>
                                    <th>نرخ</th>
                                    <th>بەردەستبوون</th>
                                    <th>وێنە</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($foods as $food)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $food->name }}</strong></td>
                                        <td>{{ $food->description }}</td>
                                        <td>{{ $food->price }}</td>
                                        <td>
                                            @if ($food->is_available)
                                                <span class="badge bg-label-success me-1">
                                                    بەلێ
                                                </span>
                                            @else
                                                <span class="badge bg-label-danger me-1">
                                                    نەخێر
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($food->getFirstMediaUrl('image'))
                                                <img src="{{ $food->getFirstMediaUrl('image') }}" alt="{{ $food->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                                            @else
                                                <span>وێنە نیە</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('foods.show', $food->id) }}"><i
                                                            class="bx bx-show me-1"></i> وردەکاری</a>
                                                    <a class="dropdown-item" href="{{ route('foods.edit', $food->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> گۆڕانکاری</a>
                                                    <form action="{{ route('foods.destroy', $food->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-name="مقاولەکە"
                                                            class="dropdown-item show_confirm"><i
                                                                class="bx bx-trash me-1"></i> سڕینەوە</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">هیچ داتایەک نەدۆزرایەوە</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="m-3">
                        {{ $foods->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
