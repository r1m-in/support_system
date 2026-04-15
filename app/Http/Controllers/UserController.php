<?php

namespace App\Http\Controllers;

use App\Enums\User\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function roles()
    {
        $data['roles'] = Role::with('permissions')->get();
        return view('users.roles', $data);
    }

    public function role(Request $request, $id)
    {
        if ($id < 3) {
            return redirect()->route('user.roles')->with('error', 'You Don\'t have Permission to Manage Permissions');
        }
        $role = Role::findOrFail($id);
        if ($request->input('updatePermissions')) {
            $role->syncPermissions($request->permissions);
            return redirect()->route('user.role', $id)->with('success', 'Permissions Updated Successfully');
        }
        $data['role'] = $role;
        $data['permissions'] = Permission::all();
        $data['role_permissions'] = $role->permissions->pluck('id')->toArray();
        return view('users.role', $data);
    }


    public function users(Request $request)
    {
        if ($request->input('addNewUser')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users',
                'phone_number' => 'required|digits:10|unique:users',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('users')->withErrors($validator)->withInput();
            }

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'phone_number' => $request->input('phone_number')
            ])->assignRole(RoleEnum::USER);
            $user->phone_number_verified_at = now();
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('users')->with('success', 'New User (' . $user->name . ') Added Successfully');
        }

        $data['search'] = ($request->get('q') ? $request->get('q') : '');

        $users = User::latest();

        $keyword = $data['search'];

        if ($request->get('q')) {
            $users->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone_number', 'LIKE', "%$keyword%");
            });
        }

        $data['users'] = $users->paginate(10);

        return view('users.index', $data);
    }

    public function user($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('users.view', $data);
    }

    public function edit(Request $request, $id)
    {
        $data['user'] = User::findOrFail($id);

        if ($request->input('updateUser')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id,
                    'phone_number' => 'required|digits:10|unique:users,phone_number,' . $id,
                ]
            );

            if ($validator->fails()) {
                return redirect()->route('user.edit', $id)->withErrors($validator)->withInput();
            }

            User::where('id', $id)->update([
                'name' => $request->input('name'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
            ]);
            return redirect()->route('user.view', $id)->with('success', 'User Details Updated');
        }

        return view('users.edit', $data);
    }

    public function password(Request $request, $id)
    {
        $data['user'] = User::findOrFail($id);

        if ($request->input('changePassword')) {

            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('user.password', $id)->withErrors($validator)->withInput();
            }

            User::where('id', $id)->update([
                'password' => $request->input('password')
            ]);
            return redirect()->route('user.view', $id)->with('success', 'Password Updated');
        }

        return view('users.password', $data);
    }

    public function update_role(Request $request, $id)
    {
        $data['user'] = User::findOrFail($id);

        if (!$data['user']->hasRole(RoleEnum::ADMIN) && $request->updateRole) {
            $data['user']->syncRoles($request->role);
            return redirect()->route('user.update_role', $id)->with('success', 'User Role Updated');
        }

        return view('users.update_role', $data);
    }

    public function status(Request $request, $id)
    {
        $data['user'] = User::findOrFail($id);

        if ($request->updateStatus) {
            User::where('id', $id)->update([
                'status' => $request->status
            ]);
            return redirect()->route('user.status', $id)->with('success', 'User Accout Status Updated');
        }

        return view('users.status', $data);
    }
}
