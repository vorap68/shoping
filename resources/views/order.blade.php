@extends('layouts.master')

@section('title','Оформление заказа')

@section('content')

<h1>{{__('order.approve_order')}}:</h1>
<div class="container">
    <div class="row justify-content-center">
        <p>Общая стоимость заказа: <b> </b></p>
        <form action="#" method="POST">
            @csrf
            <div>
              <div class="container">
                    <div class="form-group">
                        <label for="name" class="control-label col-lg-offset-3 col-lg-2">{{__('order.name')}} </label>
                        <div class="col-lg-4 mx-auto">
                            <input type="text" name="name" id="name" value="" class="form-control">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="phone" class="control-label col-lg-offset-3 col-lg-2">{{__('order.phone')}} </label>
                        <div class="col-lg-4 mx-auto">
                            <input type="text" name="phone" id="phone" value="" class="form-control">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="email" class="control-label col-lg-offset-3 col-lg-2">{{__('order.email')}} </label>
                        <div class="col-lg-4 mx-auto">
                            <input type="text" name="email" id="phemailone" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <br>

                <input type="submit" class="btn btn-success" value={{__('order.approve_order')}}>
            </div>
        </form>
    </div>
</div>

@endsection
