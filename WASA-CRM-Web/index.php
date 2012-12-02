<?php
require("header.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script> 
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'image/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
		
	window.onload = function()
	{
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
			xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//alert (xmlhttp.responseText);
			document.getElementById('recent').innerHTML='<marquee direction="up" behavior="scroll" scrollamount="1" scrolldelay="10">'+xmlhttp.responseText+'</marquee>';
		}
	  }
	xmlhttp.open("GET","recentComplaints.php",true);
	xmlhttp.send();
	}

	</script>
<div id="container">
<div id="example">
	<div id="slides">
		<div class="slides_container">
			<div class="slide">
				<a href="#" title="145.365" target="_blank"><img src="image/slide-1.jpg" width="570" height="270" alt="Slide 1"></a>
				<div class="caption" style="bottom:0">
					<p>Water and Sanitation Hackathon Pakistan!</p>
				</div>
			</div>
			<div class="slide">
				<a href="#" title="Taxi" target="_blank"><img src="image/slide-2.jpg" width="570" height="270" alt="Slide 2"></a>
				<div class="caption">
					<p>Hackathon Team Pakistan.</p>
				</div>
			</div>

            <div class="slide">
				<a href="#" title="Taxi" target="_blank"><img src="image/slide-3.jpg" width="570" height="270" alt="Slide 2"></a>
				<div class="caption">
					<p>Hackathon Team in great excitation!</p>
				</div>
			</div>					
		</div>
		<a href="#" class="prev"><img src="image/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
		<a href="#" class="next"><img src="image/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
	</div>
	<img src="image/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
</div>
</div>
<div class="graphs">
PIE Chart
<img src="image/graph.png" alt="graph" width="250" height="225" />
</div>
<div class="recents">
<div style="padding:12px 0px; text-align:center; background:url(image/footer.png);">Recent Updates</div>
<div id="recent" class="updates"></div>
</div>
<?php
require("footer.php");
?>