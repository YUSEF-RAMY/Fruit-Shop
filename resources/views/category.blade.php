@extends('layouts.master')

@section('category')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">	
                <h3><span class="orange-text">اقسام</span> الموقع</h3>
                <h4>بعون الله عندنا كل حاجه</h4>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="product-filters">
                <ul>
                    @foreach ($categories as $item)
                        <li data-filter="._{{$item->id}}">{{$item->name}}</li>
                    @endforeach
                    <li class="active" data-filter="*">الكل</li>
                </ul>
            </div>
        </div>
    </div>
    --}}

    <div class="row">
        @foreach ($categories as $item)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="/products/{{$item -> id}}">
                        <img loading="lazy" style="max-height: 250px !important; min-height: 200px !important;" src={{url($item -> imagepath)}} alt=""></a>
                </div>
                <h2>{{$item -> name}}</h2>
                <h5>{{$item -> description}}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection