<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');

        // Lấy dữ liệu doanh số theo tháng trong năm hiện tại
        $sales = DB::table('tbl_invoice')
            ->select(DB::raw('MONTH(orderdate) as month'), DB::raw('SUM(total_price) as sales'))
            ->whereYear('orderdate', $currentYear)
            ->groupBy(DB::raw('MONTH(orderdate)'))
            ->orderBy(DB::raw('MONTH(orderdate)'))
            ->get();

        $salesData = [
            'labels' => $sales->pluck('month')->map(function ($month) {
                return 'Month ' . $month;
            }),
            'data' => $sales->pluck('sales')
        ];

        // Lấy top 10 sản phẩm bán chạy nhất trong tháng hiện tại
        $topProducts = DB::table('tbl_invoice_details')
            ->join('tbl_product', 'tbl_invoice_details.product_id', '=', 'tbl_product.product_id')
            ->select('tbl_product.product_name', DB::raw('SUM(tbl_invoice_details.quantity) as sales'))
            ->join('tbl_invoice', 'tbl_invoice_details.invoice_id', '=', 'tbl_invoice.iv_id')
            ->whereMonth('tbl_invoice.orderdate', $currentMonth)
            ->groupBy('tbl_product.product_id', 'tbl_product.product_name')
            ->orderBy('sales', 'desc')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('salesData', 'topProducts'));
}
}