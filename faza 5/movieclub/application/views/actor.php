<div class="container">

    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "<?php echo site_url($controller . "/actors"); ?>"> Actors </a></li>
            <li><a href="#" class="current"><?php echo $actor->name ?></a></li>
        </ul>
    </div>
    <div class="row text-center">
        <div class="col-lg-12">
            <h1><?php echo $actor->name ?></h1>
            <hr>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-4">
            <img class=" img-fluid" src="<?php echo base_url($actor->profileImgLeft) ?>">
        </div>
        <div class="col-sm-4">
            <form name="formSubscribe" action="<?php echo site_url($controller."/subscribe/".$actor->id) ?>" method="post">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-title" align="center">

                        </div>
                        <ul class="list-group list-group-flush lista">
                            <li class="list-group-item">Birthday: <?php echo $actor->birthday ?> </li>
                            <li class="list-group-item">Birthplace: <?php echo $state->city . "," . $state->state ?></li>
                        </ul>
                        <br>
                        <?php if ($controller!="Guest" && $controller!="Admin") {
                        echo "<button type='submit' class='btn btn-sm btn-success'>Subscribe &nbsp;<i class='far fa-bell'></i></button>";
                        }?>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-4">
            <img class=" img-fluid" src="<?php echo base_url($actor->profileImgRight) ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <br><br><br>
            <p><b>Biography</b><br>
                <?php echo $actor->biography ?>
                <br><br><br>
                <b>Fun facts</b><br>
                <?php echo $actor->funfact ?>
            </p>
        </div>
    </div>


</div>



