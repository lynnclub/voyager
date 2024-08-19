<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Tests\Database\Factories\RoleFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'voyager_roles';

    protected $guarded = [];

    public function users()
    {
        $userModel = Voyager::modelClass('User');

        return $this->belongsToMany($userModel, 'voyager_user_roles')
            ->select(app($userModel)->getTable() . '.*')
            ->union($this->hasMany($userModel))->getQuery();
    }

    public function permissions()
    {
        return $this->belongsToMany(Voyager::modelClass('Permission'), 'voyager_permission_role');
    }

    protected static function newFactory()
    {
        return RoleFactory::new();
    }
}
