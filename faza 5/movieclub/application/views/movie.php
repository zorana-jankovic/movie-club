<div class = "container-fluid mt-5">


    <div class="container mt-5">

        <div>
            <ul class = "breadcrumb">
                <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
                <li><a href = "<?php echo site_url($controller . "/movies"); ?>"> Movies </a></li>
                <li><a href = "#" class="current"><?php echo $movie->title ?></a></li>
            </ul>
        </div>

        <div class = "row">
            <div class = "col-lg-12">
                <h1> <?php echo $movie->title ?> </h1>
                <hr>
            </div>
        </div>

        <div class="videoWrapper">
            <iframe width="560" height="315" src="<?php echo $movie->trailerSrc ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="row">
            <div class="col-lg-4">


                <img class="img-fluid" src="<?php echo base_url($movie->posterSrc) ?>">

                <br>
                <br>
                <?php
                if ($controller != "Guest") {
                    echo "<form name = 'formWatchlist' method = 'post' action = '";
                    ?> <?php echo site_url($controller . '/addToMyMovies/' . $movie->id); ?> <?php
                    echo "'>
                <button type ='submit' class='btn btn-success' > Watch later &nbsp;<i class='far fa-bookmark'></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                </form>";



                    echo "<form class = 'rating' method = 'post' action = '";
                    ?> <?php echo site_url($controller . '/rate/' . $movie->id); ?> <?php  echo "'>
                    <input type = 'submit' class = 'btn btn-success' value = 'Rate'></input>
                    <label>
                        <input type='radio' name='stars' value='1' />
                        <span class='icon'>★</span>
                    </label>
                    <label>
                        <input type='radio' name='stars' value='2' />
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                    </label>
                    <label>
                        <input type='radio' name='stars' value='3' />
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>   
                    </label>
                    <label>
                        <input type='radio' name='stars' value='4' />
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                    </label>
                    <label>
                        <input type='radio' name='stars' value='5' />
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                        <span class='icon'>★</span>
                    </label>

                </form>";
                }
                ?>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $movie->title ?> </h5>
                        <p class="card-text"> Duration : <?php echo $movie->duration ?> min
                            <br>
                            Rating : <?php echo number_format($movie->rating,1) ?> /5.0
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Genre:<br>Akcija / Avantura / Fantazija</li>
                        <li class="list-group-item">Directors:<br>

                            <?php
                            foreach ($directors as $director) {
                                echo $director->name . ",";
                            }
                            ?>


                        </li>
                        <li class="list-group-item">Cast:<br>

                            <?php
                            foreach ($cast as $actor) {
                                echo "<a href='" . site_url($controller . "/showActor/" . $actor->id) . "'>" . $actor->name . "</a>,";
                            }
                            ?>


                    </ul>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-12">
                <h6>Plot:</h6>
<?php echo $movie->description ?>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <!-- Slide One - Set the background image for this slide in the line below -->
                        <a class="carousel-item active" style="background-image: url(' <?php echo base_url($movie->img1); ?> ')">



                        </a>
                        <!-- Slide Two - Set the background image for this slide in the line below -->
                        <div class="carousel-item" style="background-image: url('<?php echo base_url($movie->img2); ?>')">

                        </div>
                        <!-- Slide Three - Set the background image for this slide in the line below -->
                        <div class="carousel-item" style="background-image: url('<?php echo base_url($movie->img3); ?>')">

                        </div>

                        <div class="carousel-item" style="background-image: url('<?php echo base_url($movie->img4); ?>')">

                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>	
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">
                <h3>Comments:</h3>
            </div>
        </div>

        <div class="row mt-2">


            <div class="comments">
                <?php
                foreach ($comments as $comment) {

                    echo "<p><b>" . $comment->title . "</b><br>" . $comment->body . "<span>" . $comment->author . "</span></p>";
                }
                ?>
            </div>
        </div>

        <?php
        if ($controller != "Guest") {

            echo " <div class='row mt-5'>
            <div class='col-lg-12'>
                <h3>Add comment:</h3>
            </div>
        </div>
        <div class='row mt-3'>
            <div class='col-lg-12'>
                <form method='post' action='" . site_url($controller . "/addComment/" . $movie->id) . "'>
                    <table class='table table-striped'>
                        <input name='name' type='text' class='validate[required,custom[onlyLetter],length[0,100]] feedback-input' placeholder='Title' id='name' />

                        <textarea name='text' class='validate[required,length[6,300]] feedback-input' id='comment' placeholder='Comment'></textarea>
                    </table>
                    <br>
                    <button type='submit' class='btn btn-success'>Send</button>
            </div>
            </form>
        </div>";
        }
        ?>

    </div>


</div>
</div>