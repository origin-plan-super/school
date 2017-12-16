//返回顶部
function gotop() {
//var $top = $('<div class="gotop"><i class="fa fa-angle-up"></i></div>');
var $top = $('<div class="gotop">^</div>');
var el ;
if($("#viewerContainer").length > 0) {
	$top.appendTo("#viewerContainer");
    el = "#viewerContainer";
} else {
	$top.appendTo("body");
	el=document;
}
$(".gotop").on("click",function() {
	$("html,#viewerContainer,body").animate({
		scrollTop: '0px'
	}, 300);　　
});
$(el).scroll(function() {
	if($(el).scrollTop() > 100 || $('#viewerContainer').scrollTop() > 80) {
		$(".gotop").show();
	} else {
		$(".gotop").hide();
	}
})
}
gotop();
