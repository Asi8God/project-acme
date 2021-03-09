<?php

use yii\db\Migration;

/**
 * Class m210305_085138_create_table_phone_number
 */
class m210305_085138_create_table_phone_number extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('phone_number', [
            'id' => 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
            'user_id' => 'int(10) UNSIGNED NOT NULL',
            'country_id' => 'tinyint(3) UNSIGNED NOT NULL',
            'number' => 'varchar(45) NOT NULL',
            'verification_code' => 'varchar(45) NOT NULL',
            //'verified' => 'bit(1) NOT NULL DEFAULT b\'0\'', //OK
            'verified' => 'bit(1) NOT NULL DEFAULT 0b0',
            'active' => 'bit(1) NOT NULL DEFAULT 0b1',
            'created' => 'timestamp NOT NULL DEFAULT current_timestamp()',
            'PRIMARY KEY (id)',
            //'UNIQUE KEY `idx_phone_number_user_id_user` (user_id)',
            'INDEX `idx_phone_number_user_id_user` (user_id)',
            'INDEX `idx_phone_number_country_id_country` (country_id)',
            'CONSTRAINT `fk_phone_number_user_id_user` 
                FOREIGN KEY (user_id) 
                REFERENCES user (id) 
                ON UPDATE CASCADE',
            'CONSTRAINT `fk_phone_number_country_id_country` 
                FOREIGN KEY (country_id) 
                REFERENCES country (id) 
                ON UPDATE CASCADE'
        ], 
        'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        // $this->execute('
        // CREATE TABLE IF NOT EXISTS phone_number (
        //     id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        //     user_id int(10) UNSIGNED NOT NULL,
        //     country_id tinyint(3) UNSIGNED NOT NULL,
        //     number varchar(45) NOT NULL,
        //     verification_code varchar(45) NOT NULL,
        //     verified bit(1) NOT NULL DEFAULT 0b0,
        //     active bit(1) NOT NULL DEFAULT 0b1,
        //     created timestamp NOT NULL DEFAULT current_timestamp(),
        //     PRIMARY KEY (id),
        //     KEY `idx_phone_number_user_id_user` (user_id),
        //     KEY `idx_phone_number_country_id_country` (country_id),
        //     CONSTRAINT `fk_phone_number_user_id_user`
        //         FOREIGN KEY (user_id) 
        //         REFERENCES user (id) 
        //         ON UPDATE CASCADE,
        //     CONSTRAINT `fk_phone_number_country_id_country` 
        //         FOREIGN KEY (country_id) 
        //         REFERENCES country (id) 
        //         ON UPDATE CASCADE )
        //     ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;'
        // );        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_phone_number_user_id_user',
            'phone_number'
        );

        $this->dropIndex(
            'idx_phone_number_user_id_user',
            'phone_number'
        );

        $this->dropForeignKey(
            'fk_phone_number_country_id_country',
            'phone_number'
        );

        $this->dropIndex(
            'idx_phone_number_country_id_country',
            'phone_number'
        );        

        $this->dropTable('phone_number');
    }
}
