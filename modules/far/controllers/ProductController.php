<?php

namespace app\modules\far\controllers;

use app\modules\far\models\Brand;
use app\modules\far\models\UploadForm;
use Yii;
use app\modules\far\models\Product;
use app\modules\far\models\ProductSearch;
use app\modules\far\controllers\AppFarController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends AppFarController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();
        $img = new UploadForm();
        $var = 'product';

        if ($model->load(Yii::$app->request->post()) && $img->load(Yii::$app->request->post()) ) {
            $img->img = UploadedFile::getInstance($img, 'img');
            $name = $img->upload($var);
            $model->img = $name;
            $model->save();

            Yii::$app->session->setFlash('success', 'Товар успешно добавлен');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'img' => $img
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = new UploadForm();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Товар успешно отредактирован');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'img' => $img
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Товар успешно удален');


        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
