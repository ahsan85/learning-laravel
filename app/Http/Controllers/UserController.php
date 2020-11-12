<?php

namespace App\Http\Controllers;

use App\Country;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile', 'roles')->get();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        // dd($roles->name);
        $countries = Country::all();


        return view('dashboard.users.create', compact('roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->role);
        $roles = new Role();
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        if ($user) {
            $filename = sprintf('profile_%s.jpg', random_int(1, 1000));
            if ($request->hasFile('profileImage'))
                $filename = $request->file('profileImage')->storeAs('profiles', $filename, 'public');

            $profile = $user->profile()->create([
                'country_id' => $request->country,
                'city' => $request->city,
                'phone' => $request->phone,
                'photo' => $filename,

            ]);
            $user->roles()->attach($request->roles);
            if ($profile) {
                return redirect()->route('users.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries = Country::all();
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'countries', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $roles = new Role();

        $user->name = $request->name;
        $user->username = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();
        if ($user) {
            $filename = sprintf('profile_%s.jpg', random_int(1, 1000));
            if ($request->hasFile('profileImage')) {
                $filename = $request->file('profileImage')->storeAs('profiles', $filename, 'public');
            } else
                $filename = $user->profile->photo;

            $profile = $user->profile()->update([
                'country_id' => $request->country,
                'city' => $request->city,
                'phone' => $request->phone,
                'photo' => $filename,

            ]);
            $user->roles()->sync($request->roles);
            if ($profile) {
                return redirect()->route('users.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile()->delete();
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
