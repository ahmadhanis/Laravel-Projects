<?php

namespace App\Http\Controllers;

use App\ListItem;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    //

    public function index()
    {
        //return view('welcome', ['listItems' => ListItem::all()]);
        return view('welcome', ['listItems' => ListItem::where('is_complete',0)->get()]);
    }
    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }
    public function markDelete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();
        return redirect('/');
    }
    public function markUpdate($id,Request $request)
    {
        $listItem = ListItem::find($id);
        $listItem->name = $request->updateItem;
        $listItem->description = $request->updateDesc;
        $listItem->update();
        return redirect('/');
    }
    
    public function saveItem(Request $request)
    {
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect('/');
    }
}
