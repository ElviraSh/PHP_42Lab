<?php

spl_autoload_register(function ($class) {
    require_once $class . '.php';
});



class Main
{
    public $company;
    public $department;
    public $employee;
    public $name;
    public $salary;

    public function __construct($company, $department, $employee, $name, $salary)
    {
        $this->company = $company;
        $this->department = $department;
        $this->employee = $employee;
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getcompany()
    {
        if ($this->company == '') {
            throw new exception\CompanyNotFoundException('Компания не указана.');
        }

        return 'Компания: ' . $this->company ;
    }

    public function getdepartment()
    {
        if ($this->department == '') {
            throw new exception\DepartmentNotFoundException('Отдел не найден.');
        }
        if (preg_match('/([0-9])/', $this->name)) {
            throw new exception\NameFormatException('Имя содержит цифры.');
        }
        return 'Отдел: ' . $this->department ;
    }

    public function getemployee()
    {
        if ($this->employee == '') {
            throw new exception\employeeNotFoundException('Работник не найден.');
        }
        if (preg_match('/([0-9])/', $this->name)) {
            throw new exception\NameFormatException('Имя содержит цифры.');
        }
        return 'Работник: ' . $this->employee . '. Имя: ' . $this->name;
    }

    public function getsalary()
    {
        if ($this->salary < 0) {
            throw new exception\SalaryFormatException('Заработная плата < 0');
        }

        if ($this->salary == '') {
            throw new exception\SalaryException('Зарплата не указана');
        }


        if (!preg_match('/([0-9])/', $this->name)) {
            throw new exception\NameFormatException('Имя содержит цифры.');
        }
        return 'Имя: ' . $this->name . '. Зарплата: ' . $this->salary;
    }
}