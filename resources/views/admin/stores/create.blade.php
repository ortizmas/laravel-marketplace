@extends('layouts.app')


@section('content')
    <div class="container"
        <h1>Criar Loja</h1>
        <form action="{{route('stores.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nome Loja</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Slug Loja</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">

                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">

                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Celular/Whatsapp</label>
                <input type="text" name="mobil_phone" class="form-control @error('mobil_phone') is-invalid @enderror" value="{{old('mobil_phone')}}">

                @error('mobil_phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Fotos do Produto</label>
                <input type="file" name="logo" class="form-control  @error('logo') is-invalid @enderror">

                @error('logo')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
            </div>
        </form>
    </div>
@endsection