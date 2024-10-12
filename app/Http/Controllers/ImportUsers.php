<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportUsers extends Controller
{
    public static function import(Request $request) {
        if(($open = fopen('C:\Users\maken\OneDrive\Documents\users.csv', 'r')) !== false) {
            while(($data = fgetcsv($open, 1000, ",")) !== false) {
                DB::table("users")->insert([
                    "fname" => $data[1],
                ]);
                $array = $data;
 
            }
            return[
              "success" => true,
              "message" => "Import successfully"
            ];
         
        }
        else {
            return[
               "success" => false,
               "message" => "file doesnt exist"
            ];
        }
    }
}
