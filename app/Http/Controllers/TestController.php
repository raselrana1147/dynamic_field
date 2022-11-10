<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class TestController extends Controller
{
    



public function welcome(){
		
	 return view('welcome');
}
    public function store(Request $request)
    {
    	dd($request->all());
    }

    public function search_cat(Request $request){
    	
    	 if ($request->isMethod("post")) {
               $data= Category::where('name','LIKE','%'.$request->search_value.'%')->get();
               if (count($data)) {
                 return \response()->json([
                    'data' => $data,
                    'msg'=>null,
                    'status_code' => 200
                ],200);
               }else{
                    return \response()->json([
                    'data' => $data,
                    'msg'=>"Nothing fount",
                    'status_code' => 200
                ],200);
                }
          }
             
    }
}
