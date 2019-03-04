<?php

namespace frontend\controllers;

use common\models\Alumni;
use kartik\mpdf\Pdf;
use yii\data\Pagination;

class AlumniController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $lng_code = \Yii::$app->language;

        $alumni = Alumni::find()
            ->select(['id', 'name', 'surname', 'fname', 'profession', 'technical_languages'])
            ->where(['lng_code' => $lng_code]);

        $pagination = new Pagination([
            'defaultPageSize' => 16,
            'totalCount' => $alumni->count(),
        ]);

        $alumniList = $alumni->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        return $this->render('index', [
            'pagination' => $pagination,
            'alumniList' => $alumniList
        ]);
    }

    public function actionView($id)
    {
        $alumni_content = Alumni::find()->where(['id' => $id])->asArray()->one();
        foreach ($alumni_content as $key => $alumni) {
            switch ($key) {
                case "technical_languages":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
                case "education":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
                case "experience":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
                case "languages":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
            }
        }
        return $this->render('view', [
            'alumni_content' => $alumni_content
        ]);
    }


    public function actionSample($id)
    {

        $alumni_content = Alumni::find()->where(['id' => $id])->asArray()->one();

        foreach ($alumni_content as $key => $alumni) {
            switch ($key) {
                case "technical_languages":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
                case "education":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
                case "experience":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
                case "languages":
                    $alumni_content[$key] = json_decode($alumni, true);
                    break;
            }
        }

        $content = $this->renderPartial('privacy', [
            'alumni_content' => $alumni_content
        ]);

        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
//            'cssFile' => \Yii::,
            // any css to be embedded if required
//            'cssInline' => $style,
            // set mPDF properties on the fly
            'options' => ['title' => $alumni_content['name']." ".$alumni_content['surname]']],
            'defaultFont' => 'fontawesome',
            'defaultFontSize' =>'24',
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['cv'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }
}
