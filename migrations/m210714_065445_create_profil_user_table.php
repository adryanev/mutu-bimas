<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profil_user}}`.
 */
class m210714_065445_create_profil_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profil_user}}', [
            'id'=>$this->primaryKey(),
            'id_user'=>$this->integer(),
            'nama_lengkap'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk-profil_user-user','{{%profil_user}}','id_user', 'user','id','cascade','cascade');    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-profil_user-user','{{%profil_user}}');
        $this->dropTable('{{%profil_user}}');
    }
}
