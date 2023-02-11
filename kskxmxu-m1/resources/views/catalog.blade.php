@extends('layouts.app')

@section('content')
<section class="catalog">
      <div class="container">
        <div class="row">
          <div class="t-c">
            <p class="p-20 sma-t">Каталог доступных товаров</p>
          </div>
          <div>
            <form method="get" action="/catalog">
              <select name="filter" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="name">По наименованию</option>
                <option value="year">По году</option>
                <option value="price">По цене</option>
              </select>
              <select name="category" class="form-select form-select-sm" aria-label=".form-select-sm example">
                @foreach($Category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
              </select>
              <input type="submit" class="btn btn-warning">
            </form>
          </div>
        </div>
        <div class="row">
          @foreach($Product as $p)
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
                <a href="/catalog/{{$p->id}}" class="card-link c-b">Подробнее</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
@endsection

