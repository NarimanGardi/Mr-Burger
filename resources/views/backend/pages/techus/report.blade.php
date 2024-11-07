@extends('backend.app')
@section('title', __('تێچووەکان'))
@section('content')
    <div class="page-content">
        <style>
            @page {
                size: A4;
            }

            .A4 .sheet {
                width: 210mm;
                {{ $total >= 10 ? '' : 'height: 296mm;' }}
            }

            .g-title {
                background: rgb(250, 53, 52) !important;
                background: linear-gradient(90deg, rgba(250, 53, 52, 1) 35%, rgba(12, 173, 107, 1) 100%) !important;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 15px 15px 0 15px;
                font-family: 'NRT Bold';
                color: #fff !important;
                font-weight: bold;
                font-size: 20px;
            }

            .g-title p {
                text-align: center;
                margin: 0;
                padding: 3px;
            }

            strong {
                font-family: 'NRT Reg';
            }

            .table-fixed {
                table-layout: fixed;
                width: 100%;
            }


            .table-fixed td {
                word-wrap: break-word;
                vertical-align: top;
                white-space: normal !important;
                /* To align the text at the top of the cell */
            }

            .comment-cell {
                width: 150px;
            }
        </style>
        <button title="print" id="printPageButton" class="print-button" onClick="print();"><span
                class="print-icon"></span></button>
        <div class="A4">
            <section class="sheet">
                <br>
                <img src="{{ asset('backend/assets/images/logo.png') }}" width="100" height="100"
                    style="display: block; margin: auto;">

                <div class="g-title">
                    <p> پسوولەی تێچووەکان</p>
                </div>

                <div style="margin-bottom: -20px;margin-top:20px;">
                    <h4 class="text-center">$ {{ number_format($totalAmount) }} : کۆی تێچووەکان</h4>
                </div>

                <div class="p-3">
                    <table class="table mt-5 table-fixed">
                        <thead>
                            <tr>
                                <th>نوێکراوەتەوە لە</th>
                                <th>ڕێکەوت</th>
                                <th>تێبینی</th>
                                <th>بری پارە</th>
                                <th>جۆری تێچوو</th>
                                <th>ناو</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($techus as $key => $techu)
                                <tr>
                                    <td>{{ $techu->updated_at }}</td>
                                    <td>{{ $techu->date }}</td>
                                    <td class="comment-cell">{{ $techu->comment }}</td>
                                    <td>$ {{ number_format($techu->amount) }}</td>
                                    <td>{{ $techu->type }}</td>
                                    <td><strong>{{ $techu->name }}</strong></td>
                                    <td>{{ $loop->iteration }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
