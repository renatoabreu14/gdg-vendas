@extends('adminlte::page')

@section('title', 'Visualizar Venda')

@section('content_header')
    <h1>Visualizar Venda</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Conteudo-->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Cliente">Cliente</label>
                                    <input type="text" class="form-control" value="{{$order->customer->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Vendedor">Vendedor</label>
                                    <input type="text" class="form-control" value="{{$order->user->name}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="DataVenda">Data da venda</label>
                                    <input type="date" name="order_date" id="DataVenda" class="form-control" value="{{$order->order_date}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Situacao">Situação</label>
                                    <input type="text" class="form-control" value="{{$order->orderStatus->description}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Pagamento">Pagamento</label>
                                    <input type="text" class="form-control" value="{{$order->orderPayment->description}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a href="{{route('orders.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    <!--Itens-->
                    <div class="col12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Itens</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('orderitems.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="product_id" id="" class="form-control">
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <input type="number" name="quantity" id="" class="form-control" min="1" value="1" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Adicionar item</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitário</th>
                                        <th>Total do Item</th>
                                        <th>-</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $itemNumber = 0;
                                        $totalVenda = 0;
                                    @endphp
                                    @foreach($order->items as $orderItem)
                                        @php
                                            $itemNumber++;
                                            $totalItem = 0;
                                            $totalItem = ($orderItem->pivot->quantity * $orderItem->pivot->price_sell);
                                            $totalVenda += $totalItem;
                                        @endphp
                                        <tr>
                                            <td>{{$itemNumber}}</td>
                                            <td>{{$orderItem->name}}</td>
                                            <td>{{$orderItem->pivot->quantity}}</td>
                                            <td>R$ {{number_format($orderItem->pivot->price_sell, 2, ',', '.')}}</td>
                                            <td>R$ {{number_format($totalItem, 2, ',', '.')}}</td>
                                            <td>
                                                <form action="{{route('orderitems.destroy', $orderItem->pivot->id)}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4"><b>Total da Venda</b></td>
                                        <td>R$ {{number_format($totalVenda, 2, ',', '.')}}</td>
                                        <td></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
