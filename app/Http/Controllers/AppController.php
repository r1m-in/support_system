<?php

namespace App\Http\Controllers;

use App\Enums\User\PermissionEnum;
use App\Models\AppDriver;
use App\Models\AppUser;
use App\Models\AppUserRide;
use App\Models\AppVehicle;
use App\Models\AccessRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\DynamoDbService;

class AppController extends Controller
{

    protected $dynamoDb;

    public function __construct(DynamoDbService $dynamoDb)
    {
        $this->dynamoDb = $dynamoDb;
    }

    public function users(Request $request)
    {
        $users = collect();

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $keyword = $data['search'];

        if ($keyword) {
            $users = AppUser::latest()->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('app_user_id', 'LIKE', "%$keyword%");

                if (Auth::user()->can(PermissionEnum::APP_USER_MOBILE)) {
                    $query->orWhere('phone', 'LIKE', "%$keyword%");
                }
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

    public function user_rides(Request $request, $id)
    {
        $data['user'] = AppUser::where('id', $id)->firstOrFail();

        $data['statuses'] = AppUserRide::where('created_by', $id)->select('status')->distinct()->pluck('status');

        $rides = AppUserRide::latest()->where('created_by', $id);

        if (isset($request->status) && !empty($request->status)) {
            $rides->where('status', $request->status);
        }

        $data['rides'] = $rides->paginate(8);


        return view('app.user_rides', $data);
    }

    public function user_tickets($id)
    {
        $data['user'] = AppUser::where('id', $id)->firstOrFail();
        $data['tickets'] = Ticket::where('main_key', $id)->paginate(10);

        return view('app.user_tickets', $data);
    }

    public function drivers(Request $request)
    {
        $drivers = collect();

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $keyword = $data['search'];

        if ($keyword) {
            $drivers = AppDriver::latest()->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('app_driver_id', 'LIKE', "%$keyword%");

                if (Auth::user()->can(PermissionEnum::APP_DRIVER_MOBILE)) {
                    $query->orWhere('phone', 'LIKE', "%$keyword%");
                }
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

    public function driver_rides(Request $request, $id)
    {
        $data['driver'] = AppDriver::where('id', $id)->firstOrFail();

        $data['statuses'] = AppUserRide::where('driver_id', $id)->select('status')->distinct()->pluck('status');

        $rides = AppUserRide::latest()->where('driver_id', $id);

        if (isset($request->status) && !empty($request->status)) {
            $rides->where('status', $request->status);
        }

        $data['rides'] = $rides->paginate(8);


        return view('app.driver_rides', $data);
    }

    public function driver_transactions(string $id)
    {
        $data['driver'] = AppDriver::where('id', $id)->firstOrFail();

        $transactions = $this->dynamoDb->driverTranscation('driver_wallet_transactions', $id);

        $data['transactions'] = $transactions;

        return view('app.driver_transactions', $data);
    }

    public function driver_cashback($id)
    {
        $data['driver'] = AppDriver::where('id', $id)->firstOrFail();

        $transactions = $this->dynamoDb->driverTranscation('driver_cashback_transactions', $id);
        $data['transactions'] = $transactions;

        return view('app.driver_cashback', $data);
    }

    public function driver_tickets($id)
    {
        $data['driver'] = AppDriver::where('id', $id)->firstOrFail();
        $data['tickets'] = Ticket::where('main_key', $id)->paginate(10);
        return view('app.driver_tickets', $data);
    }

    public function cashback(Request $request)
    {

        $pageToken = $request->query('next_page_token');
        $startKey = null;

        if ($pageToken) {
            $startKey = json_decode(base64_decode($pageToken), true);
        }

        $results = $this->dynamoDb->scanWithPagination('driver_cashback', 10, $startKey);

        $data['list'] = $results['items'];
        $data['nextPageToken'] = $results['next_page_token'];

        return view('app.cashback', $data);
    }

    public function cashback_view($id)
    {
        return view('app.cashback_view');
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


    public function owners(Request $request)
    {

        if ($request->requestOwnerAccess) {

            AccessRequest::create([
                'user_id' => Auth::user()->id,
                'owner_uid' => $request->owner_uid,
                'owner_name' => $request->owner_name,
                'owner_phone' => $request->owner_phone,
                'owner_email' => $request->owner_email,
                'note' => $request->note
            ]);

            return redirect()->route('app.owners')->with('success', 'Access Requested Successfully');
        }

        $drivers = collect();

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $keyword = $data['search'];

        if ($keyword) {
            $drivers = AppDriver::with('roles')->latest()->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('app_driver_id', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%");
            })->whereHas('roles', function ($query) {
                $query->where('role_id', '4b99bc3a-13bc-11f0-a1a1-0a74e7f1ccd1');
            })->get();
        }

        // OWNER => 4b99bc3a-13bc-11f0-a1a1-0a74e7f1ccd1

        $data['drivers']  = $drivers;

        return view('app.owners', $data);
    }
}
