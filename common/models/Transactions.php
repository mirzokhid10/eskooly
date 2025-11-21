<?php

namespace common\models;

use yii\db\ActiveRecord;

class Transactions extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%transactions}}';
    }

    public function rules()
    {
        return [
            [['date', 'chart_account_id', 'type', 'amount'], 'required'],
            [['chart_account_id'], 'integer'],
            [['amount'], 'number', 'min' => 0],
            [['type'], 'in', 'range' => ['income', 'expense']],
            [['date', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'chart_account_id' => 'Chart of Account',
            'type' => 'Type',
            'amount' => 'Amount',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // Relations
    public function getChartAccount()
    {
        return $this->hasOne(ChartOfAccount::class, ['id' => 'chart_account_id']);
    }

    // Automatically handle timestamps
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
}