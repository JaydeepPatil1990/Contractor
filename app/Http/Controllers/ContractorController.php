<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateContractorRequest;
use App\Models\CompanyType;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractors = Contractor::with(['companyType'])->get();
        return view('backend.contractorindex', compact('contractors'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyTypes = CompanyType::all();
        return view('backend.contractorform', compact('companyTypes')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name'=>'required',
            'company_type_id' => 'required',
            'contact_person_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            ]);
            $contractor = Contractor::create($request->all());
            $contractor->save();
            return redirect(route('contractor.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function show(Contractor $contractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyTypes = CompanyType::all();
         $id= decrypt($id);
         $contractor = Contractor::whereId($id)->first();
        return view('backend.contractoredit', compact('contractor','companyTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContractorRequest  $request
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'company_name'=>'required',
            'company_type_id' => 'required',
            'contact_person_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            ]);
        $id= decrypt($id);
        $contractor = Contractor::find($id);
        $contractor->company_name = $request->company_name;
        $contractor->company_type_id = $request->company_type_id;
        $contractor->contact_person_name = $request->contact_person_name;
        $contractor->contact_number = $request->contact_number;
        $contractor->email = $request->email;
         $contractor->save();
         //return view('backend.contractorindex');
         return redirect(route('contractor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractor $contractor)
    {
        //
    }
}
