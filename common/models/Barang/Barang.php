<?php

namespace common\models\Barang;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $harga_barang
 *
 * @property Membeli[] $membelis
 * @property Pembeli[] $pembelis
 * @property Menjual[] $menjuals
 * @property Karyawan[] $nipKaryawans
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_barang', 'nama_barang', 'harga_barang'], 'required'],
            [['kode_barang'], 'string', 'max' => 15],
            [['nama_barang'], 'string', 'max' => 20],
            [['harga_barang'], 'string', 'max' => 40],
            [['kode_barang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'harga_barang' => 'Harga Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembelis()
    {
        return $this->hasMany(Membeli::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelis()
    {
        return $this->hasMany(Pembeli::className(), ['id_pembeli' => 'id_pembeli'])->viaTable('membeli', ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenjuals()
    {
        return $this->hasMany(Menjual::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipKaryawans()
    {
        return $this->hasMany(Karyawan::className(), ['nip_karyawan' => 'nip_karyawan'])->viaTable('menjual', ['kode_barang' => 'kode_barang']);
    }
}
