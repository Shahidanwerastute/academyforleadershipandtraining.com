$(document).ready(function() {
	$('.mg-space-init').mgSpace({
		breakpointColumns: [
		  {
			  breakpoint: 0,
			  column: 1
		  },
		  {
			  breakpoint: 767,
			  column: 2
		  },
		  {
			  breakpoint: 991,
			  column: 3
		  },
		  {
			  breakpoint: 1199,
			  column: 4
		  }
	  ],
	  rowMargin: 30,
	  targetPadding: 100
	});

    $(function() {
        var a = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
        $(".navbar-nav li a,.footer-links li a").each(function() {
            $(this).attr("href") != a && "" != $(this).attr("href") || $(this).addClass("active")
        })
    })
}), $(window).scroll(function() {
    var a = $(".BottomHeader");
    200 <= $(window).scrollTop() ? a.addClass("fixed") : a.removeClass("fixed")
});