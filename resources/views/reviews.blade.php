@extends('layouts.master')

@section('review')

<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" enctype="multipart/form-data" action="/storeReviews" id="fruitkha-contact" onsubmit="return valid_datas( this );">
                        @csrf
                        <p>
                            <input type="hidden" placeholder="id" name="id" id="id">
                            <input type="text" placeholder="الاسم" value="{{old('name')}}" name="name" id="name">
                            <span class="text-danger"> 
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                            <input type="email" value="{{old('email')}}" placeholder="البريد الالكتروني" name="email" id="email">
                            <span class="text-danger"> 
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                        </p>
                        <p>
                            <input type="tel" placeholder="رقم الهاتف" value="{{old('phone')}}" name="phone" id="phone">
                            <span class="text-danger"> 
                                @error('phone')
                                {{$message}}
                                @enderror
                            </span>
                            <input type="text" placeholder="المدينه" value="{{old('subject')}}" name="subject" id="subject">
                            <span class="text-danger"> 
                                @error('subject')
                                {{$message}}
                                @enderror
                            </span>
                        </p>
                        <p><textarea name="massage" value="{{old('massage')}}" id="massage" cols="30" rows="10" placeholder="رايك"></textarea></p>
                        <span class="text-danger"> 
                            @error('massage')
                            {{$message}}
                            @enderror
                        </span>
                        <p>
                        <input type="file" name="photo" id="photo" value="{{old('photo')}}">
                            <span class="text-danger"> 
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </span>
                        </p>    
                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <p><input type="submit" value="حفظ"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p> Egypt <br> Mansoura</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>SUN - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: 01095132780 <br> Email: yuseframy14@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




{{-- ========================================================================= --}}
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
                                <h3>{{$item -> name}}</h3>
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
@endsection