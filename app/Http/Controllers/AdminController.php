<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function admin() {
        if (!Auth::check() || auth()->user()->id !== 1) {
            return abort(404);
        } else {
            $users = User::all();
            return view('admin.admin', [
                'users' => $users
            ]);
        }
    }
}
