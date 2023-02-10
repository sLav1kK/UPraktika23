@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h2>О нас</h2>
      <div class="col-xl-6 col-12 p-20 f-20">
        <p>Добро пожаловать в магазин True Games!</p>
        <p>Мы занимаемся продажей игровых приставок и аксессуаров.</p>
        <p>Также у нас можно приобрести цифровые ключи игр.</p>
        <p>Главное в нашей работе - это скорость выполняемой работы и качество предоставляемого товара!</p>
      </div>
      <div class="col-xl-6 col-12 p-50">
        <img src="img/logo.png" class="w-100" alt="">
      </div>
    </div>
    <h3>Новинки компании</h3>
    <div class="row justify-content-center">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner">
            @foreach($Products as $p)
            @if($loop->iteration == 1)
            <div class="carousel-item active">
              <img src="img/{{ $p->urlphoto }}" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $p->name }}</h5>
                <p>{{ $p->price }}</p>
              </div>
            </div>
            @else
            <div class="carousel-item">
              <img src="img/{{ $p->urlphoto }}" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $p->name }}</h5>
                <p>{{ $p->price }}</p>
              </div>
            </div>
            @endif
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
        </div>
    </div>
</div>
@endsection

