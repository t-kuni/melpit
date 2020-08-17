@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach ($items as $item)
            <div class="card">
                <div class="position-relative">
                    <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}" alt="Card image cap">
                    <div class="position-absolute py-2 px-3" style="left: 0; bottom: 20px; color: white; background-color: rgba(0, 0, 0, 0.70)">￥{{number_format($item->price)}}</div>
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

<a href="{{route('sell')}}"
   class="bg-secondary text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
   role="button"
   style="position: fixed; bottom: 30px; right: 30px; width: 150px; height: 150px; border-radius: 75px;"
>
    <div style="font-size: 24px;">出品</div>
    <div>
        <i class="fas fa-camera" style="font-size: 30px;"></i>
    </div>
</a>
@endsection
