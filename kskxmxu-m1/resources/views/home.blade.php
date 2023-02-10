@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        @if(Auth::user()->role == 2)
                            <p>Вам открыт доступ к админ панели</p>
                            <a href="/admin">Вход</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
