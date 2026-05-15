<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuportController extends Controller
{
    public function faq () {
        return view('faq');
    }

    public function privacy() {
        return view ('privacy');
    }

    public function useTerm (){
        return view('useTerm');
    }
}