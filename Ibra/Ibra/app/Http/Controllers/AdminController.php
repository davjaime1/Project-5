<?php

namespace App\Http\Controllers;

use App\Menu;
use Storage;
use Input;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function addMenu(Request $request)
    {
        //Get form data
        $type = $request->input('type');
        $image_text = $request->input('image_text');

        //$postImage = new PostImage;
        $image = $request->file('image')->getClientOriginalName();
   
        //Add the image to the projects resources to be used when displaying menus
        $request->image->move(public_path('Resources\Images'), $image);

        //Here we query
        $newmenu = [
            'type' => $type,
            'image_text' => $image_text,
            'image' => $image,
        ];

        Menu::create($newmenu);

        return view('admin');
    }

    public static function changeHome(Request $request)
    {
        //Get form data
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $history1 = $request->input('history1');
        $history2 = $request->input('history2');

        DB::update("update pages set small = '$subtitle', big ='$title', section1 ='$history1', section2='$history2' where page = 'home'");

        //Then redirect to page
        return view('admin');
    }

    public static function changeAbout(Request $request)
    {
        //Get form data
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $who1 = $request->input('who1');
        $who2 = $request->input('who2');
        $who3 = $request->input('who3');
        $client1 = $request->input('client1');
        $client2 = $request->input('client2');
        $client3 = $request->input('client3');

        DB::update("update pages set small = '$subtitle', big ='$title', section1 ='$who1', section2='$who2', section3='$who3'
        , section4='$client1', section5='$client2', section6='$client3' where page = 'aboutus'");

        //Then redirect to page
        return view('admin');
    }

    public static function changeContact(Request $request)
    {
        //Get form data
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');

        DB::update("update pages set small = '$subtitle', big ='$title' where page = 'contact'");

        //Then redirect to page
        return view('admin');
    }
}
