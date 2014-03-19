<?php
/**
 * Create by: nic
 * Create at: 16/07/13 - 16:36
 */
App::uses('File', 'Utility');

class FitComponent extends Component {

    public function makeFit($file_src, $file_dst, $width, $height) {
        $w = intval($width);
        $h = intval($height);

        // Source image
        $src = imagecreatefromjpeg($file_src);

        // Destination image with white background
        $dst = imagecreatetruecolor($w, $h);
        imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));

        // All Magic is here
        $this->scale_image($src, $dst);

        //Save to file
        imagejpeg($dst, $file_dst);
        return true;
    }

    private function scale_image($src_image, $dst_image) {
        $src_width = imagesx($src_image);
        $src_height = imagesy($src_image);

        $dst_width = imagesx($dst_image);
        $dst_height = imagesy($dst_image);

        // Try to match destination image by width
        $new_width = $dst_width;
        $new_height = round($new_width * ($src_height / $src_width));
        $new_x = 0;
        $new_y = round(($dst_height - $new_height) / 2);

        $next = $new_height > $dst_height;

        // If match by width failed and destination image does not fit, try by height
        if ($next) {
            $new_height = $dst_height;
            $new_width = round($new_height * ($src_width / $src_height));
            $new_x = round(($dst_width - $new_width) / 2);
            $new_y = 0;
        }

        // Copy image on right place
        imagecopyresampled($dst_image, $src_image, $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
    }
}