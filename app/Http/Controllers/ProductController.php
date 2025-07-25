<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public $allcategory = Category::all();
    // public $product = Product::all();

    public function addproduct(){
        $allcategory = Category::all();
        return view('product.addproduct' , ['allcategory' => $allcategory]);  
    }



    public function addproductsubmit(Request $request){

        //when he get the id for this product we will update it
        $request->validate([
            'name' => 'required|string|max:20|min:2',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'nullable|string|max:500|min:2',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);
        //================edit
        if($request -> id){
            $updateProduct = Product::find($request->id);
            $updateProduct->name = $request->name;
            $updateProduct->price = $request->price;
            $updateProduct->quantity = $request->quantity;
            $updateProduct->description = $request->description;

            if($request->hasFile('photo')){
                $imagePath = $request->photo ->move('uploads/products/edited' , Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()); 
                $updateProduct->imagepath = $imagePath;
            }
            $updateProduct->category_id = $request->category_id;
            $updateProduct->save();
            return redirect('products')->with('success' , 'تم تعديل البيانات بنجاح'); 
    }
//add product
// when he didn't get the id for this product we will add
        else{    
            $newproduct = new Product();
                $newproduct->name = $request->name;
                $newproduct->price = $request->price;
                $newproduct->quantity = $request->quantity;
                $newproduct->description = $request->description;
                $newproduct->category_id = $request->category_id;
                $imagePath = $request->photo ->move('uploads/products' , Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()); 
                $newproduct->imagepath = $imagePath;   
                $newproduct->save();
                return redirect('products')->with('success', 'تم اضافه المنتج بنجاح'); 
        }

    }
//=====================================================================
    


//delete product     
    public function removeProductSubmit($productid=null){
        if($productid){
            $product = Product::findOrFail($productid);
            $product->delete();  
        }else{
            // abort(403 , "product not found ,, please enter valid product id");
            return redirect()->back()->with('error','لا يوجد منتج بهذا الاسم في قاعده البيانات');
        }
        return redirect()->back()->with('success','تم حذف المنتج بنجاح');
    }

//edit product
    public function editproduct($product_id=null){
        if($product_id){
            $product = Product::find($product_id);
            $allcategory = Category::all();
            return view('product.editproduct' , ['product' => $product , 'allcategory' => $allcategory])->with('success','تم حذف المنتج بنجاح');
        }else{
            abort(403 , "product not found ,, please enter valid product id");
        }
    }

//data table jquary
    public function datatable(){
        $products = Product::all();
        return view('product.datatable' , ['products' => $products]);
    }

// اضافه صور لنفس المنتج 
    public function addproductimage($productimage_id)
    {
        $product = Product::findOrFail($productimage_id);
        $productImage = ProductPhoto::where('product_id' , $productimage_id)->get();
        return view('product.addproductimage' , ['product' => $product , 'productImage'=> $productImage]);
    }

    public function deleteproductimage($productid)
    {
        if($productid){
            $productimage = ProductPhoto::findOrFail($productid);
            $productimage->delete();  
        }else{
            // abort(403 , "product not found ,, please enter valid product id");
            return redirect()->back()->with('error','لا يوجد صوره بهذا الاسم في قاعده البيانات');
        }
        return redirect()->back()->with('success','تم حذف الصوره بنجاح');
    }

    public function storeProductImage(Request $request){
        $request->validate([
            'product_id' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $photo = new ProductPhoto();
        $photo -> product_id = $request-> product_id;
        if($request->has('photo'))
        {
            $path = $request->photo ->move('uploads/products' , Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()); 
        }else{
            redirect()->back();
        }
        $photo->imagepath = $path;
        $photo->save();
        return redirect()->back();
    }


    public function singleproduct($productid)
    {
        $productinfo =Product::with('Category' , 'ProductPhoto')->find($productid);
        $relatedProduct = Product::where('category_id' , $productinfo->category_id)->where('id' ,'!=', $productid)
        ->inRandomOrder()
        ->limit(3)
        ->get();
        return view('product.singleproduct',['product'=>$productinfo , 'relatedProduct'=>$relatedProduct]);
    }
}