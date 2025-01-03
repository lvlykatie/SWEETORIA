<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\InvoiceDetails;

class OrderController extends Controller
{
    public function index()
    {
         $userId = Auth::id();
         // Lấy danh sách hóa đơn
        $orders = Invoice::where('user_id', $userId)
        ->orderBy('orderdate', 'desc')
        ->get();

        // Lấy chi tiết hóa đơn với thông tin sản phẩm
        $orderDetails = InvoiceDetails::with('product')
        ->whereIn('invoice_id', $orders->pluck('iv_id'))
        ->get();

        return view('account.orders', compact('orders', 'orderDetails'));
    }
    public function getOrdersByStatus($status='all'){
            $userId = Auth::id();

        if ($status === 'all') {
            $orders = Invoice::where('user_id', $userId)
                ->orderBy('orderdate', 'desc')
                ->get();
        } else {
            $orders = Invoice::where('user_id', $userId)
                ->where('iv_status', $status)
                ->orderBy('orderdate', 'desc')
                ->get();
        }

        $orderDetails = InvoiceDetails::with('product')
            ->whereIn('invoice_id', $orders->pluck('iv_id'))
            ->get();

        return response()->json([
            'orders' => $orders,
            'orderDetails' => $orderDetails,
        ]);
    }
}
