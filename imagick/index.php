
<?php

$image1 = new imagick($_POST['url1']);
$image2 = new imagick($_POST['url2']);

$result = $image1->compareImages($image2, Imagick::METRIC_MEANSQUAREERROR);
print_r($result[1]);

?>
