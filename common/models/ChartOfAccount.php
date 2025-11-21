<?php

namespace common\models;

use yii\db\ActiveRecord;

class ChartOfAccount extends ActiveRecord
{
    public static function tableName() {
        return '{{%chart_of_account}}';
    }

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'in', 'range' => ['income', 'expense']],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Account Name',
            'type' => 'Account Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getTransactions()
    {
        return $this->hasMany(Transactions::class, ['chart_account_id' => 'id']);
    }
}