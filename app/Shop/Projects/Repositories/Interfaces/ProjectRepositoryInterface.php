<?php

namespace App\Shop\Projects\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Shop\Projects\Project;
use Illuminate\Support\Collection;


interface ProjectRepositoryInterface extends BaseRepositoryInterface
{
    public function updateProject(array $params) : Project;

    public function listProjects(string $order = 'id', string $sort = 'desc') : Collection;

    public function createProject(array $params) : Project;



    public function findProjectById(int $id) : Project;

    public function findProvinces();

    public function listStates() : Collection;
}
