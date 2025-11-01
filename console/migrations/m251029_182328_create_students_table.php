<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%students}}`.
 */
class m251029_182328_create_students_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),

            // 🧑‍🎓 Core Profile
            'name' => $this->string()->notNull(), // done
            'registration_number' => $this->string()->notNull(), // done
            'class_id' => $this->integer()->notNull(), // done
            'photo' => $this->string(),
            'discount_fee' => $this->integer(), // done
            'phone' => $this->string()->notNull(), // done
            'date_of_birth' => $this->date(), // done
            'gender' => $this->string(10), // done
            'email' => $this->string()->notNull()->unique(), // done
            'address' => $this->string()->notNull(), // done

            // 📚 Academic Info
            'data_admission' => $this->date()->notNull(), // done
            'status' => $this->string()->defaultValue('active'), // active, graduated, dropped
            'level' => $this->string(), // Beginner, Intermediate, Advanced
            'preferred_language' => $this->string(10),

            // 🧾 CRM & Admin
            'guardian_name' => $this->string(),
            'guardian_contact' => $this->string(),

            // 📈 Tracking
            'last_login' => $this->dateTime(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%students}}');
    }
}
