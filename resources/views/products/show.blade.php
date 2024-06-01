@extends('adminlte::page')

@section('title', 'Detalhes de Produtos')

@section('content_header')
    <h1>Detalhes de Produtos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <!--Conteudo-->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input disabled value="{{ $product->name }}" type="text" class="form-control" id="Name" placeholder="Enter name" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <input disabled value="{{ $product->description }}" type="text" class="form-control" id="Description" placeholder="Enter description" name="description">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="price_buy">price_buy</label>
                                    <input disabled value="{{ $product->price_buy }}" type="number" step="0.01" class="form-control" id="price_buy" placeholder="Enter price_buy" name="price_buy">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="price_sell">price_sell</label>
                                    <input disabled value="{{ $product->price_sell }}" type="number" step="0.01" class="form-control" id="price_sell" placeholder="Enter price_sell" name="price_sell">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stock">stock</label>
                                    <input disabled value="{{ $product->stock }}" type="number" class="form-control" id="stock" placeholder="Enter stock" name="stock">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <a href="{{route('products.index')}}" class="btn btn-default">Voltar</a>
                        </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card card-widget">


                <div class="card-body">
                    <img class="img-fluid pad" src="{{url("storage/{$product->image}")}}" alt="Photo">

                </div>


            </div>

        </div>
    </div>
@stop
