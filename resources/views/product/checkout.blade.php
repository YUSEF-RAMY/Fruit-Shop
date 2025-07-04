@extends('layouts.master')

@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="storeOrder" method="POST" id="orderForm">
                                                @csrf
                                                <p><input type="text" required id="name" name="name" placeholder="Name"></p>
                                                <p><input type="email" required id="email" name="email" placeholder="Email"></p>
                                                <p><input type="text" required id="address" name="address" placeholder="Address"></p>
                                                <p><input type="tel" required id="phone" name="phone" placeholder="Phone"></p>
                                                <p>
                                                    <textarea name="info" required id="info" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="cart-table-wrap">
                                                        <table class="cart-table">
                                                            <thead class="cart-table-head">
                                                                <tr class="table-head-row">
                                                                    <th class="product-remove"></th>
                                                                    <th class="product-image">Product Image</th>
                                                                    <th class="product-name">Name</th>
                                                                    <th class="product-price">Price</th>
                                                                    <th class="product-quantity">Quantity</th>
                                                                    <th class="product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($cartProducts as $item)
                                                                    <tr class="table-body-row">
                                                                        <td class="product-remove"><a
                                                                                href="delete/{{ $item->id }}"><i
                                                                                    class="far fa-window-close"></i></a>
                                                                        </td>
                                                                        <td class="product-image"><img
                                                                                src="{{ $item->product->imagepath }}"
                                                                                alt=""></td>
                                                                        <td class="product-name">{{ $item->product->name }}
                                                                        </td>
                                                                        <td class="product-price">
                                                                            {{ $item->product->price }}</td>
                                                                        <td class="product-quantity">{{ $item->quantity }}
                                                                        </td>
                                                                        <td class="product-total">
                                                                            {{ $item->product->price * $item->quantity }}
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
                                                                    <td>{{ $cartProducts->sum(function ($item) {
                                                                        return $item->product->price * $item->quantity;
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
                        </div>
                        <div class="cart-buttons">
                            <input type="submit" form="orderForm" value="Done">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
