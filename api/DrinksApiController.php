<?php
require_once("./Models/DrinksModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class DrinksApiController extends ApiController{
    
    public function getDrinks($params = null) {
        $drinks = $this->model->getDrinks();
        $this->view->response($drinks, 200);
    }

    public function getDrink($params = null) {
        $id = $params[':ID'];
        $drink = $this->model->GetDrink($id);

        if($drink)
            $this->view->response($drink, 200);
        else 
            $this->view->response("Doesn't exist drink with id={$id}", 404);
    }

    
}
