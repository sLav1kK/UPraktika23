@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div>
        <p class="p-20 sma-t">Страница товара: {{ $Product->name}}</p>
      </div>
      <div class="row p-100 selfcard">
        <div class="col-xl-6 col-md-6 col-12">
          <img src="/img/{{$Product->urlphoto}}" class="w-100" alt="">
        </div>
        <div class="col-xl-6 col-md-6 col-12 t-right pad-20">
          <div>
            <p class="sma-t-2">{{ $Product->name }}</p>
          </div>
          <div class="selfcard-body pad-20">
            <p>Стоимость:{{ $Product->price }} рублей.</p>
            <p>Количество на складе: {{ $Product->count}}.</p>
            @if(Auth::guest() == 0)
            <a href="/cart/add/{{$Product->id}}" class="btn btn-warning">В корзину</a>
            @endif
            <a href="{{$Product->id}}/updateproduct" ><button class="btn btn-primary">Редактировать</button></a>
            <a href="{{$Product->id}}/deleteproduct" ><button class="btn btn-danger">Удалить</button></a>
          </div>
        </div>
      </div>
      <div class="row mtb-30 c-blue selfcard pad-20">
        <h3>Характеристики товара:</h3>
        <div>
          <p>Страна-производитель: {{$Product->country}}</p>
          <p>Год выпуска: {{$Product->year}}</p>
          <p>Модель: {{$Product->model}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

