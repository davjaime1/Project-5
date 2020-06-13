<!doctype html>
<html lang="en">
<head>
    <?php 
        use \App\Http\Controllers\UserController;
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Resources/CSS/ciudad.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"  rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Resources/CSS/index.css') }}">
    

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
                                <li><a class="current" href="{{ action('UserController@home') }}">INICIO</a></li>
                                <li><a href="{{ action('UserController@aboutus') }}">SOBRE NOSOTROS</a></li>
                                <li><a href="{{ action('UserController@menu') }}">MENU</a></li>
                                <li><a href="http://djj3612.uta.cloud/Jaime_ciudad/Blog.html/">BLOG</a></li>
                                <li><a href="{{ action('UserController@contact') }}">CONTACTO</a></li>
                                <li><a href="javascript:void(0);" onclick="document.getElementById('id01').style.display='block'">REGISTRO</a></li>
                                <li><a href="javascript:void(0);" onclick="document.getElementById('id02').style.display='block'">INICIAR SESSION</a></li>
                            </nav>
                        </td>
                    </tr>
                </table>
        </header>
        <div class="TopTriangle">
        </div>  
        <p class="top">{{$smalltitle}}</p>
        
        <h1>{{$bigtitle}}</h1>
        <table class="menubutton"><tr><td><a href="{{ action('UserController@menu') }}" class="menu_button">VER MENÚ HOY</a></td></tr></table>
        <div class="BottomTriangle"></div>               
    </div>
    <div class="History" class="col-md-8 mb-4">
        <img class="TinyBurger" src="Resources/Images/Burguer.png" alt="Tiny Burger">
        <img class="LeftPic" src="Resources/Images/story1.png" alt="Ibra's Logo">
        <img class="RightPic" src="Resources/Images/story2.png" alt="Ibra's Logo">
        <h2>Nuestra historia</h2>
        <table class="History">
            <tr>
                <td>
                    <p>
                        {{$section1}}
                    </p>
                </td>
                <td>
                    <p>
                        {{$section2}}
                    </p>  
                </td>
            </tr>
        </table>
    </div>
    <div class="MostSold">
        <img class="TinyBurger" src="Resources/Images/Burguer.png" alt="Tiny Burger">
        <h2 class="MostSold">Las más venididos</h2>
        <table class="MostSold">
            <tr>
                <td class="MostSold">
                    <img class="Burgers" src="Resources/Images/burguer1.png" alt="Burger#1">
                    <p class="Name">Mixta</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
                <td class="MostSold">
                    <img class="Burgers" src="Resources/Images/burguer2.png" alt="Burger#2">
                    <p class="Name">Pollo</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
                <td class="MostSold">
                    <img class="Burgers" src="Resources/Images/burguer3.png" alt="Burger#3">
                    <p class="Name">Carne</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
                <td class="MostSold2">
                    <img class="Burgers" src="Resources/Images/burguer1.png" alt="Burger#1">
                    <p class="Name">Mixta</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
            </tr>
            <tr>
                <td class="MostSold">
                    <img class="Burgers" src="Resources/Images/burguer2.png" alt="Burger#2">
                    <p class="Name">Pollo</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
                <td class="MostSold">
                    <img class="Burgers" src="Resources/Images/burguer3.png" alt="Burger#3">
                    <p class="Name">Carne</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
                <td class="MostSold">
                    <img class="Burgers" src="Resources/Images/burguer1.png" alt="Burger#1">
                    <p class="Name">Mixta</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
                <td class="MostSold2">
                    <img class="Burgers" src="Resources/Images/burguer2.png" alt="Burger#2">
                    <p class="Name">Pollo</p>
                    <p class="Price">$11.90</p>
                    <a href="Menu.html" class="menu_button_best menu_button_best2">Ordenar ahora</a>
                </td>
            </tr>
        </table>
        <table class="menubutton"><tr><td><a href="{{ action('UserController@menu') }}" class="menu_button_lower">VER MENÚ HOY</a></td></tr></table>
        <div class="BottomTriangle2"></div>               
    </div>
    <div class="Menu">
        <img class="TinyBurger" src="Resources/Images/Burguer.png" alt="Tiny Burger">
        <h2 class="MostSold">Nuestro menú</h2> 
        <div class="tab">
            <table class="menu_button_tab">
                <tr class="tab_row">
                <td class = "tab"><button class="tablinks active" onclick="openMenu(event, 'TODOS')">TODOS</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Pollo')">Pollo</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Carne')">Carne</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Mixta')">Mixta</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'de_todito')">De Todito</button></td>
                </tr>
            </table>
            <div id="TODOS" class="tabcontent" style="display: block;">
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
    <table class="menubutton"><tr><td><a href="{{ action('UserController@menu') }}" class="menu_button_lowerest">VER MENÚ HOY</a></td></tr></table>
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
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content modal">
          <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div class="imgcontainer">
                <img class="TinyBurger2" src="Resources/Images/Burguer.png" alt="Tiny Burger" style="display: inline;">
                <h1 style="color:black;font-size: 30px; display: inline; ">Registro de Usuario</h1>
            </div>

            <form method="post" action="{{action('UserController@AddUser')}}" onsubmit="return validateRegisterForm()">
            {{csrf_field()}}
            <div>
                    <label for="uname"><b>Nombre y apellido:</b></label><br>
                    <input type="text" name="username" required><br>
              
                    <label for="psw"><b>Correo:</b></label><br>
                    <input type="text" name="email" pattern="([A-Z]|[a-z]|[0-9])*@gmail.com" title="Email must contain @gmail.com" required><br>

                    <label for="psw"><b>Contraseña:</b></label><br>
                   <input type="password" name="password" pattern="[A-Za-z0-9_@./#&+-]{8,10}" title="Password must be between 8-10 characters, special characters allowed" required><br>

                   <label for="psw"><b>Repetir Contraseña:</b></label><br>
                   <input type="password" name="reppass" pattern="[A-Za-z_@./#&+-]{8,10}" title="Password must be between 8-10 characters, special characters allowed" required><br>

                    <label for="psw"><b>Direccion:</b></label><br>
                    <input type="text" name="address" required><br>
                      
                    <input type="submit" value="Cargar" style="background-color:red"></button>
                </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div id="id02" class="w3-modal">
        <div class="w3-modal-content modal">
          <div class="w3-container">
            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div class="imgcontainer">
                <img class="TinyBurger2" src="Resources/Images/Burguer.png" alt="Tiny Burger" style="display: inline;">
                <h1 style="color:black;font-size: 30px; display: inline; ">Registro de Usuario</h1>
            </div>
            <form method="post" action="{{action('UserController@LoginUser')}}" onsubmit="return validateLoginForm()">
            {{csrf_field()}}
                <div>
                    <label for="uname"><b>Usuario:</b></label><br>
                    <input type="text" name="username" required><br>
                    <label for="psw"><b>Contraseña:</b></label><br>
                    <input type="password" name="password" required><br>
                      
                    <input type="submit" value="Cargar" style="background-color:red"></button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>