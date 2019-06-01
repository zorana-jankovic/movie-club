<br>




<div>
    <ul class="breadcrumb">
        <li><a href = "<?php echo site_url($controller . "/index"); ?>"> Home</a></li>
        <li><a href = "#" class="current"> Admin Pocetna </a></li>
    </ul>
</div>






<div  width = "100%">


    <table width = 90% align = "center">
        <tr>

            <td>

                <h2>Korisnici</h2>
                <div class="numberlist">

                    <div class="numberlist">	

                        <ol> 

                            <?php
                            foreach ($korisnici1 as $korisnik1) {

                                //echo "<li>Moderator:<a href='" . $korisnik1->username . "'</a></li>";
                                echo "<li>Moderator:" . $korisnik1->username . "</li>";
                                echo "<form action=" . site_url("Admin/ukloniKorisnika/" . $korisnik1->id) . " method='post'>";
                                echo "<input type = 'submit' value = 'izbriši' class='dugme'></input>&nbsp&nbsp";
                                echo "</form>";
                                // echo "<input type = 'button' value = 'unapredi' class='dugme' onClick='".site_url($controller."/unaprediKorisnika/".$korisnik1->id)."'></input>";
                            }
                            ?>


                        </ol>
                    </div>
                </div>


                <div class="numberlist">	
                    <div class="numberlist">

                        <ol> 

                            <?php
                            foreach ($korisnici2 as $korisnik2) {

                                // echo "<li>Korisnik:<a href='" . $korisnik2->username . "'</a>Moderator</li>";
                                //echo "<li>Moderator:<a href='" . $korisnik1->username . "'</a></li>";
                                echo "<li>Korisnik:" . $korisnik2->username . "</li>";
                                echo "<form action=" . site_url("Admin/ukloniKorisnika/" . $korisnik2->id) . " method='post'>";
                                echo "<input type = 'submit' value = 'izbriši' class='dugme'></input>&nbsp&nbsp";
                                echo "</form>";
                                echo "<form action=" . site_url("Admin/unaprediKorisnika/" . $korisnik2->id) . " method='post'>";
                                echo "<input type = 'submit' value = 'unapredi' class='dugme'></input>&nbsp&nbsp";
                                echo "</form>";
                                //echo "<input type = 'button' value = 'izbriši' class='dugme' onclick='".site_url($controller."/ukloniKorisnika/".$korisnik2->id)."'></input>&nbsp&nbsp";
                                // echo "<input type = 'button' value = 'unapredi' class='dugme' onclick='".site_url($controller."/unaprediKorisnika/".$korisnik2->id)."'></input>";
                            }
                            ?>


                        </ol>
                    </div>
                </div>




            </td>


            <td>


                <?php
                foreach ($vesti as $vest) {


                    echo "<div class = 'row'>
                                <div class = 'col-lg-4'>
                                    <img class = 'img-fluid' src='" . base_url($vest->imgSrc) . "'>
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
                    echo "<input type = 'submit' value = 'dodaj' class='dugme'></input>&nbsp&nbsp";
                    echo "</form>";
                    echo "<form action=" . site_url("Admin/odbijVest/" . $vest->id) . " method='post'>";
                    echo "<input type = 'submit' value = 'odbij' class='dugme'></input>&nbsp&nbsp";
                    echo "</form>";

                    //echo "<input type = 'button' value = 'dodaj' class='dugme' onClick=" . site_url($controller . "/dodajVest/" . $vest->id) . "></input>&nbsp&nbsp";
                    //echo "<input type = 'button' value = 'odbij' class='dugme' onClick=" . site_url($controller . "/odbijVest/" . $vest->id) . "></input>";


                    echo "<p> </p>";
                    echo "<p> </p>";

                    echo "<hr style = 'border-top: 5px solid #ccc; background: transparent;'>";
                }
                ?>



            </td>

        </tr>
    </table>

</div>

<br>





