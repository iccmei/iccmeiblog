<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
$jqueryScriptUrl = Helper::options()->pluginUrl . '/Like/js/jquery.js';
$macaroonScriptUrl = Helper::options()->pluginUrl . '/Like/js/jquery.fs.macaroon.js';
$settings = Helper::options()->plugin('Like');
?>

<script type="text/javascript">
    var a_idx = 0;
    var userAgent = navigator.userAgent;
    var isSafari = userAgent.indexOf("Safari") > -1 && userAgent.indexOf("Chrome") < 1 ;
    $(".<?php echo $settings->likeClass; ?>").on("click", function(e){
    	var th = $(this);
		var id = th.attr('data-pid');
		var cookies = $.macaroon('_syan_like') || "";
		if (!id || !/^\d{1,10}$/.test(id)) 
            return;
		if (-1 !== cookies.indexOf("," + id + ",")) {
            //alert("您已经赞过啦，不如赏杯咖啡吧！");
            ArmMessage.error('已经赞过啦，不如赏杯咖啡吧！');
            if($("#index-shang").length>0){
		      var btn = document.getElementById('index-shang');
              setTimeout(function(){btn.click()},1000);
		    }
           if($("#social-main").length>0 && $("#social-shang").length>0){
            if(isSafari){
              document.getElementById("social-main").style.display="none";
              document.getElementById("social-shang").style.display="block";
            }
            else{
              setTimeout(function(){document.getElementById("social-main").style.display="none"},1000);
              setTimeout(function(){document.getElementById("social-shang").style.display="block"},1000);
            }
          }
           return;
        }
		cookies ? cookies.length >= 160 ? (cookies = cookies.substring(0, cookies.length - 1), cookies = cookies.substr
(1).split(","), cookies.splice(0, 1), cookies.push(id), cookies = cookies.join(","), $.macaroon("_syan_like", "," + cookies + 
",")) : $.macaroon("_syan_like", cookies + id + ",") : $.macaroon("_syan_like", "," + id + ",");
		$.post('<?php Helper::options()->index('/action/like?up'); ?>',{
		cid:id
		},
        function(data){
		   th.addClass('actived');
		   var zan = th.find('span').text();
		   th.find('span').text(parseInt(zan) + 1);
          
        var a = new Array("+ 1");
        var $i = $("<span/>").text(a[a_idx]);
        a_idx = (a_idx + 1) % a.length;
        var x = e.pageX,
        y = e.pageY;
        $i.css({
            "z-index": 999,
            "top": y - 20,
            "left": x,
            "position": "absolute",
            "font-weight": "bold",
            "color": "#ff6651",
            "font-size": "20px"
        });
        $("body").append($i);
        $i.animate({
            "top": y - 180,
            "opacity": 0
        },
        1500,
        function() {
            $i.remove();
        });
          
		},'json');
        ArmMessage.success('点赞成功，如果觉得对您有帮助，欢迎打赏支持作者！');
        if($("#social-main").length>0 && $("#social-shang").length>0){
        // setTimeout(function(){ArmMessage.info('打个赏呗！');},3000);
         if(isSafari){
              document.getElementById("social-main").style.display="none";
              document.getElementById("social-shang").style.display="block";
          }
         else{
              setTimeout(function(){document.getElementById("social-main").style.display="none"},1000);
              setTimeout(function(){document.getElementById("social-shang").style.display="block"},1000);
        }
       }
	});
</script>
<script type="text/javascript" src="<?php $url=parse_url($macaroonScriptUrl,PHP_URL_PATH);
                                          $scheme=parse_url($macaroonScriptUrl,PHP_URL_SCHEME);
                                          $port=parse_url($macaroonScriptUrl,PHP_URL_PORT);
                                          if($scheme=="https"||$port=="443"){
                                            $scheme = 'https://';
                                          } else{  
                                            $scheme = 'http://';
                                          }
                                          echo $scheme.$_SERVER['HTTP_HOST'].$url; ?>"></script>


