<?php

namespace App\Models\Admin\NivelAcesso;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description', 'slug'];
    
    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }
}
