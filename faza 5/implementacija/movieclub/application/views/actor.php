<div class="container-fluid mt-5">
    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url("Guest/index"); ?>"> Home</a></li>
            <li><a href = "<?php echo site_url("Guest/actors"); ?>"> Actors </a></li>
            <li><a href="#" class="current"><?php echo $actor->name ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1><?php echo $actor->name ?></h1>
            <hr>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <img class=" img-fluid" src="<?php echo base_url($actor->profileImgLeft) ?>">
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title" align="center">
                        <h3><b><?php echo $actor->name ?></b></h3>
                        <button type="button" class="btn btn-sm btn-success">Subscribe &nbsp;<i class="far fa-bell"></i></button>
                    </div>
                    <ul class="list-group list-group-flush lista">
                        <li class="list-group-item">Birthday: <?php echo $actor->birthday ?> </li>
                        <li class="list-group-item">Birthplace: <?php echo $actor->birthplace ?></li>
                    </ul>
                </div>
            </div>
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



