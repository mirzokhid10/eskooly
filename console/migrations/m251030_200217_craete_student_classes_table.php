<?php

use yii\db\Migration;

class m251030_200217_craete_student_classes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_classes}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer()->notNull(),
            'class_id' => $this->integer()->notNull(),
            'enrolled_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-student_classes-student_id', '{{%student_classes}}', 'student_id');
        $this->createIndex('idx-student_classes-class_id', '{{%student_classes}}', 'class_id');

        $this->addForeignKey(
            'fk-student_classes-student_id',
            '{{%student_classes}}',
            'student_id',
            '{{%students}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-student_classes-class_id',
            '{{%student_classes}}',
            'class_id',
            '{{%classes}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%students_class}}');
        return false;
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251030_200217_craete_student_classes_table cannot be reverted.\n";

        return false;
    }
    */
}
