<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aplikasi}}`.
 */
class m210714_065506_create_aplikasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aplikasi}}', [
            'id' => $this->primaryKey(),
            'id_institusi'=>$this->integer()->unique(),
            'nama'=>$this->string(),
            'endpoint'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey('fk-aplikasi-institusi','{{%aplikasi}}','id_institusi','{{%institusi}}','id','cascade','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aplikasi}}');
    }
}
