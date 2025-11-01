<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees}}`.
 */
class m251027_113634_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'mobile' => $this->string(20),
            'role' => $this->string(50)->notNull(), // principal, teacher, accountant, etc.
            'salary' => $this->decimal(10,2),
            'date_of_joining' => $this->date(),
            'father_or_husband_name' => $this->string(),
            'national_id' => $this->string(),
            'education' => $this->string(),
            'home_address' => $this->string(),
            'gender' => $this->string(10),
            'religion' => $this->string(30),
            'blood_group' => $this->string(5),
            'experience' => $this->string(),
            'email' => $this->string(),
            'date_of_birth' => $this->date(),
            'photo' => $this->string(), // optional photo path
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // Insert initial data
        $this->batchInsert('{{%employees}}', [
            'name', 'mobile', 'role', 'salary', 'date_of_joining', 'father_or_husband_name',
            'national_id', 'education', 'home_address', 'gender', 'religion', 'blood_group',
            'experience', 'email', 'date_of_birth', 'photo', 'created_at', 'updated_at'
        ], [
            ['Mirzokhid Khudoyberdiev', '+998901234567', 'Principal', 7500.00, '2020-09-15', 'Khudoyberdi Qodirov', 'AB1234567', 'Master’s Degree in Education', 'Tashkent, Chilonzor District', 'Male', 'Islam', 'O+', '12 years', 'mirzokhid.khudoyberdiev@school.uz', '1983-06-12', null, time(), time()],
            ['Shaxlo Xushvaqova', '+998909876543', 'Teacher', 4200.00, '2021-02-01', 'Abdulla Xushvaqov', 'AD7654321', 'Bachelor’s in English Language', 'Tashkent, Yunusobod District', 'Female', 'Islam', 'A+', '6 years', 'shaxlo.xushvaqova@school.uz', '1992-04-20', null, time(), time()],
            ['Otabek Rasulov', '+998971112233', 'Accountant', 5600.00, '2019-03-10', 'Rasul Abdullayev', 'AA9988776', 'Bachelor’s in Accounting', 'Samarqand, Registon Street 12', 'Male', 'Islam', 'B+', '8 years', 'otabek.rasulov@school.uz', '1988-12-05', null, time(), time()],
            ['Malika Karimova', '+998933453454', 'Management Staff', 4800.00, '2022-05-25', 'Karim Qodirov', 'AC5566778', 'Master’s in Management', 'Tashkent, Mirzo Ulugbek District', 'Female', 'Islam', 'A-', '5 years', 'malika.karimova@school.uz', '1994-09-15', null, time(), time()],
            ['Javlonbek Tursunov', '+998935679012', 'Teacher', 4100.00, '2020-11-18', 'Tursunboy Tursunov', 'AE3344556', 'Bachelor’s in Mathematics', 'Fergana, Marg‘ilon City', 'Male', 'Islam', 'B-', '4 years', 'javlonbek.tursunov@school.uz', '1995-07-21', null, time(), time()],
            ['Nilufar Rakhimova', '+998912220099', 'Teacher', 3900.00, '2023-01-10', 'Rakhim Karimov', 'AF5566771', 'Bachelor’s in Physics', 'Andijan, Asaka District', 'Female', 'Islam', 'O+', '3 years', 'nilufar.rakhimova@school.uz', '1997-11-03', null, time(), time()],
            ['Bekzod Yusupov', '+998909900112', 'Store Management', 3700.00, '2021-06-05', 'Yusup Tursunov', 'AG4455668', 'Bachelor’s in Logistics', 'Namangan, Chust District', 'Male', 'Islam', 'AB+', '5 years', 'bekzod.yusupov@school.uz', '1991-08-08', null, time(), time()],
            ['Dilnoza Tojiboyeva', '+998933003322', 'Teacher', 4050.00, '2020-02-28', 'Tojiboy Tojiboyev', 'AH7788994', 'Bachelor’s in Chemistry', 'Tashkent, Sergeli District', 'Female', 'Islam', 'A+', '6 years', 'dilnoza.tojiboyeva@school.uz', '1993-01-27', null, time(), time()],
            ['Ulug‘bek Nematov', '+998973322211', 'Management Staff', 5100.00, '2018-10-01', 'Nemat Nematov', 'AI6677885', 'Master’s in Administration', 'Bukhara, Kogon District', 'Male', 'Islam', 'O-', '10 years', 'ulugbek.nematov@school.uz', '1987-03-17', null, time(), time()],
            ['Feruza Abdurahmonova', '+998946660088', 'Other', 3500.00, '2023-06-12', 'Abdurahmon Abdurahmonov', 'AJ2233445', 'College Diploma', 'Tashkent, Olmazor District', 'Female', 'Islam', 'B+', '2 years', 'feruza.abdurahmonova@school.uz', '1999-10-30', null, time(), time()],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');
    }
}
