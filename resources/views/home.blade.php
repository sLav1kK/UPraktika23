@extends('layouts.app')

@section('content')
<!--  -->

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
                    @foreach($Order as $or)
                    <option value="{{ $or->id }}">Заявка - {{ $or->id }}</option>
                    @endforeach
                  </select>
                  <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="{{ $or->status }}">Статус - {{ $or->status }}</option>
                  </select>
                  <input type="submit" class="btn btn-warning">
                </form>
                
                
                @foreach($orderItem as $key=>$elemOrderItem)
                    @if($orderItem[$key]['id_order'] != $prev_id)
                    <p>Заявка №{{$orderItem[$key]['id_order']}}</p>
                        

                    @endif
                    <div class="selfcard d-flex plr-40 mb-40">
                            <div class="col-xl-8 col-md-6 col-12 pad-20">
                                <p class="fw-bold">Название - {{ $orderItem[$key]['name'] }}.</p>
                                <p>Цена - {{ $orderItem[$key]['price'] }} рублей.</p>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 t-c">
                                <img src="" class="ImgCart" alt="">
                            </div>
                        </div> 
                    <div class="d-none">{{ $prev_id = $orderItem[$key]['id'] }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div> 
@endsection
