@extends('adminlte::page')

@section('title', 'Listar formas de pagamento')

@section('content_header')
    <h1>Listar formas de pagamento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('orderpayments.create')}}" class="btn btn-primary">Nova forma de pagamento</a>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Forma de pagamento</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderPayments as $orderPayment)

                                <tr>
                                    <td>{{$orderPayment->description}}</td>
                                    <td>
                                        <a href="{{route('orderpayments.edit', $orderPayment)}}" class="btn btn-outline-primary"><i class="fa fa-pen"></i></a>
                                        <form action="{{route('orderpayments.destroy', $orderPayment)}}" method="post" style="display: inline">
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
