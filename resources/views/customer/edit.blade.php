@extends('adminlte::page')

@section('title', 'Alteração de Clientes')

@section('content_header')
    <h1>Alteração de Clientes</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Conteudo-->
                    <form action="{{route('customers.update', $customer)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter name" name="name" value="{{$customer->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Sexo">Sexo</label>
                                    <select name="gender" id="Sexo" class="form-control">
                                        @if($customer->gender == "F")
                                            <option value="F" selected>Feminino</option>
                                            <option value="M">Masculino</option>
                                        @else
                                            <option value="F">Feminino</option>
                                            <option value="M" selected>Masculino</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="birth_date">Data de Nascimento</label>
                                    <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{$customer->birth_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input placeholder="Entre com seu cpf"  type="text" name="cpf" id="cpf" class="form-control" value="{{$customer->cpf}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_number">Telefone</label>
                                    <input placeholder="Entre com seu telefone"  type="text" name="phone_number" id="phone_number" class="form-control" value="{{$customer->phone_number}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" placeholder="Entre com seu email" name="email" value="{{$customer->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('customers.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
