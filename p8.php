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
    <script type="text/javascript">
        var pictures=document.getElementById("pictures");
        window.onload=function () {
            pictures.style.visibility="hidden";

            document.getElementById("submit").onclick=function () {
                var xmlRequest=new XMLHttpRequest();
                var page=document.getElementById("Cpage").value;
                var url="p7.php?page="+page;
                var method="GET";
                xmlRequest.open(method,url);
                xmlRequest.send(null);
                xmlRequest.onreadystatechange=function(){
//                    alert(xmlRequest.readyState);
                    if(xmlRequest.readyState==4&&xmlRequest.status==200){
                        document.getElementById("Fcontent").innerHTML=xmlRequest.responseText;
                        document.getElementById("bid").innerHTML=page;
                        document.getElementById("Cpage").value=page;
//                        alert("hha"+xmlRequest.readyState);
                    }
                }
                return false;
            }
        }
    </script>
</head>
<?php
$host="localhost";
$userName="root";
$password="xk0819";
$connID=mysqli_connect($host,$userName,$password,"picture");//成功为1，失败为0；
$AtotalRecord=mysqli_query($connID,"select count(*) from picture");
$rTRecordA=mysqli_fetch_array($AtotalRecord,MYSQLI_NUM);
$totalRecords=$rTRecordA[0];//总记录
?>
<body>
<h3>Your album</h3>
<div id="Fcontent" align="center">
    <table id="tb" align="center">
        <!--        <caption id="title_1" >Your album</caption>-->
        <?php
        $currentPage=1;
        $pageRecord=4;
        $allpages=ceil($totalRecords/$pageRecord);
        if(isset($_GET["previous"])||isset($_GET["next"])||isset($_GET["page"])){
            $currentPage=$_GET["page"];
        }
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
</div>
<div id="pictures">
    <h2 id="title_2" ></h2>
    <img id="img_id" width="1080px" height="700px" onclick="pictures.style.visibility='hidden'">
</div>

<div align="center">
    <form method="GET" name="form1">
        <a href="p8.php?page=<?php echo $currentPage<=1?$currentPage:$currentPage-1; ?>">上一页</a>
        <a href="p8.php?page=<?php echo $currentPage>=$allpages?$currentPage:$currentPage+1; ?>">下一页</a>
        <!--        <input type="submit" value="上一页" name="previous" onclick="changePage(-1)">-->
        <!--        <input type="submit" value="下一页" name="next" onclick="changePage(1)">-->
        跳转至第<input id="Cpage" type="text" size="1" name="page">页
        <input id="submit" type="submit" value="确定" >
        当前第<b id="bid"><?php echo $currentPage;?></b>页&nbsp;共<b id="allpages"><?php echo $allpages;?></b>页
    </form>
</div>

<script type="text/javascript">
    var title_2=document.getElementById("title_2");
    var pictures=document.getElementById("pictures");
    var img_id=document.getElementById("img_id");
    var Cpage=document.getElementById("Cpage");
    function Layer_HideOrShow(PUrl,PName,PDate){
        title_2.innerHTML="name:"+PName+"&nbsp;date:"+PDate;
        img_id.src=PUrl;
        pictures.style.visibility="visible";
    }
    document.getElementById("submit").onclick=function (){
        var allpages=parseInt(document.getElementById("allpages").innerHTML);
        var pgindex=parseInt(document.getElementById("Cpage").value);
//            alert(allpages+"ajhgd"+pgindex);
        if(pgindex>allpages||pgindex<1) {
            alert(pgindex+"页数不在范围内");
            pgindex=bid.innerHTML;
            return false;
        }
        document.getElementById("bid").innerHTML=pgindex;
        Cpage.value=pgindex;
    }
</script>

</body>
</html>