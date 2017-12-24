<?php

spl_autoload_register(function ($class) {
    if ($class == "TestClass")
        require_once $class . '.php';
    else {
        $class = substr($class, 10);
        require_once $class . '.php';
    }
});
include "form.html";


if ($_SERVER['REQUEST_METHOD'] =='POST') {


    $company = $_POST["company"];
    $department = $_POST["department"];
    $employee = $_POST["employee"];
    $name = $_POST["name"];
    $salary = $_POST["salary"];


    $main = new TestClass($company, $department, $employee, $name, $salary);

    try {
        print $main->getcompany();
    } catch (exception\CompanyNotFoundException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    } catch (exception\NameFormatException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    }

    try {
        print $main->getdepartment();
    } catch (exception\DepartmentNotFoundException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    } catch (exception\NameFormatException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    }

    try {
        print $main->getemployee();
    } catch (exception\EmployeeNotFoundException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    } catch (exception\NameFormatException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    }

    try {
        print $main->getsalary();

    } catch (exception\SalaryException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");

    } catch (exception\SalaryFormatException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");

    } catch (exception\NameFormatException $e) {
        print ('Exception: ' . $e->getMessage() . "<br>");
    }
}
?>

