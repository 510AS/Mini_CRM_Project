<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact_Persone;
use Illuminate\Http\Request;

class ContactPersoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_Persone = Contact_Persone::latest()->paginate(5);
        $companies = Company::all();

        return view('pages.Contact_Persone.index',compact('contact_Persone','companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('pages.Contact_Persone.create',\compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name_en'           => 'required',
            'first_name_ar'           => 'required',
            'last_name_en'           => 'required',
            'last_name_ar'           => 'required',
            'email'                   => 'required',
            'phone'                   => 'required',
            'company_id'               => 'required',
        ]);
        if($request->has('linkedin_url')){
            $linkedin_url = $request->linkedin_url;
        }else{
            $linkedin_url = "";
        }

        $contact_Persone = new Contact_Persone();
        $contact_Persone->first_name = ['en' => $request->first_name_en, 'ar' => $request->first_name_ar];
        $contact_Persone->last_name = ['en' => $request->last_name_en, 'ar' => $request->last_name_ar];
        $contact_Persone->email = $request->email;
        $contact_Persone->phone = $request->phone;
        $contact_Persone->company_id = $request->company_id;
        $contact_Persone->linkedin_url =$linkedin_url ;
        $contact_Persone->save();

        return redirect()->route('employees.index')
                        ->with('success',trans('messages.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::all();
        $contact_Persone = Contact_Persone::findorfail($id);
        return \view('pages.Contact_Persone.show',\compact('contact_Persone','companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $contact_Persone = Contact_Persone::findorfail($id);
        return \view('pages.Contact_Persone.edit',\compact('contact_Persone','companies'));
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
        $contact_Persone = Contact_Persone::findorfail($id);
        $request->validate([
            'first_name_en'           => 'required',
            'first_name_ar'           => 'required',
            'last_name_en'           => 'required',
            'last_name_ar'           => 'required',
            'email'                   => 'required',
            'phone'                   => 'required',
            'company_id'                   => 'required',
        ]);
        if($request->has('linkedin_url')){
            $linkedin_url = $request->linkedin_url;
        }else{
            $linkedin_url = "";
        }

        $contact_Persone->update([
            'first_name' => ['en' => $request->first_name_en, 'ar' => $request->first_name_ar],
            'last_name' => ['en' => $request->last_name_en, 'ar' => $request->last_name_ar],
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id,
            'company_id' => $request->company_id,
            'linkedin_url' =>$linkedin_url,

        ]);



        return redirect()->route('employees.index')
                        ->with('success',trans('messages.Update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contact_Persone = Contact_Persone::findorfail($id);
        $contact_Persone->delete();
        return redirect()->route('employees.index')
        ->with('success',trans('messages.Delete'));
    }
}
