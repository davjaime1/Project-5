<!doctype html>

<html lang="en">
<head>
    <?php 
        use \App\Http\Controllers\UserController;
    ?>
    <meta charset="utf-8">

    <title>Contact Page</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Resources/CSS/ciudad.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"  rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Resources/CSS/contact.css') }}">

    <script>
        function validateContactForm()
        {
            var name = document.forms["ContactForm"]["name"].value;
            var email = document.forms["ContactForm"]["email"].value;
            var subject = document.forms["ContactForm"]["subject"].value;
            var message = document.forms["ContactForm"]["message"].value;

            const regex3 = RegExp('^[A-Z]|[a-z]|[0-9]@gmail.com$');

            if (name == "") {
             alert("Name field cannot be empty");
             return false;
          }
          else if(email == ""){
              alert("Email field cannot be empty");
             return false;
          }
          else if(subject == ""){
              alert("Subject field cannot be empty");
             return false;
          }
          else if(message == ""){
              alert("Message field cannot be empty");
             return false;
          }
          else if(!email.test(regex3))
          {
            alert("Email field must contain @gmail.com");
             return false;
          }
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

<body>  
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
                                <li><a class="current" href="{{ action('UserController@contact') }}">CONTACTO</a></li>
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
        <div class="BottomTriangle"></div>  
        <div class="Contact">
            <img class="TinyBurger" src="Resources/Images/Burguer.png" alt="Tiny Burger">
            <h1>Di hola</h1>
            <p class="WhiteBig">
                Di hola, envíanos un mensaje
            </p>
            <p class="White">
                Envianos tus comentarios y suguerencias ustedes son importante para nosotros
            </p>
            <form name="ContactPage" class="contact" action="{{action('UserController@contactme')}}" onsubmit="return validateContactForm()" method="post">
            {{csrf_field()}}
                <label style="padding-right: 20px;">
                <input class="field_sizes1" type="text" id="fname" name="name" placeholder="Name" size="68" required>
                </label>    
                <input class="field_sizes1" type="text" id="lname" name="email" placeholder="Email" size="68" required pattern="^[\w.+\-]+@gmail\.com$"><br>
                <input class="field_sizes1" type="text" id="lname" name="subject" placeholder="Subject" size="142" required><br>
                <textarea name="message" cols="142" rows="10" placeholder="Message" required></textarea><br>
                <input type="submit" value="ENVIAR MENSAJE" class="menu_button">
              </form> 
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