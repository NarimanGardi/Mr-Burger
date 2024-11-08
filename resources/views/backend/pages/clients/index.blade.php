@extends('backend.app')
@section('title', __('خشتەی طرف حساب'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">خشتەی طرف حساب</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    زیادکردنی مقاول
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('clients.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="گەڕان..."
                                    aria-label="Search" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="bx bx-search"></i></button>
                                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary" type="button"
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
                                    <th>قەرز</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($clients as $client)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $client->name }}</strong></td>
                                        <td>{{ $client->debt }}</td>
                                        <td>
                                            @canany('edit-client', 'delete-client', 'view-client')
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                    <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('clients.show', $client->id) }}"><i
                                                                    class="bx bx-show me-1"></i> وردەکاری</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('clients.edit', $client->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> گۆڕانکاری</a>
                                                            <form action="{{ route('clients.destroy', $client->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-name="مقاولەکە"
                                                                    class="dropdown-item show_confirm"><i
                                                                        class="bx bx-trash me-1"></i> سڕینەوە</button>
                                                            </form>
                                                    </div>
                                                </div>
                                            @endcanany
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
                        {{ $clients->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
