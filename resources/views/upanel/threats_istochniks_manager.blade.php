@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список источников угроз</li>
        <li class="breadcrumb-item active" aria-current="page">Управление данными источников угроз (Добавление)</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" href="{{ route('manageristochnik_add_save') }}">
                        @if ($id > 0)
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                                ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                       placeholder="Номер записи" value="{{$id}}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                                Название</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                       placeholder="Название">
                            </div>
                        </div>
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