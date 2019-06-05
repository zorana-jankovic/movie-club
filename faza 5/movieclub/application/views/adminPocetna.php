<div class="container">

    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> Administrator </a></li>
        </ul>
    </div>

</div>

<div class="container">

    <table class="table table-fluid">

        <thead align="center"> 
        <th>Moderators</th>
        <th>Users</th>    
        </thead>

        <tr>
            <td align="center">
                <ol> 
                    <?php
                    foreach ($korisnici1 as $korisnik1) {


                        echo "<li> " . $korisnik1->username . "</li>";
                        echo "<form action=" . site_url("Admin/ukloniKorisnika/" . $korisnik1->id) . " method='post'>";
                        echo "<input type = 'submit' value = 'Delete' class='btn btn-sm btn-outline-danger'></input>&nbsp&nbsp";
                        echo "</form>";
                        echo "</li>";
                        echo "</br>";
                    }
                    ?>
                </ol>
            </td>
            <td align="center">
                <ol> 
                    <?php
                    foreach ($korisnici2 as $korisnik2) {


                        echo "<li> " . $korisnik2->username . "</li>";
                        echo "<form action=" . site_url("Admin/ukloniKorisnika/" . $korisnik2->id) . " method='post'>";
                        echo "<input type = 'submit' value = 'Delete' class='btn btn-sm btn-outline-danger'></input>&nbsp&nbsp";
                        echo "</form>";
                        echo "<form action=" . site_url("Admin/unaprediKorisnika/" . $korisnik2->id) . " method='post'>";
                        echo "<input type = 'submit' value = 'Promote' class='btn btn-sm btn-outline-success'></input>&nbsp&nbsp";
                        echo "</form>";
                        echo "</li>";
                        echo "</br>";
                    }
                    ?>
                </ol>
            </td>
        </tr>
        <tr>
             <thead align="center"> 
                <th colspan="2">Pending requests</th>
            </thead>
            
            <td colspan="2">

                <?php
                foreach ($vesti as $vest) {


                    echo "<div class = 'row'>
                                <div class = 'col-lg-2'>
                                    <img  style='width:150px; height=150px;' class = 'img-fluid' src='" . base_url($vest->imgSrc) . "'>
                                    <br><br>
                                </div>

                                <div class = 'col-lg-10'>
                                     <h5>" . $vest->title . "</h5>
                                         <hr>
                                            <p>" . $vest->body . "</p>
                                                 <span> $vest->author </span>
                                 </div>
                                </div>
                                <br>";


                    echo "</div>";
                    
                    echo "<form action=" . site_url("Admin/dodajVest/" . $vest->id) . " method='post'>";
                    echo "<input type = 'submit' value = 'Approve' class='btn btn-sm btn-outline-success'></input>&nbsp&nbsp";
                    echo "</form>";
                    echo "<form action=" . site_url("Admin/odbijVest/" . $vest->id) . " method='post'>";
                    echo "<input type = 'submit' value = 'Dismiss' class='btn btn-sm btn-outline-danger'></input>&nbsp&nbsp";
                    echo "</form>";


                    echo "<hr style = 'border-top: 5px solid #ccc; background: transparent;'>";
                }
                ?>



            </td>

        </tr>
    </table>

</div>

<br>





