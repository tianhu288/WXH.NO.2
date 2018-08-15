/* 
	文件名：home.js
	文件描述：首页特殊效果处理
			（大图轮播）
	创建时间：2016.11.17
	更新时间：2017.05.09
	创建者：小虎（www.wuxiaohu.com）
*/

/*************************************************************************
2017.05.09: 响应显示/隐藏，从之前的JS判断改为CSS响应
2016.11.22: 添加 关于我的一个点击事件
2016.11.17: 添加 首页轮播图
*************************************************************************/

if (publicVar.PC === 1) { // 确定是PC端时
//	mineFun.remove_hidden([
//		'#album-index',          // 大图滚动
//	])
}

// 关于我，显示条
function index_function(){
	var dls = $$('#about-index dl'),
		lis = $$('#about-index .about-pro > li'),
		time = $('#about-index').getAttribute('data-time')||1000, // 动画时间
		time2 = $('#about-index').getAttribute('data-time2')||0, // 延迟时间
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
}
index_function()
