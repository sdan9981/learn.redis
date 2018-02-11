<?php

namespace app\models;


class Test extends \yii\db\ActiveRecord{
	
	public static function getDb(){
        return \Yii::$app->db;
    }

    public function DbCache(){
    	$db = self::getDb();
    	$redis = Yii::$app->redis;
    	$result = $db->redis(function($db) {
    		return $db->createCommand('SELECT * FROM user WHERE id=1')->queryOne();
		});
    }
}
