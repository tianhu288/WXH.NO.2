/* 
	文件名：commom.js
	文件描述：基本都是通用的一些函数，方法
	创建时间：2016.11.06
	更新时间：2017.04.26
	创建者：小虎（www.wuxiaohu.com）
*/

/*************************************************************************
2017.04.26: 添加子评论伸缩操作
2017.03.31: 关于我页面侧边导航定位,添加一些注释,导航菜单动画效果BUG修复
2016.11.22: 添加页面滚动事件，顶部导航条fixed定位
2016.11.18: 优化格式
2016.11.17: 更新注释
*************************************************************************/

// 屏幕检测宽度
if (window.devicePixelRatio) {
	publicVar.screen_width = window.screen.width / window.devicePixelRatio; // 获取屏幕宽度,除以像素密度
}
if (document.documentElement.clientWidth) { // 移动端宽度，获取物理宽度
	publicVar.screen_width = document.documentElement.clientWidth;
}
// 定义自定函数
var commomFun = {
	
	// 首页表单验证
	formCheck: function (e){
		var formWrap = mineFun.closestPa(e,'form'),
			inputList = formWrap.querySelectorAll('[required]'),
			hasError = false,
			errorWrap = formWrap.querySelector('.errorTipWrap'),
			hasErrorFun = function(f){
				hasError = true;
				f.focus();
				f.className += ' hasError';
				errorWrap.innerHTML = '您的输入有误，请重试'
			};
		for(var i = 0;i < inputList.length;i++){
			var _this = inputList[i];
			thisAttr = _this.getAttribute('type');
			thisNode = _this.nodeName;
			if(thisNode == 'SELECT'||thisAttr == 'text'||thisNode == 'TEXTAREA'){
				if(_this.value == ''){ hasErrorFun(_this);break}
			}
			else if(thisAttr == 'email'){
				var strTest = /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/;
				if(!strTest.test(_this.value)){ hasErrorFun(_this);break}
			}
		}
		return !hasError
	},
	// 微信分享生成事件
	shareWX: function(e){
		var qr = e.getAttribute('data-qr'),
			strWrap = $('#openWeixin > span');
		strWrap.innerHTML = '';
		var weixinQr = '<img src="' + qr + '">';
		strWrap.innerHTML = weixinQr;
		mineFun.closestPa($('.modalWr-WX'),'.modalBg').style.zIndex = '10';
		$('.modalWr-WX').className += ' active'
	},
	// 关于我，滚动条
	aboutKills: function(){
		var dls = $$('#about-index .aboutPro-wrap dl'),
			lis = $$('#about-index .about-pro > li'),
			time = $('#about-index').getAttribute('data-time')||1500, // 动画时间
			time2 = $('#about-index').getAttribute('data-time2')||1000, // 延迟时间
			ttype = $('#about-index').getAttribute('data-type')||'ease'; // 动画轨迹类型
		// 动态条形图
		[].forEach.call(dls,function(value,index,array){
			var dd = value.querySelector('dd'),
				tranWrap = value.querySelector('dt > div'),
				per = dd.getAttribute('data-percent'),
				rate = time/per,
				num = 0;
			mineFun.style_edit(tranWrap,{
				'-webkit-transition': 'width '+time+'ms ' + ttype + ' '+time2+'ms',
				transition: 'width '+time+'ms ' + ttype + ' '+time2+'ms',
				width: per+'%'
			})
			var perSum = function(){
				if(dd.innerHTML != (per + '%')){
					num ++;
					dd.innerHTML = num + '%'
				}
				else {
					clearTimeout(t1);
					clearTimeout(t2)
				}
			},t1,
			t2 = setTimeout(function(){
				t1 = setInterval(perSum,rate)
			},time2)
		}),
		// 添加点击事件
		[].forEach.call(lis,function(value,index,array){
			value.addEventListener(publicVar.touchClick(),function(){
				var sm = value.querySelector('small');
				if(sm.className.indexOf('active') > -1){
					sm.className = sm.className.replace(' active','');
					sm.removeAttribute('style');
					return
				}
				sm.className += ' active';
				var h = (publicVar.PC === 1)?('58px'):('50px')
				mineFun.style_edit(sm,{
					'-webkit-transform': 'scale(1,1)',
					'transform': 'scale(1,1)',
					'margin-bottom': '10px',
					height: h
				})
			})
		})
	},
	// 顶部搜索、分享按钮
	search_share: function(){

		// 搜索框动画
		$(".login-icon-wrap .icon-search").onmouseover = function(){
			$("#input-search").focus();
			$("#input-search").className = 'anim-after';
		}
		$("header > section.logo").onmouseleave = function(){
			$("#input-search").blur();
			$("#input-search").removeAttribute("class");
		}
		$("#input-search").onfocus = function(){this.className = 'anim-after'}
		$("#input-search").onblur = function(){this.removeAttribute("class")}

		// 分享按钮动画
		var searchIcons = $$('.login-icon-wrap > span'),
			shareWrap = $('header .login .ver-middle:nth-child(2)'),
			shareIcons = $$('.share-icon-wrap > span'),
			shareClickInit = "mineFun.style_edit(value,{transform: 'rotateY(90deg)','-webkit-transform': 'rotateY(90deg)',transition: 'transform .2s linear','-webkit-transition': 'transform .2s linear'})",
			shareClickEnd = "mineFun.style_edit(value,{transform: 'rotateY(0deg)','-webkit-transform': 'rotateY(0deg)',transition: 'transform .2s linear .2s','-webkit-transition': 'transform .2s linear .2s'})";
		$('#icon-share').onclick = function(){
			shareWrap.style.zIndex = '2';
			shareWrap.style.transition = '.2s linear';
			shareWrap.style.webkitTransition = '.2s linear';
			[].forEach.call(searchIcons,function(value,index,array){
				// 设置 CSS
				eval(shareClickInit)
			});
			[].forEach.call(shareIcons,function(value,index,array){
				// 设置 CSS
				eval(shareClickEnd)
			})
		}
		$('header .login .ver-middle:nth-child(2)').onmouseleave = function(){
			shareWrap.style.zIndex = '-1';
			shareWrap.style.webkitTransition = '.2s linear .4s';
			[].forEach.call(searchIcons,function(value,index,array){
				// 设置 CSS
				eval(shareClickEnd)
			});
			[].forEach.call(shareIcons,function(value,index,array){
				// 设置 CSS
				eval(shareClickInit)
			})
		}
	},
	// 侧边索引事件
	asideIndex: function(){
		var listWrap = $('#aside-index'),
			tiH4 = $('#aside-index > h4'),
			lists = $('#aside-index > ul'),
			tTop = $('#aside-index > div'),
			lh = lists.offsetHeight + 'px';
		// 返回顶部
		tTop.addEventListener(publicVar.touchClick(),function(){
			var timer = setInterval(function(){
				if($('body').scrollTop > 0){
					$('body').scrollTop -= 60
				}
				else {clearInterval(timer)}
			},10);
		})
		// 侧边索引列表
		mineFun.style_edit(lists,{
			position: 'relative',
			'margin-left': 0,
			width: 0,
			height: 0
		})
		$('#aside-index').style.top = window.innerHeight/2 + 'px';
		var backFun = function(){
			mineFun.style_edit(lists,{
				width: 0,
				height: 0
			})
			tiH4.className = tiH4.className.replace(' active','');
			tTop.className = tTop.className.replace(' active','');
			tTop.querySelector('i').style.display = 'none';
		}
		tiH4.addEventListener(publicVar.touchClick(),function(){
			if(this.className.indexOf('active') > -1){
				backFun();
				return
			}
			mineFun.style_edit(lists,{
				width: "auto",
				height: lh
			})
			tiH4.className += ' active';
			tTop.className += ' active';
			tTop.querySelector('i').style.display = 'inline'
		});
		listWrap.onmouseleave = function(){backFun()}
	},
	//说说界面的事件绑定
	wordsImgToggle: function(){
		var $wordsWrap = $('#wordsList-wrap');
		if (!$wordsWrap) {
			return;
		}
		var $$wordsList = $wordsWrap.querySelectorAll('.wordsList-more');
		if (!$$wordsList.length) {
			return;
		}
		for (var i = 0;i < $$wordsList.length;i++){
			var $wordsCon = $$wordsList[i];
			var $$wordsImgs = $wordsCon.querySelectorAll('img');
			if (!$$wordsImgs.length){
				continue;
			}
			for (var j = 0;j < $$wordsImgs.length;j++){
				var $img = $$wordsImgs[j];
				$img.onclick = function (){
					var thisClass = this.className;
					if (thisClass.indexOf('sizeAuto') >= 0) {
						thisClass = thisClass.replace(/sizeAuto/g,'');
					} else {
						thisClass = thisClass.replace(/^\s*/,'');
						thisClass = thisClass.replace(/\s*$/,'');
						thisClass += ' sizeAuto';
					}
					this.className = thisClass;
				}
			}
		}
	}
}

