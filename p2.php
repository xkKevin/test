<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test picture</title>
    <style type="text/css">
        #Fcontent{
            /*text-align: center;*/
            /*position: absolute;*/
            width:850px;   /*调整显示区的宽*/
            height:526px;  /*调整显示区的高*/
            /*left:50%;*/
            margin-left: 548px;
            font-size:14px;
            line-height:20px;
            overflow-pageINdex:hidden;
            overflow-y:hidden;
            word-break:break-all;
        }
        h3{
            text-align: center;
            font-size:65px;
            color:blue;
            margin: 0;
        }
        h3:hover{
            color:red;
        }
        tr td img{
            align="center";
            width:400px;
            height:250px;
            border:2px solid blue;
            /*position: static;*/
            collapse: 0px;
        }
        /*a:visited,a:*/
        tr td img:hover{
            /*width:410px;*/
            /*height:250px;*/
            border:2px solid red;
            collapse: 0px;
        }
        /*#pictures{*/
            /*position: relative;*/
        /*}*/
        #pictures{
            text-align: center;
            position: fixed;
            left: 50%;
            top: 50%;
            margin:-400px 0 0 -600px;
            width: 1200px;
            height: 800px;
            background: lightgrey;
            /*visibility: hidden;*/
        }
        div h2{
            color: orangered;
        }
        #pages{
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<?php
$host="localhost";
$userName="root";
$password="xk0819";
$connID=mysqli_connect($host,$userName,$password,"picture");//成功为1，失败为0；
//echo $connID;
//$conn=mysqli_select_db($connID,"picture");
/*
if($conn){
    echo"数据库选择成功";
}
else{
    echo "<script type='text/javascript'>alert('数据库选择失败!');</script>";
}
*/
//for ($i=12;$i<=18;$i++){
//    //mysqli_query($connID,"insert into picture values ('00$i','p/$i.jpg','c$i','2017-5-$i',0)");
//    mysqli_query($connID,"update picture set id='0$i' where id='00$i'");
//}
$result = mysqli_query($connID,"select * from picture");
$resultall=mysqli_fetch_all($result, MYSQLI_NUM);
?>
<body>
<h3>Your album</h3>
<div id="Fcontent" align="center">
    <table id="tb" align="center">
<!--        <caption id="title_1" >Your album</caption>-->
        <?php
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
</div>
<div id="pictures">
    <h2 id="title_2" ></h2>
    <img id="img_id" width="1080px" height="700px" onclick="pictures.style.visibility='hidden'">
</div>
<div id="pages">
    <input type="button" value="上一页" onclick="changPage(-1)">
    <input type="button" value="下一页" onclick="changPage(1)">
    跳转至第<input id="Cpage" type="text" size="1" value="1">页
    <input type="button" value="确定" onclick="showPage()">
    当前第<b id="bid">1</b>页
</div>

<script type="text/javascript">
    var Fcontent=document.getElementById("Fcontent");
    var pages=document.getElementById("pages");
    var title_2=document.getElementById("title_2");
    var pictures=document.getElementById("pictures");
    var img_id=document.getElementById("img_id");
    var pgindex=1;
    function Layer_HideOrShow(PUrl,PName,PDate){
        title_2.innerHTML="name:"+PName+"&nbsp;date:"+PDate;
        img_id.src=PUrl;
        pictures.style.visibility="visible";
    }
    window.onload=function () {
        pictures.style.visibility="hidden";
    }
    var allpages=Math.ceil(parseInt(Fcontent.scrollHeight)/parseInt(Fcontent.offsetHeight));
    pages.innerHTML+="&nbsp;"+"<b>共"+allpages+"页</b>";
    function showPage(){
        pgindex=document.getElementById("Cpage").value;
        if(pgindex>allpages||pgindex<1){
            alert(pgindex+"页数不在范围内");
        } else{
            var bid=document.getElementById("bid");
            bid.innerHTML=pgindex;
            Fcontent.scrollTop=(pgindex-1)*parseInt(Fcontent.offsetHeight);
        }
    }
    function changPage(i){
        if(i==1){
            if(pgindex==allpages) {alert("已至末页");}
            else {pgindex++;}
        }else{
            if(pgindex==1) {alert("已至首页");}
            else {pgindex--;}
        }
        bid.innerHTML=pgindex;
        Fcontent.scrollTop=(pgindex-1)*parseInt(Fcontent.offsetHeight);
    }
</script>

</body>
</html>