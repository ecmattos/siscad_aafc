<?php 

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

class Permission extends Revisionable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];  

    protected $fillable = [
        'name', 
        'display_name',
        'description' 
    ];
    /**
     * many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('SisCad\Entities\Role', 'permission_role')->orderBy('display_name');
    }
}