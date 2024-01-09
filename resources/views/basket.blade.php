@extends('layouts.master')
@section('title', 'Корзина')
@section('content')

    <h1>{{ __('main.Basket') }}</h1>
  <div class="panel">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{__('basket.name')}}</th>
                    <th>{{__('basket.count')}}</th>
                    <th>{{__('basket.price')}}</th>
                    <th>{{__('basket.cost')}}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr class="align-middle">
                        <td> {{ $product->lingvo('name') }}</td>
                        <td>
                            <div class="btn-group form-inline">

                                <form action="{{ route('basket.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">+</button>
                                    @csrf
                                </form>
                                <span class="mx-2 my-2">{{ $product->pivot->count }}</span>
                                <form action="{{ route('basket.remove', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">-</button>
                                    @csrf


                                </form>
                            </div>
                        </td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->price * $product->pivot->count }}</td>
                        <td><form action="{{route('basket.delete',$product)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="{{__('basket.delete')}}">
                        </form></td>
                    </tr>
                @endforeach

                <tr>
                    <td>{{__('basket.all_cost')}}</td>
                    <td>{{ $order->getFullSum() }}</td>
                </tr>
            </tbody>
        </table>

        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('basket.place') }}">{{__('basket.create_order')}}</a>
        </div>
    @endsection
