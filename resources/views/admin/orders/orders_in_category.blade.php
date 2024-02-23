@extends('layouts.admin_master')
@section('title','Заказы в категории')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказы в категории: {{$category->name_ru}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <!-- Main content -->

 <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>Дата заказа</th>
                            <th>Сумма</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders_category as $order)
                      <tr>
                                <td>
                                    {{$order->order_id}}
                                </td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    {{$order->summma_in_category}} : {{$order->code}}
                                  </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
    </div>
</section>
@endsection

