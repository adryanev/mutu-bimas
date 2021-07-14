<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institusi}}`.
 */
class m210714_065450_create_institusi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institusi}}', [
            'id' => $this->primaryKey(),
            'nama'=>$this->string(),
            'alamat'=>$this->string(),
            'kodepos'=>$this->string(),
            'nomor_telp'=>$this->string(),
            'homepage'=>$this->string(),
            'email'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%institusi}}');
    }
}
