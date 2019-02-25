<?php

/**
 * @link https://github.com/gromovfjodor/yii2-multiple-input
 * @copyright Copyright (c) 2014 gromovfjodor
 * @license https://github.com/gromovfjodor/yii2-multiple-input/blob/master/LICENSE.md
 */

namespace gromovfjodor\multipleinput\examples\actions;

use Yii;
use gromovfjodor\multipleinput\examples\models\Item;
use yii\base\Action;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

/**
 * Class TabularInputAction
 * @package gromovfjodor\multipleinput\examples\actions
 */
class TabularInputAction extends Action
{
    public function run()
    {
        Yii::setAlias('@gromovfjodor-examples', dirname(__DIR__) . '/');

        $models = $this->getItems();

        $request = Yii::$app->getRequest();
        if ($request->isPost && $request->post('ajax') !== null) {
            $data = Yii::$app->request->post('Item', []);
            foreach (array_keys($data) as $index) {
                $models[$index] = new Item();
            }
            Model::loadMultiple($models, Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            $result = ActiveForm::validateMultiple($models);
            return $result;
        }

        if (Model::loadMultiple($models, Yii::$app->request->post())) {
            // your magic
        }

        return $this->controller->render('@gromovfjodor-examples/views/tabular-input.php', ['models' => $models]);
    }

    private function getItems()
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Title 1',
                'description' => 'Description 1'
            ],
            [
                'id' => 2,
                'title' => 'Title 2',
                'description' => 'Description 2'
            ],
        ];

        $items = [];
        foreach ($data as $row) {
            $item = new Item();
            $item->setAttributes($row);
            $items[] = $item;
        }
        return $items;
    }
}