@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список барьеров защиты в БД</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Фильтр</h5>
                    <form>
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" id="exampleInputName"
                                   aria-describedby="textHelp" placeholder="Введите название угрозы"
                                   name="NameFound">
                            <small id="textHelp" class="form-text text-muted">
                                Название угрозы</small>
                        </div>
                        <div class="form-group">
                            <label>Источники угрозы:</label>
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect"
                                    name="istochnuk">
                                <option selected  value="0">......</option>
                                @foreach($dataIstochniks as $dataIstochnik)
                                    <option value="{{$dataIstochnik->id}}">{{ $dataIstochnik->NameIstocjnik }}</option>
                                @endforeach
                            </select>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="{{ url('/usp/scuriteblist/manager/0') }}"
                       role="button">Добавить запись</a>
                    <h5 class="card-title">Список барьеров защиты</h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataSecurites as $dataSecurite)
                            <tr>
                                <td>{{ $dataSecurite->sName }}</td>
                                <td><a class="btn btn-warning"
                                       href="{{ url('/#'.$dataSecurite->id)  }}"
                                       role="button">Стойкость</a>
                                    /
                                    <a class="btn btn-info"
                                       href="{{ url('/usp/scuriteblist/manager/'.$dataSecurite->id)  }}"
                                       role="button">Изменить</a>
                                    /
                                    <a class="btn btn-danger"
                                       href="{{ url('/usp/scuriteblist/delete/'.$dataSecurite->id)  }}"
                                       role="button">Удалить</a></td>
                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection