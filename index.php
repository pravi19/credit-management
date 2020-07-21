<?php
$mysqli=new mysqli("localhost","demo","uo9ydfTFWQ4dsa5X","user");


    ?>
<!DOCTYPE HTML> 
<html>
	<head>
		<title>Credit Manangement System</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css"> 
	</head>
    <body>
        <header>
              <nav class="navbar navbar-expand-lg custom-navbar sticky">
                  <div class="container  main-nav">
                      <a class="navbar-brand" href="#home">Credit Management</a>
                      <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                          <li class="nav-item active">
                            <a class="nav-link" href="#home">Home<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#about-us">About Us</a>
                          </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Log In</a>
                          </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#contact-us">Contact Us</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>
          <div class="home-page" id="home">

                <div class="jumbotron text-center jumbotron-fluid bg-transparent">
                    <div class="container home-text">
                      <h1>Credit Management</h1>
                      <h3 class="text-white">Transfer credits easily!</h3>
                      <a class="btn btn-primary btn1" href="#about-us" role="button">Learn more!</a>
                    </div>
            </div>
          </div>
          </header>
         <section class="about-us" id="about-us">
          <div class="container">
                <h2 class="headings h2">Manage your Credits!</h2>
                <p >
                    We let you transfer credits easily between multiple users at any time from any place in just one click!
                </p>
                
                    <a class="btn btn-primary btn1" href="view_all_users.php" role="button">View Users</a>
               
            </div>
      </section>
           <section id="contact-us">
                <h2 class="headings h2">Contact US</h2>
                <form>
                                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Your message</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Send me Newsletter</label>
                  </div>
                  <button type="submit" class="btn btn-primary btn1 ">Send!</button>
                   

                  
                </form>
          
        </section>
        
            
        <footer id="footer">
            <div class="container">
                <p class="lead">
                    Made by Pravitharan
                </p>
            </div>
            
            </footer>
    </body>
</html>
