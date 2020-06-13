<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //For the Nav setup
    public static function home()
    {
        $smalltitle = DB::table('pages')-> where('page','=','home')->value('small');
        $bigtitle = DB::table('pages')-> where('page','=','home')->value('big');
        $section1 = DB::table('pages')-> where('page','=','home')->value('section1');
        $section2 =DB::table('pages')-> where('page','=','home')->value('section2');

        $todos = DB::table('menus')->get();
        $pollo = DB::table('menus')->where('type', '=' ,'pollo')->get();
        $carne = DB::table('menus')->where('type', '=' ,'carne')->get();
        $mixta = DB::table('menus')->where('type', '=' ,'mixta')->get();
        $de_todito = DB::table('menus')->where('type', '=' ,'de todito')->get();

        return view('home') ->with(['smalltitle' => $smalltitle, 'bigtitle' => $bigtitle, 'section1' => $section1, 'section2' => $section2, 'todos' => $todos, 'pollo' => $pollo, 'carne' => $carne, 'mixta' => $mixta, 'de_todito' => $de_todito]);
    }

    public static function AboutUs()
    {
        $smalltitle = DB::table('pages')-> where('page','=','aboutus')->value('small');
        $bigtitle = DB::table('pages')-> where('page','=','aboutus')->value('big');
        $section1 = DB::table('pages')-> where('page','=','aboutus')->value('section1');
        $section2 =DB::table('pages')-> where('page','=','aboutus')->value('section2');
        $section3 =DB::table('pages')-> where('page','=','aboutus')->value('section3');
        $section4 =DB::table('pages')-> where('page','=','aboutus')->value('section4');
        $section5 =DB::table('pages')-> where('page','=','aboutus')->value('section5');
        $section6 =DB::table('pages')-> where('page','=','aboutus')->value('section6');
        
        return view('aboutus') ->with(['smalltitle' => $smalltitle, 'bigtitle' => $bigtitle, 'section1' => $section1, 'section2' => $section2
        , 'section3' => $section3, 'section4' => $section4, 'section5' => $section5, 'section6' => $section6]);
    }

    public static function Menu()
    {
        $smalltitle = DB::table('pages')-> where('page','=','menu')->value('small');
        $bigtitle = DB::table('pages')-> where('page','=','menu')->value('big');

        $todos = DB::table('menus')->get();
        $pollo = DB::table('menus')->where('type', '=' ,'pollo')->get();
        $carne = DB::table('menus')->where('type', '=' ,'carne')->get();
        $mixta = DB::table('menus')->where('type', '=' ,'mixta')->get();
        $de_todito = DB::table('menus')->where('type', '=' ,'de todito')->get();
        
        return view('menu') ->with(['smalltitle' => $smalltitle, 'bigtitle' => $bigtitle, 'todos' => $todos, 'pollo' => $pollo, 'carne' => $carne, 'mixta' => $mixta, 'de_todito' => $de_todito]);
    }

    public static function Contact()
    {
        $smalltitle = DB::table('pages')-> where('page','=','contact')->value('small');
        $bigtitle = DB::table('pages')-> where('page','=','contact')->value('big');
        return view('contact') ->with(['smalltitle' => $smalltitle, 'bigtitle' => $bigtitle]);

    }
    
    public static function admin()
    {
        return view('admin');
    }

    public static function AddUser(Request $request)
    {
        //Get the form data
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $reppass = $request->input('reppass');
        $address = $request->input('address');
        $role = "User";

        //Perform validations
        $emailregex = "/([A-Z]|[a-z]|[0-9])*@gmail\.com/";

        if($username=="")
        {
            echo "<script type='text/javascript'> alert('Username is empty'); </script>";
            return self::home();
            exit();
        }
        else if($email=="")
        {
            echo "<script type='text/javascript'> alert('Email is empty');</script>";
            return self::home();
            exit();
        }
        else if($password=="")
        {
            echo "<script type='text/javascript'> alert('Password is empty');</script>";
            return self::home();
            exit();
        }
        else if($reppass=="")
        {
            echo "<script type='text/javascript'> alert('Repeat Password is empty');]</script>";
            return self::home();
            exit();
        }
        else if($address=="")
        {
            $conn->close();
            echo "<script type='text/javascript'> alert('Address is empty');</script>";
            return self::home();
            exit();
        }
        else if(!preg_match($emailregex, $email))
        {
            echo "<script type='text/javascript'> alert('Email does not contain @gmail.com');</script>";
            return self::home();
            exit();
        }
        else if($password!=$reppass)
        {
            echo "<script type='text/javascript'> alert('Paswords are not the smae');</script>";
            return self::home();
            exit();
        }
        else{

        //Here we query
        $newuser = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'role' => $role,
        ];

        User::create($newuser);

        //Then redirect to user page
        $todos = DB::table('menus')->get();
        $pollo = DB::table('menus')->where('type', '=' ,'pollo')->get();
        $carne = DB::table('menus')->where('type', '=' ,'carne')->get();
        $mixta = DB::table('menus')->where('type', '=' ,'mixta')->get();
        $de_todito = DB::table('menus')->where('type', '=' ,'de todito')->get();
        
        return view('user') ->with(['todos' => $todos, 'pollo' => $pollo, 'carne' => $carne, 'mixta' => $mixta, 'de_todito' => $de_todito]);
        }
    }

    public static function LoginUser(Request $request)
    {
        //Get form data
        $username = $request->input('username');
        $password = $request->input('password');

        //Perform validations
        if($username=="")
        {
            echo "<script type='text/javascript'> alert('Username is empty');</script>";
            return self::home();
            exit();
        }
        else if($password=="")
        {
            return self::home();
                        exit();
        }
        else{
            //Here we query
            $result = User::where('username','=',$username)
                        ->where('password','=',$password)
                        ->value('role');
            
            if(empty($result))
            {
                echo '<script language="javascript">';
                echo 'alert("Incorrect credentials")';
                echo '</script>';
                return self::home();
            }
            else if($result == 'User')
            {
                $todos = DB::table('menus')->get();
                $pollo = DB::table('menus')->where('type', '=' ,'pollo')->get();
                $carne = DB::table('menus')->where('type', '=' ,'carne')->get();
                $mixta = DB::table('menus')->where('type', '=' ,'mixta')->get();
                $de_todito = DB::table('menus')->where('type', '=' ,'de todito')->get();
        
                return view('user') ->with(['todos' => $todos, 'pollo' => $pollo, 'carne' => $carne, 'mixta' => $mixta, 'de_todito' => $de_todito]);
            }
            else
            {
                return view('admin');
            }
        }
    }

    public static function contactme(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $details = [
            'title' => $subject,
            'body' => $message,
        ];
       
        \Mail::to('davjaime1@gmail.com')->send(new \App\Mail\MyTestMail($details));
       
        dd("Sent email");
        return view('admin');
    }

    public static function resetpass(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        DB::update("update users set password = '$password' where username = '$username'");

        //Then redirect to page
        $todos = DB::table('menus')->get();
        $pollo = DB::table('menus')->where('type', '=' ,'pollo')->get();
        $carne = DB::table('menus')->where('type', '=' ,'carne')->get();
        $mixta = DB::table('menus')->where('type', '=' ,'mixta')->get();
        $de_todito = DB::table('menus')->where('type', '=' ,'de todito')->get();
        
        return view('user') ->with(['todos' => $todos, 'pollo' => $pollo, 'carne' => $carne, 'mixta' => $mixta, 'de_todito' => $de_todito]);
    }

    public static function order(Request $request)
    {
        echo "<script type='text/javascript'> alert('Your order will be ready for pickup soon.'); </script>";
        //Then redirect to page
        $todos = DB::table('menus')->get();
        $pollo = DB::table('menus')->where('type', '=' ,'pollo')->get();
        $carne = DB::table('menus')->where('type', '=' ,'carne')->get();
        $mixta = DB::table('menus')->where('type', '=' ,'mixta')->get();
        $de_todito = DB::table('menus')->where('type', '=' ,'de todito')->get();
        
        return view('user') ->with(['todos' => $todos, 'pollo' => $pollo, 'carne' => $carne, 'mixta' => $mixta, 'de_todito' => $de_todito]);
    }
    
}
