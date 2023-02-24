@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    <p><strong>Имя:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Фамилия:</strong> {{ Auth::user()->surname }}</p>
                    <p><strong>Отчество:</strong> {{ Auth::user()->patronymic }}
                        @if(Auth::user()->patronymic == 0) Отсутствует 
                        @endif
                    </p>
                    <p><strong>Почта:</strong> {{ Auth::user()->email }}</p>
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
                    <h2 class="p-20 sma-t">Все заявки на покупку</h2>
                </div>
                         
                @foreach($orderItem as $key=>$elemOrderItem)
                    @if($orderItem[$key]['id_order'] != $prev_id)
                    <hr>
                    <p><strong>Заявка</strong> №{{$orderItem[$key]['id_order']}}</p>
                    <p><strong>Статус -</strong> {{$orderItem[$key]['status']}}</p>
                    <p><strong>Общая сумма -</strong> {{$orderItem[$key]['price']}} рублей</p>
                        @if($orderItem[$key]['status'] == 'Новая')
                        <a href="/home/deleteorder/{{ $orderItem[$key]['id'] }}" class="btn btn-danger mb-20">Удалить заявку</a>
                        @endif   
                    @endif
                    <div class="selfcard d-flex mb-20 t-c">
                        <div class="col-xl-12 col-md-12 col-12 pad-20 d-flex">
                            <p class="fw-bold col-xl-6 col-md-6 col">Название - {{ $orderItem[$key]['name'] }}.</p>
                            <p class="col-xl-6 col-md-6 col"><strong>Количество - </strong>{{ $orderItem[$key]['quantity'] }} шт.</p>
                        </div>
                    </div> 
                    <div class="d-none">{{ $prev_id = $orderItem[$key]['id'] }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div> 
@endsection