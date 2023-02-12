<?php

namespace App\Services;

use Illuminate\Http\Response;


class HelperService
{
    public function displayErrors($validator)
    {
        $errors = $validator->errors()->toArray();

        $error_messages = [];
        foreach ($errors as $key => $error) {
            $error_messages[] = [
                'key' => $key,
                'message' => $error[0]
            ];
        }

        return response()->json([
            'result' => false,
            'status_code' => Response::HTTP_BAD_REQUEST,
            'errors' => $error_messages
        ], Response::HTTP_BAD_REQUEST);
    }
}
