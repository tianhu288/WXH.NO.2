
window.onload = function () {
	
	(function () { // 屏幕检测宽度，元素显隐
		var screen_width;
		if (window.devicePixelRatio) {
			screen_width = window.screen.width / window.devicePixelRatio; // 获取屏幕宽度,除以像素密度
		}
		if (document.documentElement.clientWidth) { // 移动端宽度，获取物理宽度
			screen_width = document.documentElement.clientWidth;
		}
		if (screen_width < 768) { // 手机移动端
			
			// 移动端侧边菜单
			document.querySelector('#aside-navBtn').removeAttribute("hidden");
			document.querySelector('#aside-navWrap').removeAttribute("hidden");
			document.querySelector('#aside-navBtn').ontouchstart = function(){
				var bg = document.querySelector('#aside-navWrap > .cover-bg'),
					nav = document.querySelector('#aside-navWrap > .aside-nav');
				setTimeout(function(){
					bg.setAttribute('style','left: 100%;');
					nav.setAttribute('style','left: 100%;');
				},0)
			}
			document.querySelector('#aside-navWrap > .cover-bg').ontouchstart = function(){
				var bg =this,
					nav = document.querySelector('#aside-navWrap > .aside-nav');
				setTimeout(function(){
					bg.setAttribute('style','left: 0;');
					nav.setAttribute('style','left: 0;');
				},0);
			}
			
		}
		else { // 大屏 PC端
			document.querySelector('header .login.pull-right').removeAttribute("hidden");  // PC 顶部搜索块
			document.querySelector('header .nav').removeAttribute("hidden");  // PC 顶部导航条
			document.querySelector('#header-tips').removeAttribute("hidden");  // PC 顶部注释语
		}
	})()
	
	 // 顶部菜单动画效果
	function header_navListener(){
		var header_nav = document.querySelectorAll('header .nav dl'),
			header_navBg = document.getElementById('nav-hoveBg-div'),
			after_left;
		header_navBg.setAttribute('style',('top: -100%; left: 0;'));
		for (var i=0;i<header_nav.length;i++){
			if(i > 0){
				header_nav[i].index =i;
				header_nav[i].onmouseover = function(){
					var navBg_top = header_navBg.style.top;
					var left = (3.5 + 5.5*(this.index-1)) + 'rem';
					if(header_navBg.className != 'trans-top' || header_navBg.style.top != '-100%'){
						header_navBg.className = 'trans-left';
					}
					setTimeout(function(){header_navBg.setAttribute('style',('top: 2px; left: ' + left + ';'))},0);
				}
				header_nav[i].onmouseleave = function(){
					after_left = (3.5 + 5.5*(this.index-1)) + 'rem';
				}
			}
		}
		document.querySelector('header .nav section.clearfix').onmouseleave = function(){
			header_navBg.className = 'trans-top';
			setTimeout(function(){header_navBg.setAttribute('style',('top: -100%; left: ' + after_left + ';'))},0);
		}
	}
	header_navListener();

}

// 搜索框动画
document.querySelector("#input-search + .icon-search").onmouseover = function(){
	document.getElementById("input-search").focus();
	document.getElementById("input-search").className = 'anim-after';
}
document.querySelector(".login-icon-wrap > span:nth-child(1)").onmouseleave = function(){
	document.getElementById("input-search").blur();
	document.getElementById("input-search").removeAttribute("class");
}
document.getElementById("input-search").onfocus = function(){this.className = 'anim-after'}
document.getElementById("input-search").onblur = function(){this.removeAttribute("class")}

// 分享按钮动画
document.getElementById('icon-share').onclick = function(){
	document.querySelector('header .login .ver-middle:nth-child(2)').style.zIndex = '2';
	var icons = document.querySelectorAll('.login-icon-wrap > span'),
		icons2 = document.querySelectorAll('.share-icon-wrap > span');
	for(var i=0;i<icons.length;i++){
		if(icons[i].hasAttribute('class')){
			if(icons[i].className.indexOf('trans-second') > -1){
				icons[i].className = icons[i].className.replace('trans-second','trans-first');
			}
			else {
				icons[i].className += ' trans-first';
			}
		}
		else {icons[i].className = 'trans-first';}
	}
	for(var i=0;i<icons2.length;i++){
		if(icons2[i].hasAttribute('class')){
			if(icons2[i].className.indexOf('trans-first') > -1){
				icons2[i].className = icons2[i].className.replace('trans-first','trans-second');
			}
			else {icons2[i].className += ' trans-second';}
		}
		else {icons2[i].className = 'trans-second';}
	}
}
document.querySelector('header .login .ver-middle:nth-child(2)').onmouseleave = function(){
	var icons = document.querySelectorAll('.login-icon-wrap > span');
	var icons2 = document.querySelectorAll('.share-icon-wrap > span');
	for(var i=0;i<icons2.length;i++){
		icons2[i].className = icons2[i].className.replace('trans-second','trans-first');
	}
	for(var i=0;i<icons.length;i++){
		icons[i].className = icons[i].className.replace('trans-first','trans-second');
	}
	setTimeout(function(){
		document.querySelector('header .login .ver-middle:nth-child(2)').style.zIndex = '-1';
		for(var i=0;i<icons2.length;i++){
			icons2[i].className = icons2[i].className.replace('trans-first','');
		}
		for(var i=0;i<icons.length;i++){
			icons[i].className = icons[i].className.replace('trans-second','');
		}
	},400)
}


















