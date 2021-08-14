<?php 

function counter($name){
    $filename = $name;
    $year = date('Y');
    $month = date('m');
    $day = date('d');
    $path = '../counter/log/'.$filename;
    if(is_dir('../counter/log') == false){
        mkdir('../counter/log',0755,true);
    }
    if(is_dir('../counter/log/ip') == false){
        mkdir('../counter/log/ip',0755,true);
    }
    if(is_dir($path) == false){
        mkdir($path,0755,true);
    }
    //对总次数的加一操作
    if(file_exists('../counter/log/total.counter')){
        $temp = file('../counter/log/total.counter');
        $num = (int)$temp[0];
        $num += 1;
        $temp2 = fopen('../counter/log/total.counter','w');
        fwrite($temp2,(string)$num);
        fclose($temp2);
    }else{
        $temp = fopen('../counter/log/total.counter','w');
        fwrite($temp,'1');
        fclose($temp);
    }
    //对项目次数的加一操作
    if(file_exists($path.'/total.counter')){
        $temp = file($path.'/total.counter');
        $num = (int)$temp[0];
        $num += 1;
        $temp2 = fopen($path.'/total.counter','w');
        fwrite($temp2,(string)$num);
        fclose($temp2);
    }else{
        $temp = fopen($path.'/total.counter','w');
        fwrite($temp,'1');
        fclose($temp);
    }
    //对每日每项目次数的加一操作
    if(file_exists($path.'/'.$year.'_'.$month.'_'.$day.'_'.$filename.'.counter')){
        $temp = file($path.'/'.$year.'_'.$month.'_'.$day.'_'.$filename.'.counter');
        $num = (int)$temp[0];
        $num += 1;
        $temp2 = fopen($path.'/'.$year.'_'.$month.'_'.$day.'_'.$filename.'.counter','w');
        fwrite($temp2,(string)$num);
        fclose($temp2);
    }else{
        $temp = fopen($path.'/'.$year.'_'.$month.'_'.$day.'_'.$filename.'.counter','w');
        fwrite($temp,'1');
        fclose($temp);
    }
    //对单个IP的访问次数统计
    $ip = $_SERVER["HTTP_X_REAL_IP"];
    if(file_exists('../counter/log/ip/'.$ip.'_'.$filename.'.counter')){
        $temp = file('../counter/log/ip/'.$ip.'_'.$filename.'.counter');
        $num = (int)$temp[0];
        $num += 1;
        $temp2 = fopen('../counter/log/ip/'.$ip.'_'.$filename.'.counter','w');
        fwrite($temp2,(string)$num);
        fclose($temp2);
    }else{
        $temp = fopen('../counter/log/ip/'.$ip.'_'.$filename.'.counter','w');
        fwrite($temp,'1');
        fclose($temp);
    }
}

?>