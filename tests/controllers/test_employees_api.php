<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

				var_dump("jkhjhg");

/**
 * Tests for EmployeesAPI
 */

class test_employees_api extends CodeIgniterUnitTestCase {

	public function __construct()
	{
		parent::__construct('Employee Model');
		//create table employeesTest select * from employees

		$this->load->model('Employee_test', 'employee', 'True');

		$this->rand = rand(500,15000);
	}

	public function setUp()
	{
		$this->db->drop('employee_test');
		$this->db->query("CREATE employee_test select * from employee");
		$this->db->trancate('employee_test');
    }

    private function _addEmployee($name, $descr, $picture, $quantity=1) 
    {
    	for($i = 0; $i < $quantity; $i++) {
	    	$data = array(
				    	'name' => $name,
					    'description' => $descr,
					    'picture' => $picture   
					);
			$this->employee->add($data);    
	    }
}

	/**
	* Testing Testimonial Controller. 
	*
	*/


	public function test_add_employee()
	{
		$this->_addEmployee('first Employee', 'description of person', 'fdgfd/dfgfd.png');
		$query = $this->db->get('employee');
		$employees = $query->result();
		$this->assertEqual(count($employees), 1, 'The employee is not added to the db');
		$this->assertEqual($employees[0]->name, 'first Employee', 'The employees name is not the same');
		$this->assertEqual($employees[0]->description, 'description of person', 'The employees description is not the same');
		$this->assertEqual($employees[0]->picture, 'fdgfd/dfgfd.png', 'The employees picture is not the same');
	}


	public function test_get_all_employees()
	{

		$testimonial = new Testimonial();

		//$this->_addEmployee('name', 'description of person', 'fdgfd/dfgfd.png', 3);

		//$query = $this->db->get('people');
		//$employees = $query->result();

		$employess = $testimonial->get_all_employees();

		$this->assertEqual(count($employees), 3, 'The employees are not all added to the db');
	}

}