<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Company\Company as CompanyCompany;
use App\Http\Requests\Company\Profile;
use App\Http\Requests\Company\ProfileRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Company::find(intval($id));
        if (is_null($data)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('company.profile');
        }
            $team = [
                50 => '50-100 người',
                100 => '100-150 người',
                200 => '200-250 người',
                300 => '300-350 người',
                500 => '500-1000 người',
            ];
            return view('company.profile.edit', compact('data', 'team'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $company = Company::find(intval($id));
        if (is_null($company)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->route('company.profile');
        }
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '_' . $image->getClientOriginalName();
            // dd($name);
            $image->storeAs('images/company', $name, 'public');
        }else{
            $name = $request->logo_old;
        }
        // dd($data);
        $data['logo'] = $name;
        $company->update($data);
        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('images', $fileName, 'public');
    }
}
