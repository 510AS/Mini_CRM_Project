@extends('layouts.master_layout')
@section('PageTitle')
{{trans('page.All Employers')}}
@endsection
@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{trans('page.All Employers')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('page.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('page.All Employers')}}</li>
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
                                <a href="{{ route('employees.create')}}" class="btn btn-secondary"> {{trans('page.Add Employer')}}</a>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('page.Firest Name')}}</th>
                                <th>{{trans('page.Laste Name')}}</th>
                                <th>{{trans('page.Email')}}</th>
                                <th>{{trans('page.Phone Numper')}}</th>
                                <th>{{trans('page.Company')}}</th>
                                <th>{{trans('page.Linkedin URL')}}</th>
                                <th>{{trans('page.Control')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i =0
                            @endphp
                        @foreach ($contact_Persone as $contact )
                            <tr>
                                <td> {{++$i}} </td>
                                <td> {{$contact->first_name}} </td>
                                <td> {{$contact->last_name}} </td>
                                <td> {{$contact->email}} </td>
                                <td> {{$contact->phone}} </td>
                                <td> {{$contact->Company->name}} </td>
                                <td> {{$contact->linkedin_url}} </td>
                                <td>
                                    <a href="{{ route('employees.edit',$contact->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_contact{{$contact->id}}" ><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="Delete_contact{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                        <strong>{{trans('page.Are you Shour deleteing')}}( {{$contact->first_name}} )</strong>
                                            <form action="{{ route('employees.destroy',$contact->id) }}" method="post">
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
                                <th>{{trans('page.Firest Name')}}</th>
                                <th>{{trans('page.Laste Name')}}</th>
                                <th>{{trans('page.Email')}}</th>
                                <th>{{trans('page.Phone Numper')}}</th>
                                <th>{{trans('page.Company')}}</th>
                                <th>{{trans('page.Linkedin URL')}}</th>
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

