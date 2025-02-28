<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\cashier;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // only for karyawan
    public function register(Request $request){
        $this -> validate($request, [
            'name' => 'required',
            'password' => 'required',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required',
            'no_telp' => 'required',
        ]);

        // sudah melakukan php artisan storage:link
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileNameWithExt = $file -> getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $file -> getClientOriginalExtension();
            $profileToStore = $fileName.'_'.time().'.'.$extension;
            $file -> storeAs('Karyawan/profile_photo', $profileToStore);
        } else {
            $profileToStore = 'noimage.jpg';
        }

        $cashier = cashier::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'profile_picture' => $profileToStore,
            'username' => $request->username,
            'no_telp' => $request->no_telp,
            'salary' => 1000,
            'status' => 'active',
        ]);

        if($cashier){
            return response()->json([
                'success' => true,
                'activity' => 'Cashier register',
                'data' => $cashier
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'activity' => 'Cashier register',
                'message' => 'Failed to register'
            ], 409);
        }
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $cashier = cashier::where('username', $request->username)->first();
        $admin = admin::where('name', $request->username)->first();

        if($admin){
            // if (Hash::check($request->password, $admin->password)) {
            //     Auth::guard('admin') -> login($admin);
            //     $token = $admin->createToken('admin')->plainTextToken;
            //     return response()->json([
            //         'success' => true,
            //         'activity' => 'Admin login',
            //         'data' => $admin,
            //         'token' => $token,
            //         'josjis' => Auth::guard('admin')->user()
            //     ], 200);
            // } else {
            //     return response()->json([
            //         'success' => false,
            //         'activity' => 'Admin login',
            //         'message' => 'Wrong credentials'
            //     ], 401);
            // }
            if(Auth::guard('admin') -> attempt(['name' => $request->username, 'password' => $request->password])){
                Auth::guard('admin')->login($admin);
                $token = $admin->createToken('admin')->plainTextToken;
                return response()->json([
                    'success' => true,
                    'activity' => 'Admin login',
                    'data' => $admin,
                    'token' => $token,
                    'josjis' => Auth::guard('admin')->user()
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'activity' => 'Admin login',
                    'message' => 'Wrong credentials'
                ], 401);
            }
        } else{
            if (Auth::guard('cashier') -> attempt(['username' => $request->username, 'password' => $request->password])) {
                $token = $cashier->createToken('cashier') -> plainTextToken;
                return response()->json([
                    'success' => true,
                    'activity' => 'Cashier login',
                    'data' => $cashier,
                    'token' => $token
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'activity' => 'Cashier login',
                    'message' => 'Wrong credentials'
                ], 401);
            }
        }
    }

    public function logout(Request $request){
        $user = $request->user();
        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
            return response()->json([
                'success' => true,
                'activity' => 'Logout',
                'message' => 'Logout success'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'activity' => 'Logout',
                'message' => 'No authenticated user found'
            ], 401);
        }
    }
}
