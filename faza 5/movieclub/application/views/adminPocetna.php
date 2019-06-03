<div class="container">

    <div>
        <ul class="breadcrumb">
            <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
            <li><a href = "#" class="current"> Administrator </a></li>
        </ul>
    </div>

</div>




<div>

    <table class="table table-fluid">
        <tr>
            <td align="center">
                <h2>Users</h2>
                <br>
                <div class="userlist">


                    <ol> 

                        <?php
                        foreach ($korisnici1 as $korisnik1) {


                            echo "<li>Moderator: " . $korisnik1->username . "</li>";
                            echo "<form action=" . site_url("Admin/ukloniKorisnika/" . $korisnik1->id) . " method='post'>";
                            echo "<input type = 'submit' value = 'Delete' class='btn btn-outline-danger'></input>&nbsp&nbsp";
                            echo "</form>";
                        }
                        ?>


                    </ol>

                </div>


                <div class="userlist">	


                    <ol> 

                        <?php
                        foreach ($korisnici2 as $korisnik2) {


                            echo "<li>User: " . $korisnik2->username . "</li>";
                            echo "<form action=" . site_url("Admin/ukloniKorisnika/" . $korisnik2->id) . " method='post'>";
                            echo "<input type = 'submit' value = 'Delete' class='btn btn-outline-danger'></input>&nbsp&nbsp";
                            echo "</form>";
                            echo "<form action=" . site_url("Admin/unaprediKorisnika/" . $korisnik2->id) . " method='post'>";
                            echo "<input type = 'submit' value = 'Promote' class='btn btn-outline-success'></input>&nbsp&nbsp";
                            echo "</form>";
                        }
                        ?>


                    </ol>

                </div>




            </td>


            <td style="padding-right: 550px;">

                <h2 align="center"> Pending requests </h2>
                <br>    

                <?php
                foreach ($vesti as $vest) {


                    echo "<div class = 'row'>
                                <div class = 'col-lg-4'>
                                    <img style='width:600px; height:400px;' class = 'img-fluid' src='" . base_url($vest->imgSrc) . "'>
                                    <br><br>
                                </div>

                                <div class = 'col-lg-8'>
                                     <h5>" . $vest->title . "</h5>
                                         <hr>
                                            <p>" . $vest->body . "</p>
                                                 <span> $vest->author </span>
                                 </div>
                                </div>
                                <br>";


                    echo "</div>";
                    echo " <p> </p>&nbsp";

                    echo "<form action=" . site_url("Admin/dodajVest/" . $vest->id) . " method='post'>";
                    echo "<input type = 'submit' value = 'Approve' class='btn btn-outline-success'></input>&nbsp&nbsp";
                    echo "</form>";
                    echo "<form action=" . site_url("Admin/odbijVest/" . $vest->id) . " method='post'>";
                    echo "<input type = 'submit' value = 'Dismiss' class='btn btn-outline-danger'></input>&nbsp&nbsp";
                    echo "</form>";


                    echo "<hr style = 'border-top: 5px solid #ccc; background: transparent;'>";
                }
                ?>



            </td>

        </tr>
    </table>

</div>

<br>





