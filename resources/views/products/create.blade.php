@extends('adminlte::page')

@section('title', 'Cadastro de Produtos')

@section('content_header')
    <h1>Cadastro de Produtos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            @if( $errors->any() )
                <div class="alert alert-danger col-12">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            <div class="card">
                <div class="card-body">
                    <!--Conteudo-->
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter name" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <input type="text" class="form-control" id="Description" placeholder="Enter description" name="description">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="price_buy">price_buy</label>
                                    <input type="number" step="0.01" class="form-control" id="price_buy" placeholder="Enter price_buy" name="price_buy">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="price_sell">price_sell</label>
                                    <input type="number" step="0.01" class="form-control" id="price_sell" placeholder="Enter price_sell" name="price_sell">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stock">stock</label>
                                    <input type="number" class="form-control" id="stock" placeholder="Enter stock" name="stock">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="image">Imagem</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <input type="submit" value="Salvar" class="btn btn-success">&nbsp;&nbsp;
                            <a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
