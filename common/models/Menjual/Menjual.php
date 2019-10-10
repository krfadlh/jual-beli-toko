<?php

namespace common\models\Menjual;

use Yii;
use common\models\Barang\Barang;
use common\models\Karyawan\Karyawan;

/**
 * This is the model class for table "menjual".
 *
 * @property string $tgl_penjualan
 * @property int $jmlh_barang
 * @property string $nip_karyawan
 * @property string $kode_barang
 * @property string $id_transaksi
 *
 * @property Karyawan $nipKaryawan
 * @property Barang $kodeBarang
 */
class Menjual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menjual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_penjualan', 'jmlh_barang', 'nip_karyawan', 'kode_barang', 'id_transaksi'], 'required'],
            [['jmlh_barang'], 'integer'],
            [['tgl_penjualan', 'nip_karyawan', 'kode_barang', 'id_transaksi'], 'string', 'max' => 30],
            [['nip_karyawan', 'kode_barang'], 'unique', 'targetAttribute' => ['nip_karyawan', 'kode_barang']],
            [['nip_karyawan'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['nip_karyawan' => 'nip_karyawan']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tgl_penjualan' => 'Tgl Penjualan',
            'jmlh_barang' => 'Jmlh Barang',
            'nip_karyawan' => 'Nip Karyawan',
            'kode_barang' => 'Kode Barang',
            'id_transaksi' => 'Id Transaksi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['nip_karyawan' => 'nip_karyawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['kode_barang' => 'kode_barang']);
    }
}
