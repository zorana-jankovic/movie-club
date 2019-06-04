<div class = "container" align="center">



    <ul class = "breadcrumb">
        <li><a href="<?php echo site_url($controller . "/index"); ?>">Home</a></li>
        <li><a href="#" class="current">Add News</a></li>
    </ul>


    <div class="row">
        <div class="offset-sm-1 col-sm-10">
            
            <?php if ($mssg != null) echo $mssg; ?>
            <br>
            
            <form method='post' action='<?php echo site_url($controller . "/submitNews") ?>'>
                <table class="table table-hover text-center">
                    <tr>
                        <td> Title:</td>
                        <td><input type="text" size="40" name="title" placeholder="Enter news title here"></td>
                    </tr>
                    <tr>
                        <td>Body:
                        </td>
                        <td><input type="textarea" name="body" placeholder="Enter news body here" style="width: 500px; height: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <td>Image:
                        </td>
                        <td><input type="file" size="50" name="imgSrc">
                        </td>
                    </tr>
                    <tr>
                        <td>Tags:</td>
                        <td>
                            
                            <select name="tags[]" multiple="multiple" style="width: 300px" class="text-center">
                                 <?php 
                               
                                foreach ($tags as $tag) {
                                    echo "<option>" . $tag->name . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        </td>
                    </tr>


                </table>
                <br>
                <input type='submit' class='btn btn-success' value="Confirm"></input>
        </div>
        </form>
    </div>
</div>