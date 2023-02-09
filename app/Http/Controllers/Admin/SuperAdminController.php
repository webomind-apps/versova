<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superadmins = User::paginate(10);
        return view('admin.superadmin.index', compact('superadmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.superadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuperAdminRequest $request)
    {
        $superadmin = new User();
        $superadmin->name = $request->name;
        $superadmin->email = $request->email;
        $superadmin->password =  Hash::make($request->get('password'));
        $superadmin->save();

        return redirect()->route('admin.super-admin.index')->with('success', 'Super Admin added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superadmin = User::find($id);
        return view('admin.superadmin.edit', compact('superadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuperAdminRequest $request, $id)
    {
        $superadmin = User::find($id);
        $superadmin->name = $request->name;
        $superadmin->email = $request->email;
        $superadmin->password = Hash::make($request->get('password'));
        $superadmin->save();

        return redirect()->route('admin.super-admin.index')->with('success', 'Super Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superadmin = User::find($id);
        $superadmin->delete();

        return redirect()->route('admin.super-admin.index')->with('success', 'Super Admin deleted successfully');
    }
}
