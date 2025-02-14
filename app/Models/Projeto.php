<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'data',
        'imagem',
        'local',
        'descricao',
        'vagas',
        'ong_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data' => 'date',
    ];

    /**
     * Relacionamento com a ONG.
     */
    public function ong()
    {
        return $this->belongsTo(Ong::class, 'ong_id');
    }

    /**
     * Relacionamento com inscrições.
     */
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'projeto_id');
    }
}