<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "institusi".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $nama_ketua
 * @property int|null $tanggal_berdiri
 * @property string|null $alamat
 * @property string|null $nomor_telp
 * @property string|null $homepage
 * @property string|null $email
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $provinsi
 * @property string|null $slug

 *
 * @property Aplikasi $aplikasi
 */
class Institusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institusi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_berdiri', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'nama_ketua', 'alamat', 'nomor_telp', 'homepage', 'email','provinsi','slug'], 'string', 'max' =>
                255],
            [['slug'], 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class'=>SluggableBehavior::class,
                'attribute' => 'nama'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'nama_ketua' => Yii::t('app', 'Nama Ketua'),
            'tanggal_berdiri' => Yii::t('app', 'Tanggal Berdiri'),
            'alamat' => Yii::t('app', 'Alamat'),
            'nomor_telp' => Yii::t('app', 'Nomor Telp'),
            'homepage' => Yii::t('app', 'Homepage'),
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'provinsi' => Yii::t('app', 'Provinsi'),
        ];
    }

    /**
     * Gets query for [[Aplikasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAplikasi()
    {
        return $this->hasOne(Aplikasi::className(), ['id_institusi' => 'id']);
    }
}
