<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItems;
use App\Models\Product;

use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function index(){

        $old_cartItem = Cart::where('user_id', Auth::id())->get();

        foreach($old_cartItem as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty', '>=' ,$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();  
            } 
        }

        $cartItem = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartItem'));
    }


    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $total = 0;
        $cartitem_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitem_total as $item)
        {
            $total = $item->products->selling_price * $item->prod_qty;
        }
        $order->total_price = $total;

        $order->tracking_no = 'sharma'.rand(1111,9999);
        $order->save();

        $cartItem = Cart::where('user_id',Auth::id())->get();
        foreach($cartItem as $item)
        {   
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price
            ]);
            $prod= Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartItem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItem);
        return redirect('/')->with('status', 'Order Placed Successfully');
    }

}
