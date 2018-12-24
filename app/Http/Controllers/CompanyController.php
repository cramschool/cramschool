<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{
    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|min:10|max:10',
            'company_slogan' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
        ]);
    }
    public function edit()
    {
        $user = auth()->user();

        return view('/backend/companies/edit')->with([
            'company' => $user->company
        ]);
    }

    public function update(Request $request)
    {
        $company = auth()->user()->company;

        // dd($request->input('company_name', 'xxx'));

        $company->update([
            'name' =>$request->input('company_name'),
            'phone' =>$request->input('company_phone'),
            'slogan' =>$request->input('company_slogan'),
            'address' =>$request->input('company_address'),
        ]);

        return view('/backend/companies/edit')->with([
            'company' => $company,
            'status' => '修改成功!!!',
        ]);
    }
}
