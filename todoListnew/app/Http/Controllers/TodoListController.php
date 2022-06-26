<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListItem;

class TodoListController extends Controller
{
    //
    public function index()
    {
        //return view('welcome', ['listItems' => ListItem::all()]);
        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    public function saveItem(Request $request)
    {
        //echo json_encode($request->all());
        $newListItem = new ListItem();
        $newListItem->name = $request->listItem;
        $newListItem->description = $request->description;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect('/');
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
}
