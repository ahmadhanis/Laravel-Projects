<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListItem;
use Illuminate\Support\Facades\auth;

class TodoListController extends Controller
{
    //
    public function mainpage()
    {
        if (Auth::check()) {
            return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->where('email', Auth::user()->email)->get()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    public function saveItem(Request $request)
    {
        echo json_encode($request->all());
        $newListItem = new ListItem();
        $newListItem->email =  Auth::user()->email;
        $newListItem->name = $request->listItem;
        $newListItem->description = $request->description;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');
    }
    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');;
    }
    public function markDelete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');;
    }
    public function markUpdate($id, Request $request)
    {
        $listItem = ListItem::find($id);
        $listItem->name = $request->updateItem;
        $listItem->description = $request->updateDesc;
        $listItem->update();
        return redirect('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');;
    }
}
