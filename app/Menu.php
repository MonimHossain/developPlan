<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name','link','parent_menu','sequence','status','created_by','modified_by'];

    public function multiLabelMenu()
    {
        $parent_menu = array();
        $sub_menu = array();
        $list = array();
        $items = DB::table('menus')
            ->where('status', '=',1)->get();

        $stack = array();
        $child_list = array();

        $stack[] =&$items[0];
        while(!empty($stack))
        {
            $parent_element = array_pop($stack);
            $parent_element->children = [];
            foreach ($items as &$item)
            {
                if($item->parent_menu == $parent_element->id)
                {
                    $parent_element->children[] =  $item;
                    $stack[] = $item;
                }
            }
        }
        return($items[0]);
    }

    public function selectBoxMaker($rootItem, $outputArray = false)
    {
        //dd($rootItem);
        $stack = array();
        $element = array();
        $rootItem->space = "";
        $stack[] = &$rootItem;
        $allMenuItem = array();
        $totalString = "";
        while(!empty($stack)) {
            $element = array_pop($stack);
            if($outputArray)
                $allMenuItem[] = [
                    'id' => $element->id,
                    'value' => $element->space.$element->name
                ];
            else
                $totalString .= "<option value='{$element->id}'>{$element->space}{$element->name}</option>";

            $childSpaces = $element->space. '&nbsp;  &nbsp; ' ;
            if(!empty($element->children))
            {
                $children = array_reverse($element->children);

                foreach ( $children as $child) {
                    $child->space = $childSpaces;
                    $stack[] = $child;
                    // echo $child;
                }
            }
        }
        //dd($totalString);
        if($outputArray)
            return $allMenuItem;
        else
            return "<select>$totalString</select>";
    }



    public function userPrivilegeMaker($rootItem, $outputArray = false)
    {
        $stack = array();
        $element = array();
        $rootItem->space = "";
        $stack[] = &$rootItem;
        $allMenuItem = array();
        $totalString = "";
        while(!empty($stack)) {
            $element = array_pop($stack);
            $actionCheckboxes = "<input type='checkbox' name='action_check[]' value='save' id='add_check'> Save 
                                 <input type='checkbox' name='action_check[]' value='edit' id='add_check2'> Edit
                                 <input type='checkbox' name='action_check[]' value='delete' id='add_check'> Delete
                                 <input type='checkbox' name='action_check[]' value='approval' id='add_check'> Approval";

            $name="<input type='checkbox' name='menu_check[]' value='$element->id' id='menu_check'>".$element->id."_".$element->name;

            if($outputArray)
                $allMenuItem[] = [
                    'id' => $element->id,
                    'value' => $element->space.$name
                ];
            else
                $totalString .= "{$element->space}{$name}";

            $childSpaces = $element->space. '&nbsp; &nbsp; &nbsp;' ;
            if(!empty($element->children))
            {
                $children = array_reverse($element->children);

                foreach ( $children as $child) {
                    $child->space = $childSpaces;
                    $stack[] = $child;
                }
            }
        }
        //dd($totalString);
        if($outputArray)
            return $allMenuItem;
        else
            return "$totalString";
    }

    public function BuildMenuTree()
    {
        $parent_menu = array();
        $sub_menu = array();
        $list = array();

        $items = DB::table('menus')->orderBy('parent_menu','asc')->get();

        $stack = array();
        $child_list = array();
        $firstItem = new \stdClass;
        $firstItem->id = $items[0]->id;
        $firstItem->name = $items[0]->name;
        $firstItem->open = true;
        $stack[] = &$firstItem;
        while(!empty($stack))
        {
            $parent_element = array_pop($stack);

            foreach ($items as &$item)
            {
                if($item->parent_menu == $parent_element->id)
                {
                    $newItem = new \stdClass;
                    $newItem->id = $item->id;
                    $newItem->name = $item->name;
                    $newItem->open = false;
                    $parent_element->children[] =  &$newItem ;
                    $stack[] = &$newItem;
                    unset($newItem);
                }
            }
        }
        return($firstItem);
    }
}
