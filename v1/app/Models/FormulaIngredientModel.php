<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaIngredientModel extends Model
{
    use HasFactory;

    protected $table = 'formula_ingredients';

    protected $fillable = [
        'formula_id',
        'raw',
        'code_name',
    ];
}
