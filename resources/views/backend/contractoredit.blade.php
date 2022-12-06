@extends('backend.layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1>New Contractors</h1>
          </div> -->
        
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
                <h3 class="card-title">Update Contractor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" action="{{ route('contractorupdate', ['id'=>encrypt($contractor->id)]) }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <label for="company Name">Company Name</label>
                      <input type="text" class="form-control" name="company_name" id="exampleInputEmail1" value="{{$contractor->company_name}}" placeholder="Company Name">
                    </div>
                    <div class="col-6">
                      <label>Company Type</label>
                      <select class="form-control select2" name="company_type_id" value="{{$contractor->company_type_id}}">
                          <option value="0">Select Company Type</option>  
                        @foreach($companyTypes as $companyType)
                          <option value="{{$companyType->id}}" {{ ($companyType->id == $contractor->company_type_id) ? 'selected' : ''}}>{{$companyType->type}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <label for="contactPrsonname">Contact Person Name</label>
                      <input type="text" class="form-control" name="contact_person_name" value="{{$contractor->contact_person_name}}" id="contact_person_name" placeholder="Enter contact Person Name">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-6">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number" value="{{$contractor->contact_number}}" id="contact_number" placeholder="Enter contact Number">
                      </div>
                      <div class="col-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$contractor->email}}" id="email" placeholder="Enter email">
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="row card-footer">
                  <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
                <br>
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