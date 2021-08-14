<?php 

if($_GET['name'] == ''){//输出统计概览

    echo 'API总访问次数：';
    $file = file('../counter/log/total.counter');
    echo $file[0]."<br><br>";

    echo "单个IP调用各个项目访问次数：<br>";
    //输出所有ip的访问次数
    $dir = "./log/ip/";  //要获取的目录
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) != false){
                if($file == '.' || $file == '..'){
                    continue;
                }
                //文件名
                $filename = $file;
                $fileopen = file('../counter/log/ip/'.$file);
                $filename = str_replace('.counter','',$filename);
                echo $filename.' 的调用次数为：'.$fileopen[0]."<br>";
            }
            closedir($dh);
        }
    }

    echo "<br>所有项目的访问次数统计概览：";
    //输出所有的项目的访问次数统计概览
    $dira = "./log/"; 
    if ($dhf = opendir($dira)){
        while (($filea = readdir($dhf)) != false){
            if($filea == '.' || $filea == '..' || $filea == 'ip' || $filea == 'total.counter'){
                continue;
            }
            echo "<br>";
            $dir = "./log/".$filea.'/';
            if (is_dir($dir)){
                if ($dh = opendir($dir)){
                    while (($file = readdir($dh)) != false){
                        if($file == '.' || $file == '..'){
                            continue;
                        }
                        //文件名
                        $filename = $file;
                        $fileopen = file('../counter/log/'.$filea.'/'.$file);
                        $filename = str_replace('.counter','',$filename);
                        if($filename == 'total'){
                            echo '项目'.$filea.'的调用次数为：'.$fileopen[0];
                            continue;
                        }
                        echo $filename.' 的调用次数为：'.$fileopen[0]."<br>";
                    }
                    closedir($dh);
                }
            }
        }
        closedir($dhf);
    }

    exit(0);
}

if($_GET['name'] == 'total'){//输出总访问次数
    $file = file('../counter/log/total.counter');
    echo $file[0];
    exit(0);
}

if($_GET['name'] == 'ip'){//输出所有ip的访问次数
    $dir = "./log/ip/";  //要获取的目录
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) != false){
                if($file == '.' || $file == '..'){
                    continue;
                }
                //文件名
                $filename = $file;
                $fileopen = file('../counter/log/ip/'.$file);
                $filename = str_replace('.counter','',$filename);
                echo $filename.' 的调用次数为：'.$fileopen[0]."<br>";
            }
            closedir($dh);
        }
    }
    exit(0);
}   

if($_GET['name'] != ''){//输出特定的项目的访问次数统计概览
    $dir = './log/'.$_GET['name'].'/';  //要获取的目录
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) != false){
                if($file == '.' || $file == '..'){
                    continue;
                }
                //文件名
                $filename = $file;
                $fileopen = file('../counter/log/ip/'.$file);
                $filename = str_replace('.counter','',$filename);
                if($filename == 'total'){
                    echo '此项目总的调用次数为：'.$fileopen[0]."<br>";
                }
                echo $filename.' 的调用次数为：'.$fileopen[0]."<br>";
            }
            closedir($dh);
        }
    }else{
        echo '你输入的项目名称不正确！';
    }
    exit(0);
}

?>