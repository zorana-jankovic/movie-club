<div class = "container" align="center">



    <ul class = "breadcrumb">
        <li><a href="<?php echo site_url($controller . "/index"); ?>">Home</a></li>
        <li><a href="#" class="current">Add Actor</a></li>
    </ul>


    <div class="row">
        <div class="offset-sm-1 col-sm-10">
            <form method='post' action='<?php echo site_url($controller . "/submitActor") ?>'>
                <table class="table table-hover text-center">

                    <tr>
                        <td> Name:</td>
                        <td><input type="text" size="40" name="name" placeholder="Enter actors name here"></td>
                    </tr>

                    <tr>
                        <td>Birthday:
                        </td>
                        <td><input type="date" name="birthday">
                        </td>
                    </tr>

                    <tr>
                        <td>Birthplace:
                        </td>
                        <td>
                            <select name="birthplace" style="width: 200px" class="text-center">

                                <?php
                                foreach ($states as $state) {

                                    echo "<option>" . $state->city . "," . $state->state . "</option>";
                                }
                                ?>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Poster:
                        </td>
                        <td><input type="file" size="50" name="posterSrc">
                        </td>
                    </tr>

                    <tr>
                        <td>Highlight:
                        </td>
                        <td><textarea name="highlight" style="width: 300px; height: 100px;" placeholder="Enter actors highlight"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Biography:
                        </td>
                        <td><textarea name="biography" style="width: 300px; height: 100px;" placeholder="Enter actors biography"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Fun facts:
                        </td>
                        <td><textarea name="funfact" style="width: 300px; height: 100px;" placeholder="Enter actors fun facts here"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Image 1:
                        </td>
                        <td><input type="file" size="50" name="profileImgLeft">
                        </td>
                    </tr>
                    <tr>
                        <td>Image 2:
                        </td>
                        <td><input type="file" size="50" name="profileImgRight">
                        </td>
                    </tr>

                </table>
                <br>
                <input type='submit' class='btn btn-success' value="Confirm"></input>
        </div>
        </form>
    </div>
</div>