if (publicVar.screen_width < 768) { 

	publicVar.PC = 0;

	// 窄屏 移动端*******************************************************************

	// 移动端通用函数
	// 移动端侧边菜单
	commomFun.navListener = function(){
		$('#aside-navBtn').ontouchstart = function(){
			var bg = $('#aside-navWrap > .cover-bg'),
				nav = $('#aside-navWrap > .aside-nav');
			setTimeout(function(){
				bg.setAttribute('style','left: 100%;');
				nav.setAttribute('style','left: 100%;');
			},0)
		}
		$('#aside-navWrap > .cover-bg').ontouchstart = function(){
			var bg =this,
				nav = $('#aside-navWrap > .aside-nav');
			setTimeout(function(){
				bg.setAttribute('style','left: 0;');
				nav.setAttribute('style','left: 0;');
			},0);
		}
	}
} else { 

	// 大屏 PC端**********************************************************************

	publicVar.PC = 1;
	
	
	// 菜单导航动画效果
	commomFun.navListener = function(){
		var header_nav = $$('header .nav-list > li'),
			header_navBg = $('#nav-hoveBg-div'),
			topTip = true,
			navLists = $$('header .nav .nav-list > li'),
			homeWidth,
			listWidth,
			after_left;
		[].forEach.call(header_nav,function(value,index,array){
			if (index == 0) {
				value.onmouseover = function(){
					topTip = true
				}
			}
			else {
				value.onmouseover = function(){
					homeWidth = navLists[0].offsetWidth;
					listWidth = navLists[navLists.length - 1].offsetWidth;
					after_left = (publicVar.remPx() + homeWidth + listWidth*(index-1)) + 'px';
					// 动画效果		
					// 设置 CSS
					mineFun.style_edit('#nav-hoveBg-div',{ width: listWidth + 'px'});
					mineFun.style_edit(header_navBg,{
						left: after_left,
						top: '0',
						transition: 'left .3s',
						'-webkit-transition': 'left .3s'
					});
					if(topTip){
						// 设置 CSS
						mineFun.style_edit(header_navBg,{
							transition: 'top .3s',
							'-webkit-transition': 'top .3s'
						})
					}
					// 下拉效果
					if(value.querySelectorAll('li').length > 0){
						var ddWrap = value.querySelector('.sub-menu'),
							ulWrap = value.querySelector('ul');

						// 设置 CSS
						mineFun.style_edit(ddWrap,{
							transform: 'scale(1,1)',
							'-webkit-transform': 'scale(1,1)',
							transition: 'transform .1s linear',
							'-webkit-transition': 'transform .1s linear',
							'margin-top': '-' + ulWrap.offsetHeight/2 + 'px'
						});
						mineFun.style_edit(ulWrap,{
							'top': ulWrap.offsetHeight/2 + 'px'
						});
						[].forEach.call(value.querySelectorAll('li'),function(value,index,array){
							// 设置 CSS
							mineFun.style_edit(value,{
								transform: 'rotateX(0)',
								'-webkit-transform': 'rotateX(0)',
								transition: 'transform .3s ease ' + 200*index + 'ms',
								'-webkit-transition': 'transform .3s ease ' + 200*index + 'ms'
							})
						})
					}
					topTip = false
				}
				value.onmouseleave = function(){
					// 下拉效果
					if(value.querySelectorAll('li').length > 0){
						// 设置 CSS
						mineFun.style_edit(value.querySelector('.sub-menu'),{
							transform: 'scale(1,0)',
							'-webkit-transform': 'scale(1,0)',
							transition: '.2s linear',
							'-webkit-transition': '.2s linear'
						});
						var ddLi = this.querySelectorAll('li');
						[].forEach.call(value.querySelectorAll('li'),function(value,index,array){
							// 设置 CSS
							mineFun.style_edit(value,{
								transform: 'rotateX(-90deg)',
								'-webkit-transform': 'rotateX(-90deg)',
								transition: '.1s ease ' + (value.querySelectorAll('li').length - index - 1)*50 + 'ms',
								'-webkit-transition': '.1s ease ' + (value.querySelectorAll('li').length - index - 1)*50 + 'ms'
							});
						})
					}
				}
			}
		})
		$('header .nav .nav-list').onmouseleave = function(){
			// 设置 CSS
			mineFun.style_edit(header_navBg,{
				left: after_left,
				top: '-100%',
				transition: 'top .3s',
				'-webkit-transition': 'top .3s'
			})
			topTip = true
		}
		// body scroll滚动效果
		document.addEventListener('scroll',function(){
			var logoH = $('section.logo').clientHeight*7/9,
				winTop = mineFun.getPageScroll()[1],
				wpTool = ($('#wpadminbar'))?($('#wpadminbar').offsetHeight):(0),
				rem1 = logoH/3.5,
				topfix = wpTool + rem1 + 'px',
				topfix2 = wpTool + 3*rem1 + 'px';
			if(winTop >= logoH){
				mineFun.style_edit('header > .nav',{
					position: 'fixed',
					top: topfix
				});
				//关于我页面侧边导航
				if(!!$('#about-index') && !!$('#about-index .abIndex-nav')){
					mineFun.style_edit('.abIndex-nav > ul',{
						//position: 'fixed',
						top: topfix2
					});
					if(!!abHeaderArr){  //abHeaderArr 是盒子距离顶部数据的数组
						var nA = [],tLinks = $$('#abIndex-navList a'),
							setLink = function(num){ // 添加定位样式‘sited’
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
						})
					}
				}
			}
			if(winTop < logoH){
				mineFun.style_edit('header > .nav',{
					position: 'absolute',
					top: 'auto'
				})
				//关于我页面侧边导航
				if(!!$('#about-index') && !!$('#about-index .abIndex-nav')){
					mineFun.style_edit('.abIndex-nav > ul',{
						//position: 'relative',
						top: 'auto'
					});
				}
			}
			// 侧滑平滑
			var timer = setInterval(function(){
				var winTop = mineFun.getPageScroll()[1];
				if($('#aside-index').style.top != (window.innerHeight/2 + winTop + 'px')){
					$('#aside-index').style.top = (window.innerHeight/2 + winTop + 'px')
				}
				else {clearInterval(timer)}
			},10);
		},false)
	}
	// 搜索、分享
	commomFun.search_share();
	// 侧边索引添加事件
	commomFun.asideIndex();
}
// 导航列表
commomFun.navListener();
// 说说页面图片点击展示
commomFun.wordsImgToggle();
// 关于我，显示条
if(!!$$('#about-index .aboutPro-wrap dl').length){
   commomFun.aboutKills();
}
/***** 评论列表 *****/
if(!!$('#comments-outer-wrap')){
	publicVar.cotRoll = $$('#comments-outer-wrap > .children'); // 子评论列表
	[].forEach.call(publicVar.cotRoll,function(value,index,array){
		var _this = value,
			bStr = '<span class="icon-rollUp down">&#xe628;</span>查看评论',
			aStr = '<span class="icon-rollUp">&#xe628;</span>收起评论';
		_this.insertAdjacentHTML('afterbegin','<div class="cotRoll-wrap"><div class="cotRoll-btn">'+bStr+'</div></div>');
		_this.setAttribute('bh',_this.offsetHeight);
		_this.getElementsByClassName('cotRoll-btn')[0].addEventListener('mousedown',function(e){
			var __this = this;
			if(__this.getElementsByClassName('icon-rollUp')[0].className.indexOf('down') > -1){
				__this.innerHTML = aStr;
				mineFun.style_edit(_this,{
					height: _this.getAttribute('bh')+'px',
				});
				return false;
			}
			__this.innerHTML = bStr;
			mineFun.style_edit(_this,{
				height: '1px',
			});
		})
		mineFun.style_edit(_this,{
			height: '1px',
		});
	})
}

