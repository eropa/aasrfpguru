@extends('upanel.app')

@section('headURL')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li class="breadcrumb-item active" aria-current="page">Список источников угроз</li>
        <li class="breadcrumb-item active" aria-current="page">Стойкость угрозам</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" href="#">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 form-control-label">Название</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3"
                                       placeholder="Название барьера защиты" name="sName"
                                       @if ($id > 0) value="{{ $datas->sName }}" @endif >
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Угроза </th>
                                <th scope="col">Стойкость</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($threatsList  as $data)
                                <tr>
                                    <td>
                                        {{ $data->NameTreats }}
                                    </td>
                                    <td>
                                        <?php
                                            $prochent=0.00;
                                            foreach($stoicostList as $elementList ){
                                                if( ($elementList->idSecurity && $id)&&
                                                    ($elementList->idTreats && $data->id)){
                                                        $prochent=$elementList->StoukostP;
                                                }
                                            }
                                        ?>

                                        <input class="form-control" type="text" value="{{$prochent}}" id="example-text-input">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_idRecord" value="{{ $id }}">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection