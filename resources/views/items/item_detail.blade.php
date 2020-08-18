@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 bg-white">

            <div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 24px">{{$item->name}}</div>

            <div class="row">
                <div class="col-4 offset-1">
                    <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}">
                </div>
                <div class="col-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>出品者</th>
                            <td>{{$item->seller->name}}</td>
                        </tr>
                        <tr>
                            <th>カテゴリー</th>
                            <td>{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</td>
                        </tr>
                        <tr>
                            <th>商品の状態</th>
                            <td>{{$item->condition->name}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 24px">
                <i class="fas fa-yen-sign"></i>{{number_format($item->price)}}
            </div>

            <div class="row">
                <div class="col-8 offset-2">
                    <a href="{{route('item.buy', [$item->id])}}" class="btn btn-secondary btn-block">購入</a>
                </div>
            </div>

            <div class="my-3">{!! nl2br(e($item->description)) !!}</div>
        </div>
    </div>
</div>
@endsection
