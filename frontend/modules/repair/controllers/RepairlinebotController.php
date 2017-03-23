<?php

namespace frontend\modules\repair\controllers;

use frontend\modules\repair\models\Linebot;
use frontend\modules\repair\models\Repairs;
use yii\helpers\Url;

class RepairlinebotController extends \yii\web\Controller {

    public function actionCurl() {
        $last_thread = Linebot::findOne(['name' => 'แจ้งซ่อม']);
        $thread = \frontend\modules\repair\models\RepairsSearch::find()->orderBy(['id' => SORT_DESC])->one();
        if (!$last_thread) {
            $last_thread = new Linebot();
            $last_thread->name = 'แจ้งซ่อม';
            $last_thread->last_id = $thread->id;
            $last_thread->save();
            $message = $thread->problem . ' ' . Url::to('http://localhost:81/yii2project/web/index.php?r=repairs/view&id=' . $thread->id);
            $res = $this->notify_message($message);
        } else {
            if ($last_thread->last_id != $thread->id) {
                $message = $thread->problem . ' ' . Url::to('http://localhost:81/yii2project/web/index.php?r=repairs/view&id=' . $thread->id);
                $res = $this->notify_message($message);
                $last_thread->last_id = $thread->id;
                $last_thread->save();
            }
        }

        return $this->redirect(['/repair/repairs/index']);
    }

    public function notify_message($message) {
        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = 'SLOvyjNu9PJUNJgwjDCQUhTQeCml8BmuYEnPpry9Jsy';
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $line_token . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }

}
