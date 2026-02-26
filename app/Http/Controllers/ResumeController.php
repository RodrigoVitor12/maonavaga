<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function create() {
        $data = Resume::where('user_id', Auth::id())->select('user_id')->first();
        return view('create-resume', ['data' => $data]);
    }

    public function show($id)
    {
        $data = Resume::with(['experiences', 'educations'])
            ->where('user_id', $id)
            ->first();
        if (!$data) {
            return redirect()->back();
        }

        return view('show-resume', compact('data'));
    }
}