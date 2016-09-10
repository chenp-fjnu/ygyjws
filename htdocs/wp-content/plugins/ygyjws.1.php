<?php
/**
 * @package YGYJWS
 * @version 1.0
 */
/*
Plugin Name: YGYJWS
Description: This plugin includes following function: 1) show post id in wp_admin. 2) Sync to weibo.
Author: PingX
Version: 1.0
*/

add_filter('manage_posts_columns', 'wpjam_id_manage_posts_columns');
add_filter('manage_pages_columns', 'wpjam_id_manage_posts_columns');
function wpjam_id_manage_posts_columns($columns){
    $columns['post_id'] = 'ID';
    return $columns;
}

add_action('manage_posts_custom_column','wpjam_id_manage_posts_custom_column',10,2);
add_action('manage_pages_custom_column','wpjam_id_manage_posts_custom_column',10,2);
function wpjam_id_manage_posts_custom_column($column_name,$id){
    if ($column_name == 'post_id') {
        echo $id;
    }
}
//http://www.ludou.org/wordpress-post-to-sina-weibo.html
function post_to_sina_weibo( $post_ID ) {
    if( wp_is_post_revision( $post_ID ) ) return;
    
    // 新浪微博登陆名
    $username = "11191162@qq.com";
    // 新浪微博密码
    $password = "********";
    // 微博开放平台的App Key
    $appkey = "1112720411";
    //.'@永隔一江污水'
    if ( get_post_status( $post_ID ) == 'publish' && $_POST['original_post_status'] != 'publish') {
        $request = new WP_Http;
        $status = strip_tags( $_POST['post_title'] ).':'.strip_tags( $_POST['post_content'] ). get_permalink( $post_ID );
        $api_url = 'https://api.weibo.com/2/statuses/update.json';
        $body = array( 'status' => $status, 'source'=> $appkey);
        $headers = array( 'Authorization' => 'Basic ' . base64_encode("$username:$password") );
        $result = $request->post( $api_url , array( 'body' => $body, 'headers' => $headers ) );
	
    }
}
add_action('publish_post', 'post_to_sina_weibo', 0);

function comment_to_sina_weibo($comment_ID) {
        
		// 新浪微博登陆名
        $username = "11191162@qq.com";
        // 新浪微博密码
        $password = "********";
        // 微博开放平台的App Key
        $appkey = "1112720411";
        
        $comment = get_comment($comment_ID);
        $request = new WP_Http;
        if(startsWith($comment->comment_content,'#隔壁胡小姐的糟心往事#') ||
        startsWith($comment->comment_content,'#市民王先生的深夜独白#'))
        {
            $status = strip_tags($comment->comment_content);
            $api_url = 'https://api.weibo.com/2/statuses/update.json';
            $body = array( 'status' => $status, 'source'=> $appkey);
            $headers = array( 'Authorization' => 'Basic ' . base64_encode("$username:$password") );
            $result = $request->post( $api_url , array( 'body' => $body, 'headers' => $headers ) );
        }
}
function startsWith($haystack, $needle) {
    $length = strlen($needle); 
    return (substr($haystack, 0, $length) === $needle); 
}
add_action('comment_post', 'comment_to_sina_weibo');

class QuickCommentWidget extends WP_Widget {
/** constructor */
function QuickCommentWidget() {
parent::WP_Widget(false, $name = 'QuickCommentWidget');
}

/** @see WP_Widget::widget */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$post_ID = esc_attr($instance['post_ID']);
?>
<?php echo $before_widget; ?>
<?php 
$args = array(
		  'must_log_in' => ' ',
          'logged_in_as' => ' ',
          'comment_notes_before' => ' ',
          'title_reply' => ' ',
          'title_reply_to' => ' ',
          'title_reply_before' => ' ',
          'title_reply_after' => ' ',
          'label_submit' => '快速发表 至 '.$title,
          'cancel_reply_before' => '',
          'cancel_reply_link' => '',
          'cancel_reply_after' => '',
		  'comment_field' =>'<textarea id="comment" class="form-control" name="comment" cols="45" rows="2" aria-required="true"></textarea>' ,
		  'fields'   =>  array(
		        'author' => '',
		        'email'  => '',
		        'url'    => '',
	        ),
		);
comment_form($args,$post_ID);?> 
<?php echo $after_widget; ?>
<?php
}

/** @see WP_Widget::update */
function update($new_instance, $old_instance) {
return $new_instance;
}

/** @see WP_Widget::form */
function form($instance) {
$title = esc_attr($instance['title']);
$post_ID = esc_attr($instance['post_ID']);
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">
<?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('post_ID'); ?>">
<?php echo 'Post ID'; ?> <input class="widefat" id="<?php echo $this->get_field_id('post_ID'); ?>" 
name="<?php echo $this->get_field_name('post_ID'); ?>" type="text" value="<?php echo $post_ID; ?>" /></label></p>
<?php
}

} // class QuickCommentWidget

add_action('widgets_init', create_function('', 'return register_widget("QuickCommentWidget");'));  
?>
