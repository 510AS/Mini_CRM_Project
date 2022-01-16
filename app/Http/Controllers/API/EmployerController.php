<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployerResource;
use App\Models\Company;
use App\Models\Contact_Persone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer = EmployerResource::collection(Contact_Persone::get());
        return $this->apiResponse($employer,'ok',200);
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
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'first_name_en'           => 'required',
    //         'first_name_ar'           => 'required',
    //         'last_name_en'           => 'required',
    //         'last_name_ar'           => 'required',
    //         'email'                   => 'required',
    //         'phone'                   => 'required',
    //         'company_name'               => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->apiResponse(null,$validator->errors(),400);
    //     }
    //     if($request->has('linkedin_url')){
    //         $linkedin_url = $request->linkedin_url;
    //     }else{
    //         $linkedin_url = "";
    //     }
    //     $name = 'name'.['en'];
    //    $company = Company::where($name,$request->compny->name)->get();
    //    \dd($company);

    //     // $employer = new Contact_Persone();
    //     // $employer->first_name = ['en' => $request->first_name_en, 'ar' => $request->first_name_ar];
    //     // $employer->last_name = ['en' => $request->last_name_en, 'ar' => $request->last_name_ar];
    //     // $employer->email = $request->email;
    //     // $employer->phone = $request->phone;
    //     // $employer->company_id = $company->id;
    //     // $employer->linkedin_url =$linkedin_url ;
    //     // $employer->save();

    //     // if($employer){
    //     //     return $this->apiResponse(new EmployerResource($employer),'The employer Save',201);
    //     // }

    //     // return $this->apiResponse(null,'The employer Not Save',400);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Contact_Persone::find($id);

        if($employer){
            return $this->apiResponse(new EmployerResource($employer),'ok',200);
        }
        return $this->apiResponse(null,'The employer Not Found',404);
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
            'first_name_en'           => 'required',
            'first_name_ar'           => 'required',
            'last_name_en'           => 'required',
            'last_name_ar'           => 'required',
            'email'                   => 'required',
            'phone'                   => 'required',

        ]);


        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }
        if($request->has('linkedin_url')){
            $linkedin_url = $request->linkedin_url;
        }else{
            $linkedin_url = "";
        }

        $employer=Contact_Persone::find($id);

        if(!$employer){
            return $this->apiResponse(null,'The employer Not Found',404);
        }

        $employer->update([
            'first_name' => ['en' => $request->first_name_en, 'ar' => $request->first_name_ar],
            'last_name' => ['en' => $request->last_name_en, 'ar' => $request->last_name_ar],
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $employer->company_id,
            'linkedin_url' =>$linkedin_url,
        ]);
        if($employer){
            return $this->apiResponse(new EmployerResource($employer),'The employer update',201);
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
        $employer=Contact_Persone::find($id);

        if(!$employer){
            return $this->apiResponse(null,'The employer Not Found',404);
        }

        $employer->delete($id);

        if($employer){
            return $this->apiResponse(null,'The employer deleted',200);
        }
    }
}
