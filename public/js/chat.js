$(function(){

	$("#message").keypress(function(e) {
	    if(e.which == 13) {

	        if(e.shiftKey){
	        	
	        } else {
	        	sendMessage();
	        }
	    }
	});

	$("#send").click(function(){

		sendMessage();		
	});
})

function sendMessage() {
	var receiver_id = $("#receiverId").val();
	var message = $("#message").val().trim();

	if(message != "") {

		let token = document.head.querySelector('meta[name="csrf-token"]');

		$.ajax({
			type: 'POST',
			url: "/send_message",
			data: {
				receiver_id: receiver_id, 
				message: message,
				_token: token.content
			},
			success: function( data ) {

				$("#message").val("");
			}
		});
	}
}