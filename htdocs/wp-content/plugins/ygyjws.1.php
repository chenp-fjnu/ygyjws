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
    $password = "******";
    // 微博开放平台的App Key
    $appkey = "1112720411";
    //.'@永隔一江污水'
    if ( get_post_status( $post_ID ) == 'publish' && $_POST['original_post_status'] != 'publish') {
        $request = new WP_Http;
        $status = strip_tags( $_POST['post_title'] ). get_permalink( $post_ID );
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
        $password = "******";
        // 微博开放平台的App Key
        $appkey = "1112720411";
        
        $comment = get_comment($comment_ID);
      
        $request = new WP_Http;
        $status = htmlentities($comment->comment_content);
        $api_url = 'https://api.weibo.com/2/statuses/update.json';
        $body = array( 'status' => $status, 'source'=> $appkey);
        $headers = array( 'Authorization' => 'Basic ' . base64_encode("$username:$password") );
        $result = $request->post( $api_url , array( 'body' => $body, 'headers' => $headers ) );
}
add_action('comment_post', 'comment_to_sina_weibo');
?>
