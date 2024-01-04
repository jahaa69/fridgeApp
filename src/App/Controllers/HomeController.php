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
    public function impr()
    {
        $alliments = $this->allimentlist();

        echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">nom</th>
                <th scope="col">quantité</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($alliments as $alliment) {
            echo '<tr>
                    <td>' . $alliment['name'] . '</td>
                    <td>' . $alliment['quantity'] . '</td>
                </tr>';
        }
        echo '</tbody>
        </table>';

        echo '<script type="text/javascript">window.print();</script>';
    }

}
