@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h2>Страница товара: {{ $Product->name}}</h2>
      <div class="row p-100">
        <div class="col-xl-6 col-md-6 col-12">
          <img src="/img/{{$Product->urlphoto}}" class="w-100" alt="">
        </div>
        <div class="col-xl-6 col-md-6 col-12 t-right">
          <div>
            <h3>{{ $Product->name }}</h5>
          </div>
          <div>
            <p>Стоимость:{{ $Product->price }} рублей.</p>
            <p>Количество на складе: {{ $Product->count}}.</p>
          </div>
          <div>
            <button class="btn btn-warning">В корзину</button>
          </div>
        </div>
        <div class="row p-60 c-blue">
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

