// to avoid conflicts with other JS libraries
jQuery.noConflict();
// counts which picture is shown
var count = 0;
// delay of autochanging in MS
var delay = 7000;
// timer
var timer = null;
jQuery(document).ready(function(){
	timer = setTimeout(changePhotoAutomat, delay);
	// if user clicked on switcher
 	jQuery(".photos-of-jetminds .switchers .switch").click(function(){
		// after click photos stop to rotate automatically
		clearTimeout(timer);
		// which position of the switcher
		var pos = jQuery(this).attr("pos");
		// our counter now shows to the clicked position
		count = pos;
		// find appropriate img with the same position
		var imgPos = jQuery(".photos-of-jetminds .photo div.active").attr("pos");
		if (pos != imgPos) {changePhoto(pos);}
	});
});
// signicate going through function changePhoto first time
var first=true;
function changePhotoAutomat() {
	count++;
	if(count>=3){count = 0;}
	// variable count behaves misterously on first run through this function
	// we check manualy 
	if(first){first = !first; count = 1;}
	changePhoto(count);
	timer = setTimeout(changePhotoAutomat, delay);
}

function changePhoto(n) {
	jQuery(".photos-of-jetminds .photo div.active").removeClass('active').fadeOut('slow',function() {
		jQuery(".photos-of-jetminds .photo div[pos="+ n +"]").fadeIn('fast').addClass('active');
	});
	jQuery(".photos-of-jetminds .switchers .active").removeClass("active");
	jQuery(".photos-of-jetminds .switchers div[pos="+ n +"]").addClass("active");	
}