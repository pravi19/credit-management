<!DOCTYPE HTML> 
<html>
	<head>
		<title>Our Users</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css"> 
	</head>
        <body>
              <nav class="navbar navbar-expand-lg custom-navbar sticky">
                  <div class="container  main-nav">
                      <a class="navbar-brand" href="index.php">Credit Management</a>
                    </div>
                  <ul class="navbar-nav ">
                          <li class="nav-item active">
                              <a class="nav-link" href="index.php">Log Out</a>
                          </li>
                  </ul>
                </nav>
          <div>
                      <h2>Our Users!</h2>
                    
            </div>
    
    <style>
        
        h3{
            margin: 10px 10px;
            text-align: center;
        }
        h2
        {
            font-size: 400%;
            color: black;
            text-align: center;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }
        table{
            margin: auto;
        }
    </style>
        <?php
$mysqli=new mysqli("localhost","demo","uo9ydfTFWQ4dsa5X","user");
$result=$mysqli->query("SELECT user_id, name, email, gender from users");
$result_count= $mysqli->field_count;

$html=    
"<html>
	<head>
    </head>
    <body>
            <table>
            <tr>
            <td><h3><b>USER ID</b></h3></td>
            <td><h3><b>NAME</b></h3></td>
            <td><h3><b>MAIL</b></h3></td>
            <td><h3><b>GENDER</b></h3></td>
            </tr>";
            
    while($row=$result->fetch_array())
    {
        $html.="<tr>";
        for($i=0;$i<$result_count;$i++)
        {
            $html.= "<td>"."<h3>".$row[$i]."</h3>"."</td>";
        }
        $html.="</tr>";

    }
$html.="
        </table>
        </body>
        </html>";
echo $html;
?>
    <div class="container">
        <br><br>
        <h3><b>Choose the user you want to transfer credits to</b></h3>
        

        
        <form name="myForm" class="form-horizontal" role="form" method="POST" action="#">
        
          <div class="form-group">
          
            <label for="user_id=" class="col-sm-2 control-label">User ID</label>
            
            <div class="col-sm-10">
            
              <input type="text" name="user_id" class="form-control" required>
            
            </div>
            </div>
          
          <div class="form-group">
            
            <div class="col-sm-10 col-sm-offset-2">
            
              <button type="submit" name="submit" class="btn btn-primary btn1">let's go</button>
            
            </div>
          
          </div>
                    <?php 
		
		$errors = "";
            $user_id ="";
		
		if (isset($_POST["submit"])) { 
		
		  if (!empty($_POST["user_id"])) { 
		  
			$user_id = filter_var($_POST["user_id"],FILTER_SANITIZE_MAGIC_QUOTES);
              $val=$mysqli->query("select name from users where user_id='$user_id' ");
              $row=$val->fetch_array();
            if($row[0]=="")
			$errors .= "Id doesnot exist Please re-enter.<br><br>";
		  
		  }
		  
		  if (!empty($errors)) { 
		
		  ?>
		  
		  <div class="alert alert-danger">
		  
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> The following errors occured:<br><br><?php echo $errors; ?>
		  
		  </div>
		  
		  <?php
		  
		  }
		  
		  else { 
		  ?>
           
          <?php 
             header("location: profiles.php?id=$user_id");
		  }
		  
		  
		  
		
		} // form isset test
		
		?>
        
        </form>
      
    </div> 
     <footer id="footer">
    <div class="container">
        <p class="lead">
            Made with &hearts; by Mahak Makharia
        </p>
    </div>

    </footer>
    </body>
</html>