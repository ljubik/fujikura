<?php
//include 'http://www.web.cil.org.ua/lk.html';
?>
<html>
    <header>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </header>
    <body>
      <div id="sales"><div id="LK"><input type="button" value="Powered by Liubomyr Kokor" onclick="buy()" /><div class="date">2016-<?php echo date('Y');?></div></div>
      
      
<script>
var sales_div = document.getElementById("sales");
function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}
window.onload = function (){
 var bought=getCookie("bought");
 if (bought!=null && bought!=""){
  if(bought == 'true'){
   sales.innerHTML = 'Дякую за довіру! <input type="button" value="Розробник" onclick="cancel()" />';
  }
  else{
   sales.innerHTML = ' <input type="button" value="Powered by Liubomyr Kokor" onclick="buy()" />';
  }
 }
}
function buy(){
sales.innerHTML = 'Дякую за довіру! <input type="button" value="Розробник" onclick="cancel()" />';
setCookie('bought', 'true', 5); //Тут ставите скільки днів у Вас йде (тут - 5 дн)
}
function cancel(){
sales.innerHTML = ' <input type="button" value="Powered by Liubomyr Kokor" onclick="buy()" />';
setCookie('bought', 'true', -5); // -5 видаляє cookie
}
</script>

      
      
      <script src="//code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>