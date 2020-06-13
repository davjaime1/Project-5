<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Page</title>

    <link rel="stylesheet" type="text/css" href="Resources/CSS/ciudad.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"  rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="Resources/CSS/index.css">

    <script>
        function openMenu(evt, foodName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(foodName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        
          function validateLoginForm()
         {
            var username = document.forms["LoginForm"]["username"].value;
            var password = document.forms["LoginForm"]["password"].value;

            

            const regex = RegExp('^[A-Z]|[a-z]{8,10}$');

            if (username == "") {
               alert("Username field cannot be empty");
               return false;
            }
            else if(password == ""){
                alert("Password field cannot be empty");
               return false;
            }
            else
            {
                return true;
            }
         }
         function validateRegisterForm()
         {
            var username = document.forms["RegisterForm"]["username"].value;
            var email = document.forms["RegisterForm"]["email"].value;
            var password = document.forms["RegisterForm"]["password"].value;
            var reppass = document.forms["RegisterForm"]["reppass"].value;
            var address = document.forms["RegisterForm"]["address"].value;

            

            const regex = RegExp('^[A-Z]|[a-z]{8,10}$');
            const regex2 = RegExp('^[A-Z]|[a-z]|[0-9]@gmail.com$');

            if (username == "") {
               alert("Username field cannot be empty");
               return false;
            }
            else if(email == ""){
                alert("Email field cannot be empty");
               return false;
            }
            else if(password == ""){
                alert("Password field cannot be empty");
               return false;
            }
            else if(reppass == ""){
                alert("Repeat Password field cannot be empty");
               return false;
            }
            else if(address == ""){
                alert("Address field cannot be empty");
               return false;
            }
            else if(!password.test(regex))
            {
                alert("Password field must be between 8 and 10 charachters long");
               return false;
            }
            else if(!email.test(regex2))
            {
                alert("Email field must contain @gmail.com");
               return false;
            }
            else if(password!=reppass)
            {
                alert("Passwords are not equal");
               return false;
            }
            else{
                return true;
            }
         }
    </script>
</head>
    <div class="HeaderDiv">
        <header>
                <table class = "header">
                    <tr>
                        <td><img class="Ibra" src="Resources/Images/5.png" alt="Ibra's Logo"></td>
                        <td>
                            <nav class="head">
                                <li><a href="{{ action('UserController@home') }}">INICIO</a></li>
                                <li><a href="{{ action('UserController@aboutus') }}">SOBRE NOSOTROS</a></li>
                                <li><a href="{{ action('UserController@menu') }}">MENU</a></li>
                                <li><a href="http://djj3612.uta.cloud/Jaime_ciudad/Blog.html/">BLOG</a></li>
                                <li><a href="{{ action('UserController@contact') }}">CONTACTO</a></li>
                                <li><a class="current">USER</a></li>
                                <li><a href="{{ action('UserController@home') }}">LOGOUT</a></li>
                            </nav>
                        </td>
                    </tr>
                </table>
        </header>
        <div class="TopTriangle">
        </div>  
        <p class="top"></p>
        
        <h1>User Page</h1>
    </div>
    <div class="Menu">
        <img class="TinyBurger" src="Resources/Images/Burguer.png" alt="Tiny Burger">
        <h2 class="MostSold">User Changes</h2> 
        <div class="tab">
            <table class="menu_button_tab">
                <tr class="tab_row">
                <td class = "tab"><button class="tablinks active" onclick="openMenu(event, 'Reset')">Reset Password</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'TODOS')">Todos</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Pollo')">Pollo</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Carne')">Carne</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Mixta')">Mixta</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'de_todito')">De Todito</button></td>
                </tr>
            </table>
            <div id="Reset" class="tabcontent" style="display: block;">
                <table class="MostSold">
                    <tr>
                        <td>
                        <form name="ResetPage" class="contact" action="{{ action('UserController@resetpass') }}" method="post">
                        {{csrf_field()}}
                            <label style="padding-right: 20px;">
                            <input class="field_sizes1" type="text" id="fname" name="username" placeholder="Username" size="68" required>
                            </label>    
                            <input class="field_sizes1" type="text" id="lname" name="password" placeholder="Password" size="68" required><br>
                            <input type="submit" value="Update Password" class="menu_button">
                        </form>  
                        </td>
                    </tr>
                </table> 
            </div>

            <div id="TODOS" class="tabcontent">
                <table class="MostSold">
                    @php
                        $count = 0;
                    @endphp
                    <tr>
                    @foreach($todos as $items)
                        @if($count===0)
                        {
                            <tr>
                            <td class="menu2">
                                <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$12.00</p></div>
                            </td>
                            @php
                                $count = 1;
                            @endphp
                        }
                        @else($count===1)
                        {
                            <td class="menu2">
                                <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$13.00</p></div>
                            </td>
                            </tr>
                            @php
                                $count = 0;
                            @endphp
                        }
                        @endif
                     @endforeach
                </table>
            </div>
            
            <div id="Pollo" class="tabcontent">
                <table class="MostSold">
                    @php
                        $count = 0;
                    @endphp
                    <tr>
                    @foreach($pollo as $items)
                        @if($count===0)
                        {
                            <tr>
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$12.00</p></div>
                            </td>
                            @php
                                $count = 1;
                            @endphp
                        }
                        @else($count===1)
                        {
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$13.00</p></div>
                            </td>
                            </tr>
                            @php
                                $count = 0;
                            @endphp
                        }
                        @endif
                     @endforeach
                </table> 
            </div>
            
            <div id="Carne" class="tabcontent">
                <table class="MostSold">
                    @php
                        $count = 0;
                    @endphp
                    <tr>
                    @foreach($carne as $items)
                        @if($count===0)
                        {
                            <tr>
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$12.00</p></div>
                            </td>
                            @php
                                $count = 1;
                            @endphp
                        }
                        @else($count===1)
                        {
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$13.00</p></div>
                            </td>
                            </tr>
                            @php
                                $count = 0;
                            @endphp
                        }
                        @endif
                     @endforeach
                </table>
            </div>

            <div id="Mixta" class="tabcontent">
                <table class="MostSold">
                    @php
                        $count = 0;
                    @endphp
                    <tr>
                    @foreach($mixta as $items)
                        @if($count===0)
                        {
                            <tr>
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$12.00</p></div>
                            </td>
                            @php
                                $count = 1;
                            @endphp
                        }
                        @else($count===1)
                        {
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$13.00</p></div>
                            </td>
                            </tr>
                            @php
                                $count = 0;
                            @endphp
                        }
                        @endif
                     @endforeach
                </table>
            </div>

            <div id="de_todito" class="tabcontent">
                <table class="MostSold">
                    @php
                        $count = 0;
                    @endphp
                    <tr>
                    @foreach($de_todito as $items)
                        @if($count===0)
                        {
                            <tr>
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$12.00</p></div>
                            </td>
                            @php
                                $count = 1;
                            @endphp
                        }
                        @else($count===1)
                        {
                            <td class="menu2">
                            <a href="{{ action('UserController@order') }}">
                                <img class="SecondMenu" src="Resources/Images/{{$items->image}}" alt="TodosBurger#1">
                                <div class="Top_p_left"><p class="Name2">{{$items->image_text}}</p></div>
                                <div class="Top_p_right"><p class="RedPrice">$13.00</p></div>
                            </td>
                            </tr>
                            @php
                                $count = 0;
                            @endphp
                        }
                        @endif
                     @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="Footer">
        <div class="TopTriangle2"></div>
        <table class="Footer">
            <tr>
                <td>
                    <img class="Ibra2" src="Resources/Images/5.png" alt="Ibra's Logo">
                </td>
            </tr>
            <tr>
                <td>
                    <p class="Green">
                        Habla a:
                    </p>
                    <p class="White">
                        Av. Intercomunal, sectro la Mora, calle 8
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="Green">
                        Telefono:
                    </p>
                    <p class="White">
                        +58 251 261 00 01
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="Green">
                        Correo:
                    </p>
                    <p class="White">
                        yourmail@gmail.com
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><i class="fa fa-pinterest white" aria-hidden="true"></i> <i class="fa fa-facebook-f white"></i> <i class="fa fa-twitter white"></i> <i class="fa fa-dribbble white"></i> <i class="fa fa-linkedin-square white"></i> <i class="fa fa-vimeo-square white"></i></p>
                </td>
            </tr>
            <tr>
                <td class="td_padding">
                    <p class="White">Copyright &#169 2020 Todos los derechos reservados | Este sitio esta hecho con &#9829 por DiazApps</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>