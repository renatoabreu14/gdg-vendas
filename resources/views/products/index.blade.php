@extends('adminlte::page')

@section('title', 'Listagem de Produtos')

@section('content_header')
    <h1>Listagem de Produtos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <a href="{{route('products.create')}}" class="btn btn-primary">Novo produto</a>
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Imagem</th>
                            <th>-</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <img src="{{url("storage/{$product->image}")}}" alt="{{$product->name}}" style="max-width: 100px">
                                </td>

                                <td>
                                    <a href="{{route('products.show', $product)}}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('products.edit', $product)}}" class="btn btn-outline-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{route('products.destroy', $product)}}" method="post" style="display: inline">
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

                <div class="card-footer">
                    {!! $products->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@stop

{{--@foreach($customers as $customer)
    {{$customer->name}}
@endforeach--}}
