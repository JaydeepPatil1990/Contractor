@extends('backend.layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  
<script>
  $( function() {
    $( "#datepicker,#datepicker1" ).datepicker({dateFormat: 'dd-mm-yy'});
  } );
  </script>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Contract Work</h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Contract Work</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('workupdate', ['id'=>encrypt($work->id)])}}" method="post">
              @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label>Contractor Company</label>
                            <select class="form-control select2" name="contractor_id">
                                <option value="0">Select Contractor Company</option>
                                @foreach($contractor as $contractor)
                                <option value="{{$contractor->id}}" {{ ($contractor->id == $work->contractor_id ?'selected':'')}}>{{$contractor->company_name}} </option>
                                @endforeach  
                            </select>
                        </div>
                        <div class="col-4">
                        <label>Contract For</label>
                            <select class="form-control select2" name="road_type_id">
                                <option value="0">Select Contract For</option>
                                @foreach($roadType as $roadType)
                                <option value="{{$roadType->id}}"{{ ($roadType->id == $work->road_type_id ?'selected':'')}}>{{$roadType->type}} </option>
                                @endforeach  
                            </select>
                        </div>
                        <div class="col-4">
                        <label>Contract Number</label>
                        <input type="text" class="form-control" name="contract_no"  value="{{$work->contract_no}}" id="contract_no" placeholder="Enter Contract Number">
                        
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label>Start Date</label>
                            <div class="">
                                <?php $start_dt = date_format(date_create($work->start_date),"d-m-Y"); ?>
                                <input class="form-control" value="{{$start_dt}}" type="text" name="s_date" id="datepicker">
                            </div>
                        </div>
                        <div class="col-4">
                            <label>End Date</label>
                            <div class="">
                                <?php $end_dt = date_format(date_create($work->end_date),"d-m-Y"); ?>
                                <input class="form-control" type="text" value="{{$end_dt}}" name="e_date" id="datepicker1">
                            </div>
                        </div>
                    </div>                
                <br>
                <div class="row">
                    <div class="col-4">
                        <label>Contract Amount</label>
                        <input class="form-control" type="number" value="{{$work->contract_amount}}" name="contract_amount" id="contract_amount">
                    </div>
                    <div class="col-4">
                        <label>Penalty</label>
                        <input class="form-control" type="number" value="{{$work->penalty}}" name="penalty" id="penalty">
                    </div>
                    <div class="col-4">
                        <label>Warranty</label>
                        <input class="form-control" type="number" value="{{$work->warranty}}" name="warranty" id="warranty">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4">
                        <label>Location</label>
                        <input class="form-control" type="text" value="{{$work->location}}" name="location" id="location">
                    </div>
                    <div class="col-4">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" value="{{$work->address_line_1}}" name="address_line_1" id="address_line_1">
                    </div>
                    <div class="col-4">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text"  value="{{$work->address_line_2}}" name="address_line_2" id="address_line_2">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4">
                        <label>City</label>
                        <input class="form-control" type="text" value="{{$work->city}}" name="city" id="city">
                    </div>
                    <div class="col-4">
                        <label>State</label>
                        <input class="form-control" type="text" value="{{$work->state}}" name="state" id="state">
                    </div>
                    <div class="col-4">
                        <label>Country</label>
                        <input class="form-control" type="text" value="{{$work->country}}" name="country" id="country">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <label>Short Description</label>
                        <textarea class="form-control" type="text" name="short_description" id="short_description">{{$work->short_description}}</textarea>
                    </div>
                    <div class="col-6">
                        <label>Long Description</label>
                        <textarea class="form-control" type="text" name="long_description" id="long_description" >{{$work->long_description}}</textarea>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
