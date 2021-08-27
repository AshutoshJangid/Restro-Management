<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

class homeController extends Controller
{
    //
    function index(){
        if(Auth::id()){
            return redirect('redirects');
        }
        $data = food::all();
        $data2 = foodchef::all();
        return view("home",compact("data","data2"));
    }

    function redirects(){
        
        $data = food::all();
        
        $data2 = foodchef::all();
        $usertype = Auth::user()->usertype;
        if($usertype==1){
            return view('admin.user');
        }else{
            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->where('ordered','!=','1')->count();
            return view("home",compact("data","data2","count"));
        }
    }
    function addcart(Request $req, $id){
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $cart=new cart;
            $cart->user_id=$user_id;
            $cart->food_id=$food_id;
            $cart->quantity=$req->quantity;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function showcart($id){
        if(Auth::id()==$id){
        $count = cart::where('user_id',$id)->count();
        $data = cart::select('carts.id as cid','carts.user_id','carts.quantity','food.*')
        ->where(['user_id'=>$id])->where('carts.ordered','!=','1')
        ->join('food','carts.food_id','=','food.id')->get();
        return view('/showcart',compact('count','data'));
        }else{
            
        return redirect()->back();
        }
    }

    public function removecart($id){
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();

    }
    
    public function order(Request $req){
        $user_id = Auth::id();
        $data = new order;
        $data->user_id=$user_id;
        $data->name=$req->name;
        $data->address=$req->address;
        $data->phone=$req->phone;
        $data->save();
        $data2 = cart::where('user_id',$user_id)->update(['ordered'=>'1']);
        return view("home");

    }
}
