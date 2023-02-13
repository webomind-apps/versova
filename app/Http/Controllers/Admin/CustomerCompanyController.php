<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerCompanyRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customercompanies = Customer::paginate(10);
        return view('admin.customercompany.index', compact('customercompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customercompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCompanyRequest $request)
    {
        $customercompany = new Customer();
        $customercompany->company_name = $request->company_name;
        $customercompany->contact_person  = $request->contact_person;
        $customercompany->phone = $request->phone;
        $customercompany->fax  = $request->fax;
        $customercompany->address = $request->address;
        $customercompany->email = $request->email;
        $customercompany->password =  Hash::make($request->password);
        $customercompany->status = $request->status;
        $customercompany->save();

        return redirect()->route('admin.customer-company.index')->with('success', 'Customer Company added successfully');
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
        $customercompany = Customer::find($id);
        return view('admin.customercompany.edit', compact('customercompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerCompanyRequest $request, $id)
    {
        $customercompany = Customer::find($id);
        $customercompany->company_name = $request->company_name;
        $customercompany->contact_person  = $request->contact_person;
        $customercompany->phone = $request->phone;
        $customercompany->fax  = $request->fax;
        $customercompany->address = $request->address;
        $customercompany->email = $request->email;
        $customercompany->password =  Hash::make($request->password);
        $customercompany->status = $request->status;
        $customercompany->save();


        return redirect()->route('admin.customer-company.index')->with('success', 'Customer Company added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customercompany = Customer::find($id);
        $customercompany->delete();

        return redirect()->route('admin.customer-company.index')->with('success', 'Customer Company deleted successfully');
    }
}
