/* 
	文件名：base.js
	文件描述：某些全局变量、函数
	创建时间：2016.11.07
	更新时间：2016.11.17
	创建者：小虎（www.wuxiaohu.com）
*/

/*************************************************************************
2016.11.20: 添加，h5-visibilityState属性-浏览器私有前缀判断
2016.11.18: 优化格式
2016.11.17: 更新注释
*************************************************************************/

// 选择器简写
var $ = function (selector) {
		return document.querySelector(selector);
}, 
	$$ = function (selector) {
	return document.querySelectorAll(selector);
};
var publicVar = {
	screen_width: '',
	PC: '',
	remPx: function(){
		var obj = window.getComputedStyle($('html'), null);
		return parseFloat(obj.fontSize)
	},
	touchClick: function(){
		if (publicVar.PC === 0){
			return 'touchstart';
		}else{return 'click';}
	}
}
// 数组 .forEach 方法
if (!Array.prototype.forEach) {
	Array.prototype.forEach = function (callback, thisArg) {
		var T, k;
		if (this === null) {
			throw new TypeError(' this is null or not defined');
		}
		// 1. Let O be the result of calling toObject() passing the
		// |this| value as the argument.
		var O = Object(this);
		// 2. Let lenValue be the result of calling the Get() internal
		// method of O with the argument "length".
		// 3. Let len be toUint32(lenValue).
		var len = O.length >>> 0;
		// 4. If isCallable(callback) is false, throw a TypeError exception. 
		// See: http://es5.github.com/#x9.11
		if (typeof callback !== "function") {
			throw new TypeError(callback + ' is not a function');
		}
		// 5. If thisArg was supplied, let T be thisArg; else let
		// T be undefined.
		if (arguments.length > 1) {
			T = thisArg;
		}
		// 6. Let k be 0
		k = 0;
		// 7. Repeat, while k < len
		while (k < len) {
			var kValue;
			// a. Let Pk be ToString(k).
			//    This is implicit for LHS operands of the in operator
			// b. Let kPresent be the result of calling the HasProperty
			//    internal method of O with argument Pk.
			//    This step can be combined with c
			// c. If kPresent is true, then
			if (k in O) {
				// i. Let kValue be the result of calling the Get internal
				// method of O with argument Pk.
				kValue = O[k];
				// ii. Call the Call internal method of callback with T as
				// the this value and argument list containing kValue, k, and O.
				callback.call(T, kValue, k, O);
			}
			// d. Increase k by 1.
			k++;
		}
		// 8. return undefined
	};
}
// 自定义函数总 mine
var mineFun = {
	// 删除 “hidden” 属性
	remove_hidden: function (A) {
		if (Array.isArray(A)) {
			A.forEach(function (value, index, array) {
				$(value).removeAttribute("hidden");
			})
		}
	},
	// 添加 style 样式
	style_edit: function (ele, A) { // e 为选择器，A 为集合
		var obj = {}
			, arr = new Array()
			, s = '';
		if (typeof(ele) == 'string'){
			ele = $(ele)
		}
		if (ele.nodeType == 1) {
			if (ele.hasAttribute('style')) {
				var f = ele.getAttribute('style');
				f.split(';').forEach(function (value, index, array) {
					if(value != ''){
						obj[value.split(':')[0].replace(/(^\s*)|(\s*$)/g, "")] = value.split(':')[1].replace(/(^\s*)|(\s*$)/g, "");
					}
				})
			}
			for (var i in A) {
				obj[i] = A[i]
			}
			for (var j in obj) {
				arr.push(j + ':' + obj[j])
			}
			s = arr.join(';');
			ele.setAttribute('style',s)
		}
	},
	// H5-visibilityState属性，浏览器私有前缀判断
	browerKernel: function(){
		var prefix = '';
		['webkit', 'moz', 'o', 'ms'].forEach(function(value, index, array){
			if((value + 'Hidden') in document){
				prefix = value
			}
		})
		if(prefix != ''){ return prefix}
		return ''
	},
	// 获取scroll参数
	getPageScroll: function() {
		var xScroll, yScroll;
		if (window.pageYOffset) {
			yScroll = window.pageYOffset;
			xScroll = window.pageXOffset;
		} else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
			yScroll = document.documentElement.scrollTop;
			xScroll = document.documentElement.scrollLeft;
		} else if (document.body) {// all other Explorers
			yScroll = document.body.scrollTop;
			xScroll = document.body.scrollLeft;  
		}
		arrayPageScroll = new Array(xScroll,yScroll);
		return arrayPageScroll;
	},
	// 查找最近的父元素
	closestPa: function(e,p){
		var ele = e;
		if(typeof(e) == 'string'){
			ele = $(e)
		}
		for(var i = 0;;i++){
			if(ele.className.indexOf(p.replace('.','')) > -1 || ele.getAttribute('id') == p.replace('#','') || ele.nodeName == p.toUpperCase()){
				return ele
			}
			else {ele = ele.parentNode}
		}
	},
	//获取下标，.index
	getIndex: function(ele){ // 默认用数组输入
		var setIndex = function(e){
				var lists = $$(e);
				[].forEach.call(lists,function(value,index,array){
					value.index = index // 不需要返回，直接给定属性值
				})
			};
		if(typeof(ele) == 'string'){ // 为单个字符串时
			setIndex(ele)
		}
		else { // 为数组时
			ele.forEach(function(value,index,array){
				setIndex(value) // 不需要返回，直接给定属性值
			})
		}
	},
}

