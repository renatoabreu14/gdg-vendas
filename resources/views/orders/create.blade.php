@extends('adminlte::page')

@section('title', 'Nova venda')

@section('content_header')
    <h1>Nova Venda</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Conteudo-->
                    <form action="{{route('orders.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Cliente">Cliente</label>
                                    <select name="customer_id" id="Cliente" class="form-control">
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Vendedor">Vendedor</label>
                                    <select name="user_id" id="Vendedor" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="DataVenda">Data da venda</label>
                                    <input type="date" name="order_date" id="DataVenda" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Situacao">Situação</label>
                                    <select name="order_status_id" id="Situacao" class="form-control">
                                        @foreach($orderstatuses as $orderstatus)
                                            <option value="{{$orderstatus->id}}">{{$orderstatus->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Pagamento">Pagamento</label>
                                    <select name="order_payment_id" id="Pagamento" class="form-control">
                                        @foreach($orderpayments as $orderpayment)
                                            <option value="{{$orderpayment->id}}">{{$orderpayment->description}}</option>
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
