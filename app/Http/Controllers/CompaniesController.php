<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCompany;
use App\Http\Requests\EditCompanies;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::check()) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
            //$companies = auth()->user()->$companies;
            return view('companies.index', compact('companies'));  
        }
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompany $request)
    {   $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        //dd($validated['user_id']); 
       if (Auth::check()) {
           $company = Company::create($validated);
            if ($company) {
                return redirect()->route('companies.index')->with('success','company created successfully');
            }
       }
       return back()->withInput(); 

       //return back()->withInput()->with('errors','cannot create company for some reason'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //$company = Company::where('id', $company->id);
        return view('companies.show',compact('company')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(EditCompanies $request, Company $company)
    {
        $validated = $request->validated();
        //dd($validated);
        $company->update($validated);
        if($company){
            return redirect()->route('companies.show',compact('company'))->with('success','Company Edited successfully');
        }
        return back()->withInput(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->delete()){
            return redirect()->route('companies.index')->with('success','company deleted successfully');
        }

        return back()->withInput()->with('error','Company could not be deleted');
    }
}
