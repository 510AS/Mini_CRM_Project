<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = CompanyResource::collection(Company::get());
        return $this->apiResponse($company,'ok',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_en'           => 'required',
            'name_ar'           => 'required',
            'website_url'       => 'required',
            'email'             => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $company =new Company;
        $company->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $company->website_url = $request->website_url ;
        $company->email = $request->email;
        $company->logo = "";
        $company->save();

        if($company){
            return $this->apiResponse(new CompanyResource($company),'The company Save',201);
        }

        return $this->apiResponse(null,'The company Not Save',400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        if($company){
            return $this->apiResponse(new CompanyResource($company),'ok',200);
        }
        return $this->apiResponse(null,'The company Not Found',404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_en'           => 'required',
            'name_ar'           => 'required',
            'website_url'       => 'required',
            'email'             => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $company=company::find($id);

        if(!$company){
            return $this->apiResponse(null,'The company Not Found',404);
        }

        $company->update([
            'name'          => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'website_url'   => $request->website_url ,
            'email'         => $request->email,
            'logo'          => "",
    ]);

        if($company){
            return $this->apiResponse(new companyResource($company),'The company update',201);
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
        $company=Company::find($id);

        if(!$company){
            return $this->apiResponse(null,'The company Not Found',404);
        }

        $company->delete($id);

        if($company){
            return $this->apiResponse(null,'The company deleted',200);
        }
    }
}
