@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach ($categories as $category)
            {{-- <div class="card"> --}}
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="{{ route('category', [$category->code]) }}">
                        <img src="{{ asset('storage/images/categories/thumb/' . $category->image) }}">
                        <h2>{{ $category->lingvo('name') }}</h2>

                    </a>
                    <p>
                        {{ $category->description_ua }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
