<html>
    <head>
        <title> Movie Club </title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/footer_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/movies_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/carousel_style.css">


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <header>
            <ul class="menu cf">
                <li><a href ="<?php echo site_url("Moderator/index"); ?>"> Home </a></li>
                <li><a href="<?php echo site_url("Moderator/about"); ?>">About</a></li>
                <li><a href="<?php echo site_url("Moderator/notifications"); ?>">Notifications</a></li>
                <li>
                    <a href="">Search</a>
                    <ul class="submenu">

                        <li><a href="<?php echo site_url("Moderator/movies"); ?>">Movies</a></li>
                        <li><a href="<?php echo site_url("Moderator/actors"); ?>">Actors</a></li>
                        <li><a href="<?php echo site_url("Moderator/directors"); ?>">Directors</a></li>

                    </ul>			
                </li>
                <li><a href="<?php echo site_url("Moderator/myMovies"); ?>">My movies</a></li>
                <li><a href=""> Add </a>
                    <ul class="submenu">
                        <li><a href="<?php echo site_url("Moderator/addMovie"); ?>"> Movie </a></li>
                        <li><a href="<?php echo site_url("Moderator/addActor"); ?>"> Actor </a></li>
                        <li><a href="<?php echo site_url("Moderator/addDirector"); ?>"> Director </a></li>
                        <li><a href="<?php echo site_url("Moderator/addNews"); ?>"> News </a></li>
                    </ul>			
                </li>
                <li><a href ="<?php echo site_url("Moderator/logout"); ?>"> Logout </a></li>
            </ul>
        </header>
        <br><br><br>

