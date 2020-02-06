@extends('layouts.front')

@section('content')
<div class="row">
    <div class="col-6">
        @if ($product->photos->count())
        <img class="card-img-top" src="{{ asset('storage/' . $product->photos->first()->image) }}" alt="{{ $product->name }}">
        <div class="row mt-3">
            @foreach ($product->photos as $photo)
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('storage/' . $photo->image) }}">
                </div>
            @endforeach
        </div>
        @else
        <img class="card-img-top" src="{{ asset('assets/img/no-photo.jpg') }}">
        @endif
        
    </div>
    <div class="col-6">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <h3>{{ number_format($product->price, '2', ',', '.') }}</h3>
        <span>{{ $product->store->name }}</span>

        <div class="mt-3">
            <form action="{{ route('cart.add') }}" method="post">
                @csrf
                <input type="text" name="product[name]" value="{{ $product->name}}">
                <input type="text" name="product[price]" value="{{ $product->price}}">
                <input type="text" name="product[slug]" value="{{ $product->slug}}">

                <div class="form-group">
                    <label for="qty">Quantidade</label>
                    <input type="number" name="product[amount]" class="form-control col-2">
                </div>

                <button type="submit" class="btn btn-success">Comprar</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-12">
        <hr>
        <p>{{ $product->body}}</p>
    </div>
</div>
@endsection