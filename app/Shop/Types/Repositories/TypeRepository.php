<?php
namespace App\Shop\Types\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Permissions\Permission;
use App\Shop\Types\Type;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class TypeRepository extends BaseRepository implements TypeRepositoryInterface
{
    /**
     * @var Type
     */
    protected $model;
    /**
     * TypeRepository constructor.
     * @param Type $role
     */
    public function __construct(Type $type)
    {
        parent::__construct($type);
        $this->model = $type;
    }
    /**
     * List all Types
     *
     * @param string $order
     * @param string $sort
     * @return Collection
     */
    public function listTypes(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->all(['*'], $order, $sort);
    }
    /**
     * @param array $data
     * @return Type
     * @throws CreateTypeErrorException
     */
    public function createType(array $data) : Type
    {
        try {
            $type = new Type($data);
            $type->save();
            return $type;
        } catch (QueryException $e) {
            throw new CreateTypeErrorException($e);
        }
    }


    /**
     * @param int $id
     *
     * @return Type
     * @throws TypeNotFoundErrorException
     */
    public function findTypeById(int $id) : Type
    {
        try {
            return $this->findOneOrFail($id);
        } catch (QueryException $e) {
            throw new TypeeNotFoundErrorException($e);
        }
    }
//
//    /**
//     * @param array $data
//     *
//     * @return bool
//     * @throws UpdateTypeErrorException
//     */
    public function updateType(array $data) : bool
    {
        try {
            return $this->update($data);
        } catch (QueryException $e) {
            throw new UpdateTypeErrorException($e);
        }
    }

//    /**
//     * @return bool
//     * @throws DeleteTypeErrorException
//     */
    public function deleteTypeById() : bool
    {
        try {
            return $this->delete();
        } catch (QueryException $e) {
            throw new DeleteTypeErrorException($e);
        }
    }

    /**
     * @param Permission $permission
     */
    public function attachToPermission(Permission $permission)
    {
        $this->model->attachPermission($permission);
    }

    /**
     * @param Permission ...$permissions
     */
    public function attachToPermissions(... $permissions)
    {
        $this->model->attachPermissions($permissions);
    }

    /**
     * @param array $ids
     */
    public function syncPermissions(array $ids)
    {
        $this->model->syncPermissions($ids);
    }

    /**
     * @return Collection
     */
    public function listPermissions() : Collection
    {
        return $this->model->permissions()->get();
    }

}
