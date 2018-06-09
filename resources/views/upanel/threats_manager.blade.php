@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список источников угроз</li>
        @if ($id > 0)
            <li class="breadcrumb-item active" aria-current="page">Управление данными "Угроза" (Изменить)</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">Управление данными "Угроза" (Добавление)</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" href="{{ route('managertreats_add_save') }}">
                        @if ($id > 0)
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                                    ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                           placeholder="Номер записи" name="iId" value="{{$id}}">
                                </div>
                            </div>
                        @endif

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 form-control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3"
                                           placeholder="Название угрозы" name="sName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 form-control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleTextarea" rows="3"
                                    name="AboutTreats"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 form-control-label">Источники угрозы</label>
                                <select multiple class="form-control" id="exampleSelect2" name="mIstochnik[]">
                                    @foreach($dataIstochniks as $dataIstochnik)
                                        <option value="{{$dataIstochnik->id}}">{{ $dataIstochnik->NameIstocjnik }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 form-control-label">
                                    Последствия реализации угрозы</label>
                                <select multiple class="form-control" id="exampleSelect2" name="mPosledctive[]">
                                    @foreach($dataPosledctvies as $dataPosledctvie)
                                        <option value="{{$dataPosledctvie->id}}">
                                            {{ $dataPosledctvie->NamePosledctvie }}
                                        </option>
                                    @endforeach
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