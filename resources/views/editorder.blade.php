@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                @if(Auth::user()->role == 2)
                <div class="card-header">{{ __('Редактирование данных заявки') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <form method="post" action="{{ route('updateSubmitorder', $Cart->id)}}" enctype="multipart/form-data">@csrf
                    <p class="mb-0">Номер заявки</p><input id="id_basket" value="{{$Cart->id_basket}}" type="text" class="form-control" name="id_basket" placeholder="Номер заявки">
                    <p class="mb-0">Номер пользователя</p><input id="id_user" value="{{$Cart->id_user}}" type="text" class="form-control" name="id_user" placeholder="Номер пользователя">
                    <p class="mb-0">Номер продукта</p><input id="id_product" value="{{$Cart->id_product}}" type="text" class="form-control" name="id_product" placeholder="Номер продукта">
                    <p class="mb-0">Количество</p><input id="count" value="{{$Cart->count}}" type="text" class="form-control" name="count" placeholder="Количество">
                    <p class="mb-0">Статус</p><input id="status" value="{{$Cart->status}}" type="text" class="form-control" name="status" placeholder="Статус">
                    <input type="submit"  class="btn btn-outline-info" value="Подтвердить изменения">
                </form>
            </div>
        </div>           
            @else
            <p>Вы не обладаете правами администратора, поэтому функционал панели заблокирован</p>
            @endif
        </div>
    </div>
</div>
@endsection
