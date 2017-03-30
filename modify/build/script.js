

new Clipboard('.uploads');

var currentVersion = $("#pageContents").val()


$(".uploads").click(function(){

	$("#image-saved").addClass("active")
	$("#image-saved").text("Image Saved to Clipboard!")


	function fade(){
		$("#image-saved").removeClass("active")
	 	$("#image-saved").text(" ")
	}
	setTimeout(fade, 2000)

})

$("#restoreButton").click(function(){
	$("#pageContents").val(currentVersion)
})

$("#viewVersionButton").click(function(){

	var oldVersion = $("#oldVersions").val()

	$.get( "archived/" + oldVersion , function( data ) {
	  $( "#pageContents" ).val( data );
	  
	});



})




$(".saveButton").on("click",function(){

	 var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd < 10){
      dd='0'+dd;
    }
    if(mm < 10){
       mm="0"+mm;
    } 
    today = mm+'/'+dd+'/'+yyyy;

// sent

	var data = $("#pageContents").val()
	var title = $("#siteTitle").val()
	var date = today
	var description = $("#siteDescription").val()


	console.log(data)

	$.ajax({
	    url: 'saving.php',
	    type: 'POST',
	    data: { data: data, title: title, date: date, description: description },
	    success: function(result) {
	        //alert('the data was successfully sent to the server');
	        // should have a scroll to bottom...
	       // $("#result").html(result)
	       $(".saveButton").text("Saved ✔")

	       $("#iframe-preview").attr("src", $('#iframe-preview').attr("src"));
	    
	       function saved(){
	 			$(".saveButton").text("Save")
			}

			setTimeout(saved, 2000)

	    }
	})

})

$("#uploadImagesButton").click(function(){
	location.reload()
})
