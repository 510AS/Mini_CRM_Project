<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);

        return view('pages.company.index',compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
        $request->validate([
            'name_en'           => 'required',
            'name_ar'           => 'required',
            'website_url'       => 'required',
            'email'             => 'required',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=100,height=100'
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'public/image';
            $logoImage = rand(0,1000000). "(".$request->name_en.")"."." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $logoImage);

        }

        $companies = new Company();
        $companies->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $companies->website_url = $request->website_url ;
        $companies->email = $request->email;
        $companies->logo = $logoImage;
        $companies->save();

        $user = User::get();
        $company = company::latest()->first();
        Notification::send($user, new \App\Notifications\AddCompany($company));

        return redirect()->route('companies.index')
                        ->with('success',trans('messages.success'));
                        }
        catch (\Exception $e){
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::findorfail($id);
        return \view('pages.company.show',\compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::findorfail($id);
        return \view('pages.company.edit',\compact('companies'));
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

        try {
        $companies = Company::findorfail($id);
        $request->validate([
            'name_en'           => 'required',
            'name_ar'           => 'required',
            'website_url'       => 'required',
            'email'             => 'required',
        ]);

        if ($image = $request->file('image')) {
            $request->validate([
                'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=100,height=100',
            ]);
            $destinationPath = 'public/image';
            $logoImage = rand(0,1000000). "(".$request->name_en.")"."." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $logoImage);
        }else{
            $logoImage = $request->logo;
        }
        $companies->update([
                'name'          => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'website_url'   => $request->website_url ,
                'email'         => $request->email,
                'logo'          => $logoImage,
        ]);



        return redirect()->route('companies.index')
                        ->with('success',trans('messages.Update'));
                        }
        catch (\Exception $e){
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $companies = Company::findorfail($id);
        $companies->delete();

        return redirect()->route('companies.index')
        ->with('success',trans('messages.Delete'));
    }


}
