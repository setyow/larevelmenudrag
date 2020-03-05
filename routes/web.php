<?php
 
use Illuminate\Support\Facades\Input;
 
// function to view menu which are in order
Route::get('/', function () {
	$menu = DB::table('tbl_menus')->orderBy('order','ASC')->get();
    return view('menu',['menus'=>$menu]);
});
 
 
// To view Menu That are in database
Route::get('managemenu',function(){
	$menu = DB::table('tbl_menus')->orderBy('order','ASC')->get();
	return view('menuManage',['menus'=>$menu]);
});
 
// Function to order menus
Route::get('order-menu',function(){
        $menu = DB::table('tbl_menus')->orderBy('order','ASC')->get();
        $itemID = Input::get('itemID');
        $itemIndex = Input::get('itemIndex');
 
        foreach($menu as $value){
            return DB::table('tbl_menus')->where('menu_id','=',$itemID)->update(array('order'=> $itemIndex));
        }
});