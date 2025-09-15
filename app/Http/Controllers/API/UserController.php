<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get(); // select * from user
        return response()->json([
            'data'=>$users,
            'message' => 'Fetch data success',
            'status' => true,
        ]);
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
        try {
            // $validator = Validator::make($request->all(),[
            //     'name'  => 'required|string',
            //     'email'  => 'required|string|email|unique:users,email',
            //     'password'  => 'required|min:8',
            // ]);
            // if($validator->fails()){
            //     return response()->json([
            //         'message'=>'Validatoion Fail',
            //         'errors' => $validator->errors()
            //     ], 422);
            // }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'Create user success',
                'data'=>$user
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            // $user = User::where('id', $id)->first();
            return response()->json([
                'status' => true,
                'message' => 'Edit data user success',
                'data' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // $user = User::get();
            $user = User::findOrFail($id); // jika eror mucul page 404
            // $user = User::find();
            $user->name = $request->name;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->email = $request->email;
            // $user->password = $request->password;
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Update user fetch',
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::find($id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Delete success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
