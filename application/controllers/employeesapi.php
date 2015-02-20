<?php
require BASEPATH.'REST_Controller.php';


/**
    * Employees API Controller. 
    *
    * Maps to the following URL
    *       http://example.com/index.php/testimonialapi/employees
    *   - or -  
    *       http://example.com/index.php/testimonialapi/employee
    *  
    * An API to retrieve the employees of competa and their personal description 
    *
    */

class EmployeesAPI  extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
    }

    /**
     * Get employee by name
     * @param    $name    The name of the employee
     * @return   Array    Employee's name, description and photo url
     */
    function employee_get()
    {    	
    	if(!$this->get('name'))
        {
            $this->response(NULL, 400);
        }
 

    	$this->load->model('Employee', 'employees', 'True');
		$employee= $this->employees->get_employee_by_name($this->get('name'));
         
        if($employee)
        {
            $this->response($employee, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(NULL, 404);
        }

        $this->response($data);
    }

    /**
     * Get all Employees
     *
     * @return    Array    All Employees
     */
    function employees_get()
    {
    	$this->load->model('Employee', 'employees', 'True');
		$employees = $this->employees->get_all_employees();
         
        if($employees)
        {
			$this->response($employees, 200);
		}
        else
        {
            $this->response(NULL, 404);
        }       
    }


    function employee_post()
    {
        $message = array('name' => $this->post('name'), 'description' => 'description', 'picture' => $this->post('picture'));
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    

}