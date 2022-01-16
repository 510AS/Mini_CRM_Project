@extends('layouts.master_layout')
@section('PageTitle')
{{trans('page.Add Employer')}}
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{trans('page.Add Employer')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">{{trans('page.All Employers')}}</a></li>
              <li class="breadcrumb-item active">{{trans('page.Add Employer')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{trans('page.Add Employer')}}</h3>

          </div>
          <!-- /.card-header -->
          @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('employees.store') }}" method="POST" >
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.First Name EN')}}</label>
                  <input type="text" name="first_name_en" class="form-control" id="exampleInputName" placeholder="Enter First Name En">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.First Name Ar')}}</label>
                  <input type="text" name="first_name_ar" class="form-control" id="exampleInputName" placeholder="Enter First Name Ar">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.Laste Name EN')}}</label>
                  <input type="text" name="last_name_en" class="form-control" id="exampleInputName" placeholder="Enter Laste Name En">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.Laste Name Ar')}}</label>
                  <input type="text" name="last_name_ar" class="form-control" id="exampleInputName" placeholder="Enter Laste Name Ar">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('page.Email address')}}</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>

            <div class="form-group">
                  <label>{{trans('page.phone')}}</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="number" name="phone" class="form-control"  data-mask="" inputmode="text">
                  </div>
                  <!-- /.input group -->
                </div>

            <div class="form-group">
                  <label>{{trans('page.Select Company')}}</label>
                  <select name="company_id" class="form-control">
                      <option>{{trans('page.Select Company')}}</option>
                  @foreach ($companies as $company )
                     <option value="{{$company->id}}" >{{$company->name}}</option>
                   @endforeach
                  </select>
                </div>

            <div class="form-group">
                    <label for="exampleInputURL">{{trans('page.Linkedin URL')}}</label>
                    <input type="text" name="linkedin_url" class="form-control" id="exampleInputURL" placeholder="{{trans('page.optional')}}">
            </div>

            <!-- /.row -->
          </div>
          <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('page.Submit')}}</button>
                </div>
          <!-- /.card-body -->
        </form>

        </div>
        <!-- /.card -->






      </div>
      <!-- /.container-fluid -->
    </section>
</div>
@endsection
