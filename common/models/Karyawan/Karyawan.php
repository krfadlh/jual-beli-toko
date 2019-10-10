<?php

namespace common\models\Karyawan;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property string $nip_karyawan
 * @property string $nama_karyawan
 * @property string $bagian
 *
 * @property Menjual[] $menjuals
 * @property Barang[] $kodeBarangs
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip_karyawan', 'nama_karyawan', 'bagian'], 'required'],
            [['nip_karyawan', 'bagian'], 'string', 'max' => 30],
            [['nama_karyawan'], 'string', 'max' => 20],
            [['nip_karyawan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nip_karyawan' => 'Nip Karyawan',
            'nama_karyawan' => 'Nama Karyawan',
            'bagian' => 'Bagian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenjuals()
    {
        return $this->hasMany(Menjual::className(), ['nip_karyawan' => 'nip_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarangs()
    {
        return $this->hasMany(Barang::className(), ['kode_barang' => 'kode_barang'])->viaTable('menjual', ['nip_karyawan' => 'nip_karyawan']);
    }
}
