<?php

namespace App\Shop\Projects\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Projects\Exceptions\projectInvalidArgumentException;
use App\Shop\Projects\Exceptions\projectNotFoundException;
use App\Shop\Projects\Repositories\Interfaces\projectRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Shop\Projects\Project;
use Illuminate\Support\Collection;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    /**
     * ProjectRepository constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        parent::__construct($project);
        $this->model = $project;
    }

    /**
     * List all the Projects
     *
     * @param string $order
     * @param string $sort
     * @return Collection
     */
    public function listProjects(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $params
     * @return project
     */
    public function createproject(array $params) : project
    {
        return $this->create($params);
    }

    /**
     * Find the project
     *
     * @param $id
     * @return project
     * @throws projectNotFoundException
     */
    public function findprojectById(int $id) : project
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new projectNotFoundException('project not found.');
        }
    }

    /**
     * Show all the provinces
     *
     * @return mixed
     */
    public function findProvinces()
    {
        return $this->model->provinces;
    }

    /**
     * Update the project
     *
     * @param array $params
     *
     * @return project
     * @throws projectNotFoundException
     */
    public function updateproject(array $params) : project
    {
        try {
            $this->model->update($params);
            return $this->findProjectById($this->model->id);
        } catch (QueryException $e) {
            throw new projectInvalidArgumentException($e->getMessage());
        }
    }

    /**
     *
     * @return Collection
     */
    public function listStates() : Collection
    {
        return $this->model->states()->get();
    }

    public function deleteProject() : bool
    {
        return $this->delete();
    }
}
