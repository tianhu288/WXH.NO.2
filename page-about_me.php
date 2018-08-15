<?php
/*
Template Name: 关于我
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
			<section id="about-index" data-time="1500" data-time2="1000" data-type="ease" class="container">
				<div class="abIndex-nav">
					<ul id="abIndex-navList">
					</ul>
				</div>
				<div class="abIndex-content">
					
<!--					现在和未来-->
					<em class="abIndex-target" id="abIndex-NO1"></em>
					<h3 class="abIndex-title" data-id="abIndex-NO1">现在&未来</h3>
					<div class="abIndex-more">
						<div class="aboutPro-wrap">
							<?php
							$ulindex = array('1'=>'6','7'=>'12');
							foreach($ulindex as $k => $v){
								echo '<ul class="about-pro">';
								for($x = $k;$x <= $v;$x++){
									$y = ($x < 10)?('0'.$x):($x);
									$myprop = 'myprop'.$y;
									$myrate = $myprop.'_rate';
									$myTsay = $myprop.'_tsay';
									if(of_get($myprop) != '' && of_get($myrate) != '' && of_get($myTsay) != ''){
										echo 
											'<li>
												<p>'.of_get($myprop).'</p>
												<dl>
													<dt><div></div></dt>
													<dd data-percent = "'.of_get($myrate).'">0%</dd>
												</dl>
												<small>'.of_get($myTsay).'</small>
											</li>';
									}
								}
								echo '</ul>';
							}
							?>
						</div>
						<p>现在的我自给自足，也没多余；要学的东西很多，就是时间不够用；想做的事儿都已经快排不下来了、、、</p>
						<p>前端是我喜欢的工作，JS是我主要的职业方向！会的职业技能上面有简单的图表，一些框架略有学习不过没在实际项目运用过的就不提了；</p>
						<p>做前端是我喜欢的事儿，不过呢它也只是生活的调味剂，绝不是我生活的全部;毕竟一个人的生活不可能是一个人的生活；</p>
						<p>工作是工作，生活是生活--开心最重要；</p>
						<p>坚持早睡早起，睡前时间是用来调节生活的；早起时间是用来改善生活的；</p>
						<p>唱歌、骑行、钓鱼、画画、弹钢琴、、、我都不擅长，等我学会了再说说！</p>
						<p>2017，好多梦等着我去追呢！</p>
					</div>
					
<!--					我的大事记-->
					<em class="abIndex-target" id="abIndex-NO2"></em>
					<h3 class="abIndex-title" data-id="abIndex-NO2">我的大事记</h3>
					<div class="abIndex-more">
						<div class="wordsList-wrap">
							<ul class="wordsList">
								<li>
									<div class="wordsList-time"><div>2018</div><span>06月02日</span></div>
									<div class="wordsList-more">第一次去女朋友老家，表现不佳，但其乐融融（手动滑稽）！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2018</div><span>02月04日</span></div>
									<div class="wordsList-more">乔迁！爸妈操碎了心也累伤了身！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2017</div><span>07月18日</span></div>
									<div class="wordsList-more">萌芽！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2017</div><span>06月19日</span></div>
									<div class="wordsList-more">从华美欧到知启蒙！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>12月22日</span></div>
									<div class="wordsList-more">爷爷仙逝!<br>树欲静而风不止，子欲养而亲不待!时光飞逝，很多东西不能等待！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>04月</span></div>
									<div class="wordsList-more">和普测斯无奈分离，职场情场双失意···好在还没对自己绝望，不久去到华美欧！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2015</div><span>02月</span></div>
									<div class="wordsList-more">我的前端职业生涯正式开始！不久，和普测斯相遇，开始一段不错的回忆！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2014</div><span>03月01日</span></div>
									<div class="wordsList-more">这一年的想法是：边工作边自学边找工作机会；因为第一份工作是售后类跑出差的活儿根本没有个人时间，所以年初换了一份类似车间又有双休的活儿；<br>好在有点编程底子，自学起来不难就是进度不算快；真正开始找“网页设计”类工作，已经是14年年底了；<br>第一份“IT”工作只工作了半个月，离职原因有好几个，最主要的原因还是因为工作强度大吧，几乎每天加班的工作强度让我感觉很累！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2013</div><span>03月01日</span></div>
									<div class="wordsList-more">年初出来找工作，寄宿朋友家、租住小旅馆、合租睡客厅，辗转着搬来搬去一边找工作；获得第一份工作的时候，我感到了踏实！<br>工作了半年之久，我开始做起了“职业规划”，这个在大学就被念叨，我却从来没做过的事儿，现在很自然的做了起来！而且这让我充满了动力！<br>临近年底，我对自己说：“我要做IT技术员”，目的很单纯，就是做一个技术员/程序员；</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2013</div><span>01月05日</span></div>
									<div class="wordsList-more">从大学的大门出来，我很迷茫：大学课程学的东西很多，相对而言电子硬件方面是我涉猎较多的一块；但是真的要我把它当作职业我又不想，而更多的应该是怕找不到一份称心的工作；<br>所以，怀着部分逃避的心理，我对自己说：“我要考研”；于是乎这一场以“逃避”为主题，目的不纯的考研之旅就开始了！<br>2013年01月05日，走出考场的我想通了一些事儿、、、</div>
								</li>
								<li>
									<div class="wordsList-time"><div>201X</div><span>01月0Z日</span></div>
									<div class="wordsList-more">具体时间有待考证，这是腊月的某一天；村里一位身体倍儿好的奶奶突发XXX离世了，一切那么突然，这种感觉就是前几分钟你刚和人打完招呼，一眨眼的功夫，那个人就没了！没了！<br>这件事告诉了我一个道理，那就是生命是如此脆弱！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2008</div><span>09月01日</span></div>
									<div class="wordsList-more">岳阳，这地儿不错！回想一下大学时光！哎、、、好像没啥值得一提的！学校大门倒是一直很霸气！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2005</div><span>09月01日</span></div>
									<div class="wordsList-more">高中，就读于县第二中学；一年一次的班级重组绝对是一大特色；三年时光也给了我许多青春回忆，虽然有不少都是后知后觉！<br>初三毕业季那会儿还发生了一件大事--“5·12汶川地震”；其实能记得这件事主要还是因为“512”这个数字，因为初三毕业班就是“512”班；</div>
								</li>
								<li>
									<div class="wordsList-time"><div>200X</div><span>0Y月0Z日</span></div>
									<div class="wordsList-more">具体时间已经不太清楚了，总之有这么一天；我老爸掐指一算，就把“吴小虎”改成了“吴晓虎”；所以，我就是现在的“吴晓虎”啦</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2002</div><span>09月01日</span></div>
									<div class="wordsList-more">又是一年开学季！这一次，我离家更远了，除了长假能回家基本都是在外婆家度过；初来乍到的我哭了好多次，那时的电话基本都是座机，能打电话的次数不多，头几次打电话我基本说不出话来，只管哭！现在想想也是美好回忆啊！<br>学校当时是出了名的封闭式管理，一个月放两次假；班主任也是出了名的“严师”，从坐姿开始抓起,手放平腰挺直、、、“严师出高徒”啊！<br>当时的我绝对是个“三好学生”，“德、智、体、美”全线发展；<br>“德”：我可是荣获“XX模范”的人;<br>“智”：中上游的班级排名还算过得去吧<br>“体”：参加校运会长跑项目，虽然啥都没有获得；<br>“美”：、、、一双发现美的眼睛、、、</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2001</div><span>09月01日</span></div>
									<div class="wordsList-more">9月1日开学日，这一年我读六年级，第一次去离家十几公里的学校做寄读生；那时候去学校都得提上一周的米，每次饭点前自己洗米、加水，学校统一蒸煮；夏天的时候，一群小屁孩就在小溪里洗澡、玩乐、、、</div>
								</li>
								<li>
									<div class="wordsList-time"><div>1990</div><span>12月12日</span></div>
									<div class="wordsList-more">这一天，一位伟大的母亲产下了一个普通的小子，取名吴小虎</div>
								</li>
							</ul>
						</div>
					</div>
					
<!--					这个网站-->
					<em class="abIndex-target" id="abIndex-NO3"></em>
					<h3 class="abIndex-title" data-id="abIndex-NO3">这个网站</h3>
					<div class="abIndex-more">
						<div class="wordsList-wrap">
							<ul class="wordsList">
								<li>
									<div class="wordsList-time"><div>2018</div><span>06月05日</span></div>
									<div class="wordsList-more">修改分类名、去除联系邮箱、修改主导航高度<br>
									以及其它做了的又忘了的···哈哈哈···</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2018</div><span>05月</span></div>
									<div class="wordsList-more">某天，有人想知道此网站是套用什么模板，我说是个人改版;<br>
									然后我就再把“联系我”又稍微做了做改动，支持直接点击联系，新增github链接···</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2018</div><span>04月</span></div>
									<div class="wordsList-more">最近断断续续回来了，尝试把笔记上的东西都写上来；网站也看一点改一点···</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2017</div><span>01月</span></div>
									<div class="wordsList-more">临近春节的这段时间工作不忙，我就顺便看看网页上存在的有待改进的地方，加以改进···</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>11月11日</span></div>
									<div class="wordsList-more">自己设计的网站基本完成，除了个别的几个页面还没做完，功能、样式都差不多了！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>10月10日</span></div>
									<div class="wordsList-more">在几个月没搭理网站后，我决定自己设计一套样式，重做网站！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>07月30日</span></div>
									<div class="wordsList-more">于阿里云买下弹性Web托管经济版，把数据放上去；一切OK，继续微调！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>05月19日</span></div>
									<div class="wordsList-more">于阿里云买下域名“wuxiaohu.com”<br>此时的网站已经有了个基本样式，于是又花了几块钱在淘宝买了个境外共享空间，试试效果！网站基本是模仿了某个样板样式！</div>
								</li>
								<li>
									<div class="wordsList-time"><div>2016</div><span>04月</span></div>
									<div class="wordsList-more">开始预谋网站开发</div>
								</li>
							</ul>
						</div>
					</div>
					
					<!-- 联系我 -->
					<em class="abIndex-target" id="abIndex-NO4"></em>
					<h3 class="abIndex-title" data-id="abIndex-NO4">联系我</h3>
					<div class="abIndex-more abIndex-contactMe">
						<p>中文名：吴晓虎</p>
						<!-- <p>曾用名：吴小虎</p>	 -->
						<p>英文名：Justin</p>
						<!-- <p>常用ID：tianhu288</p> -->
						<!-- <p>常用网络名：流水声</p> -->
						<p>邮箱：<a href="mailto:justin@wuxiaohu.com?subject=你好&body=向你问好！！" title="联系我！" target="_blank">justin@wuxiaohu.com</a></p>	
						<p>qq：<a href="tencent://message/?uin=331094907&Site=http://vps.shuidazhe.com&Menu=yes" titile="来撩我！" target="_blank">331094907</a></p>
						<p>微信：<a href="javascript:;" class="" onclick="addWX()" title="扫一扫！">tianhu288</a></p>
						<p>微博：<a href="https://weibo.com/u/1799437997" title="看看我！" target="_blank">丨稀里糊涂丨的我</a></p>	
						<p>GitHub：<a href="https://github.com/tianhu288" title="瞅瞅我！" target="_blank">tianhu288</a></p>
						<!-- <p><a class="abIndex-title-conLink" href="<?php echo get_option('home'); ?>/#contact-index" target="_blank">-> 现在就联系 &lt;-</a></p> -->
					</div>
					
					<!-- 评论区 -->
					<em class="abIndex-target" id="abIndex-comments"></em>
					<h3 class="abIndex-title" data-id="abIndex-comments">评论区</h3>
					<div class="artiOuter-wrap">
						<?php comments_template(); ?>
					</div>
				</div>
			</section>
			<script>	
				//插入导航数据
				var abHeaderArr = (function(){ //返回一个数组，盒子距离顶部数据的数组
					var n = $$('.abIndex-title').length,
						a = [],
						html = '';
					for(var i=0; i<n; i++){
						var j = i,
							_id = '#' + $$('.abIndex-title')[j].getAttribute('data-id'),
							_html = $$('.abIndex-title')[j].innerHTML;
						a[j] = $(_id).offsetTop + $('#about-index').offsetTop - 10;
						if(j==0){
							html += '<li><a class="sited" href="' + _id + '">' + _html + '</a></li>';
							continue;
						};
						html += '<li><a href="' + _id + '">' + _html + '</a></li>';
					};
					$('#abIndex-navList').insertAdjacentHTML('afterbegin',html + '<li><a href="#respond">有话要说</a></li>');
					return a;
				})();
			</script>
<?php get_footer(); ?>

		<!-- 微信添加我 start -->
		<section class="modalBg">
			<div class="modalWr-addWX">
				<h4 class="modalTi-addWX" id="myModalLabel">添加微信</h4>
				<section class="modalCon-addWX" id="addWeixin">
					<span></span>
					<p>打开微信扫一扫！<br>嗯，就这个意思！</p>
				</section>
				<div class="modalBtn-addWX">
					<button type="button" class="modalCl-addWX" onclick="mineFun.closeModal(this)">关闭</button>
				</div>
			</div>
		</section>
		<!--  微信添加我 end -->
<script>
	function addWX(){
		var qr = 'http://www.wuxiaohu.com/wp-content/gallery/icon_logo/myWXCode.png',
		strWrap = $('#addWeixin > span');
		strWrap.innerHTML = '';
		var weixinQr = '<img src="' + qr + '">';
		strWrap.innerHTML = weixinQr;
		mineFun.closestPa($('.modalWr-addWX'),'.modalBg').style.zIndex = '10';
		$('.modalWr-addWX').className += ' active'
	}
	//窄屏幕scroll绑定
	if(publicVar.PC === 0){
		document.addEventListener('scroll',function(){
			var winTop = mineFun.getPageScroll()[1];
			//关于我页面侧边导航
			var nA = [],tLinks = $$('#abIndex-navList a'),
				setLink = function(num){
					[].forEach.call($$('#abIndex-navList a'),function(value,index,array){
						value.className = value.className.replace('sited','');
					});
					if(tLinks[num].className.indexOf('sited') < 0){
						tLinks[num].className += 'sited';
					}
				};
			abHeaderArr.forEach(function(value,index,array){ nA = nA.concat(value - winTop);});
			nA.forEach(function(value,index,array){
				if(value < 0){
					if(nA[index + 1] > 0 || !nA[index + 1]){
						setLink(index);
					}
				}
				else if(index == 0) {
					setLink(0);
				}
			});
		});
	}
</script>
