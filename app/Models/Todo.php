<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property bool $concluded
 */
class Todo extends Model {
    protected $fillable = ['name', 'concluded'];
}
