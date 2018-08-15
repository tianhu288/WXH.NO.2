function tagsCloud(){
	var awrap = $('.container.cont-page'),	// 盒子
		wWidth = awrap.offsetWidth - 2*publicVar.remPx(),	// 盒子宽度
		alists = awrap.querySelectorAll('a'),	// 所有标签元素
		anum = alists.length,	// 元素总和
		cirR = wWidth*3/8,	//
		colorA = ['0','1','3','5','7','9','a','b','d','f']; // 颜色数组
	mineFun.style_edit('.page-tags-cloud',{ // PC界面，高度为一半
		'width': wWidth*3/4 + 'px',
		'height': wWidth*3/8 + 'px'
	});
	if(publicVar.PC == 0){ // 移动端，高度为两倍
		mineFun.style_edit('.page-tags-cloud',{
			'height': wWidth*3/2 + 'px'
		})
	}
	for(var i=0;i<alists.length;i++){
		alists[i].index = i;
		var athis = alists[i],
			ranNum = function(){	// 随机数，包含一位小数，包含正负符号
				var fu = (Math.random()*10 > 4)?(-1):(+1)
				return fu * parseInt(Math.random()*10)/10
			},
			transitionStr = 'translate(' + ranNum()*cirR + 'px,' + ranNum()*cirR/2 + 'px)',  // 随机位移距离，PC界面况高度为一半
			times = function(){ // 随机时间，大于5s
				var rn = Math.abs(ranNum()*10);
				rn = (rn < 5)?(rn + 5):(rn);
//				rn = (rn > 8)?(rn - 6 + 's'):(rn + 's');
				return rn + 's'
			}
			transformtStr = times() + ' linear',
			randomC = function(){	// 随机颜色
				var cc='#';
				for(var j = 0;j < 3;j++){
					cc += colorA[Math.abs(ranNum()*10)]
				}
				return cc
			};
		if(publicVar.PC == 0){  // 移动端界面，高度为两倍，位移距离
			transitionStr = 'translate(' + ranNum()*cirR + 'px,' + ranNum()*cirR*2 + 'px)'
		}
		mineFun.style_edit(athis,{
			'color': randomC(),
			'margin-left': - athis.offsetWidth/2 + 'px',
			'margin-top': - athis.offsetHeight/2 + 'px',
			'-webkit-transition': transformtStr,
			'transition': transformtStr,
			'-webkit-transform': transitionStr,
			'transform': transitionStr
		})
	}
}
//if(publicVar.PC == 1){
	tagsCloud();
//}

// 以下为手动刷新位移按钮操作
$('.icon-refresh').onmouseover = function(){ // 手动悬浮效果
	this.className += ' active'
}
$('.icon-refresh').onmouseleave = function(){ // 移开按钮效果
	this.className = this.className.replace(' active','');
	mineFun.style_edit(this,{
		'-webkit-transition':'transform .5s',
		'transition':'transform .5s'
	});
}
$('.icon-refresh').onclick = function(e){ // 点击触发
	this.className = this.className.replace(' active','');
	mineFun.style_edit(this,{
		'-webkit-transition-duration':'5s',
		'transition-duration':'5s',
		'-webkit-transform':'rotate(-1080deg)',
		'transform':'rotate(-1080deg)'
	});
	var cleart = setTimeout(function(){
		$('.icon-refresh').removeAttribute('style')
	},5000);
	tagsCloud()
};
// 标签hover效果
[].forEach.call($$('.page-tags-cloud > a'),function(value,index,array){
	value.addEventListener('mouseover',function(){
		value.be = window.getComputedStyle(value).getPropertyValue('transform');
		var be = value.be + ' scale(1.1,1.1)';
		mineFun.style_edit(value,{
			'-webkit-transition':'.5s linear',
			'transition':'.5s linear',
			'-webkit-transform': be,
			'transform': be
		})
	})
	value.addEventListener('mouseleave',function(){
		mineFun.style_edit(value,{
			'-webkit-transform': value.be,
			'transform': value.be
		})
	})
})