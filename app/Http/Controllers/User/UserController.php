<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\FamilyController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id_role', 'ASC')->get();
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('user.user-table', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'id_role'   => 'required',
            'nama'      =>  'required|string',
            'username'  =>  'required|string|min:8|unique:users,username'
        ]);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();
        }

        User::create($request->all());

        toast('Berhasil Menambahkan User', 'success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('auth.reset-password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'password'  =>  'required',
            'new_password' => 'required|confirmed|min:8|different:password'
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            toast('Kata Sandi Berhasil Diubah', 'success');
            return redirect()->route('dashboard.index');
        } else {
            Alert::error('Error Title', 'Password tidak sama');
            return redirect()->back();
        }

        // if ($validatedData->fails()) {
        //     Alert::error('Error Title', 'Error Message');
        //     return redirect()->back();
        // }

        // $user->update($request->all());

        // toast('Kata Sandi Berhasil Diubah', 'success');
        // return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('user.index');
    }
}
