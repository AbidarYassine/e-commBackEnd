<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class BaseController extends Controller
{
    public function sendResponse($result , $message){

              $response =[

              	'success' => true,
              	'data' => $result,
              	'message' => $message 
              ];

          return response() ->json($response , 200);
    }



    public function sendError($error , $errorMessage =[] , $code = 404){

              $response =[

              	'success' => false,
              	'data' => $result,
              	'message' => $error 
              ];

              if(!empty($errorMessage)){

              	$response['date']= $errorMessage;
              }

          return response() ->json($response , $code);
    }
}
