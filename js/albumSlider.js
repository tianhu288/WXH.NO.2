/* 
	文件名：albumSlider.js
	文件描述：原生JS大图轮播
	创建时间：2017.05.25
	更新时间：2016.11.22
	创建者：小虎（www.wuxiaohu.com）
*/

/*************************************************************************
2017.05.25: 稍微提高点用户体验：初始化前隐藏滚动盒子，初始化结束显示盒子
2016.11.22: 滚动功能完善，添加小图标导航
2016.11.20: 滚动功能完善，自动开始，失焦暂停
2016.11.18: 优化格式，滚动图细节，动画部分有点小BUG
2016.11.17: 基本功能实现
*************************************************************************/

function AlbumSlider(e) {
	this.sele = e.sele; // 获取传入的 selector
	this.sWrap = document.querySelector(this.sele); // 主容器盒子 
	this.sUl = this.sWrap.querySelector('ul'); // 元素盒子 ul 节点
	this.sUlG = this.sWrap.getElementsByTagName('ul')[0]; // 元素盒子ul 元素
	this.sLists = this.sUl.querySelectorAll('li'); // 初始的 元素 li，节点列表
	this.imgLists = this.sUl.querySelectorAll('img'); // 初始的 元素 img，节点列表
	this.sListG = this.sUl.getElementsByTagName('li'); // 元素 li 集合
	this.imgListG = this.sUl.getElementsByTagName('img'); // 元素 img 集合
	this.moveType = 0; // 移动方式，左移为"+1"，右移为"-1"
	this.index = this.sLists.length;
	this.w0 = 0; // 第一张图片宽度
	this.w1 = 0; // 需要后移的图片宽度
	this.w2 = 0; // 需要前移的图片宽度
	this.leftInit; // 第一次载入时，初始位置
	this.opts = e; // 传入参数
	var seted = { // 默认参数
		autoPlay: false // 设定自动滚动
		, pSpeed: 5000 // play 播放间隔
		, tSpeed: 400 // transform 动画速度
		, contrBtn: true // 导航按钮 显隐
		, ctrSmall: true // 小图标按钮 
	};
	for (var a in seted) { // 判断，并赋值参数
		if (typeof e[a] === "undefined") {
			e[a] = seted[a]
		}
		else {
			if (typeof e[a] === "object") {
				for (var b in seted[a]) {
					if (typeof e[a][b] === "undefined") {
						e[a][b] = seted[a][b]
					}
				}
			}
		}
	}
	this.init(); // 初始状态
	this.aniEvent(); // 动画事件处理
	this.vChange() // 性能节省处理
}

// 初始状态，函数定义
AlbumSlider.prototype.init = function () {
	var _this = this,
		i_sUl = this.sUl,
		i_sLists = this.sLists,
		i_imgLists = this.imgLists;
	i_sLists[0].setAttribute('class','albumLi-first');
	[].forEach.call(i_sLists,function (value, index, array) {
		// 置后的克隆元素
		var clone = value.cloneNode(true);
		clone.className += ' albumLi-clone-after';
		i_sUl.appendChild(clone);
		// 置前的克隆元素
		var clone2 = value.cloneNode(true);
		clone2.className += ' albumLi-clone-before';
		i_sUl.insertBefore(clone2, i_sLists[0]); // i_sLists 为静态列表，克隆操作后也不受影响
	})
	_this.sListG[_this.index].className += ' active'; // _this.index 为已定义的 this.sLists.length
	// UL 初始位置
	var album_load = function () {
		var num = 0, ul_left = 0;
		[].forEach.call(i_imgLists,function (value, index, array) {
			if (value.offsetHeight == i_sUl.offsetHeight) { // 如果高度统一 ，num 加一
				num++;
				ul_left += value.offsetWidth
			}
		})
		if (num == i_sLists.length) { // 图片数量比较
			clearTimeout(t); // 清除图片加载函数
			var l = "-" + (ul_left + (i_imgLists[0].offsetWidth / 2)) + 'px';
			_this.leftInit = l;
			i_sUl.style.left = l;
			// 显示滚动盒子
			_this.sWrap.style.height = i_sUl.offsetHeight + 'px';
			if(!!$('.album-ctrWrap')){
				console.log($('.album-ctrWrap').style.bottom);
				mineFun.style_edit($('.album-ctrWrap'),{'bottom': 1.25*publicVar.remPx() + 'px'});
			}
			// 自动播放判断
			if(_this.opts.autoPlay){
				_this.autoPlay();
			}
		}
	}
	var t = setInterval(album_load, 50) // 计时器，循环检测图片是否加载完成	
	// 导航按钮设置
	if(_this.opts.contrBtn){ // 如果设置显示按钮，则运行
		_this.couldMove = true; // 默认导航按钮可以点击
		// 插入 html
		var btnStr = '<section class="album-btnWrap"><div class="album-btn-prev ver-middle-p"><span class="icon-prev ver-middle">&#xe6a7;</span></div><div class="album-btn-next ver-middle-p"><span class="icon-next ver-middle">&#xe6ba;</span></div></section>';
		_this.sWrap.insertAdjacentHTML('beforeend',btnStr);
		//绑定点击事件
		_this.sWrap.querySelector('.album-btn-prev').addEventListener('click',function(){
			_this.move('-1')
		},false)
		_this.sWrap.querySelector('.album-btn-next').addEventListener('click',function(){
			_this.move('+1')
		},false)
	}
	// 小导航图标设置
	if(_this.opts.ctrSmall){  // 如果设置显示，则运行
		// 插入 html		
		var ctrstr = '',
			ctrWrap = document.createElement('section');
		ctrWrap.setAttribute('class','album-ctrWrap');
		for(var i = 0; i < _this.index; i++ ){
			var a = document.createElement('a');
			ctrWrap.appendChild(a)
		}
		_this.sWrap.appendChild(ctrWrap);
		var ctrLists = ctrWrap.querySelectorAll('.album-ctrWrap > a');
		ctrWrap.querySelector('a:first-child').setAttribute('class','active');
		// 绑定点击事件
		[].forEach.call(ctrLists,function(value,index,array){
			value.addEventListener('click',function(){
				var ctrWrap = _this.sWrap.querySelector('.album-ctrWrap'),
					ctrLists = ctrWrap.querySelectorAll('a'),
					step = 0;
				[].forEach.call(ctrLists,function(value,index,array){
					value.index = index;
					if(value.className.indexOf('active') > -1){
						return step = value.index
					}
				})
				step = this.index - step;
				_this.move(step)
			},false)
		})
		
	}
};


