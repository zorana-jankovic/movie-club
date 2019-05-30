<div class = "container-fluid mt-5">

    <div>
        <ul class = "breadcrumb">
            <li><a href = "<?php echo site_url("Guest/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> Movies </a></li>
        </ul>
    </div>

    <div class = "row">
        <div class = "col-lg-12">
            <h1>Movies</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form name="">
                Sort by:
                <select name="sort">
                    <optgroup label="Name">
                        <option>Ascending</option>
                        <option>Descending</option>
                    </optgroup>
                    <optgroup label="Genre">
                        <option>Action</option>
                        <option>Drama</option>
                        <option>Thriller</option>
                        <option>Comedy</option>
                        <option>Fantasy</option>
                        <option>Horror</option>
                        <option>Sci-Fi</option>
                    </optgroup>
                    <optgroup label="Rating">
                        <option>Ascending</option>
                        <option>Descending</option>
                    </optgroup>
                </select>
                &nbsp;
                <button type="submit" class="btn btn-sm btn-success">Sort &nbsp;<i class="fas fa-sort-amount-down"></i></button>
            </form>
            <hr>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="search-container">
                Find by name: &nbsp<input type="text" id="search-bar" placeholder="Enter movie name..."></input>
                <i class="fas fa-search"></i>
            </form>
            <hr>
        </div>
    </div>
</div>

<div class="container mt-5 container" id="content">

    <?php
    
    
    foreach ($movies as $movie) {    
    
    echo "<div class='row'>"
            . "<div class='col-lg-4'>"
                . "<a href='". site_url("Guest/showMovie") ."'>"
                    . "<img class='img-fluid' src='" . base_url($movie->posterSrc) ."'></img>"
                . "</a>"
                . "<br><br>"
            . "</div>"
            . "<div class='col-lg-8'>"
                . "<div class='card' style='100%'>"
                    . "<div class='card-body'>"
                        . "<h5 class='card-title'>"
                            . "<a href='" . site_url("Guest/showMovie/".$movie->id) . "'>" . $movie->title . "</a>"
                        . "</h5>"
                        . "<p class='card-text'> Duration: " . $movie->duration ." min </p>"
                    . "</div>"
                    . "<ul class='list-group list-group-flush'>"
                        . "<li class='list-group-item'>"
                            . "Genre:<br> "
                        . "</li>" . ""
                    . "</ul>"
                . "</div>"
            . "</div>"
        . "</div>"
        . "<br>"
        . "<hr style='border-top: 5px solid #ccc; background: transparent;'>";
    }

//<li class='list-group-item'>Režija:<br>Anthony Russo, Joe Russo</li><li class='list-group-item'>Uloge:<br>Robert Downey Jr., Josh Brolin, Tom Holland …</li>



?>
</div>
