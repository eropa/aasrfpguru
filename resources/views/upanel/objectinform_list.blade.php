@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список защищаемых объектов</li>
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
                                   aria-describedby="textHelp" placeholder="Введите название"
                                   name="NameFound">
                            <small id="textHelp" class="form-text text-muted">
                                Название угрозы</small>
                        </div>
                        <div class="form-group">
                            <label>Источники угрозы:</label>
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect"
                                    name="istochnuk">
                                <option selected  value="0">......</option>

                            </select>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="{{ url('/usp/objinfolist/manager/0') }}"
                       role="button">Добавить запись</a>
                    <h5 class="card-title">Список защищаемых объектов</h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>
                                        {{ $data->sName }}
                                    </td>
                                    <td>
                                    <td><a class="btn btn-info"
                                           href="{{ url('/usp/objinfolist/manager/'.$data->id)  }}"
                                           role="button">Изменить</a>
                                        /
                                        <a class="btn btn-danger"
                                           href="{{ url('/usp/objinfolist/delete/'.$data->id)  }}"
                                           role="button">Удалить</a></td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection