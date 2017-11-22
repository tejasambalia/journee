function remove(url){
	var res = confirm('Are you sure you want to delete!!');
	if(res){
		window.location.href=url;
	}
}

$('#continue_btn').click(function(){
	$('html,body').animate({
        scrollTop: $("#hotel_selection").offset().top},
        'slow');
})

$('.collapse').on('shown.bs.collapse', function () {
	$('html,body').animate({
        scrollTop: $(this).offset().top},
        'slow');
})