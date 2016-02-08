
<!DOCTYPE html>
<html>
  <head>
    <title>Simple StackExchange - Login</title>	
    <link href="css/mainstyle.css" rel="stylesheet">
  </head>
  <body> 
    <header id="top" class="header">
      <div class="text-vertical-center">
        <h1>Login</h1>			
	<form method="POST" action="http://localhost:8082/IdentityServices/Token">    
          <div>
              <h2>Email<span class="error">* : <input type ="text" name="uname" value=""> </span></h2>
          </div>
          <div>
              <h2>Password<span class="error">* : <input type ="password" name="pword" value=""> </span></h2> 
          </div>
          <div>		
            <input type="submit" name="submit" value="Submit" class="btn btn-dark btn-lg">
          </div>
        </form>
      </div>
    </header>
  </body>
</html>
