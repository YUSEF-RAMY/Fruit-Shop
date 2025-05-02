<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function GetAllProduct () {
        $reslat = Category::all();
        $review = Review::all();
        return view('welcome',['categories' => $reslat , 'review' => $review]);
    }
    

    public function reviews(){
        $review = Review::all();
        return view('reviews' , ['review' => $review]);
    }

    public function storeReviews(Request $request){
        $request->validate([
            'name'=> 'required|string|max:100',
            'email'=> 'required|string|max:200',
            'phone'=> 'required|string|max:30|min:8',
            'subject'=> 'string|max:50',
            'massage'=> 'required|string|max:500',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $data = new Review();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->subject = $request->subject;
        $image = $request -> photo -> move('uploads/PersonReviews' , Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName());
        $data->imagepath = $image;
        $data->massage = $request->massage ?? 'لم يتم ادخال رساله';
        $data->save();
        return redirect('/reviews')->with('success' ,'thank you for review');


    }



    public function  GetAllCategory() {
    
        $categories = Category::all();
        $products = Product::all();
        return view('category',["categories" => $categories, "product" => $products]);
    }



    public function GetCategoryByID ($cate_id = NULL) {
        $category = Category::all();
        if($cate_id){
            $products = Product::where('category_id' , $cate_id)->paginate(3)->get();
        }else{
            $products = Product::paginate(3);
        }
    
        return view('products' , ['product' => $products , 'category' => $category]);
    }


    public function  search (Request $request){
        $products = Product::where('name', 'LIKE', "%{$request->keyword}%")->get();

        return view('products' , ['product' => $products]);
    }
    
}
