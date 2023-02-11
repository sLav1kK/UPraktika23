@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user()->role == 2)
                <div class="card-header">{{ __('Админ панель(функционал не работает по тех.причинам)') }}</div>
                @else
                <p>Вы не обладаете правами администратора, поэтому функционал панели заблокирован</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
