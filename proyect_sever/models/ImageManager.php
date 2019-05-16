<?php

namespace app\models;

use Yii;

class ImageManager {

    /**
     * 
     * @param boolean $miniatura
     * @param type $AnchoMax
     * @param type $AltoMax
     * @param String $Extension representa un string de con la forma image/---
     * @param image $ImagenOriginal
     * @return type
     */
    static function transformImage($miniatura, $AnchoMax, $AltoMax, $Extension, $ImagenOriginal) {
        if ($ImagenOriginal) {
            //redimensiono la imagen si es demasiado grande.
            if ($Extension == "image/jpg" || $Extension == "image/jpeg") {
                $ImagenGrande = imagecreatefromjpeg($ImagenOriginal);
            } elseif ($Extension == "image/png") {
                $ImagenGrande = imagecreatefrompng($ImagenOriginal);
            } elseif ($Extension == "image/gif") {
                $ImagenGrande = imagecreatefromgif($ImagenOriginal);
            }

            $x = imagesx($ImagenGrande);
            $y = imagesy($ImagenGrande);

            if ($x <= $AnchoMax && $y <= $AltoMax) {
                return $ImagenOriginal;
            }

            if ($x >= $y) { //Si x es más grande que y
                $nuevax = $AnchoMax; //la nueva tiene el x igual al maximo
                $nuevay = $nuevax * $y / $x; // en y 
                $Mininuevax = 400;
                $Mininuevay = $Mininuevax * $y / $x;
            } else {
                $nuevay = $AltoMax;
                $nuevax = $x / $y * $nuevay;
                $Mininuevay = 400;
                $Mininuevax = $x / $y * $Mininuevay;
            }

            $ImagenNueva = imagecreatetruecolor($nuevax, $nuevay);
            imagecopyresized($ImagenNueva, $ImagenGrande, 0, 0, 0, 0, floor($nuevax), floor($nuevay), $x, $y);

            if ($Extension == "image/jpg" || $Extension == "image/jpeg") {
                imagejpeg($ImagenNueva, $ImagenOriginal, 100);
                ob_start();

                imagejpeg($ImagenNueva);
                $image_data = ob_get_contents();

                ob_end_clean();

                $image_data_base64 = "data:image/jpeg;base64," . base64_encode($image_data);
                return $image_data_base64;
            } elseif ($Extension == "image/png") {
                imagepng($ImagenNueva, $ImagenOriginal, 100);
                ob_start();

                imagepng($ImagenNueva);
                $image_data = ob_get_contents();

                ob_end_clean();

                $image_data_base64 = "data:image/jpeg;base64," . base64_encode($image_data);
                return $image_data_base64;
            } elseif ($Extension == "image/gif") {
                imagegif($ImagenNueva, $ImagenOriginal, 100);
                ob_start();

                imagegif($ImagenNueva);
                $image_data = ob_get_contents();

                ob_end_clean();

                $image_data_base64 = "data:image/jpeg;base64," . base64_encode($image_data);
                return $image_data_base64;
            }
            if ($miniatura) { //creo la miniatura
                $Miniatura = imagecreatetruecolor($Mininuevax, $Mininuevay);
                imagecopyresized($Miniatura, $ImagenGrande, 0, 0, 0, 0, floor($Mininuevax), floor($Mininuevay), $x, $y);

                if ($Extension == "image/jpg" || $Extension == "image/jpeg") {
                    imagejpeg($Miniatura, $ImagenMini, 100);
                } elseif ($Extension == "image/png") {
                    imagepng($Miniatura, $ImagenMini, 100);
                } elseif ($Extension == "image/gif") {
                    imagegif($Miniatura, $ImagenMini, 100);
                }
                imagedestroy($Miniatura);
            }
        }
        return "data:image/jpeg;base64,";
    }

}
