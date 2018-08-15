<?php
function optionsframework_option_name() {

	// 从样式表获取主题名称
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}



function optionsframework_options() {
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
		
	$options = array();
		
		
	
		
	// Logo/Icon
	$options[] = array(
		'name' => __('Logo/Icon', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('顶部废话', 'options_framework_theme'),
		'desc' => __( '此位置在 LOGO 右边 ', 'options_framework_theme' ),
		'id' => 'head_text',
		'type' => 'text');
		
		
	$options[] = array(
		'name' => __('LOGO', 'options_framework_theme'),
		'desc' => __('网站LOGO显示', 'options_framework_theme'),
		'id' => 'all_logo',
		'type' => 'upload');
		
		
	$options[] = array(
		'name' => __('头像', 'options_framework_theme'),
		'desc' => __('全站头像显示', 'options_framework_theme'),
		'id' => 'avatar',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('favicon 图片', 'options_framework_theme'),
		'desc' => __('32像素x32像素 favicon 就是在浏览器标题左面显示的图标', 'options_framework_theme'),
		'id' => 'favicon',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('app icon 图片', 'options_framework_theme'),
		'desc' => __('144像素x144像素 app - icon 当被用户收藏网站后在收藏夹显示的图标', 'options_framework_theme'),
		'id' => 'app_icon',
		'type' => 'upload');
		
		
	// 滚动图
	$options[] = array(
		'name' => __('滚动图', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('滚动图片第一张', 'options_framework_theme'),
		'desc' => __('滚动图片第一张', 'options_framework_theme'),
		'id' => 'album01',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第一张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第一张链接地址', 'options_framework_theme'),
		'id' => 'album01_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第二张', 'options_framework_theme'),
		'desc' => __('滚动图片第二张', 'options_framework_theme'),
		'id' => 'album02',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第二张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第二张链接地址', 'options_framework_theme'),
		'id' => 'album02_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第三张', 'options_framework_theme'),
		'desc' => __('滚动图片第三张', 'options_framework_theme'),
		'id' => 'album03',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第三张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第三张链接地址', 'options_framework_theme'),
		'id' => 'album03_url',	
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第四张', 'options_framework_theme'),
		'desc' => __('滚动图片第四张', 'options_framework_theme'),
		'id' => 'album04',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第四张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第四张链接地址', 'options_framework_theme'),
		'id' => 'album04_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第五张', 'options_framework_theme'),
		'desc' => __('滚动图片第五张', 'options_framework_theme'),
		'id' => 'album05',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第五张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第五张链接地址', 'options_framework_theme'),
		'id' => 'album05_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第六张', 'options_framework_theme'),
		'desc' => __('滚动图片第六张', 'options_framework_theme'),
		'id' => 'album06',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第六张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第六张链接地址', 'options_framework_theme'),
		'id' => 'album06_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第七张', 'options_framework_theme'),
		'desc' => __('滚动图片第七张', 'options_framework_theme'),
		'id' => 'album07',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第七张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第七张链接地址', 'options_framework_theme'),
		'id' => 'album07_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第八张', 'options_framework_theme'),
		'desc' => __('滚动图片第八张', 'options_framework_theme'),
		'id' => 'album08',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第八张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第八张链接地址', 'options_framework_theme'),
		'id' => 'album08_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第九张', 'options_framework_theme'),
		'desc' => __('滚动图片第九张', 'options_framework_theme'),
		'id' => 'album09',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第九张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第九张链接地址', 'options_framework_theme'),
		'id' => 'album09_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('滚动图片第十张', 'options_framework_theme'),
		'desc' => __('滚动图片第十张', 'options_framework_theme'),
		'id' => 'album10',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('滚动图第十张链接地址', 'options_framework_theme'),
		'desc' => __('滚动图第十张链接地址', 'options_framework_theme'),
		'id' => 'album10_url',
		'type' => 'text');
		
		
	// 关于我
	$options[] = array(
		'name' => __('关于属性', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('关于我简介', 'options_framework_theme'),
		'desc' => __('文不用过多，简介而已', 'options_framework_theme'),
		'id' => 'abstr_index',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'name' => __('首页1.1', 'options_framework_theme'),
		'desc' => __('第一列的第一个，填名词', 'options_framework_theme'),
		'id' => 'myprop01',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.1百分比', 'options_framework_theme'),
		'desc' => __('第一列的第一个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop01_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.1补充', 'options_framework_theme'),
		'desc' => __('第一列的第一个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop01_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.2', 'options_framework_theme'),
		'desc' => __('第一列的第二个，填名词', 'options_framework_theme'),
		'id' => 'myprop02',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.2百分比', 'options_framework_theme'),
		'desc' => __('第一列的第二个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop02_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.2补充', 'options_framework_theme'),
		'desc' => __('第一列的第二个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop02_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.3', 'options_framework_theme'),
		'desc' => __('第一列的第三个，填名词', 'options_framework_theme'),
		'id' => 'myprop03',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.3百分比', 'options_framework_theme'),
		'desc' => __('第一列的第三个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop03_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.3补充', 'options_framework_theme'),
		'desc' => __('第一列的第三个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop03_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.4', 'options_framework_theme'),
		'desc' => __('第一列的第四个，填名词', 'options_framework_theme'),
		'id' => 'myprop04',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.4百分比', 'options_framework_theme'),
		'desc' => __('第一列的第四个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop04_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.4补充', 'options_framework_theme'),
		'desc' => __('第一列的第四个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop04_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.5', 'options_framework_theme'),
		'desc' => __('第一列的第五个，填名词', 'options_framework_theme'),
		'id' => 'myprop05',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.5百分比', 'options_framework_theme'),
		'desc' => __('第一列的第五个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop05_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.5补充', 'options_framework_theme'),
		'desc' => __('第一列的第五个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop05_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.6', 'options_framework_theme'),
		'desc' => __('第一列的第六个，填名词', 'options_framework_theme'),
		'id' => 'myprop06',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.6百分比', 'options_framework_theme'),
		'desc' => __('第一列的第六个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop06_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页1.6补充', 'options_framework_theme'),
		'desc' => __('第一列的第六个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop06_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.1', 'options_framework_theme'),
		'desc' => __('第二列的第一个，填名词', 'options_framework_theme'),
		'id' => 'myprop07',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.1百分比', 'options_framework_theme'),
		'desc' => __('第二列的第一个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop07_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.1补充', 'options_framework_theme'),
		'desc' => __('第二列的第一个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop07_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.2', 'options_framework_theme'),
		'desc' => __('第二列的第二个，填名词', 'options_framework_theme'),
		'id' => 'myprop08',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.2百分比', 'options_framework_theme'),
		'desc' => __('第二列的第二个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop08_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.2补充', 'options_framework_theme'),
		'desc' => __('第二列的第二个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop08_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.3', 'options_framework_theme'),
		'desc' => __('第二列的第三个，填名词', 'options_framework_theme'),
		'id' => 'myprop09',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.3百分比', 'options_framework_theme'),
		'desc' => __('第二列的第三个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop09_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.3补充', 'options_framework_theme'),
		'desc' => __('第二列的第三个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop09_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.4', 'options_framework_theme'),
		'desc' => __('第二列的第四个，填名词', 'options_framework_theme'),
		'id' => 'myprop10',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.4百分比', 'options_framework_theme'),
		'desc' => __('第二列的第四个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop10_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.4补充', 'options_framework_theme'),
		'desc' => __('第二列的第四个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop10_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.5', 'options_framework_theme'),
		'desc' => __('第二列的第五个，填名词', 'options_framework_theme'),
		'id' => 'myprop11',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.5百分比', 'options_framework_theme'),
		'desc' => __('第二列的第五个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop11_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.5补充', 'options_framework_theme'),
		'desc' => __('第二列的第五个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop11_Tsay',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.6', 'options_framework_theme'),
		'desc' => __('第二列的第六个，填名词', 'options_framework_theme'),
		'id' => 'myprop12',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.6百分比', 'options_framework_theme'),
		'desc' => __('第二列的第六个的百分比，不用写百分比', 'options_framework_theme'),
		'id' => 'myprop12_rate',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页2.6补充', 'options_framework_theme'),
		'desc' => __('第二列的第六个的补充，文字简述', 'options_framework_theme'),
		'id' => 'myprop12_Tsay',
		'type' => 'text');
		
		
	// 传送-1
	$options[] = array(
		'name' => __('传送-1', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('主标题', 'options_framework_theme'),
		'desc' => __('传送第一分栏的主标题', 'options_framework_theme'),
		'id' => 'tf1_header',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.1-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_01_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.1-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_01_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.1-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_01_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.1-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_01_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.2-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_02_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.2-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_02_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.2-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_02_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.2-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_02_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.3-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_03_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.3-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_03_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.3-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_03_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.3-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_03_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.4-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_04_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.4-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_04_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.4-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_04_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.4-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_04_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.5-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_05_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.5-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_05_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.5-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_05_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.5-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_05_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.6-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_06_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.6-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_06_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.6-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_06_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.6-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_06_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.7-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_07_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.7-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_07_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.7-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_07_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.7-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_07_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.8-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_08_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.8-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_08_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.8-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_08_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.8-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_08_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.9-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf1_09_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-1.9-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf1_09_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.9-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf1_09_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1.9-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf1_09_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-1-其他链接', 'options_framework_theme'),
		'id' => 'tf1_list',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
		
	// 传送-2
	$options[] = array(
		'name' => __('传送-2', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('主标题', 'options_framework_theme'),
		'desc' => __('传送第二分栏的主标题', 'options_framework_theme'),
		'id' => 'tf2_header',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.1-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_01_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.1-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_01_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.1-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_01_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.1-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_01_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.2-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_02_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.2-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_02_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.2-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_02_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.2-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_02_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.3-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_03_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.3-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_03_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.3-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_03_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.3-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_03_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.4-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_04_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.4-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_04_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.4-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_04_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.4-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_04_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.5-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_05_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.5-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_05_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.5-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_05_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.5-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_05_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.6-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_06_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.6-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_06_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.6-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_06_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.6-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_06_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.7-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_07_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.7-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_07_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.7-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_07_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.7-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_07_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.8-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_08_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.8-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_08_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.8-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_08_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.8-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_08_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.9-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf2_09_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-2.9-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf2_09_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.9-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf2_09_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2.9-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf2_09_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-2-其他链接', 'options_framework_theme'),
		'id' => 'tf2_list',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
		
	// 传送-3
	$options[] = array(
		'name' => __('传送-3', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('主标题', 'options_framework_theme'),
		'desc' => __('传送第三分栏的主标题', 'options_framework_theme'),
		'id' => 'tf3_header',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.1-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_01_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.1-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_01_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.1-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_01_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.1-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_01_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.2-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_02_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.2-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_02_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.2-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_02_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.2-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_02_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.3-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_03_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.3-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_03_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.3-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_03_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.3-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_03_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.4-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_04_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.4-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_04_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.4-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_04_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.4-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_04_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.5-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_05_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.5-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_05_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.5-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_05_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.5-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_05_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.6-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_06_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.6-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_06_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.6-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_06_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.6-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_06_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.7-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_07_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.7-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_07_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.7-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_07_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.7-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_07_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.8-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_08_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.8-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_08_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.8-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_08_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.8-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_08_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.9-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf3_09_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-3.9-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf3_09_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.9-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf3_09_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3.9-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf3_09_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-3-其他链接', 'options_framework_theme'),
		'id' => 'tf3_list',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
		
	// 传送-4
	$options[] = array(
		'name' => __('传送-4', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('主标题', 'options_framework_theme'),
		'desc' => __('传送第四分栏的主标题', 'options_framework_theme'),
		'id' => 'tf4_header',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.1-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_01_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.1-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_01_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.1-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_01_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.1-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_01_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.2-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_02_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.2-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_02_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.2-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_02_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.2-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_02_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.3-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_03_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.3-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_03_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.3-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_03_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.3-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_03_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.4-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_04_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.4-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_04_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.4-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_04_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.4-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_04_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.5-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_05_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.5-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_05_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.5-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_05_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.5-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_05_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.6-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_06_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.6-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_06_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.6-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_06_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.6-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_06_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.7-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_07_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.7-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_07_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.7-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_07_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.7-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_07_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.8-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_08_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.8-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_08_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.8-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_08_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.8-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_08_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.9-LOGO', 'options_framework_theme'),
		'desc' => __('传送LOGO图标', 'options_framework_theme'),
		'id' => 'tf4_09_img',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('传送-4.9-地址', 'options_framework_theme'),
		'desc' => __('传送的链接地址', 'options_framework_theme'),
		'id' => 'tf4_09_url',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.9-标题', 'options_framework_theme'),
		'desc' => __('传送的链接标题', 'options_framework_theme'),
		'id' => 'tf4_09_h5',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4.9-描述', 'options_framework_theme'),
		'desc' => __('传送的链接描述', 'options_framework_theme'),
		'id' => 'tf4_09_p',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('传送-4-其他链接', 'options_framework_theme'),
		'id' => 'tf4_list',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
		
		
	// SEO 设置
	$options[] = array(
		'name' => __('SEO设置', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('关键词', 'options_framework_theme'),
		'desc' => __('请用英文逗号分隔', 'options_framework_theme'),
		'id' => 'keywords',
		'std' => '个人,网站,博客,个人网站,个人博客,前端,前端博客,成长日志,小虎,吴晓虎',
		'type' => 'text');
		
	$options[] = array(
		'name' => "网站描述",
		'desc' => "",
		'id' => "description",
		'std' => "一个立志做优秀前端搬运工人的普通人...的一点点记录，想记点就记点的个人网站！！",
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('副标题', 'options_framework_theme'),
		'desc' => __('是否在title最后面显示副标题', 'options_framework_theme'),
		'id' => 'logospanseo',
		'std' => '0',
		'type' => 'checkbox');
		
	return $options;
}