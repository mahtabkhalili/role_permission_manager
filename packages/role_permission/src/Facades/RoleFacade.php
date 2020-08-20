<?php


namespace Package\RolePermission\Facades;


use Illuminate\Support\Facades\Facade;

class RoleFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'role';
    }

}
