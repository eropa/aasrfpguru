@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Моделирование (Результат)</li>
    </ol>
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Результат моделирования</h5>
                    {!! $dataObject !!}

                    <br>
                    {!! $dataThreats !!}
                    <br>
                    <b>Результат</b>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Вариант</th>
                            <th scope="col">Барьеры</th>
                            <th scope="col">Стойкость</th>
                            <th scope="col">Затраты</th>
                        </tr>
                        </thead>
                        <tbody>
                            {!! $msgTable !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection