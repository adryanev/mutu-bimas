<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "aplikasi".
 *
 * @property int $id
 * @property int|null $id_institusi
 * @property string|null $nama
 * @property string|null $endpoint
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $token
 *
 * @property Institusi $institusi
 */
class Aplikasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aplikasi';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_institusi', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'endpoint','token'], 'string', 'max' => 255],
            [['id_institusi'], 'unique'],
            [['id_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => Institusi::className(), 'targetAttribute' => ['id_institusi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_institusi' => Yii::t('app', 'Id Institusi'),
            'nama' => Yii::t('app', 'Nama'),
            'endpoint' => Yii::t('app', 'Endpoint'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'token'=>Yii::t('app','Token')
        ];
    }

    /**
     * Gets query for [[Institusi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitusi()
    {
        return $this->hasOne(Institusi::className(), ['id' => 'id_institusi']);
    }
}
