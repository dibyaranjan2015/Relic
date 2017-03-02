
function loadRules()
{
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="../images/loader.gif"/></div>');
$('#content').load('../rules.php');
}


$('document').ready(function(){
$('.menu_item').click(function(){
$('#content').hide();
$('#content').fadeIn();
});

$('#about').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="../images/loader.gif"/></div>');
$('#content').load('../about.php');
});

$('#rules').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="../images/loader.gif"/></div>');
$('#content').load('../rules.php');
});


$('#credits').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="../images/loader.gif"/></div>');
$('#content').load('../credits.php');
});

$('#home').click(function(){
$('#content').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="../images/loader.gif"/></div>');
$('#content').load('../home.php');
});


$('#leader_board').html('<div style="padding-top:5%;text-align:center"><img style="margin:0px auto;width:50px" src="../images/loader.gif"/></div>');
$('#leader_board').load('../leader.php');


});
