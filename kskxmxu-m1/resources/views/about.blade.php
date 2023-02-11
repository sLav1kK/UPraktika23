@extends('layouts.app')

@section('content')
<section class="aboutus">
    <div class="container">
      <div class="row">
        <div class="t-c">
          <p class="p-20 sma-t p-b-15">О нас</p>
        </div>
        <div class="col-xl-6 col-md-6 col-12">
          <p><b>CopyStar</b> — это магазин, где продают товары для работы и учёбы, периферию для копировального оборудования, инструменты для ремонта и остальное оборудование для офиса.</p>
          <dl>
            <dt>Широкий выбор</dt>
            <dd>Всего — более 15 000 товаров: принтеры и комплектующие, периферия, ручные и электроинструменты и т.д. Часть товаров есть в наличии на складе, а отсутствующие привозим под заказ.</dd>
            <dd></dd>
            <dt>Грамотные консультации</dt>
            <dd>Наши менеджеры отлично разбираются в технике, постоянно проходят обучение и раз в полгода проходят аттестацию. Они посоветуют решение, которое подойдёт именно для ваших задач. Если менеджер затрудняется с ответом на вопрос, у нас есть выделенные эксперты по сложным категориям. Наши сотрудники отвечают по телефону, на сайте.</dd>
            <dt>Гарантийное обслуживание — без проблем</dt>
            <dd> Мы не изводим клиентов экспертизами и долгим ожиданием. Стараемся решать вопросы по возврату и обмену. Если что-то пойдёт не так и товар окажется нерабочим, вернём деньги или отремонтируем без лишней волокиты.</dd>
          </dl>
        </div>
        <div class="col-xl-6 col-md-6 col-12 t-c-s">
          <img src="img/logo.png" class="logo1" alt="">
        </div>
      </div>
    </div>
</section>
<section class="offers">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="t-c">
        <p class="p-20 sma-t">Новинки компании</p>
      </div>
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
      </div>
    </div>
  </div>
</section>
@endsection

