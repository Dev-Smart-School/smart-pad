<?php

namespace App\Helpers;

class Response
{
  protected static $response = [
    'code' => 200,
    'status' => 'success',
    'message' => null,
    'data' => null
  ];

  public static function success($data = null, $message = null)
  {
    self::$response['message'] = $message;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['code']);
  }

  public static function authResponse($data = null, $message = null, $token = null){
      return response()->json([
        'code' => 200,
        'status' => 'success',
        'message' => $message,
        'data' => $data,
        'authorization' => [
          'token_type' => 'Bearer',
          'access_token' => $token
        ]
        ]);
  }

  public static function error($data = null, $message = null, $code = 400)
  {
    self::$response['status'] = 'error';
    self::$response['code'] = $code;
    self::$response['message'] = $message;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['code']);
  }

   public static function validation($data = null, $errors, $code = 422)
  {
   
    $formattedErrors = [];
    foreach ($errors->messages() as $field => $messages) {
        $formattedErrors[$field] = $messages[0];
    }

    // return $message;
    

    self::$response['status'] = 'error';
    self::$response['code'] = $code;
    self::$response['message'] = $formattedErrors;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['code']);
  }



}