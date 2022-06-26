<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class ProductListController extends Controller
{
    public function saveProduct(Request $request)
    {
        echo json_encode($request->all());
        $newProductItem = new Product();
        $newProductItem->product_name = $request->prname;
        $newProductItem->product_price = $request->prprice;
        $newProductItem->product_type = $request->prtype;
        $newProductItem->product_qty = $request->prqty;
        $newProductItem->save();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');
    }

    public function mainpage()
    {
        if (Auth::check()) {
            return view('mainpage', ['listProducts' => Product::all()]);
        }
        return redirect("login")->withSuccess('You do not have access');
    }
    public function markDelete($id)
    {
        $listItem = Product::find($id);
        $listItem->delete();
        return redirect('mainpage');
    }

    public function markUpdate($id, Request $request)
    {
        $listItem = Product::find($id);
        $listItem->product_name = $request->prname;
        $listItem->product_qty = $request->prqty;
        $listItem->product_price = $request->prprice;
        $listItem->product_type = $request->prtype;
        $listItem->update();
        return redirect('mainpage');
    }
}
