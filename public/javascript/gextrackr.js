    //<![CDATA[
var removeScheme=function(a){if(a.indexOf("mailto")>-1)return a.substring(a.indexOf(":")+1);else if(a.indexOf("://")>-1)return a.split("://")[1];return a};if(typeof jQuery=="function"){jQuery(function(){jQuery('a[href*="\\:"]').click(function(){_gaq.push(["_trackPageview","/outgoing/"+removeScheme(jQuery(this).attr("href"))])})})}else{window.onload=function(){var a=new RegExp(":");var b=document.getElementsByTagName("a");for(var c=0;c<b.length;c++){b[c].onclick=function(){if(a.test(this.getAttribute("href"))){_gaq.push(["_trackPageview","/outgoing/"+removeScheme(this.getAttribute("href"))])}}}}}
    //]]>