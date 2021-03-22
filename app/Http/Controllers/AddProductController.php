<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AddProductController extends Controller
{
    public function check(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required|max:50',
            'price' => 'required|max:200|min:1',
            'body' => 'required|max:2000',
            'img' => 'required|mimes:jpg,bmp,png,gif'
        ]);

        $path = $req->file('img')->store('productIMG','public');

        $data = new AddProduct;

        $data->title = $req->input('title');
        $data->price = $req->input('price');
        $data->body = $req->input('body');
        $data->path = $path;
        $data->userId = Auth::id();
        $data->save();

        return redirect('/products')->with('add','ssssss');
    }

    public function search(Request $req)
    {
        
        $results = DB::select("select * from add_products where title like '{$req->input('req')}%'");
        if(!$results){
            $error = "Простите но у нас нет такого продукта!";
            return view('home',['error'=>$error]);
        }
        return view('home',['data'=>$results]);
    }
}
