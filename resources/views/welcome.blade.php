@extends('layouts.front')

@section('content')
<div class="row">
    @foreach ($products as $key => $product)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if ($product->photos->count())
                <img class="card-img-top" src="{{ asset('storage/' . $product->photos->first()->image) }}" alt="{{ $product->name }}">
                @else
                <img class="card-img-top" src="{{ asset('assets/img/no-photo.jpg') }}">
                @endif
                <div class="card-body">
                    <h2 class="card-text">{{$product->name}}</h2>
                    <p>{{$product->description}}</p>
                    <h3>{{ number_format($product->price, '2', ',', '.') }}</h3>
                </div>

                <div class="card-footer">
                    <a href="{{ route('product.single', ['slug'=>$product->slug]) }}" class="btn btn-info">Comprar</a>
                </div>
            </div>
        </div>
        @if (($key + 1) % 3 == 0)
            </div>
            <div class="row">
        @endif
    @endforeach
</div>
@endsection