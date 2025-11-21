<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_payments}}`.
 */
class m251113_084837_create_student_payments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_payments}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'fee_month' => $this->string(20)->notNull(),
            'fee_date' => $this->date()->notNull(),
            'total_amount' => $this->decimal(10, 2)->notNull()->defaultValue(0),
            'deposit_amount' => $this->decimal(10, 2)->defaultValue(0),
            'due_balance' => $this->decimal(10, 2)->defaultValue(0),
            'status' => $this->string(20)->defaultValue('unpaid'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
        $this->createTable('{{%student_fee_details}}', [
            'id' => $this->primaryKey(),
            'student_payment_id' => $this->integer()->notNull(), // renamed for clarity
            'particular_id' => $this->integer()->notNull(),
            'amount' => $this->decimal(10, 2)->notNull()->defaultValue(0),
        ]);

        // Foreign Keys
        $this->addForeignKey('fk_student_payments_student', '{{%student_payments}}', 'student_id', '{{%students}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_fee_details_payment', '{{%student_fee_details}}', 'student_payment_id', '{{%student_payments}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_fee_details_particular', '{{%student_fee_details}}', 'particular_id', '{{%fee_particulars}}', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_fee_details_particular', '{{%student_fee_details}}');
        $this->dropForeignKey('fk_fee_details_payment', '{{%student_fee_details}}');
        $this->dropForeignKey('fk_student_payments_student', '{{%student_payments}}');

        $this->dropTable('{{%student_fee_details}}');
        $this->dropTable('{{%student_payments}}');
    }
}
