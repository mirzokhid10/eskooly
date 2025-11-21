<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fee_invoices}}`.
 */
class m251105_160707_create_fee_invoices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fee_invoices}}', [
            'id' => $this->primaryKey(),
            'bank_logo' => $this->string(255)->null(),
            'bank_name' => $this->string(20)->null(),
            'bank_address' => $this->string(255)->null(),
            'bank_account' => $this->string(255)->null(),
            'instruction' => $this->string(255)->null(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fee_invoices}}');
    }
}
