@extends('guest')
@section('title', __('چوونەژوورەوە'))
@section('content')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card" style="direction: rtl !important;font-family: 'NRT Reg';">
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Brand Logo"
                                        class="img-fluid" style="max-height: 50px; max-width: 50px;">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Help Trading</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2"> بەخێربێی 👋</h4>
                        <p class="mb-4">تکایە ناوی بەکارهێنەر و وشەی تێپەر داخل بکە</p>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">ئیمێل </label>
                                <input class="form-control" id="email" placeholder="ئیمەیلەکەت داخل بکە" type="email"
                                    name="email" :value="old('email')" required autofocus
                                    style="direction: rtl; text-align: right;" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">وشەی تێپەر</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required autocomplete="current-password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">چوونەژوورەوە</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
