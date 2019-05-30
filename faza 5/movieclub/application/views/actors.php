<br>

<div class="container">


    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> Actors </a></li>
        </ul>
    </div>

    <div class="row text-center">
        <div class="col-lg-12">
            <h1>Actors</h1>
            <hr>
        </div>

    </div>
        
        <?php
        foreach ($actors as $actor) {
            echo "<div class='row'> 
                <div class='col-sm-12'>
                    <div class='media'>
                        <div class='media-left'>
                            <a href='". site_url($controller . "/showActor/".$actor->id) ."'><img class='mr-3 img-fluid' src='" . base_url($actor->posterSrc) . "' style='width:250'></a>
                        </div>

                        <div class='media-body'>
                            <a href='". site_url($controller . "/showActor/".$actor->id) ."'><h3 class='mt-0' style='padding-top:10px;'>". $actor->name . "</h3></a>
                            <p>". $actor->highlight ."</p>

                        </div>
                    </div>

                </div>
            </div>
            <br>";  
        }
        
            ?>
        
    </div>
