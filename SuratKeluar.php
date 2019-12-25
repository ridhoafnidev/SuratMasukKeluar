<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_keluar".
 *
 * @property int $id
 * @property string $no_skeluar
 * @property string $tgl_surat
 * @property string $sifat
 * @property string $lampiran
 * @property string $nama_instansi
 * @property string $lampiran1
 * @property string $lampiran2
 * @property string $lampiran3
 * @property string $lampiran4
 */
class SuratKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_skeluar', 'tgl_surat', 'sifat', 'lampiran', 'nama_instansi'], 'required'],
            [['tgl_surat'], 'safe'],
            [['no_skeluar', 'sifat', 'lampiran', 'nama_instansi'], 'string', 'max' => 100],
            [['lampiran1', 'lampiran2', 'lampiran3', 'lampiran4'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_skeluar' => 'Nomor Skeluar',
            'tgl_surat' => 'Tanggal Surat',
            'sifat' => 'Sifat',
            'lampiran' => 'Lampiran',
            'nama_instansi' => 'Nama Instansi',
            'lampiran1' => 'Lampiran 1 (Satu)',
            'lampiran2' => 'Lampiran 2 (Dua)',
            'lampiran3' => 'Lampiran 3 (Tiga)',
            'lampiran4' => 'Lampiran 4 (Empat)',
        ];
    }
}
