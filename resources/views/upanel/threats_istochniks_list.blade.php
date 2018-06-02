@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список источников угроз</li>
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
                                Название</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success" href="{{ url('/usp/treatsistochniklist/manager/0') }}"
                       role="button">Добавить запись</a>
                    <h5 class="card-title">Список источников угроз</h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td><a class="btn btn-info" href="#" role="button">Link</a>
                                /
                                <a class="btn btn-danger" href="#" role="button">Удалить</a>
                                </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection