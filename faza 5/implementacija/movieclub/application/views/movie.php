<div class = "container-fluid mt-5">

    <div>
        <ul class = "breadcrumb">
           <li><a href = "<?php echo site_url("Guest/index"); ?>"> Home</a></li>
            <li><a href = "<?php echo site_url("Guest/movies"); ?>"> Movies </a></li>
            <li><a href = "#" class="current"><?php echo $movie->title ?></a></li>
        </ul>
    </div>

    <div class = "row">
        <div class = "col-lg-12">
            <h1> <?php echo $movie->title ?> </h1>
            <hr>
        </div>
    </div>

    <div class="container mt-5">


        <div class="videoWrapper">
            <iframe width="560" height="315" src="<?php echo $movie->trailerSrc ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="row">
            <div class="col-lg-4">


                <img class="img-fluid" src="<?php echo base_url($movie->posterSrc) ?>">

                <br>
                <br>

                <button class="btn btn-success"> Watch later &nbsp;<i class="far fa-bookmark"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;


                <form class="rating">
                    <label>
                        <input type="radio" name="stars" value="1" />
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="2" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="3" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>   
                    </label>
                    <label>
                        <input type="radio" name="stars" value="4" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="5" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                </form>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $movie->title ?> </h5>
                        <p class="card-text"> Duration : <?php echo $movie->duration ?> min
                            <br>
                            Rating : <?php echo $movie->rating ?> /5.0
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Genre:<br>Akcija / Avantura / Fantazija</li>
                        <li class="list-group-item">Director:<br>Anthony Russo, Joe Russo</li>
                        <li class="list-group-item">Cast:<br>
                            <a href="robertDowney.html">Robert Downey Jr.</a>, Josh Brolin, Tom Holland, Chris Pratt, Chris Hemsworth, Chris Evans, <a href="scarlettJohansson.html">Scarlett Johansson</a>, Elizabeth Olsen, Paul Bettany, Mark Ruffalo, <a href="benedictCumberbatch.html">Benedict Cumberbatch</a>, Zoe Saldana, Dave Bautista, Jeremy Renner, Paul Rudd, Chadwick Boseman, Benicio Del Toro, Brie Larson …</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>