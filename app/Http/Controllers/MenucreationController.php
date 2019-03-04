<?php

namespace App\Http\Controllers;

use App\Classes\CommonClass;
use App\Menu;
use App\User;
use App\Usergroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenucreationController extends Controller
{
    public function __construct()
    {
        $this->middleware('language');
    }
    
    public function index(Request $request)
    {
        $all_menus = Menu::all();
        $commonClass = new CommonClass();
        return view('menucreation.index', compact('commonClass','all_menus'));
    }

    public function create()
    {

        $menu = new Menu();
        $menu_data = $menu->multiLabelMenu();
        $commonClass = new CommonClass();
        return view('menucreation.create', compact('commonClass','menu_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status' => 'required',
        ]);

        $logged_user_id = Auth::user()->id;
        if($request->parent_menu==null)
            $parent_menu = 0;
        else
            $parent_menu = $request->parent_menu;

        $insertInMenu = Menu::create([
            'name' => $request->name,
            'link' => $request->link,
            'parent_menu' => $parent_menu,
            'sequence' => $request->sequence,
            'status' => $request->status,
            'created_by' => $logged_user_id
        ]);

        return redirect('menucreation')->with('success', 'Menu has been added Successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $menu = new Menu();
        $menu_data = $menu->multiLabelMenu();
        $edit_menu = Menu::find($id);
        $commonClass = new CommonClass();
        return view('menucreation.edit', compact('all_menus','edit_menu', 'commonClass','menu_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'status' => 'required',
        ]);

        $logged_user_id = Auth::user()->id;
        if($request->parent_menu==null)
            $parent_menu = 0;
        else
            $parent_menu = $request->parent_menu;

        $updateInUserCreation = Menu::where('id',$id)->update([
            'name' => $request->name,
            'link' => $request->link,
            'parent_menu' => $parent_menu,
            'sequence' => $request->sequence,
            'status' => $request->status,
            'modified_by' => $logged_user_id
        ]);

        return redirect('menucreation')->with('success', 'Menu has been Updated Successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('menucreation')->with('success', 'Menu has been deleted Successfully.');
    }
}
