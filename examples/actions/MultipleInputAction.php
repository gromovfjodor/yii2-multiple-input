<?php

namespace gromovfjodor\multipleinput\examples\actions;

use Yii;
use yii\base\Action;
use yii\bootstrap\ActiveForm;
use yii\web\Response;
use gromovfjodor\multipleinput\examples\models\ExampleModel;

/**
 * Class MultipleInputAction
 * @package gromovfjodor\multipleinput\examples\actions
 */
class MultipleInputAction extends Action
{
    public function run()
    {
        Yii::setAlias('@gromovfjodor-examples', realpath(__DIR__ . '/../'));

        $model = new ExampleModel();

        $request = Yii::$app->getRequest();
        if ($request->isPost && $request->post('ajax') !== null) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            $result = ActiveForm::validate($model);
            return $result;
        }

        if ($model->load(Yii::$app->request->post())) {
            if (!$model->validate()) {
                Yii::error('Validation errors: ' . print_r($model->getErrors(), true));
            }
        }
        
        return $this->controller->render('@gromovfjodor-examples/views/multiple-input.php', ['model' => $model]);
    }
}