<div class = "container" align="center">



    <ul class = "breadcrumb">
        <li><a href="<?php echo site_url($controller . "/index"); ?>">Home</a></li>
        <li><a href="#" class="current">Add Movie</a></li>
    </ul>


    <div class="row">
        <div class="offset-sm-1 col-sm-10">
            
            <?php if ($mssg != null) echo $mssg; ?>
            <br>
            
            <form method='post' action='<?php echo site_url($controller."/submitMovie") ?>'>
                <table class="table table-hover text-center">
                    <tr>
                        <td> Title:</td>
                        <td><input type="text" size="40" name="title" placeholder="Enter movie title here"></td>
                    </tr>

                    <tr>
                        <td> Genre: </td>
                        <td>
                            <select name="genre" style="width: 100px" class="text-center">

                                <?php
                               
                                foreach ($genres as $genre) {
                                    
                                    echo "<option>" . $genre->name . "</option>";
                                }
                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td> Duration: </td>
                        <td><input class="text-center" type="number" name="duration" min="1" max="1000" placeholder="min"> &nbsp; </td> 
                    </tr>

                    <tr>
                        <td> Year: </td>
                        <td><input class="text-center" type="number" name="year" min="1900" max="2019" placeholder="year"></td>
                    </tr>

                    <tr>
                        <td>Poster:</td>
                        <td><input type="file" size="40" name="posterSrc">
                        </td>
                    </tr>
                    
                    <tr>
                        <td> Plot:</td>
                        <td><input type="textarea" name="description" placeholder="Enter movie plot here" style="width: 300px; height: 100px;"></td>
                    </tr>
                    
                    <tr>
                        <td>Preview image 1:</td>
                        <td><input type="file" size="40" name="imgSrc1">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Preview image 2:</td>
                        <td><input type="file" size="40" name="imgSrc2">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Preview image 3:</td>
                        <td><input type="file" size="40" name="imgSrc3">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Preview image 4:</td>
                        <td><input type="file" size="40" name="imgSrc4">
                        </td>
                    </tr>

                    <tr>
                        <td>Cast :
                        </td>

                        <td>
                            <select name="cast[]" multiple="multiple" style="width: 300px" class="text-center">
                                 <?php 
                                foreach ($actors as $actor) {
                                    echo "<option>" . $actor->name . "</option>";
                                }
                                ?>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td>Directors :
                        </td>

                        <td>
                            <select name="directors[]" multiple="multiple" style="width: 300px" class="text-center">
                                 <?php
                                foreach ($directors as $director) {
                                    echo "<option>" . $director->name . "</option>";
                                }
                                ?>
                            </select>
                        </td>

                    </tr>
                    
                     <tr>
                        <td> Trailer:</td>
                        <td><input type="text" size="40" name="trailerSrc" placeholder="Enter movie trailer source link here"></td>
                    </tr>

                </table>
                <br>
                <input type='submit' class='btn btn-success' value="Confirm"></input>
        </div>
        </form>
    </div>
</div>