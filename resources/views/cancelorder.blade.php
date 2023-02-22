@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pad-20">
            <div class="card">
                @if(Auth::user()->role == 2)
                <div class="card-header">{{ __('Редактирование данных заявки') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <form method="post" action="{{ route('cancelSubmitorder', $Order->id)}}" enctype="multipart/form-data">@csrf
                    <p class="mb-0">Комментарий</p><input id="comment" value="{{$Order->comment}}" type="text" class="form-control" name="comment" placeholder="Комментарий">
                    <input type="submit"  class="btn btn-outline-info" value="Оставить комментарий">
                </form>
            </div>
        </div>           
            @else
            <p>Вы не обладаете правами администратора, поэтому функционал панели заблокирован</p>
            @endif
        </div>
    </div>
</div>
@endsection
