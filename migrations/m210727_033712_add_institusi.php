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
        $this->batchInsert('{{%institusi}}', ['nama','nama_ketua','provinsi','email','homepage','created_at','updated_at'], [
            ['STP St. Bonaventura Delitua Medan','Paulinus Tibo, S.Ag., M.Th.','Sumatera Utara','stpbonaventura@gmail.com','stpbonaventura.id',0,0],
            ['STP Dian Mandala Gunung Sitoli Nias Keuskupan Sibolga','Fransiskus Tuaman Sasfo Sinaga, S.Ag., M.Th.'
            ,'Sumatera Utara','sekretariat@stpdianmandala.ac.id','stpdianmandala.ac.id',0,0],
            ['Sekolah Tinggi Pastoral Kateketik (STPKat) Santo Fransiskus Asisi Semarang','Fransiskus Tuaman Sasfo Sinaga, S.Ag., M.Th.','Jawa Tengah','stpkatsemarang@yahoo.com','stpkat.ac.id',0,0,],
            ['Sekolah Tinggi Pastoral - Yayasan Institut Pastoral Indonesia Malang','Yohanes Subasno, S.Pd., M.Th.','Jawa Tengah','stpkatsemarang@yahoo.com','stpkat.ac.id',0,0],
            ['STIKAS Santo Yohanes Salib','Dr. Simplesius Sandur, S.S., Lic.Phil.'
            ,'Kalimantan Barat','stikasstyohanes salib@gmail.com','stikassantoyohanessalib.ac.id',0,0],
            ['STIPAS Tahasak Danum Pambelum Keuskupan Palangkaraya','Paulina Maria Ekasari Wahyuningrum, S.Pd., M.Pd.','Kalimantan Tengah','admin@stipas.ac.id','stipas.ac.id',0,0],
            ['STKPK Bina Insan','Wilfridus Samdirgawijaya, S.S., Lic.Miss.','Kalimantan Timur','stkpksamarinda@gmail.com','stkpkbinainsan.ac.id',0,0],
            ['STP Don Bosco Tomohon','Marthinus Marcel Lintong, S.S., M.Pd.','Sulawesi Utara','stpdobos.tomohon@gmail.com','stpdobos.ac.id.',0,0],
            ['STIKPAR Toraja','Dr. Petrus Bine Saramae, S.S., M.Hum.','Sulawesi Selatan','stikpar2002@yahoo.com','stikpartoraja.ac.id',0,0],
            ['STIPAS St.Sirilus Ruteng','Dr. Rikardus Moses Jehaut, S.Fil., M.Th.','Nusa Tenggara Timur','sirilus.jerusalem@yahoo.com','stipasruteng.ac.id',0,0],
            ['STIPAS Keuskupan Agung Kupang','Emanuel Bai Samuel Kase, S.Fil., M.M','Nusa Tenggara Timur','Stipaskak@yahoo.co.id','Stipaskak.ac.id',0,0],
            ['Sekolah Tinggi Pastoral St. Petrus Keuskupan Atambua','Dr. Theodorus Asa Siri, S.Ag, Lic.Sc.','Nusa Tenggara Timur','stp.petrus@yahoo.com','stpsantopetruska.ac.id',0,0],
            ['Sekolah Tinggi Filsafat Katolik Ledalero','Dr. Otto Gusti Ndegong Madung, S.Fil., M.Th.','Nusa Tenggara Timur','stfkledalero@yahoo.com','stfkledalero.ac.id',0,0],
            ['STIPAR Ende','Frederikus Dhedhu, S.Fil., Lic.Th.','Nusa Tenggara Timur','info@stiparende.ac.id','stiparende.ac.id',0,0],
            ['Sekolah Tinggi Pastoral Reinha Larantuka','Drs. Petrus Tukan, Lic.Theol.','Nusa Tenggara Timur','waibalunrenya@rocketmail.com','stprenya-lrt.sch.id',0,0],
            ['STKIP Weetebula','Wilhelmus Yape Kii, S.Pt., M.Phil.','Nusa Tenggara Timur','stkip.weetebula@yahoo.co.id','stkip.weetebula.ac.id',0,0],
            ['STPAK St. Yohanes Penginjil Ambon','Andreas Sainyakit, S.S., M.A.','Maluku','operatorstpak@gmail.com','stpaksantoyohanespenginjilambon.ac.id',0,0],
            ['Sekolah Tinggi Pastoral Kateketik Santo Yohanes Rasul Jayapura','Dr. Paulus Satyo Istandar Tan, M.Th.','Papua','sekretariat@stpk-jayapura.ac.id','stpk-jayapura.ac.id',0,0],
            ['STK St. Yakobus Merauke','Dr. Donatus Wea, S.Ag., Lic.Iur.','Papua','humas@stkyakobus.ac.id','stkyakobus.ac.id',0,0],
            ['STK Touye Paapaa Deiyai Keuskupan Timika','Oktopianus Pekei, S.S., M.Sc.','Papua','stktouye@gmail.com','tprenya-lrt.sch.id',0,0],
            ['Sekolah Tinggi Pastoral Kateketik St. Benediktus','Imanuel Tenau, S.Fil., M.Hum.','Papua Barat','stpksantobenediktus@yahoo.com',null,0,0],
            ['Sekolah Tinggi Filsafat Teologi Widya Sasana','Prof. Dr. FX. Eko Armada Riyanto, Lic.Phil.','Jawa Timur','stftws@gmail.com','pasca.stftws.ac.id',0,0],
            ['Sekolah Tinggi Agama Katolik Negeri Pontianak','Dr. Sunarso, S.T., M.Eng.','Kalimantan Barat','stakatnegeripontianak@gmail.com','stakatnptk.ac.id',0,0]


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%institusi}}');
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
