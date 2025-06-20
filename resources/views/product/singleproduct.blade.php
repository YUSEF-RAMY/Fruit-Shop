@extends('layouts.master')

@section('content')
    <div class="single-product mt-150 mb-150 ">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col">
                    <div class="single-product-img">
                        <img src="{{ asset($product->imagepath) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>الكميه : {{ $product->quantity }}</span>
                            ${{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form mx-auto">
                            <p>Categories: {{ $product->Category->name }}</p>
                            <a href="/addproducttocart/{{ $product->id }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>




                </div>
                <div class="testimonail-section my-5 mx-auto col " >
                    <div class="container">
                        <div class="row" >
                            <div  class="col-lg-10 offset-lg-1 text-center">
                                <div  class="testimonial-sliders">
                                    @foreach ($product->ProductPhoto as $item)
                                        <div class="single-testimonial-slider img-thumbnail" >
                                            <div class="client-avater " >
                                                <img src="{{ asset($item->imagepath) }}" alt="personal photo">
                                            </div>
                                            <div class="client-meta">
                                                <h3>{{ $item->name }}</h3>
                                                <p class="testimonial-body">
                                                    {{ $item->massage }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProduct as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/singleproduct/{{ $item ->id }}"><img src="{{ asset($item->imagepath) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>الكميه : {{ $item->quantity }}</span> {{ $item->price }}$ </p>
                            <a href="/addproducttocart/{{ $product->id }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

{{-- <h4>Share:</h4>
								<ul class="product-share">
									<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
									<li><a href=""><i class="fab fa-twitter"></i></a></li>
									<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
									<li><a href=""><i class="fab fa-linkedin"></i></a></li>
								</ul> --}}
