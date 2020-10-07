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
    public $path;

    public function rules()
    {
        return [
            ['img', 'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'checkExtensionByMimeType' => true,
//                'maxSize' => 512000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
//                'tooBig' => 'Limit is 500KB'
            ],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $dir = 'uploads/';
            $name = $this->randomFileName($this->img->extension);
            $path = $dir . $name;
            $this->img->saveAs($path);
//            return true;
            return $path;
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