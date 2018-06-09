@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список угроз в БД</li>
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
                        <div class="form-group">
                            <label>Последствия реализации угрозы:</label>
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect"
                                    name="posledstvie">
                                <option selected  value="0">......</option>
                                @foreach($dataPosledctvies as $dataPosledctvie)
                                    <option value="{{$dataPosledctvie->id}}">
                                        {{ $dataPosledctvie->NamePosledctvie }}
                                    </option>
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
                    <a class="btn btn-success" href="{{ url('/usp/treatslist/manager/0') }}"
                       role="button">Добавить запись</a>
                    <h5 class="card-title">Список угроз</h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Дата записи</th>
                            <th>Автор</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection