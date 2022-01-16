@extends('layouts.master_layout')
@section('PageTitle')
{{trans('page.Add Companies')}}
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{trans('page.Add Companies')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">{{trans('page.All Companies')}}</a></li>
              <li class="breadcrumb-item active">{{trans('page.Add Companies')}}</li>
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
            <h3 class="card-title">{{trans('page.Add Companies')}}</h3>

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
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.Name EN')}}</label>
                  <input type="text" name="name_en" class="form-control" id="exampleInputName" placeholder="Enter Name En">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.Name Ar')}}</label>
                  <input type="text" name="name_ar" class="form-control" id="exampleInputName" placeholder="Enter Name Ar">
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
                    <label for="exampleInputURL">{{trans('page.Website URL')}}</label>
                    <input type="text" name="website_url" class="form-control" id="exampleInputURL" placeholder="Website URL">
                  </div>
            <div class="form-group">
                    <label for="exampleInputFile">{{trans('page.File input')}}</label>
                    <div class="input-group">
                         <div class="form-group">
                                <strong>{{trans('page.logo')}}</strong>
                                <input type="file" name="image" class="form-control" placeholder="image">
                         </div>
                    </div>
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
