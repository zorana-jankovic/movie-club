<div class="container">

    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> Notifications </a></li>
        </ul>
    </div>




</div>




<br>
<hr>
<br>

<div class = "container mt-5 container">

    <?php
    foreach ($vesti as $newsItem) {


        if ($newsItem->status == 1) {
            echo "<div class = 'row'>
                <div class = 'col-lg-4'>
                    <img class = 'img-fluid' src='" . base_url($newsItem->imgSrc) . "'>
                     <br><br>
                 </div>
                 
                <div class = 'col-lg-8'>
                    <h5>" . $newsItem->title . "</h5>
                    <hr>
                    <p>" . $newsItem->body . "</p>
                        <span> $newsItem->author </span>";

            echo "<form action=" . site_url($controller . "/obrisiNot/" . $newsItem->id) . " method='post'>";
            echo "<input type = 'submit' value = 'Delete' class='dugme'></input>&nbsp&nbsp";
            echo "</form>";
            echo"      </div>
            </div>
            <br>
            <hr style = 'border-top: 5px solid #ccc; background: transparent;'>";
        }
    }
    ?>

</div>