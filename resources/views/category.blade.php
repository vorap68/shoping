@extends('layouts.master')
@section('title', 'Категория' . $category->lingvo('name'))

@section('content')
    <h1>
        {{ $category->lingvo('name') }}
    </h1>
    <p>{{ $category->lingvo('description') }} </p>
    <div class="row">
        @foreach ($category->products as $product)
            @include('cards.card')
        @endforeach
    </div>
@endsection
