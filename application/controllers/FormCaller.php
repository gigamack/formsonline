<?php
class FormCaller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Form Caller";
    }

    public function new($type)
    {
        echo "Form Caller Display : " . $_POST['formselect'];
    }
}
