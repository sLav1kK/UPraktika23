@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    <p>Имя: {{ Auth::user()->name }}</p>
                    <p>Фамилия: {{ Auth::user()->surname }}</p>
                    <p>Отчество: {{ Auth::user()->patronymic }}
                        @if(Auth::user()->patronymic == 0) Отсутствует 
                        @endif
                    </p>
                    <p>Почта: {{ Auth::user()->email }}</p>
                    <div class="p-50">
                        <p>Открыть корзину с заказами</p>
                        <a class="btn btn-outline-info mb-20" href="{{ route('cart') }}">Корзина</a>
                        @if(Auth::user()->role == 2)
                            <p>Вам открыт доступ к админ панели</p>
                            <a href="/admin" class="btn btn-outline-info">Вход</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 col-12">
            <div>
                <div>
                    <p class="p-20 sma-t">Все заявки на покупку</p>
                </div>
                <form method="get" action="/home">
                  <select name="filter" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach($Carts as $c)
                    <option value="{{ $c->id_basket }}">Номер заказа - {{ $c->id_basket }}</option>
                    @endforeach
                  </select>
                  <input type="submit" class="btn btn-warning">
                </form>
                @foreach($Carts as $ca)
                  <div class="col-xl-12 col-md-12 col-12 p-20">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body d-flex t-c cartdiv">
                        <h5 class="card-title col-xl-3 col-md-3 col-12">{{ $ca->product->name }}</h5>
                        <p class="card-text col-xl-3 col-md-3 col-12">{{ $ca->product->price }}</p>
                        <img src="img/{{$ca->Product->urlphoto}}" class="ImgCart col-xl col-md-3 col-12" alt="...">
                        <a href="/home/deleteorder/{{ $ca->id }}" class="col-xl-3 col-md-3 col-12"><button class="btn btn-danger">Удалить</button></a>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
