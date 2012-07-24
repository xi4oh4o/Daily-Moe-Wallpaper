/*
 * GetXmlHttpObject() get xmlHttp Object function
 */

function GetXmlHttpObject()
{
    var xmlHttp=null;
    try{
        //Firefox,Opera,Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        //Internet Explorer
        try{
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTPD");
        }
    }
    return xmlHttp;
}

/*
 * getInfo() get image information & hitokoto function
 *
 * use ajax return database content
 * Determine the different resolutions given information & hitokoto
 * @author xi4oh4o@gmail.com
 */

function getInfo() {
    xmlHttp=GetXmlHttpObject();
    if (xmlHttp===null){
        alert("You Browser does not support AJAX");
        return;
    }
var para;
if (window.screen.width<=768 && window.screen.height<=1280) {para=1;}else{para=0;}
    var url="../conn.php";
    var action = "m=p";
    var post = "para="+para;
    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("POST",url+"?"+action,true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlHttp.send(post);
    
    function stateChanged(){
        if(xmlHttp.readyState==4||xmlHttp.readyState=="complete"){
                document.getElementById("footer").innerHTML=xmlHttp.responseText;
        }
    }
    
}

/*
 * getList() get download list function
 *
 * Determine the different resolutions given download link
 * @author xi4oh4o@gmail.com
 */
function getList() {
var list;
// Desktop
if (window.screen.width == 1920 && window.screen.height == 1080 || window.screen.width == 1366 && window.screen.height == 768 || window.screen.width == 1280 && window.screen.height == 720){
        list="<li><a href=?down="+window.screen.width+"x"+window.screen.height+">"+window.screen.width+"x"+window.screen.height+"</a></li>";
    }else if (window.screen.width == 2880 && window.screen.height == 1880 || window.screen.width == 1920 && window.screen.height == 1200 || window.screen.width == 1680 && window.screen.height == 1050 || window.screen.width == 1440 && window.screen.height == 900 || window.screen.width == 1280 && window.screen.height == 800) {
        list="<li><a href=?down="+window.screen.width+"x"+window.screen.height+">"+window.screen.width+"x"+window.screen.height+"</a></li>";
    }else if (window.screen.width == 2048 && window.screen.height == 1536 || window.screen.width == 1280 && window.screen.height == 1024 || window.screen.width == 1920 && window.screen.height == 1440 || window.screen.width == 1024 && window.screen.height == 768 || window.screen.width == 800 && window.screen.height == 600) {
        list="<li><a href=?down="+window.screen.width+"x"+window.screen.height+">"+window.screen.width+"x"+window.screen.height+"</a></li>";
    }
    // Mobile
    if (window.screen.width == 768 && window.screen.height == 1024 || window.screen.width == 720 && window.screen.height == 1280 || window.screen.width == 640 && window.screen.height == 960 || window.screen.width == 540 && window.screen.height == 960 || window.screen.width == 480 && window.screen.height == 854 || window.screen.width == 480 && window.screen.height == 800 || window.screen.width == 320 && window.screen.height == 480 || window.screen.width == 240 && window.screen.height == 320) {
        list="<li><a href=?down="+window.screen.width+"x"+window.screen.height+">"+window.screen.width+"x"+window.screen.height+"</a></li>";
    }
    // Retina
    if (window.screen.width == 320 && window.screen.height == 480 && window.devicePixelRatio == 2) {
        list="<li>iPhone Retina适用</li><li><a href=?down=640x960>640x960</a></li>";
    }

    if (window.screen.width == 768 && window.screen.height == 1024 && window.devicePixelRatio == 2) {
        list="<li>iPad Retina适用</li><li><a href=?down=1536x2048>1536x2048</a></li>";
    }else{
        document.getElementById("down").innerHTML="<li>抱歉呢，您的分辨率暂未被支持</li><li><a href='/info.php'>提交分辨率</a></li><li>或下载<a href='?down=origin'>原图</a></li>";
}
// provide origin
if (window.screen.width <= 720 && window.screen.height <= 1280) { //Mobile Multi-screen provides original picture
        document.getElementById("down").innerHTML=list+"<span class=origin><hr /><li>多屏用原图</li><li><a href=?down=mobile_origin>Origin</a></li></span>";
    }else{ //Normal to provide original
        document.getElementById("down").innerHTML=list+"<hr /><li>Native resolution</li><li><a href=?down=origin>Origin</a></li>";
}

}