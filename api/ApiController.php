<?php

abstract class ApiController {
    protected $model;
    protected $view;
    protected $data;

    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
        $this->model = new DrinksModel();
    }

    function getData(){
        return json_decode($this->data);
    }
}

?>