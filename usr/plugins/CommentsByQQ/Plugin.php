<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 评论发送到QQ
 * 
 * @package CommentsByQQ 
 * @author Pxwei
 * @version 1.0.0
 * @link http://www.pxwei.com
 */
class CommentsByQQ_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Feedback')->finishComment = array('CommentsByQQ_Plugin', 'render');
        Typecho_Plugin::factory('Widget_Comments_Edit')->finishComment = array('CommentsByQQ_Plugin', 'render');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        /** 分类名称 */
        $name = new Typecho_Widget_Helper_Form_Element_Text('qq', NULL, '', _t('发送到的QQ号：'));
        $form->addInput($name);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
     /**
     * 发送QQ消息
     *
     * @access public
     * @param $comment 调用参数
     * @return void
     */
    public static function render($comment)
    {
	$options = Helper::options();
	
	 $ch = curl_init();
	 curl_setopt($ch,CURLOPT_URL,"http://www.pxwei.com/php_api.php?qq=".$options->plugin('CommentsByQQ')->qq."&url=".$comment->permalink);
	 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	 curl_setopt($ch,CURLOPT_HEADER,0);
	 curl_exec($ch);
	 curl_close($ch);
  }
}
