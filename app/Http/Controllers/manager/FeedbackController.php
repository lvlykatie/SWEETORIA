<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class FeedbackController extends Controller
{
    public function showFeedbackPage(){
        $fb_by_product = DB::table('tbl_feedback')
            ->join('tbl_product', 'tbl_feedback.product_id', '=', 'tbl_product.product_id')
            ->select('tbl_feedback.*', 'tbl_product.product_name', 'tbl_product.product_image')
            ->get()
            ->groupBy('product_id');
        return view('manager.feedbacks.feedbacks', compact('fb_by_product'));
    }
    public function acceptFeedback($fb_id)
    {
        // Cập nhật trạng thái của feedback (ví dụ: status = 'approved')
        DB::table('tbl_feedback')
            ->where('fb_id', $fb_id)
            ->update(['status' => 'approved']);
        
        return redirect()->back()->with('success', 'Feedback has been approved successfully.');
    }

    // Xóa Feedback
    public function deleteFeedback($fb_id)
    {
        // Xóa feedback khỏi cơ sở dữ liệu
        DB::table('tbl_feedback')
            ->where('fb_id', $fb_id)
            ->delete();
        
        return redirect()->back()->with('success', 'Feedback has been deleted successfully.');
    }
}
