<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Works;
use App\User;
use Mail;
use Illuminate\Support\Facades\Auth;

class LaborExchangeController extends Controller
{
    /**
     * Page with vacancy list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $status = ['A'];

        $show = null;
        if (isset(Auth::user()->user_type) && Auth::user()->user_type == 'M') {
            $show = true;
            $status = ['A', 'D'];
        }

        $works_list = Works::wherein('status', $status)
            ->paginate(15);

        return view('/index', ['works' => $works_list, 'show' => $show]);
    }

    /**
     * Form with vacancy create
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new_vacancy()
    {
        return view('new_vacancy');
    }

    /**
     * Add new vacancy in db
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_vacancy(Request $request)
    {
        $vacancy = [];

        $new_vacancy = [
            'email' => (string) $request['email'],
            'title' => (string) $request['title'],
            'description' => (string) $request['description'],
            'created_at' => now()
        ];

        $vacancy['id'] = Works::create($new_vacancy)->id;

        $vacancy['user'] = $new_vacancy['email'];
        $vacancy['email_user'] = (string) User::where('user_type', 'M')
            ->first()
            ->value('email');

        $vacancy['url'] = url('approve', ['id' => sha1($vacancy['id'])]);

        if (!empty($vacancy['email_user'])) {
            Mail::send('mail', ['vacancy' => $vacancy],
                function ($message) use ($vacancy) {
                    $message->from($vacancy['user'], __('works.message_from'));
                    $message->to($vacancy['email_user'], '')
                        ->subject(__('works.message_subject'));
                }
            );
        } else{
            Works::where('id', $vacancy['id'])
                ->update(['status' => 'A']);
        }

        $works_list = Works::paginate(15);
        return view('index', $works_list);
    }
}
