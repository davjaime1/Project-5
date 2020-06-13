<!doctype html>

<html lang="en">
<head>
    <?php 
        use \App\Http\Controllers\AdminController;
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

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
                                <li><a class="current" >ADMIN</a></li>
                                <li><a href="{{ action('UserController@home') }}">LOGOUT</a></li>
                            </nav>
                        </td>
                    </tr>
                </table>
        </header>
        <div class="TopTriangle">
        </div>  
        <p class="top"></p>
        
        <h1>Admin Page</h1>
    </div>
    <div class="Menu">
        <img class="TinyBurger" src="Resources/Images/Burguer.png" alt="Tiny Burger">
        <h2 class="MostSold">Admin Changes</h2> 
        <div class="tab">
            <table class="menu_button_tab">
                <tr class="tab_row">
                <td class = "tab"><button class="tablinks active" onclick="openMenu(event, 'Inicio')">Inicio</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Sobre')">Sobre Nosotros</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Menu')">Menu</button></td>
                <td><button class="tablinks" onclick="openMenu(event, 'Contact')">Contact</button></td>
                </tr>
            </table>
            <div id="Inicio" class="tabcontent" style="display: block;">
                <table class="MostSold">
                    <tr>
                        <td>
                        <form name="InicioPage" class="contact" action="{{action('AdminController@changeHome')}}" method="post">
                        {{csrf_field()}}
                            <label style="padding-right: 20px;">
                            <input class="field_sizes1" type="text" id="fname" name="title" placeholder="Title" size="68" required>
                            </label>    
                            <input class="field_sizes1" type="text" id="lname" name="subtitle" placeholder="Sub Title" size="68" required><br>
                            <textarea name="history1" cols="142" rows="10" placeholder="History1" required></textarea><br>
                            <textarea name="history2" cols="142" rows="10" placeholder="History2" required></textarea><br>
                            <input type="submit" value="Update Inicio Page" class="menu_button">
                        </form>  
                        </td>
                    </tr>
                </table> 
            </div>
            
            <div id="Sobre" class="tabcontent">
                <table class="MostSold">
                    <tr>
                    <td>
                        <form name="SobrePage" class="contact" action="{{action('AdminController@changeAbout')}}" method="post">
                        {{csrf_field()}}
                            <label style="padding-right: 20px;">
                            <input class="field_sizes1" type="text" id="fname" name="title" placeholder="Title" size="68" required>
                            </label>    
                            <input class="field_sizes1" type="text" id="lname" name="subtitle" placeholder="Sub Title" size="68" required><br>
                            <textarea name="who1" cols="142" rows="10" placeholder="Who are we? Section 1" required></textarea><br>
                            <textarea name="who2" cols="142" rows="10" placeholder="Who are we? Section 2" required></textarea><br>
                            <textarea name="who3" cols="142" rows="10" placeholder="Who are we? Section 3" required></textarea><br>
                            <textarea name="client1" cols="142" rows="10" placeholder="Client Section 1" required></textarea><br>
                            <textarea name="client2" cols="142" rows="10" placeholder="Client Section 2" required></textarea><br>
                            <textarea name="client3" cols="142" rows="10" placeholder="Client Section 3" required></textarea><br>
                            <input type="submit" value="Update Sobre Nosotros Page" class="menu_button">
                        </form>  
                        </td>
                    </tr>
                </table>
            </div>

            <div id="Menu" class="tabcontent">
            <table class="MostSold">
            <form method="post" class="contact" action="{{action('AdminController@addMenu')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="size" value="1000000">
                <input type="file" name="image">
                <input class="field_sizes1" type="text" id="fname" name="type" placeholder="Type" size="68" required>
                <textarea id="text" cols="142" rows="10" name="image_text" placeholder="Menu Item info"></textarea>
                <button type="submit" name="Upload" class="menu_button">POST</button>
            </form>
            </table>
            </div>

            <div id="Contact" class="tabcontent">
            <table class="MostSold">
                    <tr>
                    <td>
                        <form name="ContactPage" class="contact" action="{{action('AdminController@changeContact')}}" method="post">
                        {{csrf_field()}}
                            <label style="padding-right: 20px;">
                            <input class="field_sizes1" type="text" id="fname" name="title" placeholder="Title" size="68" required>
                            </label>    
                            <input class="field_sizes1" type="text" id="lname" name="subtitle" placeholder="Sub Title" size="68" required><br>
                            <input type="submit" value="Update Contact Page" class="menu_button">
                        </form>  
                        </td>
                    </tr>
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