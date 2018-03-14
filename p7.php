<?php
$host="localhost";
$userName="root";
$password="xk0819";
$connID=mysqli_connect($host,$userName,$password,"picture");//成功为1，失败为0；
$AtotalRecord=mysqli_query($connID,"select count(*) from picture");
$rTRecordA=mysqli_fetch_array($AtotalRecord,MYSQLI_NUM);
$totalRecords=$rTRecordA[0];//总记录
?>
<table id="tb" align="center">
    <!--        <caption id="title_1" >Your album</caption>-->
    <?php
    $pageRecord=4;
    $allpages=ceil($totalRecords/$pageRecord);
    $currentPage=$_GET["page"];
    $start=($currentPage-1)*$pageRecord;
    $result = mysqli_query($connID,"select * from picture limit $start,$pageRecord");
    $resultall=mysqli_fetch_all($result, MYSQLI_NUM);
    //        var_dump($resultall);
    foreach ($resultall as $key=>$value){
        if($key%2==0){
            echo "<tr>\n";
        }
        echo "<td><img src=\"$value[1]\"  title=\"点击查看大图及其信息\" onclick=\"Layer_HideOrShow('$value[1]','$value[2]','$value[3]')\"></td>"; //url尽量写成/的形式
        if($key%2!=0){
            echo "\n";echo "</tr>";
        }
        echo "\n";
    }
    ?>
</table>
