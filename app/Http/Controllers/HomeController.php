<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Contacts;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function file_post(Request $request){
        $data = [
            "title" => "home page",
            "text" => "page"
        ];

        try{
            // echo "<pre>";
            $filepath = $request->file('contacts')->getpathName();
            $xml = simplexml_load_file($filepath);
            $contacts = json_decode(json_encode($xml), true);
            
            Contacts::insert($contacts['contact']);

            return back()->with([
                "success" => "You contacts have been saved!",
                "contacts" => $contacts
            ]);
        }catch(Exception $e){
            return back()->with("error", $e->getMessage());
        }
        
    }
}
