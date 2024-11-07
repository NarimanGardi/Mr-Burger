@extends('backend.app')
@section('title', __('زیادکردنی ڕۆڵ'))
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">زیادکردنی ڕۆڵ</h4>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-12">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('roles.store') }}">@csrf <div class="card mb-4">
                    <h4 class="p-3">زانیاری ڕۆڵ</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-8"><label for="name" class="form-label">ناو</label><input
                                    class="form-control" type="text" id="name" name="name" autofocus
                                    value="{{ old('name') }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <h4 class="p-3">دەسەڵاتەکان</h4>
                    <div class="card-body">
                        @foreach ($permissionsRows as $rowPermissions)
                            <div class="row">
                                @foreach (array_chunk($rowPermissions, 5) as $columnPermissions)
                                    <div class="col-md-3">
                                        @foreach ($columnPermissions as $permission)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission }}"
                                                    class="form-check-input" id="{{ $permission }}">
                                                <label class="form-check-label" for="{{ $permission }}">
                                                    {{ ucwords(str_replace('-', ' ', $permission)) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <br>
                        @endforeach
                        <div class="mt-2"><button type="submit" class="btn btn-primary me-2">زیادکردن</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>@endsection
