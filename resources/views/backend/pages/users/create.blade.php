@extends('backend.app')
@section('title', __('زیادکردنی بەکارهێنەر'))
@section('content')
    <!-- Content wrapper -->
    <div class="page-content ">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">زیادکردنی بەکارهێنەر</span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="name" class="form-label">ناو</label>
                                        <input class="form-control" type="text" id="name" name="name" autofocus
                                            value="{{ old('name') }}" />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="email" class="form-label">ئیمەل</label>
                                        <input class="form-control" type="text" id="email" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="mb-3 col-md-12 form-password-toggle">
                                        <label class="form-label" for="password">وشەی تێپەر</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-12 form-password-toggle">
                                        <label class="form-label" for="password_confirmation">دووپاتکردنەوەی وشەی
                                            تێپەر</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">ڕۆڵ</label>
                                        <select name="role" class="form-select mb-3">
                                            <option selected="">ڕۆڵێک هەڵبژێرە</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label for="avatar" class="form-label">وێنە</label>
                                        <input class="form-control" type="file" id="avatar" name="avatar">
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
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
