@extends('adminlte::page')

@section('title', 'Alteração de Endereços')

@section('content_header')
    <h1>Alteração de Endereço</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('addresses.update', $address)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="customer_id" value="{{$address->customer->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Endereco">Endereço</label>
                                    <input type="text" class="form-control" id="Endereco" placeholder="Entre com o endereço" name="address" value="{{$address->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Numero">Número</label>
                                    <input type="text" name="number" id="Numero" class="form-control" placeholder="Entre com o número" value="{{$address->number}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" name="adjunct" id="complemento" class="form-control" placeholder="Entre com o complemento do endereço" value="{{$address->adjunct}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="setor">Setor</label>
                                        <input type="text" name="district" id="setor" class="form-control" placeholder="Entre com o setor" value="{{$address->district}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <input placeholder="Entre com a cidade"  type="text" name="city" id="cidade" class="form-control" value="{{$address->city}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('customers.show', $address->customer)}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
