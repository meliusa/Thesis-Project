<?php

namespace App\Http\Controllers\PersonalProfile;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SuperiorProfileController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        return view('profile-superior.profile-superior', compact('user'));
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        // return response()->json($user);
        return view('profile-superior.edit-profile-superior', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if($request->file('foto') != null) {
            $validated = Validator::make($request->all(), [
                'nama' => 'required|string',
                'username' => 'required|string|min:8|unique:users,username'
            ]);

            // return response()->json($request->all());
            if($validated->fails()) {
                $pathFoto = 'public/uploads/superior/foto' . $request['foto'];
                if (file_exists($pathFoto)) {
                    unlink($pathFoto);
                }
                
                Alert::error('Error Title', 'Data Tidak Valid');
                return redirect()->back();
            }
            
            $user->update($request->all());
            
            toast('Data updated successfully', 'success');
            return redirect()->route('superior-profile.index');
        } {
            $validated = Validator::make($request->all(), [
                'nama' => 'required|string',
                'username' => 'required|string|min:8|unique:users,username'
            ]);
            $user->update($request->all());

            toast('Data updated successfully', 'success');
            return redirect()->route('superior-profile.index');
        }
    }

    public function uploadfotoSPR(Request $request)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $name = trim($filename);

        $request->file('file')->storeAs('public/uploads/superior/foto', $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $filename,
        ]);
    }
}
