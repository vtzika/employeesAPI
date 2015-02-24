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

        /*
           xhr.setRequestHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
                    xhr.setRequestHeader(;
                    xhr.setRequestHeader("Access-Control-Allow-Methods", "GET,PUT,POST,DELETE");
                    xhr.setRequestHeader("Content-Type", "text/plain");
                    xhr.setRequestHeader("Access-Control-Allow-Credentials", "true");
                    */


       // $this->response->header("Access-Control-Allow-Origin: *");
        $this->response($data, "Access-Control-Allow-Origin: *");
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


        //$this->response->header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        //$this->response->header("Access-Control-Allow-Origin: *");
        //$this->response->header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");

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
        $message = array('name' => $this->post('name'), 'description' => $this->post('description'), 'picture' => $this->post('picture'));
        
        $this->response($message, 200); // 200 being the HTTP response code
    }

    function employee_del_delete()
    {
        $data = array('returned: '. $this->delete('name'));

        $this->response($data);
    }
    
    

}