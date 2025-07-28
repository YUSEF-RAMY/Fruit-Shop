@extends('layouts.master')


@section('category')





<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">	
                <h3><span class="orange-text">اقسام</span> الموقع</h3>
                <h4>{{ __('words.main page') }}</h4>
            </div>
        </div>
    </div>



    <div class="row">
        @foreach ($categories as $item)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="/products/{{$item -> id}}"><img loading="lazy" style="max-width: 250px !important; min-height: 200px !important;" src={{$item -> imagepath}} alt=""></a>
                </div>
                <h3>{{ $item -> name }}</h3>
                <h3>{{$item -> description}}</h3>
            </div>
        </div>
        @endforeach
    </div>
<div style="position: relative">
    <a class="btn "
    
    style="background-color: #051922; color:white; position: absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size: 20px" href="/reviews">ادخل رايك</a>
</div>
    <div class="testimonail-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        
                    @foreach ($review as $item)
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                    <img src="{{asset($item -> imagepath)}}" alt="personal photo">
                                </div>
                                <div class="client-meta">
                                    <h3>{{$item -> name}}<span>{{$item -> subject}}</span></h3>
                                    <p class="testimonial-body">
                                        {{$item -> massage}}
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                    @endforeach
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
