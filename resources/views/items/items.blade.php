@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach ($items as $item)
            <div class="card">
                <div class="position-relative">
                    <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}" alt="Card image cap">
                    <div class="position-absolute py-2 px-3" style="left: 0; bottom: 20px; color: white; background-color: rgba(0, 0, 0, 0.70)">￥{{$item->price}}</div>
                </div>
                <div class="card-body">
                    <small class="text-muted">{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</small>
                    <h5 class="card-title">{{$item->name}}</h5>
                </div>
                <a href="{{ route('items.item_detail', [$item->id]) }}" class="stretched-link"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection
