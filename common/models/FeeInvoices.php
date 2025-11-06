<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

class FeeInvoices extends ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return '{{%fee_invoices}}';
    }

    public function rules()
    {
        return [
            [['bank_name', 'bank_address', 'bank_account'], 'required'],
            [['instruction', 'bank_logo'], 'string'],
            [['bank_name', 'bank_address', 'bank_account'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'skipOnEmpty' => true],
        ];
    }

    public function upload()
    {
        if ($this->validate(['imageFile']) && $this->imageFile) {
            $dir = Yii::getAlias('@webroot/assets/fee_invoices/');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $fileName = time() . '_' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $filePath = $dir . $fileName;

            if ($this->imageFile->saveAs($filePath)) {
                return 'assets/fee_invoices/' . $fileName;
            }
        }
        return false;
    }
}