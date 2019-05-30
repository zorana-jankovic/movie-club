<html>
    <head>
        <title> Movie Club </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/footer_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <ul class="menu cf">
                <li>
                    <a href="">Information</a>
                    <ul class="submenu">
                        <li><a href="<?php echo site_url("User/about"); ?>">About</a></li>
                        <li><a href="<?php echo site_url("User/contact"); ?>">Contact</a></li>
                    </ul>			
                </li>
                <li>
                    <a href="">Search</a>
                    <ul class="submenu">
                        <li><a href="<?php echo site_url("User/movies"); ?>">Movies</a></li>
                        <li><a href="<?php echo site_url("User/actors"); ?>">Actors</a></li>
                        <li><a href="<?php echo site_url("User/news"); ?>">News</a></li>
                    </ul>			
                </li>
                 <li><a href ="<?php echo site_url("User/logout"); ?>"> Logout </a></li>
            </ul>
        </header>


