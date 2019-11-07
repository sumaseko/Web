<?php
?>

<html>
    <head>
        <title>Camagru | Registration</title>
        <link href="css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="reg">
            <div id="input-user">
                <form id="userform" action="" method="post">
                    <h1>Camagru | SignUp</h1>
                    <p>
                        <label for="lginUsername">Username</label>
                        <input id="lgUsername" name="lgUsername" type="text" placeholder="username" required>
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="email@email.com" required>
                    </p>
                    <p>
                        <label for="lginPasswd">Password</label>
                        <input id="lginPasswd" name="lgPasswd" type="password" placeholder="Password" required> 
                        <br />
                        <br /><label for="confirmPasswd">Confirm Password</label> 
                        <input id="confirmPasswd" name="confirmPasswd" type="password" placeholder="Confirm Password" required>
                        <br>
                        <?php
                            include "insert.php";
                        ?>
                </p>
                <button type="submit" class="btn btn-primary btn-block btn-large" name="regButton">SignUp</button>
            </form>
        </div>
    <h4>Have an account? <a href="http://localhost:8080/sumaseko/login.php">Sign in</a></h4>
    </div>
    </body>
</html>