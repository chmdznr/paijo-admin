<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Identitum extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'identita';

    public const RIWAYAT_PEROKOK_RADIO = [
        'T' => 'Tidak',
        'Y' => 'Ya',
    ];

    public const JENIS_KELAMIN_SELECT = [
        'L' => 'Laki-laki',
        'P' => 'Perempuan',
    ];

    protected $dates = [
        'tanggal_lahir',
        'tanggal_pertama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_PERNIKAHAN_SELECT = [
        'M'  => 'Menikah',
        'J'  => 'Janda',
        'D'  => 'Duda',
        'BM' => 'Belum Menikah',
    ];

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'tinggi_badan',
        'berat_badan',
        'suku',
        'riwayat_perokok',
        'pekerjaan',
        'nomor_hp',
        'status_pernikahan',
        'alamat',
        'tanggal_pertama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function identitasPengukurans()
    {
        return $this->hasMany(Pengukuran::class, 'identitas_id', 'id');
    }

    public function identitasCatatans()
    {
        return $this->hasMany(Catatan::class, 'identitas_id', 'id');
    }

    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalPertamaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalPertamaAttribute($value)
    {
        $this->attributes['tanggal_pertama'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
