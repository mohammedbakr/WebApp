<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Shop\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Shop\Types\Repositories\TypeRepository;
use App\Shop\Types\Repositories\TypeRepositoryInterface;
use App\Shop\Types\Requests\CreateTypeRequest;
use App\Shop\Types\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * @var TypeRepositoryInterface
     */
    private $typeRepo;

    /**
     * @var PermissionRepositoryInterface
     */
    private $permissionRepository;

    /**
     * TypeController constructor.
     *
     * @param TypeRepositoryInterface $typeRepository
     * @param PermissionRepositoryInterface $permissionRepository
     */
    public function __construct(
        TypeRepositoryInterface $typeRepository,
        PermissionRepositoryInterface $permissionRepository
    ) {
        $this->typeRepo = $typeRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->typeRepo->listTypes('name', 'asc')->all();

        $types = $this->typeRepo->paginateArrayResults($list);

        return view('admin.types.list', compact('types'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * @param CreateTypeRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTypeRequest $request)
    {
        $this->typeRepo->createType($request->except('_method', '_token'));

        return redirect()->route('admin.types.index')
            ->with('message', 'Create type successful!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type = $this->typeRepo->findTypeById($id);

        $typeRepo = new TypeRepository($type);
        $attachedPermissionsArrayIds = $typeRepo->listPermissions()->pluck('id')->all();
        $permissions = $this->permissionRepository->listPermissions(['*'], 'name', 'asc');

        return view('admin.types.edit', compact(
            'type',
            'permissions',
            'attachedPermissionsArrayIds'
        ));
    }

    /**
     * @param UpdateTypeRequest $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(UpdateTypeRequest $request, $id)
    {
        $type = $this->typeRepo->findTypeById($id);

        if ($request->has('permissions')) {
            $typeRepo = new TypeRepository($type);
            $typeRepo->syncPermissions($request->input('permissions'));
        }

        $this->typeRepo->updateType($request->except('_method', '_token'), $id);

        return redirect()->route('admin.types.edit', $id)
            ->with('message', 'Update type successful!');
    }
}
