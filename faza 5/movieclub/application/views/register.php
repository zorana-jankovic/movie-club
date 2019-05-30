<form class="loginform"  action="<?php echo site_url('Guest/submitRegistration') ?>" method="post">

    <h2 id="logintitle">  Register </h2>
    <p type="Email:"><input name="email" type="text" class="logininput" placeholder="Enter your email" value="<?php echo set_value('email') ?>"></input></p>
    <p type="Username:"><input name="username" type="text" class="logininput" placeholder="Enter your username" value="<?php echo set_value('username') ?>"></input></p>
    <p type="Password:"><input name="password" type="password" class="logininput" placeholder="Enter your password"></input></p>
    <input type="submit" class="loginbutton" value="Register"></input>

    <p><?php
        if (isset($mssg))
            echo "<font color='gray'><b>$mssg</b></font><br>";
        ?>
    </p>

    <div class="logindiv">
        
        <span class="loginspan far fa-user"></span>Already have an account?
        <span class="loginspan fab fa-envelope-o"></span><a class="loginformlink" href="<?php echo site_url("Guest/showLoginForm"); ?>"> Login now! </a>

    </div>

</form>