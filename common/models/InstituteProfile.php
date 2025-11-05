<?php
namespace common\models;

use Yii;
use yii\web\UploadedFile;

class InstituteProfile extends \yii\db\ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return 'institute_profile';
    }

    public function rules()
    {
        return [
            [['institute_name', 'institute_phone', 'institute_address', 'institute_country'], 'safe'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
            [['institute_name', 'institute_logo', 'institute_address', 'institute_country'], 'string', 'max' => 100],
            [['institute_phone'], 'string', 'max' => 20],
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->imageFile) {
            $dir = Yii::getAlias('@webroot/assets/general/');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $fileName = time() . '_' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $filePath = $dir . $fileName;

            if ($this->imageFile->saveAs($filePath)) {
                return 'assets/general/' . $fileName;
            }
        }
        return false;
    }
}