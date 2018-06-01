@extends('upanel.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Статистика</h5>
                    <p class="card-text">Количество пользователей-3</p>
                    <p class="card-text">БД угроз-122(22)</p>
                    <p class="card-text">БД баръеров-92(2)</p>
                    <p class="card-text">БД защищаемых объектов-3</p>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Описание сайта</h5>
                    <p class="card-text">Тут описания проекта</p>
                    <a href="https://github.com/eropa/aasrfpgu_ru" class="btn btn-primary">Go github</a>
                </div>
            </div>
        </div>
    </div>
@endsection