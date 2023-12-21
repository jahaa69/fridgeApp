<?php

namespace Controllers;

use Model\fridgeModel;

class HomeController
{
    public function index()
    {
        $alliments = $this->allimentlist();
        require_once __DIR__ . '/../View/home.php';
    }

    public function allimentlist()
    {
        $getallimentModel = new fridgeModel();
        $alliments = $getallimentModel->getAlliment();
        return $alliments;
    }
    public function addAlliment()
    {
        $addallimentModel = new fridgeModel();
        $addallimentModel->addAlliment($_POST['name'], $_POST['quantity']);
        header('Location: /');
    }
    public function deleteAllimentC($id)
    {
        $deleteallimentModel = new fridgeModel();
        $deleteallimentModel->deleteAlliment($id);
        header('Location: /');
    }
    public function addOneAlliment($id)
    {
        $addOneAllimentModel = new fridgeModel();
        $addOneAllimentModel->addOneAlliment($id);
        header('Location: /');
    }

}
