<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
    ];

    /**
     * Relacionamento com usuários.
     */
    public function users()
    {
        return $this->hasOne(User::class, 'endereco_id');
    }

    /**
     * Relacionamento com ONGs.
     */
    public function ongs()
    {
        return $this->hasOne(Ong::class, 'endereco_id');
    }
}