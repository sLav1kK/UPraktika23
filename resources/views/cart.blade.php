@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="t-c">
          <p class="p-20 sma-t">Корзина</p>
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
        <p>Введите пароль для подтверждения</p>
        <form method="POST" action="{{ route('saveorder') }}">
          @csrf
          <input id="password" type="password" class="col-md-6" name="password" required>
          <input type="submit" name="btn" class="btn btn-warning" value="Сформировать заказ">
        </form>
    </div>
</div>
@endsection

