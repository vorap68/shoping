@extends('layouts.admin_master')

@section('title', 'Добавление товара')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить товар</h1>
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
                        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="input-group row">
                                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                                    <div class="col-sm-6">

                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"

                                                >{{ $category->name_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name_ru">Название</label>
                                    <input type="text" name="name_ru" class="form-control" id="name_ru"
                                        placeholder="Название ">
                                </div>
                                <div class="form-group">
                                    <label for="name_ua">Назва</label>
                                    <input type="text" name="name_ua" class="form-control" id="name_ua"
                                        placeholder="Назва ">
                                </div>
                                <div class="form-group">
                                    <label for="description_ru">Описание</label>
                                    <input type="text"  name="description_ru" class="form-control" id="description_ru"
                                        placeholder="Описание ">
                                </div>
                                <div class="form-group">
                                    <label for="description_ua">Опис</label>
                                    <input type="text"  name="description_ua"class="form-control" id="description_ua"
                                        placeholder="Опис ">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text"  name="price"class="form-control" id="price"
                                        placeholder="Цена ">
                                </div>
                                <div class="form-group">
                                    <label for="count">Количество</label>
                                    <input type="text"  name="count"class="form-control" id="count"
                                        placeholder="Количество ">
                                </div>

                                <div class="form-group">
                                    <label for="name_ua">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image"  class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                </div>

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
