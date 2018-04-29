<?php
/**
 * Created by PhpStorm.
 * User: yyn
 * Date: 2017/12/20
 * Time: 20:16
 */
/*$file = fopen("base.php","r") or exit("打开文件失败");
while (!feof($file)){
    echo fgets($file)."<br>";
}
fclose($file);*/

/*function my_dir($dir) {
    $files = array();
    if($handle = opendir($dir)) {
        while(($file = readdir($handle)) !== false) {
            if($file != ".." && $file != ".") { //排除根目录
                if(is_dir($dir."/".$file)) { //如果是子文件夹，就进行递归
                    $files[$file] = my_dir($dir."/".$file);
                } else { //不然就将文件的名字存入数组
                    $files[] = $file;
                }

            }
        }
        closedir($handle);
        return $files;
    }
}
echo "<pre>";
print_r(my_dir("D:\WWW\kecheng"));
echo "</pre>";*/
// 创建一个有异常处理的函数
/*function checkNum($number)
{
    if($number>1)
    {
        throw new Exception("变量值必须小于等于 1");
    }
    return true;
}

// 在 try 块 触发异常
try
{
    checkNum(2);
    // 如果抛出异常，以下文本不会输出
    echo '如果输出该内容，说明 $number 变量';
}
// 捕获异常
catch(Exception $e)
{
    echo 'Message: ' .$e->getMessage();
}
echo "<br>";
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));
$obj = json_decode($json);
echo $obj->b;
echo "<br>";
var_dump(json_decode($json, true));
$arr = json_decode($json, true);
echo $arr["b"];*/

$redis = new Redis();
$redis->connect("localhost",6379);


//存储数据到列表中
/*$redis->lpush("tutorial-list", "Redis");
$redis->lpush("tutorial-list", "Mongodb");
$redis->lpush("tutorial-list", "Mysql");*/
// 获取存储的数据并输出
$arList = $redis->lrange("tutorial-list", 0 ,20);
print_r($arList);

