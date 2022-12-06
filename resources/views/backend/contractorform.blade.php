@extends('backend.layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Contractors</h1>
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
                <h3 class="card-title">Create Contractor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('contractorstore') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="exampleInputEmail1" placeholder="Company Name">
                      </div>
                      <div class="col-6">
                        <label>Company Type</label>
                        <select class="form-control select2" name="company_type_id">
                          <option value="0">Select Compny Type</option>
                          @foreach($companyTypes as $companyType)
                          <option value="{{$companyType->id}}">{{$companyType->type}} </option>
                          @endforeach   
                        </select>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <label for="contactPrsonname">Contact Person Name</label>
                      <input type="text" class="form-control" name="contact_person_name" id="contact_person_name" placeholder="Enter contact Person Name">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-6">
                      <label for="contactNumber">Contact Number</label>
                      <input type="text" class="form-control" name="contact_number" id="contact_number" maxlength="10" placeholder="Enter contact Number">
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                  </div>
                  </div>
                
                
                <!-- /.card-body -->
                <br>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection