@extends('adminlte::page')

@section('title', 'Listagem de Vendas')

@section('content_header')
    <h1>Listagem de Vendas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('orders.create')}}" class="btn btn-primary">Nova venda</a>
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Data da Venda</th>
                            <th>Situação</th>
                            <th>-</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->name}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{date('d/m/Y', strtotime($order->order_date))}}</td>
                                <td>{{$order->orderStatus->description}}</td>
                                <td>
                                    <a href="{{route('orders.show', $order)}}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('orders.edit', $order)}}" class="btn btn-outline-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{route('orders.destroy', $order)}}" method="post" style="display: inline">
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
