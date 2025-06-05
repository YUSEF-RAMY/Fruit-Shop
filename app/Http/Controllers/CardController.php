<?php

namespace App\Http\Controllers;
use App\Models\Card;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function cart()
    {
        $user_id = auth()->user()->id;
        $product = Card::with('product')->where('user_id', $user_id)->get();
        return view('product.card', ['cartProducts' => $product]);
    }

    public function addproducttocart($productid)
    {
        $user_id = auth()->user()->id;

        $result = Card::where('user_id', $user_id)->where('product_id', $productid)->first();
        if ($result) {
            $result->quantity += 1;
            $result->save();
        } else {
            $newCart = new Card();
            $newCart->product_id = $productid;
            $newCart->user_id = auth()->user()->id;
            $newCart->quantity = 1;
            $newCart->save();
        }

        return redirect('/cart');
    }

    public function delete($id){
        Card::find($id)->delete();
        return redirect('/cart')->with('success' , 'تم الحزف بنجاح');
    }
}
