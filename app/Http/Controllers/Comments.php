<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;

class Comments extends Controller {

   public function all() {
   	    // Get all comments
   		$comments = DB::table("comments")->get();
   		// return it as json encoded
		return response()->json($comments);
   }

}
