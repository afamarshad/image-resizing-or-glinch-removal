<!DOCTYPE html>
<html>
    <head>
        <title>Resizing Uploaded Images</title>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h1 class="text-center"> Resize Uploaded Image</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group container">
                    <div class="form-group">
                        <input  class="form-control" type="text" name="width" id="width" placeholder="New Width"><br/>
                    </div>
                    <div class="form-group">
                        <input  class="form-control" type="text" name="height" id="height" placeholder="New Height"><br/>
                    </div>
                    <div class="form-group">
                        <label>Choose Image</label>
                        <input  class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br/>
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary" name="submit">
                </div>
            </form>
            <?php
                require("vendor/autoload.php");
                use Gumlet\ImageResize;
                if(isset($_FILES['fileToUpload']))
                {
                    $imageWidth = $_POST['width'];
                    $imageHeight = $_POST['height'];
                    $imageName=$_FILES["fileToUpload"]["name"];
                    $imageType=$_FILES["fileToUpload"]["type"];
                    $imageSize=$_FILES["fileToUpload"]["size"];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target_file );
                    print_r("<div style='border:2px solid black;'>");
                    print_r("<label style='font-size:20px'>Original Image:</label>");
                    print_r('<br/>');
                    print_r(' <img src="'.$target_file.'" alt="image">');
                    print_r("</div>");
                    // print_r($imageName);
                    // print_r($imageType);
                    // print_r($imageSize);


                    $image = new ImageResize($target_file);
                    $image->resize( $imageHeight, $imageWidth,$allow_enlarge = True);
                    // $image = imagecreatetruecolor(960, 540);
                    $image->save("uploads/new_".$imageName);
                    print_r('<br/>');
                    print_r("<div style='border:2px solid black; margin-bottom:50px;'>");
                    print_r("<label style='font-size:20px'>Resized Image:</label>");
                    print_r('<br/>');
                    print_r('<img src="uploads/new_'.$imageName.'" alt="image">');
                    print_r("</div>");
                }

            ?>
        </div>
    </body>
</html>