<?php


namespace app\controllers;


use app\core\Controller;
use app\models\ClientsModel;

class MigrationController extends Controller
{

    public function actionCreate_table()
    {
        $model = new ClientsModel();
        $result = $model->create_table();
        header("Refresh:2; url=/");
        if ($result) {
            echo "Таблица создана";
        }
    }
}
