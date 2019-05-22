<!--<form name="loginform" action="<?php echo site_url('Guest/submitLogin') ?>" method="post">
    <?php if(isset($mssg))
        echo "<font color='red'>$mssg</font><br>";
    ?><table>
    <tr>
        <td>Korisnicko ime:</td>
        <td><input type="text" name="username" value="<?php echo set_value('username') ?>"/></td>
        <td><?php echo form_error("username","<font color='red'>","</font>"); ?></td>
    </tr>
    <tr>
        <td>Lozinka:</td>
        <td><input type="password" name="password"/></td>
        <td><?php echo form_error("password","<font color='red'>","</font>"); ?></td>
    </tr>
    <tr>
        <td><input type="submit" value="Log in"/></td>
    </tr>
    </table>
</form>-->

 <form class="loginform">
  <h2 id="logintitle">  Login </h2>
  <p type="Username:"><input  class="logininput" placeholder="Enter your username"></input></p>
  <p type="Password:"><input class="logininput" placeholder="Enter your password"></input></p>
  <button class="loginbutton">Login</button>
  <div class="logindiv">
    <span class="loginspan far fa-user"></span>Don't have an account?
    <span class="loginspan fab fa-envelope-o"></span> Register now!
  </div>
</form>