<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class SiteController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function logs() {
        if(auth()->check()){
            $logs = auth()->user()->logs;
            return view('pages.logs', compact('logs'));
        }else{
            return redirect('/');
        }
    }

}
