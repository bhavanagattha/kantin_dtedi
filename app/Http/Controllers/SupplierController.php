<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use ErrorException;
use Illuminate\Http\Request;
use Storage;

class SupplierController extends Controller
{
    public function create(Request $request){
        $this -> validate($request, [
            'name' => 'required',
            'username' => 'required',
            'no_telp' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive', 
        ]);

        // sudah melakukan php artisan storage:link
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileNameWithExt = $file -> getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $file -> getClientOriginalExtension();
            $profileToStore = $fileName.'_'.time().'.'.$extension;
            $file -> storeAs('Supplier/profile_photo', $profileToStore);
        } else{
            $profileToStore = 'noimage.jpg';
        }

        $supplier = supplier::create([
            'name' => $request->name,
            'username' => $request->username,
            'no_telp' => $request->no_telp,
            'status' => $request->status,
            'profile_picture' => $profileToStore,
        ]);

        if($supplier){
            return response()->json([
                'success' => true,
                'activity' => 'Supplier register',
                'data' => $supplier
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'activity' => 'Supplier register',
                'message' => 'Failed to register'
            ], 409);
        }
    }

    public function update(Request $request, $id){
        try {
            $this -> validate($request, [
                'name' => 'String',
                'username' => 'String',
                'no_telp' => 'numeric',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'in:active,inactive', 
            ]);

            $supplier = supplier::find($id);
            $supplier -> name = $request -> name;
            $supplier -> username = $request -> username;
            $supplier -> no_telp = $request -> no_telp;
            $supplier -> status = $request -> status;

            if ($request -> hasFile('profile_picture')) {
                // menghapus foto lama
                Storage::delete('Supplier/profile_photo/'.$supplier -> profile_picture);

                // menyimpan foto baru
                $file = $request -> file('profile_picture');
                $fileNameWithExt = $file -> getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $file -> getClientOriginalExtension();
                $profileToStore = $fileName.'_'.time().'.'.$extension;
                $file -> storeAs('Supplier/profile_photo', $profileToStore);
                $supplier -> profile_picture = $profileToStore;
            }

            $supplier -> save();

            return response() -> json([
                'success' => true,
                'activity' => 'Supplier update',
                'data' => $supplier
            ], 200);
        } catch (ErrorException $err) {
            return response() -> json([
                'success' => false,
                'activity' => 'Supplier update',
                'message' => $err -> getMessage()
            ], 409);
        }
    }

    public function delete($id){
        $supplier = supplier::find($id);
        Storage::delete('Supplier/profile_photo/'.$supplier -> profile_picture);

        if ($supplier -> delete()) {
            return response() -> json([
                'success' => true,
                'activity' => 'Supplier delete',
                'message' => 'Supplier deleted'
            ], 200);
        } else {
            return response() -> json([
                'success' => true,
                'activity' => 'Supplier delete',
                'data' => $supplier
            ], 200);
        }
    }

    public function search(Request $request) {
        $this -> validate($request, [
            'name' => 'String'
        ]);

        $supplier = supplier::search($request -> name) -> get();

        if ($supplier -> isEmpty()) {
            return response() -> json([
                'success' => false,
                'activity' => 'Supplier search',
                'message' => 'Supplier not found'
            ], 404);
        }

        return response() -> json([
            'success' => true,
            'activity' => 'Supplier search',
            'data' => $supplier
        ], 200);
    }
}
