<?php

namespace common\models;

use Yii;

class Students extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $class_ids;
    public static function tableName()
    {
        return '{{%students}}';
    }

    public function rules() {
        return [
            [['name', 'registration_number', 'phone', 'email', 'address', 'data_admission'], 'required'],
            [['photo'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
            [['class_id'], 'safe'], // allow multiple classes
            [['discount_fee'], 'number'],
            [['date_of_birth', 'data_admission', 'last_login', 'created_at', 'updated_at'], 'safe'],
            [['name', 'registration_number', 'photo', 'email', 'address', 'guardian_name', 'guardian_contact'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['gender', 'preferred_language', 'status', 'level'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Student Name',
            'registration_number' => 'Registration Number',
            'photo' => 'Photo',
            'discount_fee' => 'Discount Fee',
            'phone' => 'Phone',
            'date_of_birth' => 'Date of Birth',
            'gender' => 'Gender',
            'email' => 'Email',
            'address' => 'Address',
            'data_admission' => 'Date of Admission',
            'status' => 'Status',
            'level' => 'Level',
            'preferred_language' => 'Preferred Language',
            'guardian_name' => 'Guardian Name',
            'guardian_contact' => 'Guardian Contact',
            'last_login' => 'Last Login',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'class_id' => 'Classes',
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->imageFile) {
            $dir = Yii::getAlias('@webroot/assets/students/');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $fileName = time() . '_' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $filePath = $dir . $fileName;

            if ($this->imageFile->saveAs($filePath)) {
                $this->photo = 'assets/students/' . $fileName;
                return true;
            }
        }
        return false;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $time = date('Y-m-d H:i:s');
            if ($this->isNewRecord) {
                $this->created_at = $time;
            }
            $this->updated_at = $time;
            return true;
        }
        return false;
    }

    // 🔗 Many-to-Many Relation with Classes
    public function getStudentClasses()
    {
        return $this->hasMany(StudentClasses::class, ['student_id' => 'id']);
    }

//    public function getClasses()
//    {
//        return $this->hasMany(Classes::class, ['id' => 'class_id'])
//            ->via('studentClasses');
//    }
    public function getClass()
    {
        return $this->hasOne(Classes::class, ['id' => 'class_id']);
    }


}