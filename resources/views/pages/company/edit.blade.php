@extends('layouts.master_layout')
@section('PageTitle')
{{trans('page.Edit Companies')}}
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{trans('page.Edit Company')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">All Companies</a></li>
              <li class="breadcrumb-item active">{{trans('page.Edit Company')}}{{$companies->name}} </li>
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
            <h3 class="card-title">{{trans('page.Edit')}} {{$companies->name}}</h3>

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

        <form action="{{ route('companies.update',$companies->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.Name EN')}}</label>
                  <input type="text" name="name_en" class="form-control" id="exampleInputName" value="{{$companies->getTranslation('name','en')}}" placeholder="Enter Name En">
                  <input type="hidden" name="id" class="form-control" id="exampleInputId" value="{{$companies->id}}">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>{{trans('page.Name Ar')}}</label>
                  <input type="text" name="name_ar" class="form-control" value="{{$companies->getTranslation('name','en')}}" id="exampleInputName" placeholder="Enter Name Ar">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('page.Email address')}}</label>
                    <input type="email" name="email" class="form-control" value="{{$companies->email}}" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

            <div class="form-group">
                    <label for="exampleInputURL">{{trans('page.Website URL')}}</label>
                    <input type="text" name="website_url" class="form-control" value="{{$companies->website_url}}" id="exampleInputURL" placeholder="Website URL">
                  </div>
            <div class="form-group">
                    <label for="exampleInputFile">{{trans('page.logo')}}</label>
                    <div class="input-group">
                         <div class="form-group">

                                <input type="file" name="image" class="form-control" placeholder="image">
                                <input type="hidden" name="logo" value="{{$companies->logo}}" >
                         </div>
                    </div>
            </div>


            <!-- /.row -->
          </div>
          <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('page.Update')}}</button>
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
