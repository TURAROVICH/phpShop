<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddProduct;
use App\Models\AddComent;
use App\Models\AddBasket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
   public function all()
   {
    $basket =  DB::select('select productId from add_baskets where userId = :id', ['id' => Auth::user()->id]);

    $data = new AddProduct;
    return view('products',['data'=>$data->all(),'inbasket'=>$basket]);
   }

   public function one(Request $req,$id)
   {
    $data = new AddProduct;
    $el = $data->find($id);


    $results = DB::select('select * from add_coments where productId = :id', ['id' => $id ]);
    return view('oneProduct',['data'=>$el,'coments'=>$results]);
   }


   public function add(Request $req,$id){
      $validated = $req->validate([
         'title' => 'required|max:255',
          'body' => 'required|min:10'
     ]);
     $add = new AddComent;
     $add->productId = $id;
     $add->title=$req->input('title');
     $add->body = $req->input('body');
     $add->userName = Auth::user()->name;
     $add->userEmail = Auth::user()->email;
     $add->save();

     return redirect('product/'.$id)->with('add','hhhhhh');
   }

   public function AddtoBasket(Request $req,$productId)
   {
     $basket  = new AddBasket;
     $basket->productId = $productId;
     $basket->userId = Auth::user()->id;
     $basket->userName = Auth::user()->name;
     $basket->userEmail = Auth::user()->email;
     $basket->save();

     return redirect('/products')->with('inBasket','jj');
   }


   public function DeletetoBasket(Request $req,$id)
   {

      $results = DB::delete('delete from add_baskets where id = :id', ['id' => $id ]);
      return redirect('/home/'.Auth::user()->name)->with('inbasketDelete','hhh');
   }
}
