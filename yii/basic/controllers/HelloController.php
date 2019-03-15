<?php
namespace app\controllers;
use yii\web\Controller;
class  HelloController extends Controller{

	public function actionIndex(){

		// 获取请求组件
		// YII是全局类 $app是全局类中的静态变量
		$request = \YII::$app->request;
		
		//get方式，第二个参数是 如果没有通过get传递id参数，返回它
		 echo $request->get("id",20)."<br/>";
		
		// isGet是判断是否用get获取
		if($request->isGet){
			echo "this is get<br/>";
		 }

		 // isPost是判断是否用post获取
		 if($request->isPost){
		 	echo "this is post<br/>";
		  }

		 //获取用户IP
		 echo $request->userIp;
	}
}