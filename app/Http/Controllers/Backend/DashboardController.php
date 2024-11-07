<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $totalSelfMasraf = SelfMasraf::count();
        // $totalTechu = Techu::count();
        // $totalSalary = Salary::count();
        // $totalDeposit = Deposit::count();
        // $totalWithdrawal = Withdrawal::count();
        // $totalInvest = Invest::count();
        // $totalUsers = User::count();
        // $totalClients = Client::count();

        // $data = [
        //     'totalSelfMasraf' => $totalSelfMasraf,
        //     'totalTechu' => $totalTechu,
        //     'totalSalary' => $totalSalary,
        //     'totalDeposit' => $totalDeposit,
        //     'totalWithdrawal' => $totalWithdrawal,
        //     'totalInvest' => $totalInvest,
        //     'totalUsers' => $totalUsers,
        //     'totalClients' => $totalClients,
        // ];
        return view('backend.pages.dashboard');
    }

    public function reports(Request $request)
    {
        // $this->authorize('view-report');

        // $selfMasraf = SelfMasraf::query();
        // $techu = Techu::query();
        // $salary = Salary::query();
        // $deposit = Deposit::query();
        // $withdrawal = Withdrawal::query();
        // $invest = Invest::query();

        // // Retrieve start and end dates from request
        // $startDate = $request->input('start_date');
        // $endDate = $request->input('end_date');

        // if (!empty($startDate) && !empty($endDate)) {
        //     $adjustedEndDate = date('Y-m-d', strtotime($endDate . ' +1 day'));

        //     $selfMasraf->whereBetween('date', [$startDate, $adjustedEndDate]);
        //     $techu->whereBetween('date', [$startDate, $adjustedEndDate]);
        //     $salary->whereBetween('date', [$startDate, $adjustedEndDate]);
        //     $deposit->whereBetween('created_at', [$startDate, $adjustedEndDate]);
        //     $withdrawal->whereBetween('created_at', [$startDate, $adjustedEndDate]);
        //     $invest->whereBetween('date', [$startDate, $adjustedEndDate]);

        // } elseif (!empty($startDate)) {

        //     $selfMasraf->whereDate('date', '>=', $startDate);
        //     $techu->whereDate('date', '>=', $startDate);
        //     $salary->whereDate('date', '>=', $startDate);
        //     $deposit->whereDate('created_at', '>=', $startDate);
        //     $withdrawal->whereDate('created_at', '>=', $startDate);
        //     $invest->whereDate('date', '>=', $startDate);

        // } elseif (!empty($endDate)) {

        //     $selfMasraf->whereDate('date', '<=', $endDate);
        //     $techu->whereDate('date', '<=', $endDate);
        //     $salary->whereDate('date', '<=', $endDate);
        //     $deposit->whereDate('created_at', '<=', $endDate);
        //     $withdrawal->whereDate('created_at', '<=', $endDate);
        //     $invest->whereDate('date', '<=', $endDate);

        // }

        // $totalSelfMasraf = $selfMasraf->sum('amount');
        // $totalTechu = $techu->sum('amount');
        // $totalSalary = $salary->sum('amount');
        // $totalDeposit = $deposit->sum('amount');
        // $totalWithdrawal = $withdrawal->sum('amount');
        // $totalInvest = $invest->sum('amount');

        // $total = 0;

        // $total = ($totalInvest + $totalDeposit) - ($totalWithdrawal + $totalSalary + $totalTechu + $totalSelfMasraf);


        // $data = [
        //     'totalSelfMasraf' => $totalSelfMasraf,
        //     'totalTechu' => $totalTechu,
        //     'totalSalary' => $totalSalary,
        //     'totalDeposit' => $totalDeposit,
        //     'totalWithdrawal' => $totalWithdrawal,
        //     'totalInvest' => $totalInvest,
        //     'total' => $total,
        // ];

        return view('backend.pages.reports');
    }
}
