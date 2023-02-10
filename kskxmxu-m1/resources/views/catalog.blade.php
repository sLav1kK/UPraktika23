@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h2>Каталог доступных товаров</h2>
      <div class="row">
        <form method="get" action="/catalog">
          <select name="filter">
            <option value="year">По году(от новых)</option>
            <option value="name">По наименованию</option>
            <option value="price">По цене(от дорогих)</option>
          </select>
          <select name="category">
            @foreach($Category as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
          </select>
          <input type="submit" name="button" value="Фильтр">
        </form>
      </div>
      <div class="row OneProduct">
        @foreach($Product as $p)
        <div class="col-xl-4 col-md-6 col-12 p-25">
          <img src="img/{{$p->urlphoto}}" alt="">
          <h5>{{ $p->name }}</h5>
          <p>Стоимость:{{ $p->price }} рублей.</p>
          <a href="/catalog/{{$p->id}}">Подробнее</a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="row justify-content-center">
        
    </div>
</div>
@endsection

