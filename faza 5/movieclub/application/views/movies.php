<div class = "container">

    <div>
        <ul class = "breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> Movies </a></li>
        </ul>
    </div>

    <div class = "row text-center">
        <div class = "col-lg-12">
            <h1>Movies</h1>
            <hr>
        </div>
    </div>


    <?php
    if ($myMovies == null) {
        echo "<div class='row'>
        <div class='col-lg-12'>
            <form name='formSort' action='" . site_url($controller . '/sort') . "' method='post'>
                Sort by:
                <select name='sort'>
                    <optgroup label='Name'>
                        <option>Name/Ascending</option>
                        <option>Name/Descending</option>
                    </optgroup>
                    <optgroup label='Genre'>
                        <option>Action</option>
                        <option>Drama</option>
                        <option>Thriller</option>
                        <option>Comedy</option>
                        <option>Fantasy</option>
                        <option>Horror</option>
                        <option>Sci-Fi</option>
                    </optgroup>
                    <optgroup label='Rating'>
                        <option>Rating/Ascending</option>
                        <option>Rating/Descending</option>
                    </optgroup>
                </select>
                &nbsp;
                <button type='submit' class='btn btn-sm btn-success'>Sort &nbsp;<i class='fas fa-sort-amount-down'></i></button>
            </form>
            <hr>

        </div>
    </div>

    <div class='row'>
        <div class='col-lg-12'>
            <form class='search-container' name = 'formSearch' action = '" . site_url($controller . '/search') . "' method='post'>
                Find by name: &nbsp<input type='text' id='search-bar' name ='search' placeholder='Enter movie name...'></input>
                <button type = 'submit'><i class='fas fa-search'></i></button>
            </form>
            <hr>
        </div>
    </div>";
    }
    ?>

    </div>

    <div class="container mt-5 container" id="content">

        <?php
        $i = 0;
        foreach ($movies as $movie) {


            echo "<div class='row'>"
            . "<div class='col-lg-4'>"
            . "<a href='" . site_url($controller . "/showMovie/" . $movie->id) . "'>"
            . "<img class='img-fluid' src='" . base_url($movie->posterSrc) . "'></img>"
            . "</a>"
            . "<br><br>"
            . "</div>"
            . "<div class='col-lg-8'>"
            . "<div class='card' style='100%'>"
            . "<div class='card-body'>"
            . "<h5 class='card-title'>"
            . "<a href='" . site_url($controller . "/showMovie/" . $movie->id) . "'>" . $movie->title . "</a>"
            . "</h5>"
            . "<p class='card-text'> Duration: " . $movie->duration . " min </p>"
            . "<p class='card-text'> Rating: " . number_format($movie->rating, 1) . "/5.0 </p>"
            . "</div>"
            . "<ul class='list-group list-group-flush'>"
            . "<li class='list-group-item'>"
            . "Genre:<br> "
            . "</li>" . ""
            . "<li class='list-group-item'>Directors:<br>";
            foreach ($directors[$i] as $director) {
                echo "<a href='" . site_url($controller . "/showDirector/" . $director->id) . "'>" . $director->name . "</a>,";
            }

            echo "</li><li class='list-group-item'>"
            . "Cast:<br>";
            foreach ($cast[$i] as $actor) {
                echo "<a href='" . site_url($controller . "/showActor/" . $actor->id) . "'>" . $actor->name . "</a>,";
            }
            echo "</li></ul>"
            . "</div>"
            . "</div>"
            . "</div>";

            echo "<hr style='border-top: 5px solid #ccc; background: transparent;'>";
            $i++;
        }
        ?>
    </div>
