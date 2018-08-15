/* 
	文件名：pageFun.js
	文件描述：‘页面’ 所有JS
	创建时间：2016.11.29
	更新时间：2016.11.29
	创建者：小虎（www.wuxiaohu.com）
*/

/*************************************************************************
2016.12.01: 时间归档页面，点击操作交互
2016.11.29: 新建文件
*************************************************************************/


/***** 归档页面交互 *****/
mineFun.getIndex(['.year-title','.year-list-ul']) // 获取index
var yTitle = $$('.year-title'),
	mTitle = $$('.month-title'),
	yUl = $$('.year-list-ul'),
	heightArray = [];

// 数组，存储默认高度 
for(var i = 0; i < yUl.length; i++){
	var _this = yUl[i];
	heightArray.push(_this.offsetHeight + 'px');
	mineFun.style_edit(_this,{
		height: heightArray[_this.index]
	})
}

// 计算文章总和，写入HTML
[].forEach.call(yTitle,function(value,index,array){
	var lists = yUl[index].querySelectorAll('.month-list-li'),
		num = (lists.length < 10)?('0' + lists.length ):(lists.length);
	value.querySelector('.artiNum').innerHTML = '(' + num + ')'
});
[].forEach.call(mTitle,function(value,index,array){
	var lists = mineFun.closestPa(value,'li').querySelectorAll('.month-list-li'),
		num = (lists.length < 10)?('0' + lists.length ):(lists.length);
	if(value.querySelector('.artiNum')){
		value.querySelector('.artiNum').innerHTML = '(' + num + ')'
	}
})

// 所有收缩展开函数
function allChange(){
	var this_text = $('#all-change > a').innerHTML,
		ctrOpen = $$('.icon-listCtr.open'),
		ctrClose = $$('.icon-listCtr.close');
	if(this_text == '折叠全部'){
		$('#all-change > a').innerHTML = '展开全部';
		for(var i = 0; i < yUl.length; i++){
			if(yUl[i].className.indexOf('active') > -1){
				yUl[i].className = yUl[i].className.replace(' active','')
			}
			mineFun.style_edit(yUl[i],{
				height: '1.5rem'
			})
		}
		[].forEach.call(ctrOpen,function(value,index,array){
			value.className = value.className.replace(' active','')
		});
		[].forEach.call(ctrClose,function(value,index,array){
			if(value.className.indexOf('active') < 0){
				value.className += ' active'
			}
		});
		return
	}
	$('#all-change > a').innerHTML = '折叠全部';
	for(var i = 0; i < yUl.length; i++){
		if(yUl[i].className.indexOf('active') < 0){
			yUl[i].className += ' active'
		}
		mineFun.style_edit(yUl[i],{
			height: heightArray[i]
		})
	}
	[].forEach.call(ctrClose,function(value,index,array){
		value.className = value.className.replace(' active','')
	});
	[].forEach.call(ctrOpen,function(value,index,array){
		if(value.className.indexOf('active') < 0){
			value.className += ' active'
		}
	})
}

// 单个定义点击函数
function listChange(e){
	var _this = e,   //
		title_h4 = mineFun.closestPa(_this,'.year-title'), // 父元素H4
		list_ul = $$('.year-list-ul')[title_h4.index],  // 对应的列表
		change_btn = (function(){ // 另一个按钮
			var allBtn = title_h4.querySelectorAll('.icon-listCtr'),
				theByn;
			for(var i = 0;i < allBtn.length;i++){
				if(allBtn[i].className.indexOf('active') < 0 ){
					theByn = allBtn[i];
					break;
				}
			}
			return theByn;
		})();
	if(list_ul.className.indexOf('active') > -1){
		list_ul.className = list_ul.className.replace(' active','');
		mineFun.style_edit(list_ul,{
			height: '1.5rem'
		})
	}
	else {
		list_ul.className += ' active';
		mineFun.style_edit(list_ul,{
			height: heightArray[list_ul.index]
		})
	}
	change_btn.className += ' active';
	_this.className = _this.className.replace(' active','')
}

