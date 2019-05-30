<div class="container">
    
    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "<?php echo site_url($controller . "/directors"); ?>"> Directors </a></li>
            <li><a href="#" class="current"><?php echo $director->name ?></a></li>
        </ul>
    </div>
    <div class="row text-center">
        <div class="col-lg-12">
            <h1><?php echo $director->name ?></h1>
            <hr>
        </div>
    </div>
    
    
    
    <div class="row">
        <div class="col-sm-4">
            <img class=" img-fluid" src="<?php echo base_url($director->profileImgLeft) ?>">
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-title" align="center">
                        
                    </div>
                        <ul class="list-group list-group-flush lista">
                            <li class="list-group-item">Birthday: <?php echo $director->birthday ?> </li>
                            <li class="list-group-item">Birthplace: <?php echo $state->city .",". $state->state ?></li>
                        </ul>
                        <br>
                      
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <img class=" img-fluid" src="<?php echo base_url($director->profileImgRight) ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <br><br><br>
            <p><b>Biography</b><br>
                <?php echo $director->biography ?>
                <br><br><br>
                <b>Fun facts</b><br>
                <?php echo $director->funfact ?>
            </p>
        </div>
    </div>


</div>



