<?php

require_once('libs/Smarty.class.php');

class TasksView {
    function __construct(){

    }

    public function DisplayTables($drinks){

        $smarty->assing('title', "List of Stock");
        $smarty->assing('BASE_URL', BASE_URL);
        $smarty->assing('list_drinks', $drinks);
        $smarty->display('templates/show_table.tpl');
    }

    public function DisplayTablesCSR(){

        $smarty->assing('title', "List of Stocks CSR");
        $smarty->assing('BASE_URL', BASE_URL);
        $smarty->display('templates/show_table_csr.tpl');
    }

    public function showError($msg){
        echo $msg;
    }
}