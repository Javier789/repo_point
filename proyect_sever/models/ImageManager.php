<?php

namespace app\models;

use Yii;

class ImageManager {

    /**
     * 
     * @param type $Input
     * @param boolean $miniatura
     * @param type $AnchoMax
     * @param type $AltoMax
     * @param String $Extension representa un string de con la forma image/---
     * @param image $ImagenOriginal
     * @return type
     */
    static function transformImage($Input, $miniatura, $AnchoMax, $AltoMax, $Extension, $ImagenOriginal) {
        $Respuesta = array();
        //$NombreOriginal = basename($_FILES[$Input]['name']);
        //$Extension = pathinfo($NombreOriginal, PATHINFO_EXTENSION);

        //if ($Foto != '') { //Si el nombre esta vacio uso el orginal
          //  $Nombre = $Foto . '.' . $Extension;
        //} else {
        //    $Nombre = $_FILES[$Input]['name'];
        //}

//Ruta de los archivos
        //$ImagenOriginal = $Ruta . basename($Nombre);
        //$ImagenMini = $Ruta . "Mini_" . basename($Nombre);

//Subo la imagen
        if ( $ImagenOriginal) 
            {
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
            } elseif ($Extension == "image/png") {
                imagepng($ImagenNueva, $ImagenOriginal, 100);
            } elseif ($Extension == "image/gif") {
                imagegif($ImagenNueva, $ImagenOriginal, 100);
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
        else {
            $Respuesta['Script'] .= "Alerta(Ocurrió un error al subir la imagen.','error',3000);";
        }
//imagedestroy($ImagenRedimensionada);
        $Respuesta['Script'] .= "Alerta('La imagen se ha optimizado correctamente.','success',3000);";
        return json_encode($Respuesta);
    }

}
