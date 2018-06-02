@extends('upanel.app')

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
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Последствия реализации угрозы:</label>
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect"
                                    name="posledstvie">
                                <option selected  value="0">......</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
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