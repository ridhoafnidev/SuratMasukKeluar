<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id
 * @property string $no_smasuk
 * @property string $tgl_surat
 * @property string $tgl_diterima
 * @property string $sifat
 * @property string $lampiran
 * @property string|null $lampiran4
 * @property string $nama_instansi
 * @property string $lampiran1
 * @property string $lampiran2
 * @property string $lampiran3
 *
 * @property OptionValue[] $optionValues
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_smasuk', 'tgl_surat', 'tgl_diterima', 'sifat', 'lampiran', 'nama_instansi'], 'required'],
            [['tgl_surat', 'tgl_diterima'], 'safe'],
            [['no_smasuk', 'sifat', 'lampiran', 'nama_instansi'], 'string', 'max' => 100],
            [['lampiran4', 'lampiran1', 'lampiran2', 'lampiran3'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_smasuk' => 'Nomor Masuk',
            'tgl_surat' => 'Tanggal Surat',
            'tgl_diterima' => 'Tanggal Diterima',
            'sifat' => 'Sifat',
            'lampiran' => 'Lampiran',
            'lampiran4' => 'Lampiran 4 (Empat)',
            'nama_instansi' => 'Nama Instansi',
            'lampiran1' => 'Lampiran 1 (Satu)',
            'lampiran2' => 'Lampiran 2 (Dua)',
            'lampiran3' => 'Lampiran 3 (Tiga)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['catalog_option_id' => 'id']);
    }
}
