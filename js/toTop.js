$(document).ready( function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() < 250) {
                $("#toTop2:visible").fadeOut('slow');
            }
            else {
                $("#toTop2:hidden").fadeIn('slow');
            }
        });
        
        $('#toTop2').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
});