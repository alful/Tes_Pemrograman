<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

// class RegisterController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//         return view("register.index");
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//         $validatedData = $request->validate([
//             'name' => 'required|max:255',
//             'username' => ['required', 'min:4', 'max:20', 'unique:users'],
//             'email' => 'required|email:dns|unique:users',
//             'password' => 'required|min:6|max:255'
//         ]);

//         // dd('regis suks');

//         // $validatedData['password'] = bcrypt($validatedData['password']);
//         $validatedData['password'] = Hash::make($validatedData['password']);

//         User::create($validatedData);
//         // session()->flash('success', 'Registration successfull! Please login');
//         // return redirect('/login');

//         return redirect('/login')->with('success', 'Registration successfull! Please login!');
//     }

//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Register $register)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Register $register)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Register $register)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Register $register)
//     {
//         //
//     }
// }
