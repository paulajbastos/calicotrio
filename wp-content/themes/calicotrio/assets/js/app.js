jQuery(document).ready(function($){

	function detectmob() { 
	    if( navigator.userAgent.match(/Android/i)
	      || navigator.userAgent.match(/webOS/i)
	      || navigator.userAgent.match(/iPhone/i)
	      || navigator.userAgent.match(/iPad/i)
	      || navigator.userAgent.match(/iPod/i)
	      || navigator.userAgent.match(/BlackBerry/i)
	      || navigator.userAgent.match(/Windows Phone/i)
	    ){
	      return true;
	    }
	    else {
	      return false;
	    }
  	}


	/* MOBILE MENU*/
	//if((window.innerWidth <= 800 && window.innerHeight <= 600) || detectmob()) {


		$("#nav").mmenu({
		    "footer": {
		      "add": true,
		      "title": "copyright"
		    },
		    "classes": "mm-light",
		    classNames: {
		        fixedElements: {
		           fixedTop: "header",
		           fixedBottom: "footer"
		        },
		        toggles: {
	               toggle: "a"
	            }
		    },
		    "labels": true,
		    "searchfield": {
		      "placeholder": "Busca",
		      "noResults": "Sem resultados.",
		      "add": true,
		      "search": true
		    },
		    offCanvas: {
		      //position  : "left",
		      position  : "right",
		      //position  : "top",
		      //position  : "bottom",

		      //zposition : "back" //(default)
		      zposition : "front"
		      //zposition : "next"
		    }
		});
		$("#nav")
	    .mmenu()
	      .on( "opening.mm", function() {
	        $('.bt-menu').addClass('close');
	        $('.bt-menu').removeClass('open');
	        $('.bt-menu.close').bind('click', function() { $('#nav').trigger('close'); });
	        //alert( "The menu has just been opened." );
	      })
	      .on( "closed.mm", function() {
	      	$('.bt-menu').addClass('open');
	        $('.bt-menu').removeClass('close');
	        //alert( "The menu has just been closed." );
	      });



		/* MOBILE MENU */
	//}

	

});


