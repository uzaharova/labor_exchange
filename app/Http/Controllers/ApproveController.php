<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Works;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Activate vacancy
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function approve(Request $request)
    {
        if (!isset(Auth::user()->user_type) || Auth::user()->user_type != 'M') {
            return view('/failed_status_update');
        }

        Works::where(DB::raw('sha1(id)'), $request['id'])
            ->update(['status' => 'A']);

        return view('/status_update');
    }
}
