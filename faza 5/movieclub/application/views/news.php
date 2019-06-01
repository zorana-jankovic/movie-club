<div class="container">

    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> News </a></li>
        </ul>
    </div>

     <?php 
         
  
         echo "<div class='row text-center'>";
         echo "<div class='col-lg-12'>";
         if(isset($poruka)){
         echo "<div class='alert alert-info' id='alert_template' role='alert'>";
               
                echo "<font color='red'>".(String)$poruka."</font><br>";
             
              // echo " <button type='button' class='close'>×</button>";
            echo "</div>";
     }
            echo "<h1>News highlight</h1>";
           echo " <hr>";
        echo "</div>";

    echo "</div>";
     
    ?>

   

</div>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <?php
        $first = true;
        foreach ($featured as $featuredItem) {

            if ($first) {

                echo " <a class='carousel-item active' style='background-image: url(" . base_url($featuredItem->imgSrc) . ")'>"
                . "<div class='carousel-caption d-none d-md-block'>
                        <h3></h3>
                           <p>" . $featuredItem->title . "</p>
                        </div>
                   </a>";

                $first = false;
            } else {

                echo " <div class = 'carousel-item' style = 'background-image: url(" . base_url($featuredItem->imgSrc) . ")'>"
                . "<div class='carousel-caption d-none d-md-block'>
                        <h3></h3>
                           <p>" . $featuredItem->title . "</p>
                        </div>
                        </div>";
            }
        }
        ?>

    </div>
    <a class = "carousel-control-prev" href = "#carouselExampleIndicators" role = "button" data-slide = "prev">
        <span class = "carousel-control-prev-icon bg-dark" aria-hidden = "true"></span>
        <span class = "sr-only">Previous</span>
    </a>
    <a class = "carousel-control-next" href = "#carouselExampleIndicators" role = "button" data-slide = "next">
        <span class = "carousel-control-next-icon bg-dark" aria-hidden = "true"></span>
        <span class = "sr-only">Next</span>
    </a>
</div>

<br>
<hr>
<br>

<div class = "container mt-5 container">

    <?php
    foreach ($news as $newsItem) {


        echo "<div class = 'row'>
                <div class = 'col-lg-4'>
                    <img class = 'img-fluid' src='" . base_url($newsItem->imgSrc) . "'>
                     <br><br>
                 </div>
                 
                <div class = 'col-lg-8'>
                    <h5>" . $newsItem->title . "</h5>
                    <hr>
                    <p>" . $newsItem->body . "</p>
                        <span> $newsItem->author </span>
                </div>
            </div>
            <br>
            <hr style = 'border-top: 5px solid #ccc; background: transparent;'>";
    }
    ?>

</div>