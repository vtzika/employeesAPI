<?
	class Employee_test extends CI_MODEL {
		var $name = "";
		var $description = "";
		var $picture = "";

		function __construct() 
		{
			parent::__construct();
		}

		function get_first_employee()
		{
			$employees = $this->get_all_employees();
			return $employees[0];
		}

		function add($employee)
		{
			$query = $this->db->insert('employee_test', $employee);
		}

		function get_all_employees()
		{
			$query = $this->db->get('employee_test');
			return $query->result();
		}

		function get_employee_by_name($name)
		{
			$query = $this->db->get_where('employee_test', array('name' => $name));
			return $query->result();
		}

	}