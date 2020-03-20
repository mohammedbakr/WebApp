<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Requests\UpdateCustomerRequest;
use App\Shop\Projects\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Shop\Projects\Requests\CreateProjectRequest;
use App\Shop\Projects\Project;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Shop\Types\Repositories\TypeRepositoryInterface;
use Illuminate\Validation\Rule;

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

        $project = Project::create($input);

        $project->customers()->sync($request->cust_id);

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
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('accounts');
    }

    public function createStaff($id)
    {
        return view('front.comprojects.createStaff');
    }

    public function showStaff($id)
    {
        $project = Project::findOrFail($id);

        return view('front.comprojects.showStaff', compact('project'));
    }

    public function editStaff($id)
    {
        return view('front.comprojects.editStaff', ['customer' => $this->customerRepo->findCustomerById($id)]);
    }

    public function updateStaff(Request $request, $id)
    {
        $customer = $this->customerRepo->findCustomerById($id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', Rule::unique('customers')->ignore($customer->id)],
            'company' => ['required']
        ]);

        $update = new CustomerRepository($customer);
        $data = $request->except('_method', '_token');

        $update->updateCustomer($data);

        $request->session()->flash('message', 'Updated successfully');
        return redirect()->route('accounts');
    }

    public function deleteStaff($id)
    {
        $customer = $this->customerRepo->findCustomerById($id);

        $customerRepo = new CustomerRepository($customer);
        $customerRepo->deleteCustomer();

        return redirect()->back()->with('message', 'Deleted successfully');
    }
}
