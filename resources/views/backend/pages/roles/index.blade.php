@extends('backend.app')
@section('title', __('ڕۆڵەکان'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">خشتەی ڕۆڵەکان</h4>
            </div>
        </div>
        <div class="row g-4">
            @forelse ($roles as $role)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h6 class="fw-normal"> کۆی {{ $role->users_count }} هەژمار</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title=""
                                        data-bs-original-title="{{ $role->name }}">
                                        <img src="{{ asset('backend/assets/images/user.png') }}"
                                            alt="
                                                Avatar"
                                            class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title=""
                                        data-bs-original-title="{{ $role->name }}">
                                        <img src="{{ asset('backend/assets/images/user.png') }}"
                                            alt="
                                                Avatar"
                                            class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title=""
                                        data-bs-original-title="{{ $role->name }}">
                                        <img src="{{ asset('backend/assets/images/user.png') }}"
                                            alt="
                                                Avatar"
                                            class="rounded-circle">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">{{ $role->name }}</h4>

                                </div>
                                <a href="{{ route('roles.edit', $role->id) }}" class="text-muted"><i
                                        class="bx bx-edit-alt me-1"></i>گۆڕانکاری</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                    <div class="row h-100">
                        <div class="col-sm-5">
                            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                                <img src="{{ asset('backend/assets/images/screenshots/sitting-girl-with-laptop-light.png') }}"
                                    class="img-fluid" alt="Image">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body text-sm-end text-center ps-sm-0">
                                <a href="{{ route('roles.create') }}"
                                    class="btn btn-primary mb-3 text-nowrap add-new-role">زیادکردنی رۆڵی نوێ</a>
                                <p class="mb-0">ڕۆلی نوێ زیاد بکە بۆ بەکارهێنەرەکانت</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ناو</th>
                                    <th>دەسەڵاتەکان</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($roles as $role)
                                    <tr>
                                        <td><strong>{{ $role->name }}</strong></td>
                                        <td>
                                            @forelse ($role->permissions as $permission)
                                                <span
                                                    class="badge bg-label-{{ App\Models\User::CSS_CLASS[$loop->index % 5] }} me-1 mt-2">{{ $permission->name }}</span>
                                                @if ($loop->iteration % 5 == 0)
                                                    <br>
                                                @endif
                                            @empty
                                                <span class="badge bg-label-danger me-1">No Permission</span>
                                            @endforelse
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> گۆڕانکاری</a>
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item show_confirm"><i
                                                                data-name="رۆڵە" class="bx bx-trash me-1"></i>
                                                            سڕینەوە</button>
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
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
