@extends('layouts.master')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Когда отправлен</th>
                <th>Сумма</th>
                <th>Действия</th>
            </tr>
@foreach ($orders_user as $order_user )
<tr>
    <td>{{$order_user->id }}</td>
    <td>{{$order_user->name }}</td>
    <td>{{$order_user->phone }}</td>
    <td>{{$order_user->created_at}}</td>
        <td>{{$order_user->getFullSum()}}</td>
    <td><a href="{{route('person.order.show',$order_user)}}"> Открыть</a></td>
</tr>

    <br>
@endforeach
@endsection
