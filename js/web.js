(function($) {
	$.fn.pwSlideshow = function(options){
		this.index = 0;
		this.numImage = [];
		this.numSlide = 0;
		this.slideShow = [];
		this.data = [];
		this.init = function(_thisCtrl)
		{
			$(_thisCtrl).attr('index', thisPlugin.slideShow.length).addClass('pw-slideshow');
			var _w = parseInt($(_thisCtrl).innerWidth());
			var _h = parseInt($(_thisCtrl).innerHeight());
			$(_thisCtrl).find('img').css({'display':'none', 'position':'absolute', 'width':'inherit', 'height':'inherit'});
			$(_thisCtrl).find('img:first').css({'display':''});
			thisPlugin.slideShow.push(_thisCtrl);
			$(_thisCtrl).find('img').each(function(index){
				var _this = $(this);
				_this.attr('index', index+1);
			});
			this.numImage.push($(_thisCtrl).find('img').length);
			$(_thisCtrl).attr('num-image', $(_thisCtrl).find('img').length)
			setInterval(function(){
				thisPlugin.showImage(_thisCtrl)
			}, 6000);
			return _thisCtrl;
		};
		this.showImage = function(selector)
		{
			var vi = parseInt($(selector).find('img:visible').filter(':first').attr('index'));
			var mi = parseInt($(selector).attr('num-image'));
			var ci, ni;
			ci = vi;
			ni = ci+1;
			if(ni > mi)
			{
				ni = 1;
			}
			$(selector).find('img[index!="'+ci+'"]').css({'z-index':1});
			$(selector).find('img[index="'+ni+'"]').css({'z-index':20, 'display':'none'});
			$(selector).find('img[index="'+ci+'"]').css({'z-index':5, 'display':'block'});
			$(selector).find('img[index="'+ni+'"]').fadeIn(1000, function(){
				$(selector).find('img[index="'+ci+'"]').css({'z-index':5, 'display':'none'});
				$(selector).find('img[index="'+ni+'"]').css({'z-index':20, 'display':'block'});
			});
			
		}
		var thisPlugin = this;
		return this.each(function(index){
			var _thisCtrl = this;
			thisPlugin.slideShow.push(thisPlugin.init(_thisCtrl));
		});
	}

})(jQuery);

function initMenu(objmenu){
$('.men').find('.addition-menu').remove();
$('.menu #leftbar-menu').append($('#addition-menu').html());

$(objmenu).attr('data-grade','grade-1');
$(objmenu+' ul li').attr('data-grade','grade-2');
$(objmenu+' ul li ul li').attr('data-grade','grade-3');
$(objmenu+' ul li ul li ul li').attr('data-grade','grade-4');

$(objmenu).hover(
function(){
showSubmenu(this);
},
function(){
hideSubmenu(this);
}
);
}
var timeout2;
var lastobj;
function showSubmenu(obj){
var pleft;
var ptop;
if($(obj).attr('data-grade')=='grade-1')
{
pleft=parseInt($(obj).children('a').position().left);
ptop=parseInt($(obj).children('a').position().top + 36);
}
else
{
pleft=parseInt($(obj).children('a').position().left + $(obj).width());
ptop=parseInt($(obj).children('a').position().top - 1);
var nav=navigator.appVersion;
if(nav.indexOf('MSIE 6')!=-1)
{
	// I hate it
	ptop+=20;
}
else if(navigator.appName.indexOf('Opera')!=-1)
{
	ptop-=1;
}
}
if(obj===lastobj){
clearTimeout(timeout2);
}
$(obj).children('ul').css("left",pleft+"px");	
$(obj).children('ul').css("top",ptop+"px");	
//$(obj).children('ul').css("display","block");
$(obj).children('ul').slideDown('fast');
}
function hideSubmenu(obj){
lastobj=obj;
timeout2=setTimeout(function(){
//$(obj).children('ul').css("display","none");
$(obj).children('ul').fadeOut('fast');
},50);
}
window.onload = function()
{
	initMenu('.menu li');
	$(window).resize(function(){
		setPageHeight();
	});	
	setPageHeight();
	$('.login a').live('click', function(){
		showLoginForm();
		return false;
	});
	$('a.login-link').live('click', function(){
		var level_id = '';
		if($(this).hasClass('login-guru'))
		{
			level_id = 'guru';
		}
		else if($(this).hasClass('login-wali'))
		{
			level_id = 'wali';
		}
		else if($(this).hasClass('login-administrator'))
		{
			level_id = 'administrator';
		}
		else
		{
			level_id = 'siswa';
		}
		showLoginForm(level_id);
		return false;
	});
	$('.box-close a').live('click', function(){
		hideLoginForm();
		return false;
	});
	var image = new Image(100, 100);
	image.src = 'style/images/login-form.png';
	
	$('.slideshow-header').pwSlideshow();
}
function showLoginForm(level_id)
{
	// calculate window and target
	var ww = parseFloat($(window).width());
	var wh = parseFloat($(window).height());
	var ew = parseFloat($('.box').width());
	var eh = parseFloat($('.box').height());
	var eh2 = (eh*-1) - 10;
	var left = (ww - ew) / 2;
	var top = (wh - eh) / 2;
	$('.box').css({'display':'none', 'left':left+'px', 'top':eh2+'px'});
	$('.box').css({'display':'block'});
	$('.box').animate({top:top}, 200, function(){
		if(!level_id)
		{
		}
		else
		{
			$('#userlogin_level').val(level_id);
		}
		$('#username').select();
	});	
	$('.all').bind('click', function(){
		hideLoginForm();
		$('.all').unbind('click');
	});
	$(document).bind('keydown', function(event){
		if(event.keyCode==27){
		hideLoginForm();
		}
	});
}
function hideLoginForm()
{
	var eh = parseFloat($('.box').height());
	var top = (eh*-1) - 10;
	$('.box').animate({top:top}, 200, function(){});	
}
function setPageHeight()
{
	$('.content-wrapper').css({'min-height':''});
	var wh = parseFloat($(window).height());
	var mh = parseInt($('.content-wrapper').height());
	if(mh < (wh - 160))
	{
		var mh2 = wh - 160;
		$('.content-wrapper').css({'min-height':mh2+'px'});
	}
	else
	{
		$('.content-wrapper').css({'min-height':''});
	}
}