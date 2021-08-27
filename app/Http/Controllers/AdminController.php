<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

class AdminController extends Controller
{
    //
    public function users(){
        $data=user::all();
        return view('admin.user',compact('data'));
    }
    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function uploadfood(Request $req){
        
        $data=new food;
        if( $req->hasFile('image'))
        { 
            $image = $req->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('foodimage',$imagename);  
            $data->image=$imagename;
        }
       
        $data->title=$req->title;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->save();
        
        return redirect()->back();
    }



    public function foodmenu(){
        
        $data = food::all();
        return view('admin.foodmenu',compact('data'));

    }
    
    public function deletefood($id){
        $data=food::find($id);
        $data->delete();
        return redirect()->back();

    }
    
    public function editfood($id){
        $data=food::find($id);
        return view('admin.foodupdate',compact("data"));

    }
    
    public function updatefood(Request $req, $id){
        $data=food::find($id); 
        if( $req->hasFile('image'))
        { 
            $image = $req->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('foodimage',$imagename);  
            $data->image=$imagename;
        }
       
        $data->title=$req->title;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->save();
        
        $data = food::all();
        return view('admin.foodmenu',compact('data'));

    }
        
    public function reservation(Request $req){
        
        $data1=new reservation;
        
        $data1->name=$req->name;
        $data1->email=$req->email;
        $data1->phone=$req->phone;
        $data1->guest=$req->guest;
        $data1->date=$req->date;
        $data1->time=$req->time;
        $data1->message=$req->message;
        $data1->save();
        
        $data = food::all();
        $data1 = foodchef::all();
        return view('home',compact('data'));

    }
    
    public function adminreservation(){
        
        $data = reservation::all();
        return view('admin.adminreservation',compact('data'));

    }
    
    public function viewchef(){
        
        $data = foodchef::all();
        return view('admin.viewchef',compact('data'));
    }

    public function addchef(Request $req){
        
        $data=new foodchef;
        if( $req->hasFile('image'))
        { 
            $image = $req->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('chefimage',$imagename);  
            $data->image=$imagename;
        }
       
        $data->name=$req->name;
        $data->speciality=$req->speciality;
        $data->save();
        
        return redirect()->back();
    }
    
    public function deletechef($id){
        $data=foodchef::find($id);
        $data->delete();
        return redirect()->back();

    }
    
    public function editchef($id){
        $data=foodchef::find($id);
        return view('admin.chefupdate',compact("data"));

    }
    
    public function updatechef(Request $req, $id){
        $data=foodchef::find($id); 
        if( $req->hasFile('image'))
        { 
            $image = $req->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('chefimage',$imagename);  
            $data->image=$imagename;
        }
       
        $data->name=$req->name;
        $data->speciality=$req->speciality;
        $data->save();
        
        $data = foodchef::all();
        return view('admin.viewchef',compact('data'));

    }

    public function showorders(){
        
        
        $count = cart::where('carts.ordered','!=','1')->count();
        $data = order::select('orders.name','orders.address','orders.phone','carts.id AS cid','carts.user_id','carts.quantity','carts.ordered','food.title','food.price'
    )
        ->where('carts.ordered','!=','0')
        ->join('carts','carts.user_id','=','orders.user_id')->join('food','carts.food_id','=','food.id')->get();
        return view('/admin.showorders',compact('count','data'));
    }

    public function complete($id){
        
        $data=cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    
}
