<?php

namespace App\Models;

use DeepCopy\f001\A;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ong extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'cnpj',
        'telefone',
        'categoria',
        'descricao',
        'logo',
        'documento',
        'endereco_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => 'boolean',
    ];

    /**
     * Relacionamento com o endereço.
     */
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    /**
     * Relacionamento com projetos.
     */
    public function projetos()
    {
        return $this->hasMany(Projeto::class, 'ong_id');
    }
}