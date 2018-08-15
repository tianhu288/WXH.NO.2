<?php
#######################################################################
############################- 屏蔽 emojis 某些功能 -########################
######################################################################
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}
add_action('init', 'disable_emojis');
remove_action('wp_head','adjacent_posts_rel_link_wp_head',10,0);
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}
remove_filter('the_content', 'wptexturize');
#######################################################################
############################- 编辑器增强 -##############################
######################################################################
function enable_more_buttons_line1($buttons) {
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'forecolor';
$buttons[] = 'backcolor';
$buttons[] = 'styleselect';
$buttons[] = 'copy';
$buttons[] = 'cut';
$buttons[] = 'paste';
$buttons[] = 'wp_page';
$buttons[] = 'anchor';
$buttons[] = 'newdocument';
return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons_line1"); //默认将新添加的按钮追加在工具栏的第一行
#######################################################################
###########################- 编辑器pt改px -#############################
######################################################################
function customize_text_sizes($initArray){
   $initArray['fontsize_formats'] = "12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 55px 60px 65px 70px .1rem .2rem .3rem .4rem .5rem .6rem .7rem .8rem .9rem 1rem 1.1rem 1.2rem 1.3rem 1.4rem 1.5rem 1.6rem 1.7rem 1.8rem 1.9rem 2rem";
   return $initArray;
}
add_filter('tiny_mce_before_init', 'customize_text_sizes');
#######################################################################
########################- 让编辑器支持中文拼写检查 -#######################
#######################################################################
function custum_fontfamily($initArray){
   $initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings";
   return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');
#######################################################################
############################- 清除谷歌字体 -############################
######################################################################
function coolwp_remove_open_sans_from_wp_core()
{
    wp_deregister_style('open-sans');
    wp_register_style('open-sans', false);
    wp_enqueue_style('open-sans', '');
}
add_action('init', 'coolwp_remove_open_sans_from_wp_core');  
#######################################################################
############################- 加载主题设置 -############################
######################################################################
if (!function_exists('optionsframework_init')) {
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
    require_once dirname(__FILE__) . '/inc/options-framework.php';
}
#######################################################################
############################- 百度自动推送 -############################
######################################################################
function fanly_baidu_zz_enqueue_scripts(){
	wp_enqueue_script( 'baidu_zz_push', 'http://push.zhanzhang.baidu.com/push.js');
}
add_action( 'wp_enqueue_scripts', 'fanly_baidu_zz_enqueue_scripts' );

#######################################################################
############################- 百度主动推送 -############################
######################################################################
//WordPress百度主动推送功能
function fanly_save_post_notify_baidu_zz($post_id, $post, $update){
	if($post->post_status != 'publish') return;
 
	$baidu_zz_api_url = 'http://data.zz.baidu.com/urls?site=www.wuxiaohu.com&token=1nQEEC7o0QsI5vec';
	//请到百度站长后台获取你的站点的专属提交链接 
	$response = wp_remote_post($baidu_zz_api_url, array(
		'headers' => array('Accept-Encoding'=>'','Content-Type'=>'text/plain'),
		'sslverify' => false,
		'blocking' => false,
		'body' => get_permalink($post_id)
	));
}
add_action('save_post', 'fanly_save_post_notify_baidu_zz', 10, 3);

#######################################################################
##############################- 百度 推送 -#############################
######################################################################
/**
* WordPress发布文章主动推送到百度，加快收录保护原创【file_get_contents方式】
* 文章地址：http://zhangge.net/5041.html
*/
if(!function_exists('Baidu_Submit')) {
    function Baidu_Submit($post_ID) {
        //已成功推送的文章不再推送
        if(get_post_meta($post_ID,'Baidusubmit',true) == 1) return;
        $url = get_permalink($post_ID);
        $api = 'http://data.zz.baidu.com/urls?site=www.wuxiaohu.com&token=1nQEEC7o0QsI5vec';
        $data = array (
            'http' => array (
                'method' => 'POST',
                'header'=> "Content-Type: text/plain",
                "Content-Length: ".strlen($url)."rn",
                'content' => $url
            )
        );
        $data = stream_context_create($data);
        $result = file_get_contents($api, false, $data);
        $result = json_decode($result,true);
        //如果推送成功则在文章新增自定义栏目Baidusubmit，值为1
        if (array_key_exists('success',$result)) {
            add_post_meta($post_ID, 'Baidusubmit', 1, true);
        }
    }
    add_action('publish_post', 'Baidu_Submit', 0);
}
#######################################################################
############################- 加载菜单 -###############################
######################################################################
include 'includes/main_menu_class.php';
if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
		'main-menu' => '主菜单',
		'aside-menu' => '侧菜单',
		'aside-index' => '侧索引'
	));
}

