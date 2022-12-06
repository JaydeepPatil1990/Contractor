<?php

namespace App\Http\Controllers;

use App\Models\ContractWork;
use App\Models\RoadType;
use App\Models\Contractor;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateContractorRequest;
use App\Models\CompanyType;

class ContractWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = ContractWork::with(['contractor','contractor.companyType','roadType'])->where('status', '==', '0')->get();
        return view('backend.workindex', compact('work'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyTypes = CompanyType::all();
        $roadType = RoadType::all();
        $contractor = Contractor::all();
        return view('backend.workform', compact('companyTypes','contractor','roadType')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request);
        $this->validate($request,[
            'contractor_id'=>'required',
            'road_type_id' => 'required',
            'contract_no' => 'required',
            's_date' => 'required',
            'e_date' => 'required',
            'contract_amount' => 'required',
            'penalty' => 'required',
            'warranty' => 'required',
            'location' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            ]);
            //dd($request);
            $work = new ContractWork;
            $work->contractor_id=$request->contractor_id;
            $work->road_type_id=$request->road_type_id;
            $work->contract_no=$request->contract_no;
            $work->start_date = date_format(date_create($request->s_date),"Y-m-d");
            $work->end_date = date_format(date_create($request->e_date),"Y-m-d");
            $work->contract_amount = $request->contract_amount;
            $work->penalty= $request->penalty;
            $work->warranty= $request->warranty;
            $work->location= $request->location;
            $work->address_line_1= $request->address_line_1;
            $work->address_line_2= $request->address_line_2;
            $work->city= $request->city;
            $work->state= $request->state;
            $work->country= $request->country;
            $work->short_description= $request->short_description;
            $work->long_description= $request->long_description;
            $work->save();
            return redirect(route('work.index')); 
        }

    public function edit($id)
    {
        $id= decrypt($id);
        $companyTypes = CompanyType::all();
        $roadType = RoadType::all();
        $contractor = Contractor::all();
        $work = ContractWork::whereId($id)->first();
        return view('backend.workedit', compact('work','companyTypes','contractor','roadType')); 
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
            'contractor_id'=>'required',
            'road_type_id' => 'required',
            'contract_no' => 'required',
            's_date' => 'required',
            'e_date' => 'required',
            'contract_amount' => 'required',
            'penalty' => 'required',
            'warranty' => 'required',
            'location' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            ]);
           
            $id= decrypt($id);
            $work = ContractWork::find($id);
            $work->contractor_id=$request->contractor_id;
            $work->road_type_id=$request->road_type_id;
            $work->contract_no=$request->contract_no;
            $work->start_date = date_format(date_create($request->s_date),"Y-m-d");
            $work->end_date = date_format(date_create($request->e_date),"Y-m-d");
            $work->contract_amount = $request->contract_amount;
            $work->penalty= $request->penalty;
            $work->warranty= $request->warranty;
            $work->location= $request->location;
            $work->address_line_1= $request->address_line_1;
            $work->address_line_2= $request->address_line_2;
            $work->city= $request->city;
            $work->state= $request->state;
            $work->country= $request->country;
            $work->short_description= $request->short_description;
            $work->long_description= $request->long_description;
            $work->save();
            return redirect(route('work.index'));
    }

    public function destroy($id)
    {
        $id= decrypt($id);
        $work = ContractWork::whereId($id)->first();
        $work->status = 1;
        $work->save();
        return redirect(route('work.index')); 
    }

    public function warrantyExpired()
    {   $work = array();
        $workAll = ContractWork::with(['contractor','contractor.companyType','roadType'])->where('status', '==', '0')->get();
        $date=date_create();
        $currentDate = date_format($date,"Y-m-d");
        foreach($workAll as $key=>$value){
            $yr= round($value->warranty).' years';
            $new_date = date('Y-m-d', strtotime($yr, strtotime( $value->end_date)));
           if($currentDate > $new_date){
                array_push($work, $value);
           }else{
                unset($workAll[$key]);
           }
        }
        return view('backend.workexpired', compact('work'));   
    }

}
