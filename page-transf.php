<?php
/*
Template Name: 传送门
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/pages.css">
		<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
		<script>
			function linkTo(e){
				var _this = e,
					to = _this.getAttribute('data-href'),
					e = document.createEvent('MouseEvents'),
					a = document.createElement("A");
				a.setAttribute('href',to);
				a.setAttribute('target','_blank');
				e.initEvent('click', false, true);  
				a.dispatchEvent(e);
			}
		</script>
		<div class="container artiOuter-wrap">
			<div id="transfer-wrap">
				<?php
					for($n = 1;$n <= 4;$n++){
						$tf =  'tf'.$n.'_';
						$tfHeader =  $tf.'header';
						if( of_get($tfHeader) != ''){
							echo
								'<h4 class="list-header"><span class="icon-listHeader">&#xe612;</span>&nbsp;'.of_get($tfHeader).'</h4>
								<ul class="transfer-list">';
								for($x = 1;$x <= 9;$x++){
									$y = ($x < 10)?('0'.$x):($x);
									$tranImg = $tf.$y.'_img';
									$tranH5 = $tf.$y.'_h5';
									$tranP = $tf.$y.'_p';
									$tranUrl = $tf.$y.'_url';
									if(of_get($tranImg) != '' && of_get($tranH5) != '' && of_get($tranP) != ''){
										echo 
											'<li data-href="http://'.of_get($tranUrl).'" onclick="linkTo(this);">
												<div class="transfer-imgWrap"><img src="'.of_get($tranImg).'"></div>
												<div class="transfer-infoWrap">
													<h5>'.of_get($tranH5).'</h5>
													<p>'.of_get($tranP).'</p>
												</div>
											</li>';
									}
								}
							echo
								'</ul>';
							$tfList = $tf.'list';
							if(of_get($tfList) != ''){
								echo
									'<div class="transfer-other">'.of_get($tfList).'</div>';
								
							}
						}
					}
				?>
				
			</div>
		</div>
<?php get_footer(); ?>