// 动画事件处理
AlbumSlider.prototype.aniEvent = function () {
	var _this = this;
	_this.sUl.addEventListener("transitionend", function(){
		var w_moved2,
			w4 = 0,
			num = _this.moveType;
		for(var i = 0;i < Math.abs(num);i++){
			if(num > 0){
				_this.sUlG.appendChild(_this.sListG[0]);
				w4 = _this.w0
			}
			if(num < 0){
				_this.sUlG.insertBefore(_this.sListG[_this.sListG.length - 1], _this.sListG[0]);
				w4 = 0 - _this.w2
			}
		}
		w_moved2 = parseInt(_this.sUl.style.left) + w4 + 'px';
		_this.sUl.setAttribute('style','left:' + w_moved2);
		_this.sListG[_this.index - (num * 1)].className = _this.sListG[_this.index - (num * 1)].className.replace(' active','');
		_this.sListG[_this.index].className += ' active';
		if(_this.sListG[_this.index].className.indexOf('albumLi-first') > -1){
			_this.sUl.setAttribute('style','left:' + _this.leftInit)
		}
		_this.couldMove = true // 动画结束再设置可 click 状态 
	},false)
	_this.sWrap.addEventListener("mouseover", function(){_this.stopPlay()});
	_this.sWrap.addEventListener("mouseleave", function(){_this.autoPlay()})
}

// 滚动实现
AlbumSlider.prototype.move = function (num) {
	if(this.couldMove){
		// 初始化,重设某些参数
		this.couldMove = false;
		this.moveType = num;
		// 小图标导航当前状态获取
		var ctrSmall = this.sWrap.querySelectorAll('.album-ctrWrap a');
		[].forEach.call(ctrSmall,function(value,index,array){
			value.index = index
		})
		var ctrIndex = this.sWrap.querySelector('.album-ctrWrap .active').index;
		this.sWrap.querySelector('.album-ctrWrap .active').removeAttribute('class');
		var ctrStep = ctrIndex + num * 1;
		// 计算可能用到的参数
		var m = (num > 0)?(1):(-1);
		this.w0 = this.imgListG[0].offsetWidth;
		this.w1 = (this.imgListG[this.index].offsetWidth + this.imgListG[this.index + (num * 1)].offsetWidth)/2;
		this.w2 = this.imgListG[this.sListG.length - 1].offsetWidth;
		if(Math.abs(num) > 1){
			var lW = 0,
				mW = 0,
				rW = 0;
			for(var i = 0;i < Math.abs(num)-1;i++){
				lW += this.imgListG[i+1].offsetWidth;
				mW += this.imgListG[this.index + m*(i+1)].offsetWidth;
				rW += this.imgListG[this.sListG.length - (i+2)].offsetWidth;
			}
			this.w0 += lW;
			this.w1 += mW;
			this.w2 += rW
		}
		var w_moved = parseInt(this.sUl.style.left) - m * this.w1 + 'px';
		mineFun.style_edit(this.sUl,{
			'-webkit-transition': 'left ' + this.opts.tSpeed + 'ms',
			transition: 'left ' + this.opts.tSpeed + 'ms',
			left: w_moved
		})
		// 小图标导航
		if(ctrStep < 0){
			ctrStep = this.index - 1
		}
		if(ctrStep > this.index - 1){
			ctrStep = 0
		}
		this.sWrap.querySelectorAll('.album-ctrWrap > a')[ctrStep].setAttribute('class','active')
	}
}

// 自动滚动
AlbumSlider.prototype.autoPlay = function () {
	var _this = this;
	clearInterval(_this.timer);
	_this.timer = setInterval(function () {
		_this.move("+1")
	}, _this.opts.pSpeed)
};
// 停止滚动
AlbumSlider.prototype.stopPlay = function () {
	clearInterval(this.timer)
};

// 根据浏览器是否激活，开关滚动事件
AlbumSlider.prototype.vChange = function (){
	var _this = this;
	prefix = mineFun.browerKernel();
	document.addEventListener( prefix + 'visibilitychange', function onVisibilityChange(e){
		var tip = null; 
		if( document[ prefix + 'VisibilityState' ] == 'hidden' ){
			_this.stopPlay()
		}
		else if( document[ prefix + 'VisibilityState' ] == 'visible' ){
			_this.autoPlay()
		}
	});
}
