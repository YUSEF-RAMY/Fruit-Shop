@extends('layouts.master')

@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">

                            @foreach ($cartProducts as $item)
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Billing Address {{ $item->id }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <div class="billing-address-form">
                                                <form action="storeOrder" method="POST" id="orderForm">
                                                    @csrf
                                                    <p><input type="text" value="{{ $item->name }}" readonly required
                                                            id="name" name="name" placeholder="Name"></p>
                                                    <p><input type="email" value="{{ $item->email }}" readonly required
                                                            id="email" name="email" placeholder="Email"></p>
                                                    <p><input type="text" value="{{ $item->address }}" readonly required
                                                            id="address" name="address" placeholder="Address"></p>
                                                    <p><input type="tel" value="{{ $item->phone }}" readonly required
                                                            id="phone" name="phone" placeholder="Phone"></p>
                                                    <p><input type="email" value="{{ $item->created_at }}" readonly
                                                            required id="email" name="email" placeholder="Email"></p>
                                                    <p>
                                                        <textarea name="info" required id="info" cols="30" readonly rows="10" placeholder="Say Something">{{ $item->info }}</textarea>
                                                    </p>
                                                </form>


                                                <div class="row mt-4">
                                                    <div class="col-lg-8 col-md-12">
                                                        <div class="cart-table-wrap">
                                                            <table class="cart-table">
                                                                <thead class="cart-table-head">
                                                                    <tr class="table-head-row">
                                                                        <th class="product-image">Product Image</th>
                                                                        <th class="product-name">Name</th>
                                                                        <th class="product-price">Price</th>
                                                                        <th class="product-quantity">Quantity</th>
                                                                        <th class="product-total">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($item->orderdetales as $details)
                                                                        <tr class="table-body-row">
                                                                            <td class="product-image"><img
                                                                                    src="{{ $details->product->imagepath }}"
                                                                                    alt=""></td>
                                                                            <td class="product-name">
                                                                                {{ $details->product->name }}
                                                                            </td>
                                                                            <td class="product-price">
                                                                                {{ $details->product->price }}</td>
                                                                            <td class="product-quantity">
                                                                                {{ $details->quantity }}
                                                                            </td>
                                                                            <td class="product-total">
                                                                                {{ $details->product->price * $details->quantity }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-4">
                                                        <div class="total-section">
                                                            <table class="total-table">
                                                                <thead class="total-table-head">
                                                                    <tr class="table-total-row">
                                                                        <th>Total</th>
                                                                        <th>Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="total-data">
                                                                        <td><strong>Total: </strong></td>
                                                                        <td>{{ $item->orderdetales->sum(function ($x) {
                                                                            return $x->product->price * $x->quantity;
                                                                        }) }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                        <div class="cart-buttons">
                            <a href="/card"><input type="submit" form="orderForm" value="Done"></a>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
