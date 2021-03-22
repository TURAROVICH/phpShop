<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserActionsController extends Controller
{
    public function useraction(Request $req,$name){
        $results = DB::select('select * from add_products where userId = :id', ['id' => Auth::id() ]);
        $basket = DB::select("SELECT *
        FROM add_products
        INNER JOIN add_baskets
        ON add_products.id = add_baskets.productId;
        ");
        // dd($basket);
        $num=count($basket);
        
        return view('userActions',['data'=>$results,'basket'=>$basket,'num'=>$num]);
    }
    public function delete(Request $req,$id)
    {
        $results = DB::delete('delete from add_products where id = :id', ['id' => $id ]);
        return redirect('/home/'.Auth::user()->name)->with('deleted','kkk');
    }
}
