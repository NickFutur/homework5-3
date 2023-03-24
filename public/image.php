<?php
use Intervention\Image\ImageManagerStatic as Image;
function img()
{

require 'vendor/autoload.php';
Image::configure(['driver' => 'gd']);

    $result = 'public/image/' . 'new_image2.jpg';
    $image = Image::make('public/image/donnie-ray-crisp-66zrT0dJ7Mc-unsplash.jpg')
        ->resize(200, null, function ($image) {
            $image->aspectRatio();
        })
        ->save($result, 100);

    $image->save($result, 100);

    $image->text("Русский text", $image->getWidth() - 10, $image->getHeight() - 10, function (\Intervention\Image\AbstractFont $font) {
            $font->size('20'); //требуется расширение freetype
        $font->file('public/image/ArialBlack.ttf');
            $font->color(array(255, 255, 255, 0.5));
            $font->align('right');
            $font->valign('bottom');
        });

    echo $image->response('jpg');
}
