<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\fakultas;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_prodi', 'nama_prodi', 'kode_fakulta'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'kode_fakultas');
    }
}
