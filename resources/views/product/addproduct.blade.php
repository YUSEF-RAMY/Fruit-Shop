@extends('layouts.master')


@section('addproduct')
    
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">اضافه</span> منتج</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" enctype="multipart/form-data" action="/storeproduct" id="fruitkha-contact" onsubmit="return valid_datas( this );">
                            @csrf
                            <p>
                                <input type="text" value="{{old('name')}}" style="width:100%;" dir="rtl" placeholder="الاسم" name="name" id="name">
                                <span class="text-danger"> 
                                    @error('name')
                                        {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p class="d-flex">
                                <input type="number" value="{{old('price')}}" style="width:50%; margin-right:5px;" dir="rtl" placeholder="السعر" name="price" id="price">
                                <span class="text-danger">
                                    @error('price')
                                        {{$message}}
                                    @enderror
                                    
                                </span>
                                <input type="number" value="{{old('quantity')}}" style="width:50%;" placeholder="الكميه" dir="rtl" name="quantity" id="quantity">
                                <span class="text-danger">
                                    @error('quantity')
                                        {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p><textarea name="description" id="description" cols="30" rows="10" dir="rtl" placeholder="الوصف">
                                {{old('description')}}
                            </textarea><span>
                                <select name="category_id" required id="" class="form-control" dir="rtl" style="width: 100%; padding:10px;">
                                    @foreach ($allcategory as $item)
                                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                                    @endforeach
                                </select>
                                <p> <input type="file" class="form-control" name="photo" id="photo">
                                    <span class="text-danger">
                                        @error('photo')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </p>
                            {{-- <input type="hidden" name="token" value="FsWga4&amp;@f6aw"> --}}
                            <p class="text-center"><input type="submit" value="حفظ"></p>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>



@endsection


