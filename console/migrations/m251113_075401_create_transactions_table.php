<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transactions}}`.
 */
class m251113_075401_create_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transactions}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'chart_account_id' => $this->integer()->notNull(),
            'student_id' => $this->integer()->null(),
            'teacher_id' => $this->integer()->null(),
            'type' => "ENUM('income','expense') NOT NULL",
            'amount' => $this->decimal(10, 2)->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk_transactions_chart_account',
            '{{%transactions}}',
            'chart_account_id',
            '{{%chart_of_account}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_transactions_student',
            '{{%transactions}}',
            'student_id',
            '{{%students}}',
            'id',
            'SET NULL');
        $this->addForeignKey(
            'fk_transactions_teacher',
            '{{%transactions}}',
            'teacher_id',
            '{{%employees}}',
            'id',
            'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_transactions_chart_account', '{{%transactions}}');
        $this->dropTable('{{%transactions}}');
    }
}
