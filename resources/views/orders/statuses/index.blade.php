@extends('adminlte::page')

@section('title', 'Listar situação de venda')

@section('content_header')
    <h1>Listar situação de venda</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('orderstatuses.create')}}" class="btn btn-primary">Nova situação de venda</a>
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Situação de venda</th>
                            <th>-</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderStatuses as $orderStatus)
                            <tr>
                                <td>{{$orderStatus->description}}</td>
                                <td>
                                    <a href="{{route('orderstatuses.edit', $orderStatus)}}" class="btn btn-outline-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{route('orderstatuses.destroy', $orderStatus)}}" method="post" style="display: inline">
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
@endsection

