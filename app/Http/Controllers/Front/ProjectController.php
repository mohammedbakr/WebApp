<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Shop\Customers\Customer;
use App\Shop\Companies\Company;
use App\Shop\Employees\Employee;
use App\Shop\Projects\Repositories\ProjectRepository;
use App\Shop\Projects\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Shop\Projects\Requests\CreateProjectRequest;
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
        

        return view('front.comprojects.list', [
            'projects' => $this->projectRepo->paginateArrayResults($list->all(), 10),
            'employees' => $this->employeeRepo->paginateArrayResults($list_employees->all(), 10),
           
        ]);
        // return view('front.comprojects.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('front.comprojects.create');
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

        return redirect()->route('accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function createStaff($id)
    {
        return view('front.comprojects.createStaff');
    }
}
