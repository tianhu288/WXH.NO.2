			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					echo '<article>';
						echo '<h4>';

						if (get_post_type()!='shuoshuo') {
						echo '<a href="';
								the_permalink();
							echo '" title="';
								the_title();
							echo '" >';
							$custom_fields = get_post_custom_keys($post_id);
							if (in_array ('copyright', $custom_fields)):
								echo '<small>[转载]- </small>';
							endif;
								the_title();
							echo '</a>';
						echo '</h4>';
							if (has_post_thumbnail()) {
							echo '<section class="arti-img">';
							echo '<a href="';
								the_permalink();
							echo '">';
								the_post_thumbnail();
							echo '</a></section>';
							}
						echo '<section class="arti-sDetail">';
							echo '<a href="';
								the_permalink();
							echo '">';
								$content = get_the_content();
								if (has_post_thumbnail()) {
								$trimmed_content = wp_trim_words($content, 150, '...');
								} else {
								$trimmed_content = wp_trim_words($content, 200, '...');
								}
							echo $trimmed_content;
						echo '</a></section><section class="arti-tips"><ul>';
							echo '<li><span class="icon-time">&#xe613;</span>';
								the_time('Y-m-d');
							/*
							echo '</li><li><span class="icon-user">&#xe603;</span>';
								the_author();
                            */
							echo '</li><li><span class="icon-update">&#xe624;</span>';
								the_modified_time('Y-m-d');
							echo '</li></ul><ul><li><span class="icon-class">&#xe647;</span>';
								the_category(',');
							echo '</li><li><span class="icon-tag">&#xe65b;</span>';
								the_tags('');
							echo '</li></ul><ul><li><span class="icon-view">&#xe639;</span><a href="';
								the_permalink();
							echo '">';
							echo getPostViews(get_the_ID());
							echo '</a></li><li><span class="icon-discuss">&#xe64d;</span><a href="';
								the_permalink();
							echo '#comments-wrap">';
							echo get_post()->comment_count;
							echo '</a></li><li><span class="icon-share">&#xe627;</span>：
										<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=';
								the_permalink();
							echo '&title=';
								the_title('');
							echo '" class="icon-QQ" title="分享到QQ空间">&#xe67c;</a>
										<a  data-qr="http://qr.liantu.com/api.php?text=';
								the_permalink();
							echo '" class="icon-WX" onclick="commomFun.shareWX(this)" title="分享到微信朋友圈">&#xe604;</a>
										<a href="http://v.t.sina.com.cn/share/share.php?&url=';
								the_permalink();
							echo '&title=';
								the_title('');
							echo '" class="icon-XLWB" target="_blank" title="分享到新浪微博">&#xe610;</a>
									</li>
								</ul>
							</section>
						</article>';
						
						} else {

						echo '<a href="#" title="';
								the_title();
							echo '" >';
								the_title();
							echo '</a>';
						echo '</h4>';
						echo '<section class="arti-tips"><ul>';
							echo '<li><span class="icon-time">&#xe613;</span>';
								the_time('Y-m-d');
							/*
							echo '</li><li><span class="icon-user">&#xe603;</span>';
								the_author();
							echo '</li><li><span class="icon-update">&#xe624;</span>';
								the_modified_time('Y-m-d');
                            */
							echo '</li><li><span class="icon-class">&#xe647;</span><a href="';
							echo get_option('home');
							echo '/my-words" target="_blank" title="说说">说说</a></li>';
							echo '</ul>
							</section>
						</article>';
						}
				}
			}
			 else {
				echo '<article class="nothingTips"><p class="">博主还没来得及添加这类东西...</p></article>';
			}		
			?>