<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Order;
use App\Models\Orderdetails;
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

    public function checkout()
    {
        $user_id = auth()->user()->id;
        $product = Card::with('product')->where('user_id', $user_id)->get();
        return view('product.checkout' ,  ['cartProducts' => $product]);
    }


    public function storeOrder(Request $request)
    {
        $request -> validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'address' => 'required',
            'phone'   => 'required',
            'info'    => 'nullable'
        ]);
        $user_id =auth()->user()->id;
        $order =Order::create($request->only(['user_id' => $user_id, 'name' , 'email' , 'address' , 'phone' , 'info']));

        $cardProducts = Card::with('product')->where('user_id' , $user_id)->get();
        foreach($cardProducts as $item)
        {
            Orderdetails::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'price'      => $item->product->price,
                'quantity'   => $item->quantity,
            ]);
        }
        Card::where('user_id' , $user_id)->delete();
        return redirect('/')->with('success' , 'Order send successfully!');
    }
}
