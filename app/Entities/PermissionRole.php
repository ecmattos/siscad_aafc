<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $fillable = [
        'role_id',
        'permission_id' 
    ];
    
    protected $table = 'permission_role';

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->hasMany('SisCad\Entities\Role');
    }

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->hasMany('SisCad\Entities\Permission');
    }
}
