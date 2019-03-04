<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Classified;
use frontend\models\Profile;

class HomeController extends Controller {

    public function actionIndex($id) {

        $modelCover = new Profile();
        $modelCover = $this->findModel($id);


        //query model
        $query = new \yii\db\Query();
        $query->select([
                    'profile.name',
                    'profile.public_email',
                    'profile.bio',
                    'user.created_at',
                    'user.id'
                ])
                ->from('profile')
                ->join('JOIN', 'user', 'user.id = profile.user_id')
                ->where(['user_id' => $id])
                ->all();

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $this->render('index', [
            'modelCover' => $modelCover,
            'data' => $data,
                
                ]);
    }

    public function actionClassified($id) {

        $modelCover = new Profile();
        $modelCover = $this->findModel($id);
        //Sort data

        $sort = new \yii\data\Sort([
            'attributes' => [
                'create_at' => [
                    'asc' => ['create_at' => SORT_ASC],
                    'desc' => ['create_at' => SORT_DESC],
                    'default' => SORT_DESC,
                ]
            ]
        ]);


        //pagination

        $queryPage = Classified::find()->where(['user_id' => $id]);
        $countQueryPage = clone $queryPage;
        $pagination = new \yii\data\Pagination(['totalCount' => $countQueryPage->count(), 'pageSize' => 2]);

        //Search
        $mainCategory = \common\models\MainCategory::find()->all();
        $searchModel = new \common\models\search\GSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        //query model
        $query = new \yii\db\Query();
        $query->select([
                    'classified.id',
                    'classified.title',
                    'classified.description',
                    'classified.price',
                    'classified.create_at',
                    'classified.type',
                    'classified.user_id',
                    'classified.is_status',
                    'main_category.main_category',
                    'category.category',
                    'country.country',
                    'region.region',
                    'city.city',
                    'user.username',
//                    'classified_free.name'
                ])
                ->from('classified')
                ->join('JOIN', 'category', 'category.id = classified.category_id')
                ->join('JOIN', 'main_category', 'main_category.id = classified.main_category_id')
                ->join('JOIN', 'country', 'country.id = classified.country_id')
                ->join('JOIN', 'region', 'region.id = classified.region_id')
                ->join('JOIN', 'city', 'city.id = classified.city_id')
                ->join('JOIN', 'user', 'user.id = classified.user_id')
//                ->join('JOIN', 'classified_free', 'classified_free.id = classified.user_id')
                ->where(['user_id' => $id])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->orderBy($sort->orders)
                ->all();

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $this->render('classified', [
                    'data' => $data,
                    'sort' => $sort,
                    'pagination' => $pagination,
                    'maincategory' => $mainCategory,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'modelCover' => $modelCover
        ]);
    }

    public function actionContact($id) {

        $modelCover = new Profile();
        $modelCover = $this->findModel($id);
        
        
         //query model
        $query = new \yii\db\Query();
        $query->select([
                    'profile.name',
                    'profile.image_profile',
                    'profile.public_email',
                    'profile.phone_number',
                    'profile.gender',
                    'profile.facebook_url',
                    'profile.twitter_url',
                    'profile.instagram_url',
                    'city.city',
                    'region.region',
                    'country.country',
                    'user.created_at',
                    'user.id'
                ])
                ->from('profile')
                ->join('JOIN', 'user', 'user.id = profile.user_id')
                ->join('JOIN', 'city', 'city.id = profile.city_id')
                ->join('JOIN', 'region', 'region.id = profile.region_id')
                ->join('JOIN', 'country', 'country.id = profile.country_id')
                ->where(['user_id' => $id])
                ->all();

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $this->render('contact', [
            'modelCover' => $modelCover,
            'data' => $data,
            ]);
    }
    
    protected function findModel($id) {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
