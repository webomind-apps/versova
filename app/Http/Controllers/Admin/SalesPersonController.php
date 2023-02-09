<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesPersonRequest;
use App\Models\CustomerCompany;
use App\Models\SalesPerson;
use App\Models\SalesPersonCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalesPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salespersons = SalesPerson::paginate(10);

        return view('admin.salesperson.index', compact('salespersons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customercompanies = CustomerCompany::all();
        return view('admin.salesperson.create', compact('customercompanies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesPersonRequest $request)
    {
        $salesperson = new SalesPerson();
        $salesperson->name = $request->name;
        $salesperson->phone = $request->phone;
        $salesperson->address = $request->address;
        $salesperson->email = $request->email;
        $salesperson->password = Hash::make($request->password);
        $salesperson->status = $request->status;
        $salesperson->save();

        if (!is_null($request->customercompanies)) {
            foreach ($request->customercompanies as $customercompany) {
                $assigned_company = new SalesPersonCustomer();
                $assigned_company->sales_person_id  = $salesperson->id;
                $assigned_company->customer_company_id  = $customercompany;
                $assigned_company->save();
            }
        }

        return redirect()->route('admin.sales-person.index')->with('success', 'Sales person added successfully');
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
        $salesperson = SalesPerson::find($id);
        $customercompanies = CustomerCompany::all();
        return view('admin.salesperson.edit', compact('salesperson', 'customercompanies'));
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

        $salesperson = SalesPerson::find($id);
        $salesperson->name = $request->name;
        $salesperson->phone = $request->phone;
        $salesperson->address = $request->address;
        $salesperson->email = $request->email;
        $salesperson->password = Hash::make($request->password);
        $salesperson->status = $request->status;
        $salesperson->save();


        $salesperson->customers()->delete();
        if (!is_null($request->customercompanies)) {
            foreach ($request->customercompanies as $customercompany) {
                $assigned_company = new SalesPersonCustomer();
                $assigned_company->sales_person_id  = $salesperson->id;
                $assigned_company->customer_company_id  = $customercompany;
                $assigned_company->save();
            }
        }

        return redirect()->route('admin.sales-person.index')->with('success', 'Sales person added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salesperson = SalesPerson::find($id);
        $salesperson->delete();

        return redirect()->route('admin.sales-person.index')->with('success', 'Sales Person deleted successfully');
    }
}
