@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Моделирование</li>
    </ol>
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Процесс моделирования процесса проектирования</h5>
                    <form method="post" href="{{ url('/usp/model') }}">
                    <div class="form-group row">

                            <label for="inputEmail3" class="col-sm-2 form-control-label">Защищаемые объекты</label>
                            <select multiple class="form-control" id="exampleSelect2" name="object[]">
                                    @foreach($datas as $data)
                                        <option value="{{$data->id}}">{{ $data->sName }}</option>
                                    @endforeach
                            </select>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">Сохранить</button>


                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection