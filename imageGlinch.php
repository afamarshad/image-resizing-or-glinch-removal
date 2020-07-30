<?php
// https://packagist.org/packages/gumlet/php-image-resize
    require("vendor/autoload.php");
    use Gumlet\ImageResize;

    // $image = new ImageResize("sample.jpg");
    // $image->scale(50);
    // $image->save('sample.jpg')

    // $image = new ImageResize('sample.jpg');
    // $image->resizeToBestFit(960, 540);
    // $image->save('sample1.jpg');

    // $image = new ImageResize('sample.jpg');
    // $image->scale(50);
    // $image->save('sample2.jpg')

    // $image = new ImageResize('sample.jpg');
    // $image->resizeToHeight(960);
    // $image->save('image2.jpg');

    // $image = new ImageResize('image.jpg');
    // $image->resizeToWidth(540);
    // $image->save('image2.jpg');

    $image = new ImageResize('sample.jpg');
    $image->resize(960, 540, $allow_enlarge = True);
    $image->save('sample1.jpg');

    $image = new ImageResize('sample.jpg');
    $image->resize(960, 540);
    $image->save('sample3.jpg');

    $image = new ImageResize('sample.jpg');
    $image->crop(200, 200);
    $image->save('sample4.jpg', null, 100);

    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Resize</title>
    <meta charset="UTF-8">
</head>

<body>
<img src="sample.jpg" alt="image">
<img src="sample4.jpg" alt="image">

</body>
</html>
