<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class downloadController extends Controller
{



   public function download(Request $request)
   {


  

        return response()->download($request->file_name);
   }

  
}