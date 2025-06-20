@extends('layouts.master')

@section('content')
    <div class="container mt-5 mb-5" style="text-align: center;">


        <form action="/storeProductImage" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 mb-5">
                <input type="hidden" style="width: 100%;" value="{{ $product->id }}" class="form-control" name="product_id" id="product_id">


                <div class="col-9 pt-3">
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>

                <div class="col-3">
                    <input type="submit" class="w-100" value="حفظ">
                </div>

                <span class="text-danger">
                    @error('photo')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </form>




        <div class="row">
            @foreach ($productImage as $item)
                <div class="col-4">
                    <img class="m-2" src="{{ asset($item->imagepath) }}" alt="image photo" width="300" height="300">
                    <a href="/deleteproductimage/{{ $item->id }}" style="background-color:rgb(210, 51, 51); !important"
                        class="cart-btn btn btn-danger"><i class="btn-danger"></i> حذف الصوره
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
