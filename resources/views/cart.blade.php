@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="t-c">
          <p class="p-20 sma-t">Каталог доступных товаров</p>
        </div>
        @foreach($carts as $cart)
      	<div class="selfcard d-flex plr-40 mb-40">
          <div class="col-xl-8 col-md-6 col-12 pad-20">
            <p class="fw-bold">Название - {{ $cart->Product->name }}.</p>
            <p class="selfcard w-mc"><a href="/cart/plus/{{ $cart->id }}" class="td-n">+</a> {{ $cart->count }} <a href="/cart/minus/{{ $cart->id }}" class="td-n">-</a></p>
            <p>Цена - {{ $cart->Product->price * $cart->count }} рублей.</p>
          </div>
          <div class="col-xl-4 col-md-6 col-12 t-c">
            <img src="img/{{$cart->Product->urlphoto}}" class="ImgCart" alt="">
          </div>
      	</div>
      	@endforeach
      	<a href="" class="btn btn-warning">Сформировать заказ</a>
    </div>
</div>
@endsection

