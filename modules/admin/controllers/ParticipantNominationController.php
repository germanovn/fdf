<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ParticipantNomination;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipantNominationController implements the CRUD actions for ParticipantNomination model.
 */
class ParticipantNominationController extends Controller
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
     * Lists all ParticipantNomination models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ParticipantNomination::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ParticipantNomination model.
     * @param integer $participant_id
     * @param integer $nomination_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($participant_id, $nomination_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($participant_id, $nomination_id),
        ]);
    }

    /**
     * Creates a new ParticipantNomination model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ParticipantNomination();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'participant_id' => $model->participant_id, 'nomination_id' => $model->nomination_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ParticipantNomination model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $participant_id
     * @param integer $nomination_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($participant_id, $nomination_id)
    {
        $model = $this->findModel($participant_id, $nomination_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'participant_id' => $model->participant_id, 'nomination_id' => $model->nomination_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ParticipantNomination model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $participant_id
     * @param integer $nomination_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($participant_id, $nomination_id)
    {
        $this->findModel($participant_id, $nomination_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParticipantNomination model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $participant_id
     * @param integer $nomination_id
     * @return ParticipantNomination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($participant_id, $nomination_id)
    {
        if (($model = ParticipantNomination::findOne(['participant_id' => $participant_id, 'nomination_id' => $nomination_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
