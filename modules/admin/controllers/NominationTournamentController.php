<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\NominationTournament;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NominationTournamentController implements the CRUD actions for NominationTournament model.
 */
class NominationTournamentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NominationTournament models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => NominationTournament::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NominationTournament model.
     * @param integer $nomination_id
     * @param integer $tournament_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nomination_id, $tournament_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($nomination_id, $tournament_id),
        ]);
    }

    /**
     * Creates a new NominationTournament model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NominationTournament();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomination_id' => $model->nomination_id, 'tournament_id' => $model->tournament_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NominationTournament model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $nomination_id
     * @param integer $tournament_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nomination_id, $tournament_id)
    {
        $model = $this->findModel($nomination_id, $tournament_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nomination_id' => $model->nomination_id, 'tournament_id' => $model->tournament_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NominationTournament model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $nomination_id
     * @param integer $tournament_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nomination_id, $tournament_id)
    {
        $this->findModel($nomination_id, $tournament_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NominationTournament model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $nomination_id
     * @param integer $tournament_id
     * @return NominationTournament the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nomination_id, $tournament_id)
    {
        if (($model = NominationTournament::findOne(['nomination_id' => $nomination_id, 'tournament_id' => $tournament_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
