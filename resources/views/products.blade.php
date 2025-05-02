@extends('layouts.master')

@section('products')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">	
                <h3><span class="orange-text">متنجات</span> الموقع</h3>
                <h4></h4>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert" style="font-size: 30px">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert"  style="font-size: 30px">
            {{session('error')}}
        </div>
    @endif



    <div class="row product-lists">
        @foreach ($product as $item)
        <div id="" class="col-lg-4 col-md-6 text-center _{{$item->category_id}}" >
            <div class="single-product-item">
                <div class="product-image">
                    <a href="صفحه العنصر نفسه"><img loading="lazy" style="max-height: 250px !important; min-height: 250px !important;" src={{asset($item -> imagepath)}} alt="صور المنتجات"></a>
                </div>
                <h3>{{$item -> name}}</h3>
                <p class="product-price"><span>{{$item -> quantity}}-الكميه</span> {{$item -> price}}$ </p>
                <a href="/card" class="cart-btn"><i class="fas fa-shopping-cart"></i> اضافه الي السله</a>
                <a href="/deleteproduct/{{$item -> id}}" style="background-color:rgb(210, 51, 51); !important" class="cart-btn btn btn-danger"><i class="btn-danger"></i> حذف المنتج</a>
                <a href="/editproduct/{{$item -> id}}" style="background-color:rgb(42, 125, 185); !important" class="cart-btn btn btn-primary"><i class="btn-primary"></i> تعديل المنتج</a>
            </div>
        </div>
        @endforeach
        <style>
            svg{
                height: 50px !important;
            }
        </style>

    </div>
    <div style="text-align: center; margin: 15px auto;  ">{{$product->links()}}</div>
</div>
@endsection