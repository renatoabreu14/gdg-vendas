@extends('adminlte::page')

@section('title', 'Nova forma de pagamento')

@section('content_header')
    <h1>Nova forma de pagamento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('orderpayments.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Descricao">Descrição</label>
                                    <input type="text" class="form-control" id="Descricao" placeholder="Enter name" name="description">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('orderpayments.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
