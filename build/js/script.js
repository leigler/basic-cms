
$(document).ready(function(){


	$("h1, h2").each(function(index){

		console.log($(this).text())

		//gives each h1 a custom id
		var html = $(this).html()
		var word = html.substr(0, html.indexOf(" "))
		word = word.replace(/[_\W]+/g, "-")
		$(this).attr("id", word + '-' + index)

		//generate list w/ tag to add to menu
		if ($(this).is( "h1" )) {
			$( "#table-of-contents" ).append( "<a class='title-tags title' href=#" + word + '-' + index + ">" + $(this).text() + "</a> " )
		} else{
			$( "#table-of-contents" ).append( "<a class='title-tags' href=#" + word + '-' + index + ">" + $(this).text() + "</a> " )
		}
		

	});

	// add target="_blank" to all external links

	function link_is_external(link_element) {
    	return (link_element.host !== window.location.host);
	}


	$("a").each(function(){
		if (link_is_external(this)) {
        	$(this).attr("target", "_blank")
    	}

	})

	




	//scroll to from menu
		$(".title-tags").click(function(){
			var scrollHere = $(this).attr('href')
			$("html, body").animate({ scrollTop: $(scrollHere).offset().top - 25 }, 700);

		})


	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		//mobile things     
	    



	} else{
		// not mobile things

		
		


	  } // end of else


});