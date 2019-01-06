$(document).ready(function(){

	var open = false;

	$(".swbtn").click(function(){

		$(".sidebar").show();

		if(open == false) {

			$(".sidebar").animate({left: '0em'});
			$(".showArea").animate({left: '5em'});
			open = true;

		}else {

			$(".sidebar").animate({left: '-5em'});
			$(".showArea").animate({left: '0'});
			open = false;
		}
	});
});