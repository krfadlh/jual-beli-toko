<?php

namespace common\models\Membeli;

use Yii;
use common\models\Barang\Barang;
use common\models\Pembeli\Pembeli;

/**
 * This is the model class for table "membeli".
 *
 * @property string $tgl_pembelian
 * @property int $jmlh_barang
 * @property string $harga_yg_dibayar
 * @property string $kode_barang
 * @property string $id_pembeli
 * @property string $id_transaksi
 *
 * @property Barang $kodeBarang
 * @property Pembeli $pembeli
 */
class Membeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'membeli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_pembelian', 'jmlh_barang', 'harga_yg_dibayar', 'kode_barang', 'id_pembeli', 'id_transaksi'], 'required'],
            [['jmlh_barang'], 'integer'],
            [['tgl_pembelian', 'kode_barang', 'id_pembeli'], 'string', 'max' => 20],
            [['harga_yg_dibayar'], 'string', 'max' => 15],
            [['id_transaksi'], 'string', 'max' => 30],
            [['kode_barang', 'id_pembeli'], 'unique', 'targetAttribute' => ['kode_barang', 'id_pembeli']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
            [['id_pembeli'], 'exist', 'skipOnError' => true, 'targetClass' => Pembeli::className(), 'targetAttribute' => ['id_pembeli' => 'id_pembeli']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tgl_pembelian' => 'Tgl Pembelian',
            'jmlh_barang' => 'Jmlh Barang',
            'harga_yg_dibayar' => 'Harga Yg Dibayar',
            'kode_barang' => 'Kode Barang',
            'id_pembeli' => 'Id Pembeli',
            'id_transaksi' => 'Id Transaksi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembeli()
    {
        return $this->hasOne(Pembeli::className(), ['id_pembeli' => 'id_pembeli']);
    }
}
