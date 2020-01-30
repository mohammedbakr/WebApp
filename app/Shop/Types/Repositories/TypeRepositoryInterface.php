<?php

namespace App\Shop\Types\Repositories;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Shop\Permissions\Permission;
use App\Shop\Types\Type;
use Illuminate\Support\Collection;



interface TypeRepositoryInterface extends BaseRepositoryInterface
{
    public function createType(array $data) : Type;

    public function listTypes(string $order = 'id', string $sort = 'desc') : Collection;

    public function findTypeById(int $id);

    public function updateType(array $data) : bool;

    public function deleteTypeById() : bool;

    public function attachToPermission(Permission $permission);

    public function attachToPermissions(... $permissions);

    public function syncPermissions(array $ids);

    public function listPermissions() : Collection;
}
