@extends('layouts.master')

@section('content')
    <h1>{{ $product->lingvo('name') }}</h1>
    <img src="{{ asset('storage/images/products/' . $product->category->code . '/' . $product->image) }}" height="240px">
    <p>{{ $product->lingvo('description') }}</p>
    <form action="#" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary" role="button">В корзину</button>
    </form>
@endsection
