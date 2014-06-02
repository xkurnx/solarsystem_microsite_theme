$(document).ready(function(e) {
	$('tbody tr:odd').each(function(){
			$(this).addClass('odd');
	});
	$('tbody tr:even').each(function(){
			$(this).removeClass('odd');
	})
	$('#homePage #homeBanner').hover(function(){$(this).find('img').css('opacity','0.9')},function(){$(this).find('img').css('opacity','1')});
	$('#homePage #homeBottomBannerNew .box').hover(function(){$(this).find('img').css('opacity','0.9')},function(){$(this).find('img').css('opacity','1')});

	$('.activeContestWidger ul li:last').addClass('lastItem');
	//$('table tr:last td').css('border-bottom','none');
	
	$('#joinNow').click(function() {
		if ($('#modalBackground').length < 1) {
			var bk = $('<div id="modalBackground"></div>');
			var modal = $('<div id="modal"><div id="registerModal"><a href="javascript:;" class="close">X</a></div></div>');
			$('body').append(bk).append(modal);
			
			
			$('a.close,.modalWrapper', modal).click(function() {
				modal.hide();
				bk.hide();
			});
		}
		var bk = $('#modalBackground');
		var modal = $('#modal');
		bk.show();
		modal.show();
		$('#registerModal', modal).show();
		
		var h = $(window).height();
		var w = $(window).width();
		modal.css({
			left: (w - modal.width()) / 2,
			top: (h - modal.height()) / 2
		});
	});
	if($('body').find( '[rel="tooltip"]' ).length>0){
		$( '[rel="tooltip"]' ).simpletip({ fixed: true, position: 'bottom' }); 
	}
	
	$('.modalWrapper,.msgModal .btnClose').click(function(){
		$('.modalwindow,.modalWrapper').hide();
		$('.modalwindow').find('.iframe').attr('src','');		
	});
	
	
});

/* 	keystroke for easter egg */
	 var key = "asteroids";
	 var captured = "";
	 $(document).keypress(function(event) {
		 c = String.fromCharCode(event.charCode); 
		 if ( c.match(/\w/) ){
			captured+= c;		
		 }
		 if ( captured == key ){
			playAsteroidsGame();
			captured = "";			
		 }
		 //console.log(captured);		 
    });	

//
function popupYT(YT_ID, modalTitle){
// example : if youtube url http://www.youtube.com/embed/lvp_-7G9nzs, then YT_ID = lvp_-7G9nzs
// // modalTitle will be displayed as title of modal window
    var bk = $('.modalWrapper');
    var modal = $('.videoModal');


    modal.find('.header').empty().append(modalTitle);
    modal.find('iframe').attr('src', 'http://www.youtube.com/embed/' +YT_ID);
    var h = $(window).height();
    var w = $(window).width();
    modal.css({
        left: (w - modal.width()) / 2,
        top: (h - modal.height()) / 2
    });
    $('a#closeModal', modal).click(function() {
        modal.find('iframe').attr('src', '');
		modal.hide();
        bk.hide();
    });
    bk.show();
    modal.show();
}

function playAsteroidsGame(){
	 var bk = $('.modalWrapper');	 
	 var modal = $('.gameModal');
	 var h = $(window).height();
	 var w = $(window).width();
	 if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('.msgModal span').html('Sorry, but the Asteroids Reloaded game does not work on a mobile device');
		modal = $('.msgModal');
		modal.css({
			left: (w - modal.width()) / 2,
			top: (h - modal.height()) / 2
		});
		bk.show();	
		modal.show();
		return false;
	 }
	 else if( /MSIE 6|MSIE 7|MSIE 8/i.test(navigator.userAgent) ) {
		$('.msgModal span').html('Hello, it looks like you\'re using an older browser or a browser that does not support HTML5. Some features (like the Asteroids Reloaded game) will not work in older browsers. <br />We suggest upgrading to Google Chrome: <a href="http://www.google.com/chrome">http://www.google.com/chrome</a>');
		modal = $('.msgModal');
		modal.css({
			left: (w - modal.width()) / 2,
			top: (h - modal.height()) / 2
		});
		bk.show();	
		modal.show();
		return false;
	 }
	 else {
		modal = $('.gameModal');	 
		modal.find('iframe#gameIframe').attr('src', 'http://tcdev7.wpengine.com/index-tc.htm'); 
		//bk.css('background-color','#000000');	 
		modal.css({
			left: (w - modal.width()) / 2,
			top: (h - modal.height()) / 2
		});
		bk.show();	
		modal.show();
	 }	
}

$('.playGame').click(function(){
	playAsteroidsGame();		

})

window.setupScroll = function() {
	var isMobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i);
	if(isMobile){
       	$(".slider").each(function(){ 
            var myScroll = new iScroll(this);
        });
        //$("#interactive .sliders").interactive("slider");
    } else {
        $(".slider").jScrollPane({
            scrollbarWidth:7
        });
        $(".jScrollPaneContainer .shadow").each(function(){
            $(this).appendTo($(this).parent().parent());
        })
	}
}