#######################################################################
###########################- 加载阅读量 -################################
######################################################################
function getPostViews($postID){   
	$count_key = 'post_views_count';   
	$count = get_post_meta($postID, $count_key, true);   
	if($count==''){   
		delete_post_meta($postID, $count_key);   
		add_post_meta($postID, $count_key, '0');   
		return "0";   
	}   
	return $count.'';   
}   
function setPostViews($postID) {   
	$count_key = 'post_views_count';   
	$count = get_post_meta($postID, $count_key, true);   
	if($count==''){   
		$count = 0;   
		delete_post_meta($postID, $count_key);   
		add_post_meta($postID, $count_key, '0');   
	}else{   
		$count++;   
		update_post_meta($postID, $count_key, $count);   
	}   
}  
#######################################################################
############################- 加载评论 -################################
######################################################################
function aurelius_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	?>
	<?php 
//		static $comment_number=1; 
	?>
	<section id="comment-<?php comment_ID();?>">
	<?php
		if($comment->comment_parent == 0){ //主评论
//			echo '<span class="floor-num">';
//			echo $comment_number;
//			echo '</span>';
		}
	?>
		<article class="li-comment">
			<?php 
				if (function_exists('get_avatar') && get_option('show_avatars')) {
					echo get_avatar($comment, 50);
				}
            ?>
 
        <h5 class="li-comment-title clearfix">
            <?php printf(__('<cite><span>%s</span></cite>'), get_comment_author_link());?>
            <div class="li-comment-report">
				<time><?php echo get_comment_time('Y-m-d H:i');?></time>
            	<span class=""><?php edit_comment_link('修改 '); comment_reply_link(array_merge($args, array('reply_text' => '回复 ', 'depth' => $depth, 'max_depth' => $args['max_depth'])));?></span>
			</div>
        </h5>
            <?php  if ($comment->comment_approved == '0') {?>
                <p class="comm-approved">
                    <a href="" class="glyphicon glyphicon-info-sign"></a>
                    评论正在审核，稍后显示！
                </p>
            <?php } elseif ($comment->comment_approved == '1') {?>
            <?php echo comment_text();?>
            <?php }?>
        </article>
    </section>
<?php
}
#######################################################################
############################- 回复添加@ -###############################
######################################################################
function ludou_comment_add_at( $comment_text, $comment = '') {  
  if( $comment->comment_parent > 0) {  
    $comment_text = '<span class="replay-iconText">@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a></span>：' . $comment_text;  
  }  
  
  return $comment_text;  
}  
add_filter( 'comment_text' , 'ludou_comment_add_at', 20, 2);  
#######################################################################
############################- 修改默认头像 -#############################
#######################################################################
add_filter( 'avatar_defaults', 'newgravatar' );  
 
