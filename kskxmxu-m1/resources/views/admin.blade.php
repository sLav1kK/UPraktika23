@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                @if(Auth::user()->role == 2)
                <div class="card-header">{{ __('Админ панель') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <h4>Добавление товаров</h4>
                <form method="post" action="/admin" enctype="multipart/form-data">@csrf
                    <input id="name" type="text" class="form-control" name="name" placeholder="Имя">
                    <input id="id_cat" type="text" class="form-control" name="id_cat" placeholder="Категории(цифры)">
                    <input id="urlphoto" type="text" class="form-control" name="urlphoto" placeholder="Название картинки товара в папке img">
                    <input id="price" type="text" class="form-control" name="price" placeholder="Цена">
                    <input id="year" type="text" class="form-control" name="year" placeholder="Год">
                    <input id="country" type="text" class="form-control" name="country" placeholder="Страна">
                    <input id="model" type="text" class="form-control" name="model" placeholder="Модель">
                    <input id="name" type="submit"  class="btn btn-outline-info" value="Создать товар">
                </form>
            </div>
            <div class="col-xl-6 col-md-6 col-12 t-c">
                <h4>Список существующих категорий:</h4>
                @foreach($Category as $c)
                <p>{{ $c->id }} - {{ $c->name }},</p>
                @endforeach
            </div>
        </div>
        <div class="row">
            <h4>Все товары</h4>
            @foreach($Products as $p)
              <div class="col-xl-3 col-md-4 col-12 p-20">
                <div class="card" style="width: 18rem;">
                  <img src="img/{{$p->urlphoto}}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <p class="card-text">Модель: {{ $p->model }}</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Страна: {{ $p->country }}</li>
                    <li class="list-group-item">Год: {{ $p->year }}</li>
                    <li class="list-group-item">Стоимость: {{ $p->price }}</li>
                  </ul>
                  <div class="card-body">
                    <a href="/admin/edit/{{$p->id}}" class="card-link c-b">Подробнее</a>
                  </div>
                </div>
              </div>
            @endforeach
        </div>    
            
            @else
            <p>Вы не обладаете правами администратора, поэтому функционал панели заблокирован</p>
            @endif
        </div>
    </div>
</div>
@endsection
