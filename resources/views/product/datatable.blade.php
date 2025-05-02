@extends('layouts.master')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>

@section('content')
<div class="d-flex justify-content-center" style="margin:40px auto ; width: 100%; font-size: 10px;" dir="rtl">
<li><a href="/addproduct" class="btn btn-success" style="font-size: 20px">اضافه منتج</a></li>
</div>
    <div class="container mt-5 mb-5">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
        <tr>
            <td>{{$item -> id}}</td>
            <td>{{$item -> name}}</td>
            <td>{{$item -> price}}</td>
            <td>{{$item -> quantity}}</td>
            <td><img src=" {{$item -> imagepath}}" alt="صوره المنتج" height="100"></td>
            <td class="d-flex" style="gap: 3px">
                <a href="{{url('/editproduct/' . $item -> id)}}" class="btn btn-primary w-50" style="font-size:20px ">تعديل</a>
                <a href="{{url('/deleteproduct/' . $item -> id)}}" class="btn btn-danger w-50" style="font-size: 20px">حذف</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

<script>
    $(document).ready(function(){
        let table = new DataTable('#myTable');
    })
</script>