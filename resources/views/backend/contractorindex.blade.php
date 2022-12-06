@extends('backend.layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contractors</h1>
          </div>
         <div class="col-sm-6"  style="text-align:right;" >
         <a class='col-lg-offset-5 btn btn-success' href="{{ route('contractor.create') }}">Add New</a>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Contact Person</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($contractors as $contractor)
                  <?php //dd($contractor); ?>
                  <tr>
                    <td>{{$contractor->company_name.' '.$contractor->companyType->type }}</td>
                    <td>{{$contractor->email}}</td>
                    <td>{{$contractor->contact_person_name}}</td>
                    <td>{{$contractor->contact_number}}</td>
                    <td>
                    <a class='col-lg-offset-5 btn btn-warning' href="{{ route('contractoredit', ['id'=>encrypt($contractor->id)])}}">Edit</a>
                    
                    </td>
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