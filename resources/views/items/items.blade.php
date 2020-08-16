@extends('layouts.app')

@section('content')
<div class="container">
</div>

<a href="{{route('sell')}}"
   class="bg-secondary text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
   role="button"
   style="position: fixed; bottom: 30px; right: 30px; width: 150px; height: 150px; border-radius: 75px;"
>
    <div style="font-size: 24px;">出品</div>
    <div>
    <i class="fas fa-store-alt" style="font-size: 30px;"></i>
    </div>
</a>
@endsection
