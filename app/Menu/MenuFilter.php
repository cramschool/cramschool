<?php

namespace App\Menu;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (isset($item['roles'])) {
            $roles = $item['roles'];

            foreach ($roles as $role) {
                if (auth()->user()->$role) {
                    return $item;
                }
            }

            return false;
        }

        return $item;
    }
}
