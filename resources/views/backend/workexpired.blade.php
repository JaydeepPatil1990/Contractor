@extends('backend.layouts.master')

@section('content')
<style>
 table {
  display: block;
  overflow-x: auto;
  /*white-space: nowrap; */
}
table thead tbody {
  display: table;
  width: 100%;
}
</style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contractors Work</h1>
          </div>
         <div class="col-sm-6">
         
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
             <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body"  id="tableWrapper">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Contractor Name</th>
                    <th>Road Type</th>
                    <th>Contract Number</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Contract Amount</th>
                    <th>Penalty</th>
                    <th>Warranty (In Years)</th>
                    <th>Location</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($work as $work) 
                  <?php //dd($work);
                        $s_dt = date_format(date_create($work->start_date),"d-m-Y");
                        $e_dt = date_format(date_create($work->end_date),"d-m-Y");
                   ?>
                  <tr>
                    <td>{{$work->id}}</td>
                    <td>{{$work->contractor->company_name.' '.$work->contractor->companyType->type}}</td>
                    <td>{{$work->roadType->type}}</td>
                    <td>{{$work->contract_no}}</td>
                    <td>{{$work->short_description}}</td>
                    <td>{{$work->long_description}}</td>

                    <td>{{$s_dt}}</td>
                    <td>{{$e_dt}}</td>
                    <td>{{$work->contract_amount}}</td>
                    <td>{{$work->penalty}}</td>
                    <td>{{$work->warranty}}</td>
                    <td>{{$work->location}}</td>
                    <td>{{$work->address_line_1}}</td>
                    <td>{{$work->address_line_2}}</td>
                    <td>{{$work->city}}</td>
                    <td>{{$work->state}}</td>
                    <td>{{$work->country}}</td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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