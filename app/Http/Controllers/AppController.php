<?php

namespace App\Http\Controllers;

use App\Models\AppDriver;
use App\Models\AppUser;
use App\Models\AppUserRide;
use App\Models\AppVehicle;
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
                    ->orWhere('app_user_id', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%");
            })->latest()->get();
        }

        $data['users']  = $users;

        return view('app.users', $data);
    }

    public function user($id)
    {
        $data['user'] = AppUser::where('id', $id)->firstOrFail();
        return view('app.user', $data);
    }

    public function user_rides($id)
    {
        $data['user'] = AppUser::where('id', $id)->firstOrFail();
        $data['rides'] = AppUserRide::where('created_by', $id)->get();

        return view('app.user_rides', $data);
    }


    public function drivers(Request $request)
    {
        $drivers = collect();

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $keyword = $data['search'];

        if ($keyword) {
            $drivers = AppDriver::latest()->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('app_driver_id', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%");
            })->latest()->get();
        }

        $data['drivers']  = $drivers;

        return view('app.drivers', $data);
    }

    public function driver($id)
    {
        $data['driver'] = AppDriver::where('id', $id)->firstOrFail();
        return view('app.driver', $data);
    }

    public function vehicles(Request $request)
    {
        $vehicles = collect();

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $keyword = $data['search'];

        if ($keyword) {
            $vehicles = AppVehicle::latest()->where(function ($query) use ($keyword) {
                $query->where('registration_number', 'LIKE', "%$keyword%");
            })->latest()->get();
        }

        $data['vehicles']  = $vehicles;

        return view('app.vehicles', $data);
    }

    public function vehicle($id)
    {
        $data['vehicle'] = AppVehicle::where('id', $id)->firstOrFail();
        return view('app.vehicle', $data);
    }
}