function newgravatar ($avatar_defaults) {  
    $myavatar = get_bloginfo('template_directory') . '/images/HeaderImg/headerHU.png';  
    $avatar_defaults[$myavatar] = "虎 默认头像";  
    return $avatar_defaults;  
}
#######################################################################
#############################- 说说功能页 -##############################
#######################################################################
add_action('init', 'my_custom_init');
function my_custom_init() {
	$labels = array(
		'name' => '说说',
		'singular_name' => 'singularname',
		'add_new' => '发表说说',
		'add_new_item' => '发表说说',
		'edit_item' => '编辑说说',
		'new_item' => '新说说',
		'view_item' => '查看说说',
		'search_items' => '搜索说说',
		'not_found' => '暂无说说',
		'not_found_in_trash' => '没有已遗弃的说说',
		'parent_item_colon' => '',
		'menu_name' => '说说' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author') 
	);
	register_post_type('shuoshuo',$args); 
}
#######################################################################
#############################- SMTP邮件 -##############################
#######################################################################
add_action('phpmailer_init', 'mail_smtp');
function mail_smtp( $phpmailer ) {
//	$phpmailer->FromName = '源码集合'; //名字
	$phpmailer->Host = 'smtp.mxhichina.com'; //smtp地址,可以到你使用的邮件设置里面找
	$phpmailer->Port = 465; //端口，一般不用修改
	$phpmailer->Username = 'justin@wuxiaohu.com';  //邮件账号
	$phpmailer->Password = 'aWUXIAOHU1026'; //邮件密码
	$phpmailer->From = 'justin@wuxiaohu.com';//邮件账号
	$phpmailer->SMTPAuth = true;  
	$phpmailer->SMTPSecure = 'ssl'; //tls or ssl （port=25留空，465为ssl）一般不用修改
	$phpmailer->IsSMTP();
}
#######################################################################
############################- 图片缩略图 -##############################
######################################################################
add_theme_support('post-thumbnails');
add_image_size('thumbnail', 180, 100, true);
#######################################################################
###############################- 分页导航 -#############################
######################################################################
function pagination($query_string){
	global $posts_per_page, $paged;
	$my_query = new WP_Query($query_string ."&posts_per_page=-1");
	$total_posts = $my_query->post_count;
	if(empty($paged))$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;
	$range = 2; // only edit this if you want to show more page-links
	$showitems = ($range * 2)+1;
	$pages = ceil($total_posts/$posts_per_page);
	if(1 != $pages){
		echo '<ul class="pagination">';
#		echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? '<li><a href="'.get_pagenum_link(1).'">最前</a></li>':'';
#		echo ($paged > 1 && $showitems < $pages)? '<li><a href="'.get_pagenum_link($prev).'">上一页</a></li>':'';
		echo ($paged == 1&&$pages > 1)? '<li class="disabled"><a href="">最前</a></li><li class="disabled"><a href="">上一页</a></li>':'';
#		echo ($paged > 1 && $showitems < $pages)? '<li><a href="'.get_pagenum_link($prev).'">上一页</a></li>':'';
		echo ($paged > 1)? '<li><a href="'.get_pagenum_link(1).'">最前</a></li><li><a href="'.get_pagenum_link($prev).'">上一页</a></li>':'';
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? '<li class="active"><a href="'.get_pagenum_link($i).'" >'.$i.'</a></span>':'<li><a href="'.get_pagenum_link($i).'" >'.$i.'</a></li>';
			}
		}
