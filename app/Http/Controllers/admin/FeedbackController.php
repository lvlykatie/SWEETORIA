<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class FeedbackController extends Controller
{
    public function showFeedbackPage(){
        return view ('admin.feedbacks.feedbacks');
    }
}
