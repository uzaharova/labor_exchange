<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Works;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = ['A'];

        $show = null;
        if (Auth::user()->user_type == 'M') {
            $show = true;
            $status = ['A', 'D'];
        }

        $works_list = Works::wherein('status', $status)
            ->paginate(15);

        return view('index', ['works' => $works_list, 'show' => $show]);
    }
}
