<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Test;

class TestController extends Controller{

	public function actionList(){
		$redis = Yii::$app->redis;
		
		$redis->set('test','1234567');  //设置redis缓存
	    $redis->get('test');   //读取redis缓存
	    $source = $redis->del('test');
	    echo $source;
	    $var2 = Yii::$app->redis->keys("*");
	    // var_dump($redis->get('test'));
	    // exit;
	    // return $this->render('index');

		//列表
		// $redis->rpush('list', 'aaa');
		// $redis->rpush('list', 'bbb');
		// $redis->rpush('list', 'ccc');
		// $data = $redis->lrange('list',0,3); 
		// print_r($data);

		//集合
		// $redis->flushall();
		// $redis->zadd('t01','1','aaa');
		// $redis->zadd('t01','3','bba');
		// $redis->zadd('t01','2','cca');
		// $data = $redis->zrange('t01',0,1);
		// print_r($data);

	}

    //哈希
	public function actionHashTest(){
		$redis = Yii::$app->redis;
	    $redis->hmset('test', 'key1','val1', 'key2','val2');
	    $data = $redis->hgetall('test');
		print_r($data);
	}
	
}