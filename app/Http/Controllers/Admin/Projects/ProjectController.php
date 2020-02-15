<?php

namespace App\Http\Controllers\Admin\Projects;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Shop\Customers\Customer;
use App\Shop\Companies\Company;
use App\Shop\Employees\Employee;
use App\Shop\Projects\Repositories\ProjectRepository;
use App\Shop\Projects\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Shop\Projects\Requests\CreateProjectRequest;
use App\Http\Controllers\Controller;
use App\Shop\Projects\Project;
use App\Shop\Admins\Requests\CreateEmployeeRequest;
use App\Shop\Admins\Requests\UpdateEmployeeRequest;
use App\Shop\Employees\Repositories\EmployeeRepository;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Shop\Types\Repositories\TypeRepositoryInterface;
use App\Shop\Types\Type;


class ProjectController extends Controller
{

    private $projectRepo;
    private $employeeRepo;
    private $typeRepo;
    private $companyRepo;
    private $customerRepo;


    public function __construct(
        ProjectRepositoryInterface $projectRepository,
        EmployeeRepositoryInterface $employeeRepository,
        CompanyRepositoryInterface $companyRepository,
        CustomerRepositoryInterface $customerRepository,
        TypeRepositoryInterface $typeRepository
)
    {
        $this->employeeRepo = $employeeRepository;
        $this->projectRepo = $projectRepository;
        $this->typeRepo = $typeRepository;
        $this->companyRepo = $companyRepository;
        $this->customerRepo = $customerRepository;


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->projectRepo->listProjects('created_at', 'desc');
        $list_employees = $this->employeeRepo->listEmployees('created_at', 'desc');
        

        return view('admin.projects.list', [
            'projects' => $this->projectRepo->paginateArrayResults($list->all(), 10),
            'employees' => $this->employeeRepo->paginateArrayResults($list_employees->all(), 10),
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = $this->employeeRepo->listEmployees('created_at', 'desc');
        $types = $this->typeRepo->listTypes();
        // $companies = $this->companyRepo->listCompanies();
         $customers = $this->customerRepo->listCustomers();


        return view('admin.projects.create',
            ['employeesList' => $this->employeeRepo->paginateArrayResults($list->all()), 'types' => $types, 'customers' => $customers]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        Project::create($input);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->projectRepo->findProjectById($id);
//        $types = $this->typeRepo->listTypes('created_at', 'desc');
        $types = Type::all();
        $list_employees = $this->employeeRepo->listEmployees('created_at', 'desc');

        return view('admin.projects.show', [
            'project' => $project,
            'employees' => $this->employeeRepo->paginateArrayResults($list_employees->all(), 10),
            'types' => $types
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $list = $this->employeeRepo->listEmployees('created_at', 'desc');
        $types = $this->typeRepo->listTypes();
        // $companies = $this->companyRepo->listCompanies();
        $customers = $this->customerRepo->listCustomers();



        return view('admin.projects.edit', ['project' => $this->projectRepo->findProjectById($id), 'employeesList' => $this->employeeRepo->paginateArrayResults($list->all()), 'types' => $types, 'customers' =>$customers]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProjectRequest  $request, $id)
    {
        $project = $this->projectRepo->findProjectById($id);


            $projectRepo = new ProjectRepository($project);
          $projectRepo->updateproject($request->all());


          $project->employees()->sync([$request['accountant'],$request['engineer'],$request['PurchasingManager'] ]);


        return redirect()->route('admin.projects.show', $id)
            ->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepo->findProjectById($id);
        $projectRepo = new ProjectRepository($project);
        $projectRepo->deleteProject();

        return redirect()->route('admin.projects.index')->with('message', 'Delete successful');
    }
}
