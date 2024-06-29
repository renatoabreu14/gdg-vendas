@extends('adminlte::page')

@section('title', 'Alterar Venda')

@section('content_header')
    <h1>Alterar Venda</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Conteudo-->
                    <form action="{{route('orders.update', $order)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Cliente">Cliente</label>
                                    <select name="customer_id" id="Cliente" class="form-control">
                                        @foreach($customers as $customer)
                                            @if($order->customer->name == $customer->name)
                                                <option value="{{$customer->id}}" selected>{{$customer->name}}</option>
                                            @else
                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Vendedor">Vendedor</label>
                                    <select name="user_id" id="Vendedor" class="form-control">
                                        @foreach($users as $user)
                                            @if($order->user->name == $user->name)
                                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="DataVenda">Data da venda</label>
                                    <input type="date" name="order_date" id="DataVenda" class="form-control" value="{{$order->order_date}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Situacao">Situação</label>
                                    <select name="order_status_id" id="Situacao" class="form-control">
                                        @foreach($orderstatuses as $orderstatus)
                                            @if($order->orderStatus->description == $orderstatus->description)
                                                <option value="{{$orderstatus->id}}" selected>{{$orderstatus->description}}</option>
                                            @else
                                                <option value="{{$orderstatus->id}}">{{$orderstatus->description}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Pagamento">Pagamento</label>
                                    <select name="order_payment_id" id="Pagamento" class="form-control">
                                        @foreach($orderpayments as $orderpayment)
                                            @if($order->orderPayment->description == $orderpayment->description)
                                                <option value="{{$orderpayment->id}}" selected>{{$orderpayment->description}}</option>
                                            @else
                                                <option value="{{$orderpayment->id}}">{{$orderpayment->description}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('orders.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
