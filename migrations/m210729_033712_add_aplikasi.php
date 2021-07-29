<?php

use yii\db\Migration;

/**
 * Class m210727_033712_add_institusi
 */
class m210727_033712_add_institusi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%aplikasi}}', ['id_institusi','nama','endpoint','token','created_at','updated_at'], [
            [1,'Simba','http://stpbonaventura.dashboard-mutu.test','change-me',0,0],
            [2,'Simba','http://stpdianmandala.dashboard-mutu.test','change-me',0,0],
            [3,'Simba','http://stpkat.dashboard-mutu.test','change-me',0,0],
            [4,'Simba','http://stp-ipi.dashboard-mutu.test','change-me',0,0],
            [5,'Simba','http://stikassantoyohanessalib.dashboard-mutu.test','change-me',0,0],
            [6,'Simba','http://stipas.dashboard-mutu.test','change-me',0,0],
            [7,'Simba','http://stkpkbinainsan.dashboard-mutu.test','change-me',0,0],
            [8,'Simba','http://stpdobos.dashboard-mutu.test','change-me',0,0],
            [9,'Simba','http://stikpartoraja.dashboard-mutu.test','change-me',0,0],
            [10,'Simba','http://stipasruteng.dashboard-mutu.test','change-me',0,0],
            [11,'Simba','http://stipaskak.dashboard-mutu.test','change-me',0,0],
            [12,'Simba','http://stpsantopetruska.dashboard-mutu.test','change-me',0,0],
            [13,'Simba','http://stfkledalero.dashboard-mutu.test','change-me',0,0],
            [14,'Simba','http://stiparende.dashboard-mutu.test','change-me',0,0],
            [15,'Simba','http://stprenya-lrt.dashboard-mutu.test','change-me',0,0],
            [16,'Simba','http://stkipweetebula.dashboard-mutu.test','change-me',0,0],
            [17,'Simba','http://stpaksantoyohanespenginjilambon.dashboard-mutu.test','change-me',0,0],
            [18,'Simba','http://stpk-jayapura.dashboard-mutu.test','change-me',0,0],
            [19,'Simba','http://stkyakobus.dashboard-mutu.test','change-me',0,0],
            [20,'Simba','http://stktouye.dashboard-mutu.test','change-me',0,0],
            [21,'Simba','http://stpsantobenediktus.dashboard-mutu.test','change-me',0,0],
            [22,'Simba','http://stftws.dashboard-mutu.test','change-me',0,0],
            [23,'Simba','http://stakatnptk.dashboard-mutu.test','change-me',0,0],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%aplikasi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210727_033712_add_institusi cannot be reverted.\n";

        return false;
    }
    */
}
