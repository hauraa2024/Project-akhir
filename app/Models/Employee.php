<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    /*public function tasks(): BelongsToMany*/
    /*{*/
    /*    return $this->belongsToMany(Task::class, 'employee_task');*/
    /*}*/
    protected $fillable = ['name', 'address']; // Tambahkan fillable

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'employee_task');
    }
}
