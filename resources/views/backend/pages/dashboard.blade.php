@extends('backend.app')
@section('title', __('Dashboard'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0"> {{ auth()->user()->name }} بەخێربێت</h4>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">بەکارهێنەرەکان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-5">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalUsers }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div class="mt-md-3 mt-xl-0"><i class="fa-solid fa-user fa-2xl"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">کڵاێنتەکان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalClients }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="mt-md-3 mt-xl-0"><i class="fa-solid fa-users fa-2xl"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">پارە دانان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalDeposit }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="mt-md-3 mt-xl-0"><i
                                                class="fa-solid fa-hand-holding-dollar fa-2xl"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">پارە راکێشان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-5">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalWithdrawal }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div class="mt-md-3 mt-xl-0"><i
                                                class="fa-solid fa-money-bill-transfer fa-2xl"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">وەبەرهێنان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalInvest }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="mt-md-3 mt-xl-0"> <i class="fa-solid fa-chart-line fa-2xl"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">تێچووەکان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalTechu }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="mt-md-3 mt-xl-0"><i class="fa-solid fa-money-check fa-2xl"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">مووچەی کارمەندەکان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalSalary }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="mt-md-3 mt-xl-0"> <i class="fa-solid fa-money-check fa-2xl"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h1 class="card-title mb-0">تێچووی کەسیەکان</h1>
                                </div>
                                <div class="row">

                                    <div class="col-6 col-md-12 col-xl-6">
                                        <br>
                                        <h6 class="mb-2">کۆی گشتی : {{ $totalSelfMasraf }}</h6>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-6">
                                        <div class="mt-md-3 mt-xl-0"><i class="fa-solid fa-puzzle-piece fa-2xl"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
    </div>
@endsection
