@extends('adminlte::page')

@section('title', 'Listagem de Clientes')

@section('content_header')
    <h1>Listagem de Clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('customers.create')}}" class="btn btn-primary">Novo cliente</a>
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>E-mail</th>
                            <th>-</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{date('d/m/Y', strtotime($customer->birth_date))}}</td>
                                <td>{{$customer->email}}</td>
                                <td>
                                    <a href="{{route('customers.show', $customer)}}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('customers.edit', $customer)}}" class="btn btn-outline-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{route('customers.destroy', $customer)}}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

{{--@foreach($customers as $customer)
    {{$customer->name}}
@endforeach--}}
