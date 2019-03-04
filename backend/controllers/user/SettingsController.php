<?php

namespace backend\controllers\user;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use dektrium\user\controllers\SettingsController as baseSettings;

class SettingsController extends baseSettings {

   public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'disconnect' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['profile', 'account', 'confirm', 'networks', 'disconnect', 'contact', 'help', 'deleteimg'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionProfile() {
        $model = $this->finder->findProfileById(Yii::$app->user->identity->getId());

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post())) {

            $model->fileProfile = \yii\web\UploadedFile::getInstance($model, 'fileProfile');
            $model->fileHeader = \yii\web\UploadedFile::getInstance($model, 'fileHeader');

            $save_fileProfile = '';
            $save_fileHeader = '';
            if ($model->fileProfile) {
                $imagepath = 'uploads/profile/'; // Create folder under web/uploads/logo
                $model->image_profile = $imagepath . rand(10, 100) . '-' . $model->fileProfile->name;
                $save_fileProfile = 1;
            }

            if ($model->fileHeader) {
                $imagepath =  'uploads/header/';
                $model->image_header = $imagepath . rand(10, 100) . '-' . $model->fileHeader->name;
                $save_fileHeader = 1;
            }


            if ($model->save()) {
                if ($save_fileProfile) {
                    $model->fileProfile->saveAs($model->image_profile);
                }
                if ($save_fileHeader) {
                    $model->fileHeader->saveAs($model->image_header);
                }
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Your profile has been updated'));

                return $this->refresh();
            }
        }

        return $this->render('profile', [
                    'model' => $model,
        ]);
        //return parent::actionProfile();
    }

    public function actionAccount() {
        return parent::actionAccount();
    }

    public function actionHelp() {
        return $this->render('help');
    }

    public function actionDeleteimg($id, $field) {

        $img = $this->findModel($id)->$field;
        if ($img) {
            if (!unlink($img)) {
                return false;
            }
        }

        $img = $this->findModel($id);
        $img->$field = NULL;
        $img->update();

        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Your image has been updated'));

        return $this->redirect(['/setting/']);
    }
    
    protected function findModel($id) {
        if (($model = \dektrium\user\models\Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