// Googl 翻译
function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'zh-CN', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
(function() {
    var gtConstEvalStartTime = new Date();
    function d(b) {
        var a = document.getElementsByTagName("head")[0];
        a || (a = document.body.parentNode.appendChild(document.createElement("head")));
        a.appendChild(b)
    }
    function _loadJs(b) {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.charset = "UTF-8";
        a.src = b;
        d(a)
    }
    function _loadCss(b) {
        var a = document.createElement("link");
        a.type = "text/css";
        a.rel = "stylesheet";
        a.charset = "UTF-8";
        a.href = b;
        d(a)
    }
    function _isNS(b) {
        b = b.split(".");
        for (var a = window, c = 0; c < b.length; ++c)
            if (!(a = a[b[c]]))
                return !1;
        return !0
    }
    function _setupNS(b) {
        b = b.split(".");
        for (var a = window, c = 0; c < b.length; ++c)
            a.hasOwnProperty ? a.hasOwnProperty(b[c]) ? a = a[b[c]] : a = a[b[c]] = {} : a = a[b[c]] || (a[b[c]] = {});
        return a
    }
    window.addEventListener && "undefined" == typeof document.readyState && window.addEventListener("DOMContentLoaded", function() {
        document.readyState = "complete"
    }, !1);
    if (_isNS('google.translate.Element')) {
        return
    }
    (function() {
        var c = _setupNS('google.translate._const');
        c._cest = gtConstEvalStartTime;
        gtConstEvalStartTime = undefined;
        c._cl = 'zh-CN';
        c._cuc = 'googleTranslateElementInit';
        c._cac = '';
        c._cam = '';
        c._ctkk = eval('((function(){var a\x3d313254764;var b\x3d244314464;return 424470+\x27.\x27+(a+b)})())');
        var h = 'translate.googleapis.com';
        var s = (true ? 'https' : window.location.protocol == 'https:' ? 'https' : 'http') + '://';
        var b = s + h;
        c._pah = h;
        c._pas = s;
        c._pbi = b + '/translate_static/img/te_bk.gif';
        c._pci = b + '/translate_static/img/te_ctrl3.gif';
        c._pli = b + '/translate_static/img/loading.gif';
        c._plla = h + '/translate_a/l';
        c._pmi = b + '/translate_static/img/mini_google.png';
        c._ps = b + '/translate_static/css/translateelement.css';
        c._puh = 'translate.google.com';
        _loadCss(c._ps);
        _loadJs(b + '/translate_static/js/element/main_zh-CN.js');
    }
    )();
}
)();
















