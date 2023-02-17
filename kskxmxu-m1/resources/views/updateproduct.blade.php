@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                @if(Auth::user()->role == 2)
                <div class="card-header">{{ __('Редактирование данных товара') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <form method="post" action="{{ route('updateSubmitproduct', $Product->id)}}" enctype="multipart/form-data">@csrf
                    <input id="name" value="{{$Product->name}}" type="text" class="form-control" name="name" placeholder="Имя">
                    <input id="id_cat" value="{{$Product->id_cat}}" type="text" class="form-control" name="id_cat" placeholder="Категории(цифры)">
                    <input id="urlphoto" value="{{$Product->urlphoto}}" type="text" class="form-control" name="urlphoto" placeholder="Название картинки товара в папке img">
                    <input id="price" value="{{$Product->price}}" type="text" class="form-control" name="price" placeholder="Цена">
                    <input id="year" value="{{$Product->year}}" type="text" class="form-control" name="year" placeholder="Год">
                    <input id="country" value="{{$Product->country}}" type="text" class="form-control" name="country" placeholder="Страна">
                    <input id="model" value="{{$Product->model}}" type="text" class="form-control" name="model" placeholder="Модель">
                    <input type="submit"  class="btn btn-outline-info" value="Создать товар">
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
