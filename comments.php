<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        return;
    if ( !comments_open() ) {
    ?>
    	<div class="no-comments-tip"><p>评论功能已经关闭!</p></div>
    <?php 
    	} else if ( !have_comments() ) { 
    ?>
        <div class="no-comments-tip"><p>沙发空缺中，赶紧抢了吧</p></div>
    <?php 
        } else {
        	echo '<div id="comments-outer-wrap">';
				$comlistargs = array(
//					'walker'            => null, //自定义样式类名
//					'max_depth'         => ,
					'style'             => 'ul',  //容器标签可以是 ‘div’, ‘ol’, or ‘ul’,默认值是’ul’
					'callback'          => 'aurelius_comment', //评论显示的回调函数，即显示评论主题的函数名称
//					'end-callback'      => null, //循环结束后的回调函数
					'type'              => 'comment', //显示何种评论，参数 ‘all’,’comment’,’trackback’,’pingback’,’pings’,‘pings’包括’trackback’和‘pingback’.默认值: ‘all’
//					'page'              => ,
//					'per_page'          => ,
//					'avatar_size'       => 32, //头像大小 Default: 32
//					'reverse_top_level' => null, //布尔值，如果设置本参数为真，则先显示最新一条评论，后面的评论按照后台设置显示。
//					'reverse_children'  =>  //布尔值，如果设置本参数为真，则先显示最新一条有子评论的评论，后面的评论按照后台设置显示。
				);
                wp_list_comments( $comlistargs );
            echo '</div>';
			
			/*
			这是上一页、下一页评论设置
			*/
			$ctargs = array(
//				'base' => add_query_arg( 'cpage', '%#%' ),
//				'format' => '',
//				'total' => $max_page,
//				'current' => $page,
//				'echo' => true,
				'add_fragment' => '#abIndex-comments',
				'prev_text' => '<span class="icon-pagePrev">&#xe6a7;</span>',
				'next_text' => '<span class="icon-pageNext">&#xe6ba;</span>'
			);
	        echo '<div class="pagination-wrap"><div><div class="clearfix">';
			paginate_comments_links( $ctargs );
			echo '</div></div></div>';
			
			/*
			这是上一页、下一页评论设置
			*/
        }
    ?>
    <div class="comment-form-wrap" id="respond" role="form">
        <h4><?php comment_form_title( '发表评论 ', '回复 %s:' ); ?><small>
        	<?php cancel_comment_reply_link(); ?>
			</small>
		</h4>
		
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="form-comment">
			<?php if ( $user_ID ) : ?>
				<div>
					<p>您的账号：<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;|&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出&raquo;</a></p>
				</div>
				<div class="contact-input">
					<label for="input-text"><span class="icon-text">&#xe672;</span><textarea name="comment" id="input-text" placeholder="想说点什么" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = '';if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit-com').click();return false};"></textarea></label>
				</div>
			<?php else : ?>
				<div class="contact-input">
					<label for="input-name"><span class="icon-name">&#xe603;</span><input type="text" name="author" id="input-name" placeholder="怎么称呼您" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></label>
					<label for="input-email"><span class="icon-email">&#xe636;</span><input type="email" name="email" id="input-email" placeholder="联系邮箱" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></label>
					<label for="input-link"><span class="icon-link">&#xe62a;</span><input type="text" name="url" id="input-link" placeholder="相关链接" onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></label>
				</div>
				<div class="contact-input">
					<label for="input-text"><span class="icon-text">&#xe672;</span><textarea name="comment" id="input-text" placeholder="想说点什么" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = '';if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('comment-sub').click();return false};"></textarea></label>
				</div>
			<?php endif; ?> 
				<div class="contact-input">
					<input type="submit" id="submit-com" class="submit" value="提交" onclick="return commomFun.formCheck(this);">
					<input type="hidden" name="submitted" class="submitted" id="submitted" value="true">
				</div>
				<div class="errorTipWrap"></div>
			<?php comment_id_fields(); ?>
			<?php do_action('form-comment', $post->ID); ?>
		</form>
    </div>
	<!-- Comment Form -->