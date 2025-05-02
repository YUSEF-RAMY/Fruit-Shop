@extends('layouts.master')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>

@section('content')
    <div class="container mt-5 mb-5">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
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
            <td>
                <a href="{{url('/editproduct/' . $item -> id)}}" class="btn btn-primary">تعديل</a>
                <a href="{{url('/deleteproduct/' . $item -> id)}}" class="btn btn-danger">حذف</a>
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