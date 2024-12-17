<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class InovasiController extends Controller
{
    //
    public function index() {

        $feedbacks = Feedback::with('formulirResponseSaran','survey')->get();
        return view('inovasi.index',compact('feedbacks'));
    }
}
