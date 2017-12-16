//$(document).on("click",".li-item",function(){
//	for(var i=0;i<this.length;i++){
//		
//	}
//	$(this).children().last().addClass("yes");
//	var a = $(this).siblings().children().last();
//	console.log(a);
//$('.audio-item').hide(); 
//$(this).find('.audio-item').addClass("yes");
//$(this).siblings().children().last().removeClass("yes");
// console.log($(this).find('.audio-item'));
//})

$(function() {
	$(document).on("click", ".li-item", function() {
	    $(this).find('.audio-item').addClass("yes");
	})
})