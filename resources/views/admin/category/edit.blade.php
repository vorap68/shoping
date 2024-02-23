@extends('layouts.admin_master')

@section('title', 'Редактирование категории')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование категории: {{ $category['name_ru'] }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('category.update', $category['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <div class="card-body">


                                    <div class="form-group">
                                        <label for="code">Код</label> @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <input type="text" value="{{ $category['code'] }}" name="code" class="form-control" id="code"
                                            placeholder="Введите код">
                                    </div>
                                    <div class="form-group">
                                        <label for="name_ru">Название</label>
                                         @error('name_ru')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <input type="text" value="{{ $category['name_ru'] }}" name="name_ru" class="form-control"
                                            id="name_ru" placeholder="Введите название категории" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name_ua">Назва</label>
                                         @error('name_ua')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <input type="text" value="{{ $category['name_ua'] }}" name="name_ua" class="form-control" id="name_ua"
                                            placeholder="Назва ">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ru">Описание</label>
                                         @error('description_ru')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <input type="text" value="{{ $category['description_ru'] }}" name="description_ru" class="form-control" id="description_ru"
                                            placeholder="Описание ">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_ua">Опис</label>
                                         @error('description_ua')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <input type="text"  value="{{ $category['description_ua'] }}" name="description_ua"class="form-control" id="description_ua"
                                            placeholder="Опис ">
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
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