// 弹窗关闭事件
mineFun.closeModal=function(e){
	var p = mineFun.closestPa(e,'.modalBg');
	p.querySelector('[class ^= "modalWr"]').className = p.querySelector('[class ^= "modalWr"]').className.replace(' active','')
	setTimeout(function(){
		p.style.zIndex = '-1'
	},1000)
}

/***** 页面载入 *****/
window.onload = function(){
	var headerH = $('header').offsetHeight,
		allH = document.documentElement.clientHeight,
		footerH = $('footer').offsetHeight,
		wpTool = ($('#wpadminbar'))?($('#wpadminbar').offsetHeight):(0); // 后台工具条高度

	if(publicVar.PC == 0){ // 如果为移动版
		headerH = 0;
		if($('#crumbs')){
			$('#crumbs').style.marginTop = - $('#wpadminbar').offsetHeight + 'px' // 面包屑导航高度
		}
		if($('#about-index') && $('#wpadminbar')){
			$('#about-index').style.marginTop = '.5rem' // 首页关于我标题
		}
		if($('.title-outer') && $('#wpadminbar')){
			$('.title-outer').style.paddingTop = '1.2rem' // 模板页面主标题
		}
	}

	if($('.container.cont-page') && $('.container.title-outer')){ // 页面模板页面
		$('.container.cont-page').style.minHeight = allH - $('.container.title-outer').offsetHeight - footerH - headerH + 'px'
	}

	if($('.artiOuter-wrap.container') && $('#crumbs')){ // 导航条、通用文章盒子页面
		$('.artiOuter-wrap.container').style.minHeight = allH - $('#crumbs').offsetHeight - footerH - headerH + 'px'
	}
}
















