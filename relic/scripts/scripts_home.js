function loadRules()
{
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="images/loader.gif"/></div>');
$('#content').load('rules.php');
}


$('document').ready(function(){
$('.menu_item').click(function(){
$('#content').hide();
$('#content').fadeIn();
});

	



$('#about').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="images/loader.gif"/></div>');
$('#content').load('about.php');
});

$('#rules').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="images/loader.gif"/></div>');
$('#content').load('rules.php');
});


$('#credits').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="images/loader.gif"/></div>');
$('#content').load('credits.php');
});

$('#home').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="images/loader.gif"/></div>');
$('#content').load('home.php');
});


$('#leader_board').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="images/loader.gif"/></div>');
$('#leader_board').load('leader.php');


});
/*   $(document).ready(function(){
          animateDiv();
    
		});

			function makeNewPosition(){
				
				// Get viewport dimensions (remove the dimension of the div)
				var h = $(window).height() ;
				var w = $(window).width() ;
				
				var nh = Math.floor(Math.random() * h);
				var nw = Math.floor(Math.random() * w);
				var np = Math.floor(Math.random() * w)+100;
				var np2 = Math.floor(Math.random() * h) -20;
				return [nh,nw,np,np2];    
				
			}

			function animateDiv(){
				
				var newq = makeNewPosition();
				var oldq = $('.a').offset();
				var speed = calcSpeed([oldq.top, oldq.left], newq);
	
				$('#a').animate({ top: [newq[0],'swing'], left:  [newq[0],'swing'] }, function(){
				  animateDiv();        
				});
				$('#b').animate({ top: [newq[1],'swing'], left: [newq[0],'swing'] }, function(){
				  animateDiv();        
				});
				$('#c').animate({ top: [newq[1],'swing'], right: [newq[1],'swing'] }, function(){
				  animateDiv();        
				});
				$('#d').animate({ top: [newq[2],'swing'], left: [newq[3],'swing'] }, function(){
				  animateDiv();        
				});
				$('#e').animate({ top:[newq[1],'swing'], right: [newq[3],'swing'] }, function(){
				  animateDiv();        
				});
				$('#f').animate({ top: [newq[2],'swing'], left: [newq[0],'swing'] }, function(){
				  animateDiv();        
				});
				$('#g').animate({ top: [newq[3],'swing'], right: [newq[3],'swing'] }, function(){
				  animateDiv();        
				});
				$('#h').animate({ top: [newq[3],'swing'], left: [newq[3],'swing'] }, function(){
				  animateDiv();        
				});
				
			};
			
			function calcSpeed(prev, next) {
    
				var x = Math.abs(prev[1] - next[1]);
				var y = Math.abs(prev[0] - next[0]);
				
				var greatest = x > y ? x : y;
				
				var speedModifier = 0.8;

				var speed = Math.ceil(greatest/speedModifier);

				return speed;

			}
*/
