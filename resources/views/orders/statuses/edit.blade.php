@extends('adminlte::page')

@section('title', 'Alterar situação de venda')

@section('content_header')
    <h1>Alterar situação de venda</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('orderstatuses.update', $orderStatus)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Descricao">Descrição</label>
                                    <input type="text" class="form-control" id="Descricao" placeholder="Entre com a descrição" name="description" value="{{$orderStatus->description}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('orderstatuses.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


