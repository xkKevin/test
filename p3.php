<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>div分页显示_脚本学堂_www.jbxue.com</title>
    <style type="text/css">
        #frameContent{
            width:500px;   /*调整显示区的宽*/
            height:200px;  /*调整显示区的高*/
            font-size:14px;
            line-height:20px;
            border:1px solid #000000;
            overflow-pageINdex:hidden;
            overflow-y:hidden;
            word-break:break-all;
        }
        a{
            font-size:12px;
            color:#000000;
            text-decoration:underline;
        }
        a:hover{
            font-size:12px;
            color:#CC0000;
            text-decoration:underline;
        }
    </style>
</head>
<body>
<div id="frameContent">
    <p>18. Proxy-Authenticate： 代理服务器响应浏览器，要求其提供代理身份验证信息。<br />
        Proxy-Authorization：浏览器响应代理服务器的身份验证请求，提供自己的身份信息。</p>
    <p>19. Range：浏览器（比如 Flashget 多线程下载时）告诉 WEB 服务器自己想取对象的哪部分。<br />
        例如：Range: bytes=1173546-</p>
    <p>20. Referer：浏览器向 WEB 服务器表明自己是从哪个 网页/URL 获得/点击 当前请求中的网址/URL。<br />
        例如：Referer：http://www.jbxue.com/</p>
    <table cellspacing="0" cellpadding="0" align="left" border="0">
        <tbody>
        <tr>
            <td valign="top"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>
    <p>18. Proxy-Authenticate： 代理服务器响应浏览器，要求其提供代理身份验证信息。<br />
        Proxy-Authorization：浏览器响应代理服务器的身份验证请求，提供自己的身份信息。</p>
    <p>19. Range：浏览器（比如 Flashget 多线程下载时）告诉 WEB 服务器自己想取对象的哪部分。<br />
        例如：Range: bytes=1173546-</p>
    <p>20. Referer：浏览器向 WEB 服务器表明自己是从哪个 网页/URL 获得/点击 当前请求中的网址/URL。<br />
        例如：Referer：http://www.jbxue.com/</p>
    <p>21. Server: WEB 服务器表明自己是什么软件及版本等信息。<br />
        例如：Server：Apache/2.0.61 (Unix)</p>
    <p>22. User-Agent: 浏览器表明自己的身份（是哪种浏览器）。<br />
        例如：User-Agent：Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.8.1.14) Gecko/20080404 Firefox/2.0.0.14</p>
    <p>23. Transfer-Encoding: WEB 服务器表明自己对本响应消息体（不是消息体里面的对象）作了怎样的编码，比如是否分块（chunked）。<br />
        例如：Transfer-Encoding: chunked</p>
    <p>24. Vary: WEB服务器用该头部的内容告诉 Cache 服务器，在什么条件下才能用本响应所返回的对象响应后续的请求。假如源WEB服务器在接到第一个请求消息时，其响应消息的头部为：<br />
        Content-Encoding: gzip; Vary: Content-Encoding 那么 Cache 服务器会分析后续请求消息的头部，检查其 Accept-Encoding，是否跟先前响应的 Vary 头部值一致，即是否使用相同的内容编码方法，这样就可以防止 Cache 服务器用自己Cache 里面压缩后的实体响应给不具备解压能力的浏览器。<br />
        例如：Vary：Accept-Encoding</p>
    <p>25. Via： 列出从客户端到 OCS 或者相反方向的响应经过了哪些代理服务器，他们用什么协议（和版本）发送的请求。当客户端请求到达第一个代理服务器时，该服务器会在自己发出的请求里面添加 Via 头部，并填上自己的相关信息，当下一个代理服务器 收到第一个代理服务器的请求时，会在自己发出的请求里面复制前一个代理服务器的请求的Via 头部，并把自己的相关信息加到后面， 以此类推，当 OCS 收到最后一个代理服务器的请求时，检查 Via 头部，就知道该请求所经过的路由。<br />
        例如：Via：1.0 236-81.D07071953.sina.com.cn:80 (squid/2.6.STABLE13)。<br />


        <!--                  ..STYLE1 {color: #000000;font-weight: bold;font-size: 14px;}                  ..STYLE4 {color: #000000}                  ..STYLE5 {color: #000000; font-weight: bold;}                  ..STYLE6 {color: #000000}-->
</div>
<P>
<div id="pages" style="font-size:12px;"></div>
<script language="javascript">
    var obj = document.getElementById("frameContent");  //获取内容层
    var pages = document.getElementById("pages");         //获取翻页层
    var pgindex=1;                                      //当前页
    window.onload = function()                             //重写窗体加载的事件
    {
        var allpages = Math.ceil(parseInt(obj.scrollHeight)/parseInt(obj. offsetHeight));//获取页面数量
        pages.innerHTML = "<b>共"+allpages+"页</b>";     //输出页面数量
        for (var i=1;i<=allpages;i++){
            pages.innerHTML += "<a href=\"javascript:showPage('"+i+"');\">第"+i+"页</a> ";
//循环输出第几页   
        }
        pages.innerHTML += " <a href=\"javascript:gotopage('-1');\">上一页</a>  <a href=\"javascript:gotopage('1');\">下一页</a>"
    }
    function gotopage(value){
        try{
            value=="-1"?showPage(pgindex-1):showPage(pgindex+1);
        }catch(e){

        }
    }
    function showPage(pageINdex)
    {
        obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight);  //根据高度，输出指定的页
        pgindex=pageINdex;
    }
</script>
</body>
</html>  