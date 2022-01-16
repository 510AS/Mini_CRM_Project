@extends('layouts.master_layout')
@section('PageTitle')
{{$companies->name}} {{trans('page.Company Details')}}
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$companies->name}} {{trans('page.Company Details')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">{{trans('page.Home')}}</a></li>
              <li class="breadcrumb-item active">{{$companies->name}} {{trans('page.Company Details')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$companies->name}} {{trans('page.Company Details')}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">{{trans('page.Employers Numper')}}</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$companies->Employer->count()}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              @foreach ($companies->Employer as $employer)
                <div class="col-12">
                  <h4>{{$employer->first_name}}</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('assets/img/user1-128x128.jpg')}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$employer->first_name}} {{$employer->last_name}}</a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <h5 class="mt-5 text-muted">{{trans('page.Project files')}}</h5>
                        <ul class="list-unstyled">
                            <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> {{$employer->email}}</a>
                            </li>
                            <li>
                            <a href="" class="btn-link text-secondary"><i class="fas fa-phone"></i>  {{$employer->phone}}</a>
                            </li>
                            <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> {{$employer->linkedin_url}}</a>
                            </li>

                        </ul>

                    </div>

                </div>

                @endforeach
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$companies->name}} {{trans('page.Company')}} </h3>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">{{trans('page.Company Name')}}
                  <b class="d-block">{{$companies->name}}</b>
                </p>
                <p class="text-sm">{{trans('page.Company Email')}}
                  <b class="d-block">{{$companies->email}}</b>
                </p>
                <p class="text-sm">{{trans('page.Company Websit URL')}}
                  <b class="d-block">{{$companies->website_url}}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">{{trans('page.Project files')}}</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> {{$companies->email}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  <img src="{{  asset('storage/image/'.$companies->logo )}}">
                </li>

              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="{{ route('companies.edit',$companies->id) }}" class="btn btn-sm btn-primary">{{trans('page.Edit')}}</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection

