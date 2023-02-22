@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                @if(Auth::user()->role == 2)
                <div class="card-header">{{ __('Админ панель') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <h4>Добавление товаров</h4>
                <form method="post" action="/admin" enctype="multipart/form-data">@csrf
                    <input id="name" type="text" class="form-control" name="name" placeholder="Имя">
                    <input id="id_cat" type="text" class="form-control" name="id_cat" placeholder="Категории(цифры)">
                    <input id="urlphoto" type="text" class="form-control" name="urlphoto" placeholder="Название картинки товара в папке img">
                    <input id="price" type="text" class="form-control" name="price" placeholder="Цена">
                    <input id="year" type="text" class="form-control" name="year" placeholder="Год">
                    <input id="country" type="text" class="form-control" name="country" placeholder="Страна">
                    <input id="model" type="text" class="form-control" name="model" placeholder="Модель">
                    <input type="submit"  class="btn btn-outline-info" value="Создать товар">
                </form>
            </div>
            <div class="col-xl-6 col-md-6 col-12 t-c">
                <h4>Список существующих категорий:</h4>
                @foreach($Category as $c)
                <p>{{ $c->id }} - {{ $c->name }}, </p><a href="/admin/deletecategory/{{ $c->id }}" class="btn btn-warning td-n">Удалить</a>
                @endforeach
                <h4>Добавление категорий</h4>
                <form method="post" action="/admin/addcategory" enctype="multipart/form-data">@csrf
                    <input id="name" type="text" class="form-control" name="name" placeholder="Имя">
                    <input id="name" type="submit"  class="btn btn-outline-info" value="Создать категорию">
                </form>
            </div>
        </div>
        <div class="row">
            <h4>Все товары</h4>
            @foreach($Products as $p)
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
                    <a href="/admin/edit/{{$p->id}}" class="card-link c-b">Подробнее</a>
                  </div>
                </div>
              </div>
            @endforeach
        </div>

        <div class="row p-20">
            <div class="col-xl-12 col-md-12 col-12">
                <div>
                    <div>
                        <p class="p-20 sma-t">Все заявки на покупку</p>
                    </div>
                    <form method="get" action="/admin">
                      <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="Новая">Статус - Новая</option>
                        <option value="Подтвержденная">Статус - Подтвержденная</option>
                        <option value="Отмененная">Статус - Отмененная</option>
                      </select>
                      <input type="submit" class="btn btn-warning">
                      <a href="/admin" class="btn btn-outline-info">Сброс фильтров</a>
                    </form>
                    
                    
                    
                    @foreach($orderItem as $key=>$elemOrderItem)
                        @if($orderItem[$key]['id_order'] != $prev_id)
                        <hr>
                        <p>Заявка №{{$orderItem[$key]['id_order']}}</p>
                        <p>Пользователь - {{$orderItem[$key]['id_user']}}</p>
                        @foreach($info_user as $keyUser=>$elemUser)
                            @if($info_user[$keyUser]['id'] == $orderItem[$key]['id_user'])
                                <p>ФИО - {{ $info_user[$keyUser]['name'] ." ". $info_user[$keyUser]['surname'] ." ". $info_user[$keyUser]['patronymic'] }}</p>
                            @endif
                        @endforeach
                        <p>Статус - {{$orderItem[$key]['status']}}</p>
                        <p>Дата создания - {{$orderItem[$key]['created_at']}}</p>
                        <p>Дата последнего редактирования - {{$orderItem[$key]['updated_at']}}</p>
                            @if($orderItem[$key]['status'] == 'Новая')
                                <a href="/admin/confirmorder/{{ $orderItem[$key]['id'] }}" class="btn btn-danger mb-20">Подтвердить заявку</a>
                                <a href="/admin/cancelorder/{{ $orderItem[$key]['id'] }}" class="btn btn-danger mb-20">Отменить заявку</a>
                            @endif  
                        @endif
                        <div class="selfcard d-flex plr-40 mb-40">
                                <div class="col-xl-8 col-md-6 col-12 pad-20">
                                    <p class="fw-bold">Название - {{ $orderItem[$key]['name'] }}.</p>
                                    <p>Цена - {{ $orderItem[$key]['price'] }} рублей.</p>
                                    <p>Количество - {{ $orderItem[$key]['quantity'] }}</p>
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
            
            @else
            <p>Вы не обладаете правами администратора, поэтому функционал панели заблокирован</p>
            @endif
        </div>
    </div>
</div>
@endsection
