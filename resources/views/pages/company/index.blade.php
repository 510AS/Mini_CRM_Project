@extends('layouts.master_layout')
@section('PageTitle')
{{trans('page.All Companies')}}
@endsection
@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{trans('page.All Companies')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('page.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('page.All Companies')}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <a  href="{{ route('companies.create') }}" class="btn btn-secondary"> {{trans('page.Add Company')}}</a>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('page.Name')}}</th>
                                <th>{{trans('page.Email')}}</th>
                                <th>{{trans('page.Website Url')}}</th>
                                <th>{{trans('page.Logo')}}</th>
                                <th>{{trans('page.Control')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i =0
                            @endphp
                        @foreach ($companies as $company )
                            <tr>
                                <td> {{++$i}} </td>
                                <td> {{$company->name}} </td>
                                <td> {{$company->email}} </td>
                                <td> {{$company->website_url}} </td>
                                <td>
                                <img src="{{  asset('storage/image/'.$company->logo )}}">

                                </td>
                                <td>
                                    <a href="{{ route('companies.edit',$company->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_company{{$company->id}}" ><i class="fa fa-trash"></i></button>
                                    <a href="{{ route('companies.show',$company->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="Delete_company{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                        <strong>{{trans('page.Are you Shour deleteing')}}{{$company->name}}</strong>
                                            <form action="{{ route('companies.destroy',$company->id) }}" method="post">
                                            @method('DELETE')
                                            {{ csrf_field() }}

                                                <input type="hidden" name="id" value="">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                                    <button  class="btn btn-danger">{{trans('page.Delete')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('page.Name')}}</th>
                                <th>{{trans('page.Email')}}</th>
                                <th>{{trans('page.Website Url')}}</th>
                                <th>{{trans('page.Logo')}}</th>
                                <th>{{trans('page.Control')}}</th>
                            </tr>
                        </tfoot>
                    </table>
              </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
</div>


@endsection

