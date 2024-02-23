@extends('layouts.admin_master')

@section('title', 'Добавление категорий')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить категорию</h1>
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
                        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <label for="code">Код</label>
                                    <input type="text" name="code" class="form-control" id="code"
                                        placeholder="Введите код">
                                </div>

                                <div class="form-group">
                                    <label for="name_ru">Название</label>
                                    @error('name_ru')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input type="text" name="name_ru" class="form-control" id="name_ru"
                                        placeholder="Название ">
                                </div>
                                <div class="form-group">
                                    <label for="name_ua">Назва</label>
                                    @error('name_ua')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input type="text" name="name_ua" class="form-control" id="name_ua"
                                        placeholder="Назва ">
                                </div>
                                <div class="form-group">
                                    <label for="description_ru">Описание</label>
                                    @error('description_ru')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input type="text"  name="description_ru" class="form-control" id="description_ru"
                                        placeholder="Описание ">
                                </div>
                                <div class="form-group">
                                    <label for="description_ua">Опис</label>
                                    @error('description_ua')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input type="text"  name="description_ua"class="form-control" id="description_ua"
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
