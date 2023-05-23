<?php
$image = \Intervention\Image\Facades\Image::canvas(500, 500, '#00FF00');
$image->text('123', 700, 700, function($font) {
    $font->file(public_path('fonts/Gilmer-Regular.ttf'));
    $font->size(100);
    $font->color('#FF0000');
    $font->align('center');
    $font->valign('middle');
});

// Return the image as a response
return response($image->encode('png'));
