<?php


namespace app\modules\far\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $img;
//    public $path;

    public function rules()
    {
        return [
            ['img', 'image',
                'extensions' => ['jpg', 'jpeg', 'png'],
                'checkExtensionByMimeType' => true,
//                'maxSize' => 512000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
//                'tooBig' => 'Limit is 500KB'
            ],
            ['img','required',],
        ];
    }
    public function attributeLabels()
    {
        return [
            'img' => 'Изображение',
        ];
    }

    public function upload($var)
    {
        if ($this->validate()) {
            $dir = 'uploads/' . $var . '/';
            $name = $this->randomFileName($this->img->extension);
            $path = $dir . $name;
            $this->img->saveAs($path);

            //reSizeImg
            $imgProperty = getimagesize($path);
            $imgWight = $imgProperty[0];
            $imgHeight = $imgProperty[1];

            $standardWight = 500;
            //пропорции
            $ratio = $imgWight / $standardWight;
            $wightNewImg = round($imgWight / $ratio);
            $heightNewImg = round($imgHeight / $ratio);

            //cоздаем новое изображение заданных параметров
            $newImg = imagecreatetruecolor($wightNewImg, $heightNewImg);
            if($this->img->extension == 'jpeg') {
                $uploadImg = imagecreatefromjpeg($path);
            } else {
                $uploadImg = imagecreatefrompng($path);
            }
            imagecopyresampled($newImg, $uploadImg, 0, 0, 0 ,0, $wightNewImg, $heightNewImg, $imgWight, $imgHeight);
            imagejpeg($newImg, $path);

            //уничтожаем данные
            imagedestroy($newImg);
            imagedestroy($uploadImg);

            return $name;
        } else {
            return false;
        }
    }

    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
}