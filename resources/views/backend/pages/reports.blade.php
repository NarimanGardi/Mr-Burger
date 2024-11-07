@extends('backend.app')
@section('title', __('Dashboard'))
@section('content')
    <style>
        .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: .25rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }

        .info-box .info-box-icon {
            border-radius: .25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }


        .bg-info,
        .bg-info>a {
            color: #fff !important;
        }

        .bg-info {
            background-color: #17a2b8 !important;
        }

        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
            overflow: hidden;
        }

        .info-box .info-box-text,
        .info-box .progress-description {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .info-box .info-box-number {
            display: block;
            margin-top: .25rem;
            font-weight: 700;
        }
    </style>
    <div class="page-content">
        <form action="{{ route('reports') }}" method="GET" autocomplete="off">
            <div class="row">
                <div class="col-6">
                    <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample">
                        <span class="input-group-text input-group-addon bg-transparent border-primary"><i
                                data-feather="calendar" class=" text-primary"></i></span>
                        <input type="text" class="form-control border-primary bg-transparent" name="start_date"
                            placeholder="ڕێکەوتی دەسپێک" value="{{ request('start_date') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample1">
                        <span class="input-group-text input-group-addon bg-transparent border-primary"><i
                                data-feather="calendar" class=" text-primary"></i></span>
                        <input type="text" class="form-control border-primary bg-transparent" name="end_date"
                            placeholder="ڕێکەوتی کۆتا" value="{{ request('end_date') }}">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center p-2">
                <button class="btn btn-outline-secondary m-1" type="submit" id="button-addon-search">
                    <i class="bx bx-search"></i>
                </button>
                <a href="{{ route('reports') }}" class="btn btn-outline-secondary m-1" type="button">
                    <i class="bx bx-reset"></i>
                </a>
            </div>
        </form>
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="font-family: 'NRT'; direction: rtl;">
                            <div class="card-header">
                                <h2> راپۆرتی گشتی</h2>
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                <h3> پارەی قاسە : {{ number_format($total) }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"> <i
                                                    class="fa-solid fa-hand-holding-dollar"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">پارە دانان</span>
                                                <span class="info-box-number"> {{ number_format($totalDeposit) }}
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i
                                                    class="fa-solid fa-money-bill-transfer"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">پارە راکێشان</span>
                                                <span class="info-box-number"> {{ number_format($totalWithdrawal) }}
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"> <i
                                                    class="fa-solid fa-chart-line"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">وەبەرهێنان</span>
                                                <span class="info-box-number"> {{ number_format($totalInvest) }}
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"> <i class="fa-solid fa-cogs"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">تێچووەکان</span>
                                                <span class="info-box-number"> {{ number_format($totalTechu) }}
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"> <i
                                                    class="fa-solid fa-money-check"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">مووچەی کارمەندەکان</span>
                                                <span class="info-box-number"> {{ number_format($totalSalary) }}
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i
                                                    class="fa-solid fa-puzzle-piece"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">تێچووی کەسیەکان</span>
                                                <span class="info-box-number"> {{ number_format($totalSelfMasraf) }}
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
