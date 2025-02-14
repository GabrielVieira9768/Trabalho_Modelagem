<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricoes';

    protected $fillable = [
        'user_id',
        'projeto_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data' => 'dateTime',
    ];

    /**
     * Relacionamento com o usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relacionamento com o projeto.
     */
    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
}