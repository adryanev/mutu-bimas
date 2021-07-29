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
        $this->batchInsert('{{%institusi}}',['nama','nama_ketua','tanggal_berdiri','provinsi','nomor_telp','email','homepage','created_at','updated_at','slug'],[
            ['STP St. Bonaventura Delitua Medan','Paulinus Tibo, S.Ag., M.Th.',null,'Sumatera Utara',null,'stpbonaventura@gmail.com','stpbonaventura.id',0,0,'stp-st-bonaventura-delitua-medan'],
            ['STP Dian Mandala Gunung Sitoli Nias Keuskupan Sibolga','Fransiskus Tuaman Sasfo Sinaga, S.Ag., M.Th.',
                null,'sekretariat@stpdianmandala.ac.id','stpdianmandala.ac.id',0,0,'stp-dian-mandala-gunung-sitoli-nias-keuskupan-sibolga'],
            ['Sekolah Tinggi Pastoral Kateketik (STPKat) Santo Fransiskus Asisi Semarang','Fransiskus Tuaman Sasfo Sinaga, S.Ag., M.Th.',null,'Jl. Ronggowarsito 8 Tanjungmas, Kec. Semarang Barat, Kota Semarang 50174','Jawa Tengah','(024) 3543600','stpkatsemarang@yahoo.com','stpkat.ac.id',0,0,'sekolah-tinggi-pastoral-kateketik-stpkat-santo-fransiskus-asisi-semarang'],
            ['Sekolah Tinggi Pastoral - Yayasan Institut Pastoral Indonesia Malang','Yohanes Subasno, S.Pd., M.Th.',null,'Jl. Ronggowarsito 8 Tanjungmas, Kec. Semarang Barat, Kota Semarang 50174','Jawa Tengah','(024) 3543600','stpkatsemarang@yahoo.com','stpkat.ac.id',0,0,'sekolah-tinggi-pastoral-kateketik-stpkat-santo-fransiskus-asisi-semarang'],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210727_033712_add_institusi cannot be reverted.\n";

        return false;
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
