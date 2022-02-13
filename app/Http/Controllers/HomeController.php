<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function index(){
        $ebook = Ebook::all();
        return view('home', ['ebook'=>$ebook]);
    }

    public static function ebook($id){
        $ebook = Ebook::Where('ebook_id', $id)->first();

        return view('ebook', ['ebook'=>$ebook]);
    }

    public static function rent($id, $ebook_id){
        
        $order = new Order();
        $order->account_id = $id;
        $order->ebook_id = $ebook_id;
        $order->order_date = date('Y-m-d');
        $order->save();

        return redirect()->action(
            [HomeController::class, 'cart'], ['id' => $id]
        );;
    }

    public function cart($id){
        $order = Order::where('account_id', $id)->get();

        
        return view('cart', ['order' => $order]);
    }

    public function deleteCart($order_id){
        DB::delete('DELETE FROM Orders WHERE order_id = ?', [$order_id]);
        
        return redirect()->back();
    }

    public function submitCart($id){
        DB::delete('DELETE FROM Orders WHERE account_id = ?', [$id]);
        
        return redirect('/success');
    }

    public function success(){
        
        return view('success');
    }
}
