<?php get_header(); ?>
<?php get_sidebar(); ?>
				<?php setPostViews(get_the_ID()); ?>
				<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
				<article class="artiOuter-wrap container">
					<h2>
						<?php
						$custom_fields = get_post_custom_keys($post_id);
						if (in_array ('copyright', $custom_fields)):
						echo '<small>[转载]- </small>';
						endif;
							the_title();
						?>
					</h2>
					<section class="arti-right">
						<?php
							if (!in_array ('copyright', $custom_fields)) : 
						?>
							本文为屌丝青年&nbsp;<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>&nbsp;原创内容，转载请注明出处，有问题可联系本人！<br>
							本文地址：<a href="<?php the_permalink();?>"><?php the_permalink();?></a><br>
						<?php else: ?>
						<?php  $custom = get_post_custom($post_id);
								$custom_value = $custom['copyright'];
						?>
							本文由无节操搬运工&nbsp;<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>&nbsp;整理，所有权归原作者所有，有问题可联系本人！<br>
							原文地址：<a target="_blank" href="<?php echo $custom_value[0] ?>" ><?php echo $custom_value[0] ?></a>
						<?php endif; ?>
					</section>
					<section class="arti-thumb">
						<?php
						if ( has_post_thumbnail() ) {
						  the_post_thumbnail();
						}
						?>
					</section>
					<section class="arti-content">
						<?php
							if (in_array ('audiosrc', $custom_fields)) : 
							$custom = get_post_custom($post_id);
							$audio_value = explode(' , ',$custom['audiosrc'][0]);
						?>
						<div class="artiContent-audio">
							<div class="bg-wrap">
								<img class="bg" src="<?php echo get_option('home'); ?>/wp-content/uploads/musicPic/<?php echo $audio_value[2] ?>">
								<div class="audio-control control-play" ontouchstart="audioControl(this,event)">
									<div>
										<span class="icon-play">&#xe616;</span>
									</div>
								</div>
								<div class="audio-control control-stop" ontouchstart="audioControl(this,event)">
									<div>
										<span class="icon-pause">&#xe602;</span>
									</div>
								</div>
				                <audio controls>
									<source src="<?php echo get_option('home'); ?>/wp-content/uploads/music/<?php echo $audio_value[3] ?>" type="audio/mpeg">
								</audio>
                                <div class="audio-link">
                                    <span>《<?php echo $audio_value[0] ?>》</span><br>
                                    <small>
                                        原唱：<?php echo $audio_value[1] ?><br>
                                        <a target="_blank" href="<?php echo $audio_value[4] ?>">访问原址链接</a>
                                    </small>
                                </div>
							</div>
						</div>
						<?php endif; ?>
						<?php 
							while ( have_posts() ) : the_post();        
							the_content();              
							endwhile;
						?>
						<div class="thx_wrap">
							<p>非常荣幸你能看到这一行字</p>
							<p>o(*￣▽￣*)ブ<span class="thx_text">&nbsp;&nbsp;谢谢阅读！&nbsp;&nbsp;</span>o(*￣▽￣*)ブ</p>
						</div>
					</section>
					<section class="arti-tips">
						<ul>
							<li><span class="icon-time">&#xe613;</span><?php the_time('Y-m-d, l, H:i:s'); ?></li>
							<!--<li><span class="icon-user">&#xe603;</span><?php the_author(); ?></li>-->
							<li><span class="icon-update">&#xe624;</span><?php the_modified_time('Y-m-d, l, H:i:s'); ?></li>
						</ul>
						<ul>
							<li><span class="icon-class">&#xe647;</span><?php the_category(','); ?></li>
							<li><span class="icon-tag">&#xe65b;</span><?php the_tags(''); ?></li>
						</ul>
						<ul>
							<li><span class="icon-view">&#xe639;</span><a href="<?php the_permalink(); ?>"><?php echo getPostViews(get_the_ID()); ?></a></li>
							<li><span class="icon-discuss">&#xe64d;</span><a href="<?php the_permalink();?>#comments-wrap"><?php echo get_post()->comment_count;?></a></li>
							<li><span class="icon-share">&#xe627;</span>：
								<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>" class="icon-QQ" title="分享到QQ空间">&#xe67c;</a>
								<a  data-qr="http://qr.liantu.com/api.php?text=<?php the_permalink();?>" class="icon-WX" onclick="commomFun.shareWX(this)" title="分享到微信朋友圈">&#xe604;</a>
								<a href="http://v.t.sina.com.cn/share/share.php?&url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>" class="icon-XLWB" target="_blank" title="分享到新浪微博">&#xe610;</a>
							</li>
						</ul>
					</section>
					<?php if ( comments_open() || get_comments_number() ) {?>
					<section class="comments-wrap" id="comments-wrap">
						<h4 class="single_title">评论(<?php echo get_post()->comment_count;?>)</h4>
						<?php comments_template(); ?>
					</section>
					<?php }?> 
				</article>
<?php get_footer(); ?>

<?php
    if (in_array ('audiosrc', $custom_fields)) : 
?>
	<script>
		var audioControl = function(e,ev){
			ev.preventDefault();
			var _this = e,
				thisClass = _this.className;
			[].forEach.call($$('.audio-control'),function(value,index,array){
				value.style.display = 'block';
            });
			_this.style.display = 'none';
            if(thisClass.indexOf('control-play') > -1){
				$('.artiContent-audio audio').play();
			}
			else {
				$('.artiContent-audio audio').pause();
			}
		}
		var endPlay = function(){
			return function(){
				$('.audio-control.control-play').style.display = 'block';
				$('.audio-control.control-stop').style.display = 'none';
			}
		}
		$('.artiContent-audio audio').onplay = function(){
			$('.audio-control.control-play').style.display = 'none';
			$('.audio-control.control-stop').style.display = 'block';
		}
		$('.artiContent-audio audio').onended = $('.artiContent-audio audio').onpause = endPlay();
	</script>
<?php endif; ?>