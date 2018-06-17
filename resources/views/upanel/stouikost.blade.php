@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список барьеров защиты в БД</li>
        @if ($id > 0)
            <li class="breadcrumb-item active" aria-current="page">Стойкость (Изменить)</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">Стойкость (Добавление)</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" href="#">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_idRecord" value="{{ $id }}">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @if ($id == 0)
                            <button type="submit" class="btn btn-primary">Создать</button>
                        @else
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection