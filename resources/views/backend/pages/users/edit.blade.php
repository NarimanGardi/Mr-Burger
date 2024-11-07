@extends('backend.app')
@section('title', __('گۆڕانکاری بەکارهێنەر'))
@section('content')
    <div class="page-content" style="direction: rtl !important;">
        <h4 class="fw-bold py-3 mb-4">رێکخستنی ئەکاونت</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">گۆڕانکاری لە زانیاری کەسی</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $user->getFirstMediaUrl('avatar', 'thumb-100')
                                ? $user->getFirstMediaUrl('avatar', 'thumb-100')
                                : asset('backend/assets/images/user.png') }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="name" class="form-label">ناو</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $user->name }}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="email" class="form-label">ئیمەڵ</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $user->email }}">
                                </div>
                                @can('edit-user')
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">ڕۆڵ</label>
                                        <select name="role" class="form-select mb-3">
                                            <option>رؤڵێک هەڵبژێرە</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ !empty($user->roles[0]['name']) && $user->roles[0]['name'] == $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endcan
                                <div class="mb-3 col-md-12">
                                    <label for="avatar" class="form-label">وێنە</label>
                                    <input class="form-control" type="file" id="avatar" name="avatar">
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">گۆرانکاری</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                <div class="card mb-4">
                    <h5 class="card-header">گۆرینی وشەی تێپەر</h5>
                    <div class="card-body">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('users.update.password', $user->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">وشە تێپەری کۆن</label>
                                <input class="form-control" type="text" name="old_password" id="old_password"
                                    placeholder="Current password" value="{{ old('old_password') }}" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">وشە تێپەری نوێ</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation">دووپاتکردنەوەی وشەی تێپەر</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">گۆرانکاری</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>
@endsection
