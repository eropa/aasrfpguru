@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список источников угроз</li>
        @if ($id > 0)
            <li class="breadcrumb-item active" aria-current="page">Управление данными "Защищаемы объекты"
                (Изменить)</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">Управление данными "Защищащемы объекты"
                (Добавление)</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" href="{{ route('add_update_objectinfo') }}">
                        @if ($id > 0)
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                                    ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                           placeholder="Номер записи" name="iId" value="{{$id}}" readonly>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 form-control-label">Название</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3"
                                       placeholder="Название защищаемого объекта" name="sName"
                                       @if ($id > 0) value="{{ $datas->sName }}" @endif >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 form-control-label">Описание</label>
                            <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleTextarea" rows="5"
                                              name="AboutText">@if ($id > 0){{ $datas->sAbout }}@endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 form-control-label">Источники угрозы</label>
                            <select multiple class="form-control" id="exampleSelect2" name="mIstochnik[]">
                                @if ($id > 0)
                                    @foreach($dataIstochniks as $dataIstochnik)
                                        <option value="{{$dataIstochnik->id}}"
                                                @if(in_array($dataIstochnik->id,$SelectIsctochnik))
                                                selected
                                                @endif

                                        >{{ $dataIstochnik->NameIstocjnik }}</option>
                                    @endforeach
                                @else
                                    @foreach($dataIstochniks as $dataIstochnik)
                                        <option value="{{$dataIstochnik->id}}">{{ $dataIstochnik->NameIstocjnik }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

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