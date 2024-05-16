<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Pengukuran extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'pengukurans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GOLONGAN_DARAH_SELECT = [
        'O'  => 'O',
        'A'  => 'A',
        'B'  => 'B',
        'AB' => 'AB',
    ];

    public const WAKTU_PENGAMBILAN_GULA_DARAH_SELECT = [
        'puasa' => 'Puasa minimal 8 jam',
        'makan' => 'Satu sampai 2 jam setelah makan',
        'gds'   => 'Gula Darah Sewaktu/GDS',
        'tidur' => 'Sebelum berangkat tidur malam',
    ];

    protected $fillable = [
        'identitas_id',
        'berat_badan',
        'tinggi_badan',
        'imt',
        'lingkar_perut',
        'tekanan_darah_diastole',
        'tekanan_darah_sistole',
        'frekuensi_nafas',
        'nadi',
        'kadar_gula_darah',
        'waktu_pengambilan_gula_darah',
        'kolesterol_total',
        'kolesterol_ldl',
        'kolesterol_hdl',
        'trigliserida',
        'kadar_hb',
        'kadar_asam_urat',
        'golongan_darah',
        'hba_1_c',
        'kondisi_umum',
        'keluhan_perasaan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function identitas()
    {
        return $this->belongsTo(Identitum::class, 'identitas_id');
    }
}
