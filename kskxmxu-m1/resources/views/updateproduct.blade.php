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
                    <p class="mb-0">Имя</p><input id="name" value="{{$Product->name}}" type="text" class="form-control" name="name" placeholder="Имя">
                    <p class="mb-0">Категория</p><input id="id_cat" value="{{$Product->id_cat}}" type="text" class="form-control" name="id_cat" placeholder="Категории(цифры)">
                    <p class="mb-0">Название картинки товара в папке img</p><input id="urlphoto" value="{{$Product->urlphoto}}" type="text" class="form-control" name="urlphoto" placeholder="Название картинки товара в папке img">
                    <p class="mb-0">Цена</p><input id="price" value="{{$Product->price}}" type="text" class="form-control" name="price" placeholder="Цена">
                    <p class="mb-0">Год</p><input id="year" value="{{$Product->year}}" type="text" class="form-control" name="year" placeholder="Год">
                    <p class="mb-0">Страна</p><input id="country" value="{{$Product->country}}" type="text" class="form-control" name="country" placeholder="Страна">
                    <p class="mb-0">Модель</p><input id="model" value="{{$Product->model}}" type="text" class="form-control" name="model" placeholder="Модель">
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
