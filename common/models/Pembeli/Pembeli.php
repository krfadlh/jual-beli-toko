<?php

namespace common\models\Pembeli;

use Yii;

/**
 * This is the model class for table "pembeli".
 *
 * @property string $id_pembeli
 * @property string $nama_pembeli
 * @property int $no_telp
 * @property string $alamat
 *
 * @property Membeli[] $membelis
 * @property Barang[] $kodeBarangs
 */
class Pembeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembeli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli', 'nama_pembeli', 'no_telp', 'alamat'], 'required'],
            [['no_telp'], 'integer'],
            [['id_pembeli'], 'string', 'max' => 20],
            [['nama_pembeli', 'alamat'], 'string', 'max' => 30],
            [['id_pembeli'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembeli' => 'Id Pembeli',
            'nama_pembeli' => 'Nama Pembeli',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembelis()
    {
        return $this->hasMany(Membeli::className(), ['id_pembeli' => 'id_pembeli']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarangs()
    {
        return $this->hasMany(Barang::className(), ['kode_barang' => 'kode_barang'])->viaTable('membeli', ['id_pembeli' => 'id_pembeli']);
    }
}
