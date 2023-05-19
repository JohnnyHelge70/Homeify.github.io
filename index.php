<?php
require_once 'db_connect.php';
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-EXAMPLE_HASH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 320px) and (max-width: 600px)" href="mobile.css" />
    <title>Furniture</title>
</head>
<style>
#btn_top {
  display: none;
  position: fixed;
  bottom: 160px;
  right: 30px;
  font-size: 18px;
  border: none;
  outline: none;
  color: black;
  cursor: pointer;
}

#btn_top:hover {
  background-color: #555;
}


.form-popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 380px;
    padding: 20px 30px;
    background: #fff;
    box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    z-index: 11;
  }
  
  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }
  
  /* Full-width input fields */
  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  
  /* When the inputs get focus, do something */
  .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  
  /* Set a style for the submit/login button */
  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }
  
  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }
  
  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
  .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 10;
    }

    .logout-dropdown {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.profile-container:hover .logout-dropdown {
    display: block;
}

.logout-link {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.logout-link:hover {
    background-color: #f1f1f1;
}

</style>
<body>
    <button onclick="topFunction()" class="btn" id="btn_top" title="Go to top"><i class="fas fa-chevron-circle-up fa-2x"></i></button>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">

                <!--  Logo  -->

                <a class="navbar-brand" href="index.php"><img src="web page pics\Logo.png" height="50px"></a>
                    
                <!--  Nav Menu  -->
                    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenu" aria-controls="navbarmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarmenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="Beds.php">Browse all</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Beds.php">Beds</a>
                                <a class="dropdown-item" href="#">Chairs</a>
                                <a class="dropdown-item" href="#">Sofas</a>
                                <a class="dropdown-item" href="#">Tables</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Rooms</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Beds.php">Bedroom</a>
                            <a class="dropdown-item" href="#">Living Room</a>
                            <a class="dropdown-item" href="#">Kitchen</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About_Us.php">About us</a>
                        </li>
                    </ul>
                </div>
                    
                <!--  Search Bar  -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 mr-md-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit">Search</button>
                </form>

                <!--  Icons  -->
                <div>
                    <a class="nav-item" href="cart.php"><i class="fas fa-shopping-basket fa-lg" style="color: black;"></i></a>
                </div>


                <div class="profile-container">
                        <button class="open-button" onclick="openForm()" onmouseover="showLogout()" onmouseout="hideLogout()" style="background: transparent; border: none;">
                            <i class="fas fa-user fa-lg" style="color: black;"></i>
                        </button>
                        <div class="logout-dropdown">
                            <a href="logout.php" class="logout-link">Logout</a>
                        </div>
                    </div>
                    <div class="form-popup" id="myForm">
                    <form method="POST" action="login.php" class="form-container">
                        <h1>Login</h1>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>

                        <button type="submit" class="btn">Login</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        <a href="registration.php" id="signup">Sign Up</a>
                    </form>
                </div>



        </nav>
    </header>
        
    <!--  Main  -->

    <section class="container">
        <div class="row">

        <!--  Slider  -->
            
            <div id="carouselIndicator" class="carousel slide mt-4 col-12" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselIndicator" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicator" data-slide-to="1"></li>
                <li data-target="#carouselIndicator" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="web page pics/BedRoomMain.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="room_link" href="Beds.php">Bedroom</a>
                        <p class="room_description">Vitae aliquet nec ullamcorper sit amet</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="web page pics/KitchenMain.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="room_link" href="#">Kitchen</a>
                        <p class="room_description">Auctor augue mauris augue neque gravida in</p>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <img src="web page pics/LivingRoomMain.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="room_link" href="#">Living Room</a>
                        <p class="room_description">Morbi non arcu risus quis varius quam quisque</p>
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselIndicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--  Slider  -->

        <div class="row my-4  justify-content-between align-items-stretch">
            <div class="col-lg-6 col-md-6 col-12 m-0">
                <div class="row" style="object-fit:cover;" height="100%" width="100%">
                    <div class="col">
                        <img class="img-responsive" style="object-fit:cover;" height="100%" width="100%" src="web page pics/bedroom.jpg" alt="">
                    </div>
                </div>
                <div class="row mt-4" style="object-fit:cover;" height="100%" width="100%">
                    <div class="col">
                        <img class="img-responsive" style="object-fit:cover;" height="100%" width="100%" src="web page pics/chest.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="row">
                    <div class="col">
                        <img class="img-responsive" style="object-fit:cover;" height="100%" width="100%" src="web page pics/Closet(copy).jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!--  Items  -->

        <div class="row" style="margin-top: 3rem;">
            <div class="col-lg-3">
                <a class="item" href="Beds.php"><span class="item_image"><img class="img-responsive" src="web page pics/Beds.jpg" style="object-fit:cover;" height="100%" width="100%" alt=""></span>
                <span class="item_title">Beds</span></a>
            </div>
            <div class="col-lg-3">
                <a class="item" href="#"><span class="item_image"><img class="img-responsive" src="web page pics/Chairs.jpg" style="object-fit:cover;" height="100%" width="100%" alt=""></span>
                <span class="item_title">Chairs</span></a>
            </div>
            <div class="col-lg-3">
                <a class="item" href="#"><span class="item_image"><img class="img-responsive" src="web page pics/Sofas.jpg" style="object-fit:cover;" height="100%" width="100%" alt=""></span>
                <span class="item_title">Sofas</span></a>
            </div>
            <div class="col-lg-3">
                <a class="item" href="#"><span class="item_image"><img class="img-responsive" src="web page pics/Tables.jpg" style="object-fit:cover;" height="100%" width="100%" alt=""></span>
                <span class="item_title">Tables</span></a>
            </div>
        </div>
    </section>

    <!--  Footer  -->

    <footer class="bg-dark text-center text-white mt-4" style="background-color: #092834 !important;">
        <div class="container-fluid pt-4 pb-0">
            <!--  Social media  -->
            <section class="row align-items-lg-center">
                <div class="col-lg-6 us_footer">
                    <a class="footer-link" href="About_Us.php">About us</a>
                    
                    <a class="footer-link" href="#">Contact us</a>
                </div>
                <div class="col-lg-4 social_footer">
                    <!--  Instagram  -->
                    <a id="footer_icon" href="#"><i class="fab fa-instagram fa-2x" style="color: black;"></i></a>
                    
                    <!--  Facebook  -->
                    <a id="footer_icon" href="#"><i class="fab fa-facebook fa-2x" style="color: black;"></i></a>
            
                    <!--  Twitter  -->
                    <a id="footer_icon" href="#"><i class="fab fa-twitter fa-2x" style="color: black;"></i></a>
                </div>
                    <!--  Logo  -->
                <div class="col-lg-2 logo_footer">
                    <a id="Logo" href="index.php"><img src="web page pics\Logo.png"></a>
                </div>
            </section>
        </div>
      
        <!-- Copyright -->
        <div class="text-center p-3">
          © 2020 Copyright:
          <a class="text-white" href="index.php">Furniture.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <div class="overlay" id="overlay"></div>
  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("overlay").style.display = "block";
      document.body.style.overflow = "hidden";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
      document.getElementById("overlay").style.display = "none";
      document.body.style.overflow = "auto";
    }
  </script>
    <script>
        var btn_top = document.getElementById("btn_top");
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            btn_top.style.display = "block";
          } else {
            btn_top.style.display = "none";
          }
        }
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }

        // JavaScript code
document.addEventListener('DOMContentLoaded', function() {
    var logged_in = <?php echo (isset($_SESSION['user_id'])) ? 'true' : 'false'; ?>;

    function showLogout() {
        if (logged_in) {
            document.querySelector('.logout-dropdown').style.display = 'block';
        }
    }

    function hideLogout() {
        document.querySelector('.logout-dropdown').style.display = 'none';
    }

    var profileButton = document.querySelector('.open-button');
    var logoutDropdown = document.querySelector('.logout-dropdown');

    // Mouseenter event listener for profile button
    profileButton.addEventListener('mouseenter', showLogout);

    // Mouseleave event listener for profile button
    profileButton.addEventListener('mouseleave', function() {
        setTimeout(hideLogout, 300);
    });
});




    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>