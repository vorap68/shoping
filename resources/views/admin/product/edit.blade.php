@extends('layouts.admin_master')

@section('title', 'Редактирование товара')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать товар : {{ $product->name_ru }}</h1>
                    <h1 class="m-0">Категория : {{ $product->category->name_ru }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('product.update',$product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name_ru">Название</label>
                                    <input type="text" name="name_ru" class="form-control" id="name_ru"
                                        placeholder="Название "
                                        value="{{ old('name_ru', isset($product->name_ru) ? $product->name_ru : null) }}">
                                </div>
                                <div class="form-group">
                                    <label for="name_ua">Назва</label>
                                    <input type="text" name="name_ua" class="form-control" id="name_ua"
                                        placeholder="Назва"
                                        value="{{ old('name_ua', isset($product->name_ua) ? $product->name_ua : null) }}">
                                </div>
                                <div class="form-group">
                                    <label for="description_ru">Описание</label>
                                    <div>
                                    <textarea name="description_ru" id="description_ru" cols="72" rows="7"  placeholder="Описание ">
                                        {{ old('description_ru', isset($product->description_ru) ? $product->description_ru : null) }}
                                   </textarea>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="description_ua">Опис</label>
                                    <div>
                                        <textarea name="description_ua" id="description_ua" cols="72" rows="7"  placeholder="Опис ">
                                            {{ old('description_ua', isset($product->description_ua) ? $product->description_ua : null) }}
                                       </textarea>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price"class="form-control" id="price"
                                        placeholder="Цена" value="{{ old('price', isset($product->price) ? $product->price : null) }} ">
                                </div>
                                <div class="form-group">
                                    <label for="count">Количество</label>
                                    <input type="text" name="count"class="form-control" id="count"
                                        placeholder="Количество"  value="{{ old('count', isset($product->count) ? $product->count : null) }}">
                                </div>

                                <div class="form-group">
                                    <label for="name_ua">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                </div>

                               @if(!empty($product->image))
                               <img src="{{ asset('storage/images/products/' .$product->category->code . '/thumb/' . $product->image) }}">
                                   <div class="form-group">
                                    <label for="remove">Удалить картинку</label>
                                    <input type="checkbox" name="remove"class="form-control" id="remove">
                                </div>
                                @endif

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
