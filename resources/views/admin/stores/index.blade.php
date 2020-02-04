@extends('layouts.app')


@section('content')
    <div class="container">
        @section('flash')
            @include('flash::message')
        @endsection
        @if($stores)
            <a href="{{route('stores.create')}}" class="btn btn-lg btn-success">Criar Loja</a>
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Loja</th>
                        <th>Total de Produtos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{$store->id}}</td>
                            <td>{{$store->name}}</td>
                            <td>{{$store->products->count()}}</td>
                            <td>
                                <div class="btn-group float-right">
                                    <a href="{{route('stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                                    <form action="{{route('stores.destroy', ['store' => $store->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="pagination">
                {{$stores->links()}}
            </div>
        @endif
    </div>
@endsection