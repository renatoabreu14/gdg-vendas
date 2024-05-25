@extends('adminlte::page')

@section('title', 'Visualização de Cliente')

@section('content_header')
    <h1>Visualização de Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input disabled type="text" class="form-control" id="Name" placeholder="Enter name" name="name" value="{{$customer->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Sexo">Sexo</label>
                                <select  disabled name="gender" id="Sexo" class="form-control">
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
                                <input disabled type="date" name="birth_date" id="birth_date" class="form-control" value="{{$customer->birth_date}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input disabled placeholder="Entre com seu cpf"  type="text" name="cpf" id="cpf" class="form-control" value="{{$customer->cpf}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone_number">Telefone</label>
                                <input disabled placeholder="Entre com seu telefone"  type="text" name="phone_number" id="phone_number" class="form-control" value="{{$customer->phone_number}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input disabled type="email" class="form-control" id="email" placeholder="Entre com seu email" name="email" value="{{$customer->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a href="{{route('customers.index')}}" class="btn btn-danger">Voltar</a>
                    </div>
                    <!--Endereços-->
                    <div class="col12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Endereços</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{route('addresses.create', $customer)}}" class="btn btn-primary">Adicionar endereço</a>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Endereço</th>
                                        <th>Número</th>
                                        <th>Complemento</th>
                                        <th>Setor</th>
                                        <th>Cidade</th>
                                        <th>-</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customer->addresses as $address)
                                        <tr>
                                            <td>{{$address->address}}</td>
                                            <td>{{$address->number}}</td>
                                            <td>{{$address->adjunct}}</td>
                                            <td>{{$address->district}}</td>
                                            <td>{{$address->city}}</td>
                                            <td>
                                                <a href="{{route('addresses.edit', $address)}}" class="btn btn-outline-primary"><i class="fa fa-pen"></i></a>
                                                <form action="{{route('addresses.destroy', $address)}}" method="post" style="display: inline">
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
            </div>
        </div>
    </div>

@stop
