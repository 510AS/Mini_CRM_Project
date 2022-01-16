@extends('layouts.master_layout')
@section('PageTitle')
{{trans('Dashboard.Dashboard')}}
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 244px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('Dashboard.Dashboard')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{trans('navbar.Home')}}</a></li>
              <li class="breadcrumb-item active">{{trans('Dashboard.Dashboard')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{\App\Models\Company::count()}}</h3>

                <p>{{trans('Dashboard.Compnies')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('companies.index')}}" class="small-box-footer">{{trans('Dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{\App\Models\Contact_Persone::count()}}</h3>

                <p>{{trans('Dashboard.Employers')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('employees.index')}}" class="small-box-footer">{{trans('Dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->

            <!-- /.card -->

            <!-- DIRECT CHAT -->

            <!--/.direct-chat -->

            <!-- TO DO List -->

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable ui-sortable">

            <!-- Map card -->

            <!-- /.card -->

            <!-- solid sales graph -->

            <!-- /.card -->

            <!-- Calendar -->

            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
