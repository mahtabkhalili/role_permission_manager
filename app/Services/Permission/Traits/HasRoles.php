<?php
namespace App\Services\Permission\Traits;

use App\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function giveRolesTo(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()) return $this;

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }

    protected function array_flatten( $arr, $out=array() )  {
        foreach( $arr as $item ) {
            if ( is_array( $item ) ) {
                $out = array_merge( $out, $this->array_flatten( $item ) );
            } else {
                $out[] = $item;
            }
        }
        return $out;
    }

    public function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $this->array_flatten($roles))->get();
    }

    public function withdrawRoles(...$roles)
    {
        $roles = $this->getAllRoles($roles);
        $this->roles()->detach($roles);
        return $this;
    }

    public function refreshRoles(...$roles)
    {
        $roles = $this->getAllRoles($roles);
        $this->roles()->sync($roles);
        return $this;
    }

    public function hasRole(string $role)
    {
        return $this->roles->contains('name', $role);
     }

}
