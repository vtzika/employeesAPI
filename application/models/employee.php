<?
	class Employee extends CI_MODEL {
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
			$query = $this->db->insert('employees', $employee);
		}

		function get_all_employees()
		{
			$query = $this->db->get('employees');
			return $query->result();
		}

		function get_employee_by_name($name)
		{
			$query = $this->db->get_where('employees', array('name' => $name));
			return $query->result();
		}

	}