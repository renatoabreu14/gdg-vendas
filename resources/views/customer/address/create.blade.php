@extends('adminlte::page')

@section('title', 'Cadastro de Endereços')

@section('content_header')
    <h1>Cadastro de Endereço</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('addresses.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Endereco">Endereço</label>
                                    <input type="text" class="form-control" id="Endereco" placeholder="Entre com o endereço" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Numero">Número</label>
                                    <input type="text" name="number" id="Numero" class="form-control" placeholder="Entre com o número">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" name="adjunct" id="complemento" class="form-control" placeholder="Entre com o complemento do endereço" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="setor">Setor</label>
                                        <input type="text" name="district" id="setor" class="form-control" placeholder="Entre com o setor" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <input placeholder="Entre com a cidade"  type="text" name="city" id="cidade" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('customers.show', $customer)}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
