 
var tchat_timer = setInterval(refresh_liste_messages,5000);
var user_timer = setInterval(refresh_liste_users,10000);
           
$(document).ready(function(){

  "use strict"
  
  $("#loader").hide();  

  //$('.alert').hide();
  var alert = $('.alert'); 
  if(alert.length > 0){
    //alert.delay('500').slideDown(500);
    alert.find('.close').click(function(e){
      e.preventDefault();
      //alert.delay('500').slideUp(500);
    })
  }    
    
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
  
  $('#messages').scrollTop($('#messages')[0].scrollHeight);
  
});
	
	function getConnected(){
    	$.post(url,{action:"getConnected"},function(data){
            if(data.erreur=="ok"){
                $("#connected").empty().append(data.result);
            }
            else{
                alert(data.erreur);
            }
        },"json");
        return false;
	}

  	// Post via jquery
  	function ajouter_message(valeur) {
  		console.log(valeur);
   		montrer_div("#loader");
    	$.post('ajouter_message',{valeur:valeur},function(response){ 
    		if (response.resultat == 0) {
        		montrer_alerte('danger',response.message);
    		} else if (response.resultat == 1) { 
        		// On reffraichi la liste des messahes
				refresh_liste_messages();
				$("#texte").val("");
    		} 
    		cacher_div("#loader");
    	},"json");
    	return false;
  	}
  
	// Refresh liste des messages 
	function refresh_liste_messages() {
	    $.get("refresh_liste_messages",function(response){ 
	          $("#messages").empty().append(response);
	          $('#messages').scrollTop($('#messages')[0].scrollHeight);  
	    });
	}

	// Refresh liste des messages 
	function refresh_liste_users() {
	    $.get("refresh_liste_users",function(response){ 
	          $("#users").empty().append(response);
	    });
	}
	
  function montrer_div(div){
    $(div).fadeTo(500,0.6);
  }
  
  function cacher_div(div){
    $(div).fadeOut(500);
  }

  // Fonction pour montrer une alerte, ne reste pas affichée
  // Remplacé par montrer notification
  function montrer_alerte(typo,message){
    // Sans Session et avec le même effet de sliddown que les alertes (voir plus haut)
    // types : success, info, warning, danger.
    $('#alertes').slideUp().empty().delay('500').append("<div class='alert alert-"+typo+" alert-dismissable fade in'><button class='close' data-dismiss='alert'>×</button><p>" + message + "</p></div>").slideDown(800).delay(3000).slideUp("slow");
    $('.alert').find('.close').click(function(e) {
      e.preventDefault();
      $('.alert').slideUp();
    })
  }
  