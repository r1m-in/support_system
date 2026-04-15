<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function users(Request $request)
    {
        $users = collect();

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $keyword = $data['search'];

        if ($keyword) {
            $users = AppUser::latest()->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('id', 'LIKE', "%$keyword%")
                    ->orWhere('app_user_id', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%");
            })->latest()->get();
        }

        $data['users']  = $users;

        return view('app.users', $data);
    }

    public function user($id)
    {
        return view('app.user');
    }
}
