<?php

namespace backend\controllers\user;

use Yii;
use dektrium\user\controllers\AdminController as baseAdmin;
use yii\web\NotFoundHttpException;

class AdminController extends baseAdmin {

	public function behaviors() {
        return parent::behaviors();
    }

    public function actionUpdateProfile($id) {
        \yii\helpers\Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        $profile = \backend\models\Profile::findOne(['user_id' => $user->id]);

        if ($profile == null) {
            $profile = Yii::createObject(\backend\models\Profile::className());
            $profile->link('user', $user);
        }

        $this->performAjaxValidation($profile);

        if ($profile->load(Yii::$app->request->post())) {
            
            $profile->fileProfile = \yii\web\UploadedFile::getInstance($profile, 'fileProfile');

            $save_fileProfile = '';
            if ($profile->fileProfile) {
                $imagepath = 'uploads/profile/'; // Create folder under web/uploads/logo
                $profile->image_profile = $imagepath . rand(10, 100) . '-' . $profile->fileProfile->name;
                $save_fileProfile = 1;
            }

            if ($profile->save()) {
                if ($save_fileProfile) {
                    $profile->fileProfile->saveAs($profile->image_profile);
                }else{
                    echo 'ada yang salah';
                }
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Profile details have been updated'));

                return $this->refresh();
            }
        }

        return $this->render('_profile', [
                    'user' => $user,
                    'profile' => $profile,
        ]);
    }
    
    public function actionDeleteimg($id, $field) {

        $img = $this->findProfile($id)->$field;
        if ($img) {
            if (!unlink($img)) {
                return false;
            }
        }

        $img = $this->findProfile($id);
        $img->$field = NULL;
        $img->update();

        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Your image has been updated'));

        return $this->redirect(Yii::$app->request->referrer);
    }
    
    public function findProfile($id){
          if (($profile = \dektrium\user\models\Profile::findOne($id)) !== null) {
            return $profile;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}
