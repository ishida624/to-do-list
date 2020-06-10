<?php
// include("vendor/autoload.php");
// include("lib/pdo-config.php");
// use lib\Pdocon;

include __DIR__ . '/app/Pdo_start.php';
include __DIR__ . '/app/models/todolist_model.php';
include __DIR__ . '/app/models/admin_model.php';
 $admin = Admin::select('admin')->get();
 foreach ($admin as $key => $value) {
     var_dump($value['admin']);
 }
       //$admin = Admin::where('admin', 'user2')->get();
       //echo $value['password'];
           //echo $key;
       // var_dump($admin->user_info);
// $complete = T1::find(22);
// $complete->delete();

 //T1::where('no', 20)->update(['item'=>'333','update_user'=>'user3']);
//$update->item='888';
//$update->save();

 //$users = User::where('no', '>', 2)->orderBy('no', 'ASC')->take(3)->get();
 //var_dump($users);


// $user = User::find(2);
// $user->status = '未完成';
//$user->array('19');
// $user->item='666';
// $user->status='未完成';
// $user->update_user='user2';

//var_dump($user);
//$user->delete();
