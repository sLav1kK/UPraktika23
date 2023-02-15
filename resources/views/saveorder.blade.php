@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Оформить заказ</h1>
    <form method="post" action="{{ route('saveorder') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
                   required maxlength="255" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255" value="{{ old('email') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Номер телефона"
                   required maxlength="255" value="{{ old('phone') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Адрес доставки"
                   required maxlength="255" value="{{ old('address') ?? '' }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="Комментарий"
                      maxlength="255" rows="2">{{ old('comment') ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Оформить</button>
        </div>
    </form>
@endsection
