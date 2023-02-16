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
                <p>Заявки на покупку</p>
                <form method="get" action="/home">
                  <select name="filter" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach($Carts as $c)
                    <option value="{{ $c->id_basket }}">Номер заказа - {{ $c->id_basket }}</option>
                    @endforeach
                  </select>
                  <input type="submit" class="btn btn-warning">
                </form>
                @foreach($Carts as $ca)
                  <div class="col-xl-3 col-md-4 col-12 p-20">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $ca->product->name }}</h5>
                        <p class="card-text">{{ $ca->product->price }}</p>
                        <a href="/home/deleteorder" ><button class="btn btn-danger">Удалить</button></a>
                      </div>
                    </div>
                  </div>
                  @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
