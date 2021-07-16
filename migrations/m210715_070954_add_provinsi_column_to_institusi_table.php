<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%institusi}}`.
 */
class m210715_070954_add_provinsi_column_to_institusi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%institusi}}','provinsi',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%institusi}}','provinsi');

    }
}
