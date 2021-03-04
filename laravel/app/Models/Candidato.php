<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'candidatos';

    protected $fillable = [
        'nome', 'email', 'idade', 'linkedin', 'tecnologias'
    ];
}
