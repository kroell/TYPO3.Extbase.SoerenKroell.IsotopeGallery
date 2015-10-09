<?php
namespace TYPO3\SkIsotopeGallery\ViewHelpers;


class CropImageViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Crops an image and returns a thumbnail
     *
     * @param string $imagepath The number of characters of the dummy content
     * @return string dummy content, cropped after the given number of characters
     */
    public function render($imagepath) {
    	
    	$temp_path = explode('.jpg', $imagepath);
    	$save_path = $temp_path[0].'-thumb.jpg';
    	
    	if (!file_exists($save_path)) {
    		
    		$image = imagecreatefromjpeg($imagepath);
    		
	        $thumb_width = 650;
			$thumb_height = 456;
			
			$width = imagesx($image);
			$height = imagesy($image);
			
			$original_aspect = $width / $height;
			$thumb_aspect = $thumb_width / $thumb_height;
			
			if ( $original_aspect >= $thumb_aspect ){
			   // If image is wider than thumbnail (in aspect ratio sense)
			   $new_height = $thumb_height;
			   $new_width = $width / ($height / $thumb_height);
			}
			else{
			   // If the thumbnail is wider than the image
			   $new_width = $thumb_width;
			   $new_height = $height / ($width / $thumb_width);
			}
			
			$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
			
			// Resize and crop
			imagecopyresampled($thumb,
			                   $image,
			                   0 - ($new_width - $thumb_width) / 6, // Center the image horizontally
			                   0 - ($new_height - $thumb_height) / 6, // Center the image vertically
			                   0, 0,
			                   $new_width, $new_height,
			                   $width, $height);
			imagejpeg($thumb, $save_path, 80);
			
		}
        
        return $save_path;
    }
}

?>