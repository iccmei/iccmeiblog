<img src="https://ws3.sinaimg.cn/large/ecabade5ly1fqwuz2k658j20le05nt8i" alt="Typecho-WeiboFile新浪微博图片上传插件" />

### Typecho-WeiboFile新浪（优酷）微博图片（视频）上传插件

---

1、将 Typecho 的附件上传至新浪（优酷）微博云存储中，无需申请appid，不占用服务器大小，可永久保存，只需一个不会登录的微博小号即可。<br />
2、在图床的基础上新增上传视频和视频解析的功能。<br />
3、新增前台微博图床上传。

程序有可能会遇到bug不改版本号直接修改代码的时候，所以扫描以下二维码关注公众号“同乐儿”，可直接与作者二呆产生联系，不再为bug烦恼，随时随地解决问题。

<img src="http://me.tongleer.com/content/uploadfile/201706/008b1497454448.png">

#### 使用方法：
第一步：下载本插件，放在 `usr/plugins/` 目录中（插件文件夹名必须为WeiboFile）；<br />
第二步：激活插件；<br />
第三步：填写微博小号等等配置；<br />
第四步：完成。

#### 版本推荐：php5.6+mysql5.0.11+Typecho正式版，其他版本也可能支持，若不支持联系作者。

#### 与我联系：
作者：二呆<br />
网站：http://www.tongleer.com/<br />
Github：https://github.com/muzishanshi/WeiboFile

#### 更新记录：
2018-12-30 1.0.9

	修复了因少做判断导致的后台页面出现404情况：
	if(strpos($_SERVER['PHP_SELF'],"write-page")){
		Typecho_Widget::widget('Widget_Contents_Page_Edit')->to($post);
	}else{
		Typecho_Widget::widget('Widget_Contents_Post_Edit')->to($post);
	}
	
2018-12-29 1.0.8

	后台新增多图片上传，然后发现如果域名是主机屋的免费空间且未备案，则会限制一些权限，导致上传失败，请知悉。
	
2018-11-30 1.0.7<br />
	1、新增其他格式文件的上传<br />
	2、新增前台微博图床上传<br />
	3、优化修复代码、及对优酷视频上传及其他的说明进行解释<br />

2018-07-25 去掉大视频上传页面里失误的打印结果函数，和通知Q群：770956878，以便解决问题，最主要是结交人生中的有缘之人。<br />
2018-07-11 新增大多数视频格式上传、管理，网站登录用户也可上传视频，但存在上传视频超时的问题。<br />
2018-07-10 新增解析秒拍、抖音视频功能<br />
2018-07-09 新增上传视频功能<br />
2018-07-02 增加了使用备注信息和上传后的图片增加后缀可成为一个完整的图片路径<br />
2018-05-02 第一版本实现