#		echo ($paged < $pages && $showitems < $pages) ? '<li><a href="'.get_pagenum_link($next).'">下一页</a></li>' :'';
#		echo ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) ? '<li><a href="'.get_pagenum_link($pages).'">最后</a></li>':'';
		echo ($paged < $pages) ? '<li><a href="'.get_pagenum_link($next).'">下一页</a></li><li><a href="'.get_pagenum_link($pages).'">最后</a></li>' :'';
		echo ($paged == $pages) ? '<li class="disabled"><a href="'.get_pagenum_link($next).'">下一页</a></li><li class="disabled"><a href="'.get_pagenum_link($pages).'">最后</a></li>':'';
		echo "</ul>\n";
	}
}
#######################################################################
#############################- 时间存档 -###############################
#######################################################################
 function wxh_archives_list() {
     if( !$output = get_option('zww_archives_list') ){
         $output = '<div id="all-change">[<a href="javascript:;" onclick="allChange()">折叠全部</a>] <em></em></div><div id="archives-wrap" class="page-list-wrap">';
         $the_query = new WP_Query( 'posts_per_page=-1 & ignore_sticky_posts=1' ); //update: 加上忽略置顶文章
         $year=0; $mon=0; $i=0; $j=0;
         while ( $the_query->have_posts() ) : $the_query->the_post();
             $year_tmp = get_the_time('Y');
             $mon_tmp = get_the_time('m');
             $y=$year; $m=$mon;
             if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
             if ($year != $year_tmp && $year > 0) $output .= '</ul>';
             if ($year != $year_tmp) {
                 $year = $year_tmp;
                 $output .= '
				<h4 class="year-title" title="">
					<span class="icon-year">&#xe605;</span>'. $year .'
					<small>
						<span class="artiNum">（00）</span>&nbsp;&nbsp;
						<a target="_blank" title="点击查看所有文章" href="'.get_year_link( $year ).'">查看所有</a>
					</small>
					<span class="icon-listCtr open active" onclick="listChange(this)">&#xe607;</span>
					<span class="icon-listCtr close" onclick="listChange(this)">&#xe6d7;</span>
				</h4>
			<ul class="year-list-ul active">'; //输出年份
             }
             if ($mon != $mon_tmp) {
                 $mon = $mon_tmp;
                 $output .= '
				<li>
					<div class="month-title" title="">
						<span class="icon-month">&#xe615;</span>'. $mon .'
						<small>
							<span class="artiNum">（00）</span>&nbsp;&nbsp;
							<a target="_blank" title="点击查看所有文章" href="'.get_month_link($year,$mon).'">查看所有</a>
						</small>
					</div>
					<ul class="month-list-ul">'; //输出月份
             }
             $output .= '
			 		<li class="month-list-li">
						'. get_the_time('d日') .'：&nbsp;
						<a target="_blank" title="'. get_the_title() .'" href="'. get_permalink() .'">'. get_the_title() .'</a>&nbsp;
						<small>(&nbsp;<a href="'.get_permalink().'#comments-wrap"><span class="icon-discuss">&#xe64d;</span>'. get_comments_number('0', '1', '%') .'</a>&nbsp;)</small>
					</li>'; //输出文章日期和标题
         endwhile;
         wp_reset_postdata();
         $output .= '</ul></li></ul></div>';
         update_option('zww_archives_list', $output);
     }
     echo $output;
 }
 function clear_zal_cache() {
     update_option('zww_archives_list', ''); // 清空 zww_archives_list
 }
 add_action('save_post', 'clear_zal_cache'); // 新发表文章/修改文章时
#######################################################################
##############################- 搜索限制 -##############################
#######################################################################
function __search_by_title_only( $search, &$wp_query )
{
	global $wpdb;
 
	if ( empty( $search ) )
        return $search; // skip processing - no search term in query
 
    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';
 
    $search =
    $searchand = '';
 
    foreach ( (array) $q['search_terms'] as $term ) {
    	$term = esc_sql( like_escape( $term ) );
    	$search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
    	$searchand = ' AND ';
    }
 
    if ( ! empty( $search ) ) {
    	$search = " AND ({$search}) ";
    	if ( ! is_user_logged_in() )
    		$search .= " AND ($wpdb->posts.post_password = '') ";
    }
 
    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );
#######################################################################
###############################-面包屑导航-##############################
#######################################################################
function cmp_breadcrumbs() {
	$delimiter = '/'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div id="crumbs" class="container">'.__( '' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a id="cmp-home" href="' . $homeLink . '"><span class="icon-home">&#xe60f;</span>' . __( '' , 'cmp' ) . '</a>&nbsp;&nbsp;' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('m') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') .'日'. $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('m') .'月'. $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') .'年'. $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			/*if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else*/ { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				?><script></script><?php
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} /*elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		}*/ elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( '搜索结果: <small>%s</small>', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( '标签: <small>%s</small>', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( '归档: <small>%s</small>', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( '未找到该页面', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '<small>( 第%s页 )</small>', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}