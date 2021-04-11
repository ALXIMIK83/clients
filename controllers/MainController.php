<?php


namespace app\controllers;


use app\core\Controller;
use app\models\ClientsModel;

class MainController extends Controller
{

    public function actionIndex()
    {
        $model = new ClientsModel();
        $clientsData = $model->getData();
        $this->view->generate('index', 'main', $clientsData);
    }

    public function actionForm()
    {
        $this->view->generate('form', 'main');
    }

    public function actionInsert()
    {
        if ($_POST) {
            $model = new ClientsModel();
            $result = $model->insertData($_POST);
                header("Refresh:2; url=/");
            if ($result) {
                echo "Данные успешно сохранены";
            }
        }
    }

    public function actionDelete()
    {
        if ($this->item) {
            $model = new ClientsModel();
            $result = $model->deleteItem($this->item);
            header("Refresh:2; url=/");
            if ($result) {
                echo "Данные успешно удалены";
            }
        }
    }
}
