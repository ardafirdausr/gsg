<section id="footer">
	<div class="container">
		<div class="row text-center text-xs-center text-sm-left text-md-left">
			<div class="col-xs-12 col-sm-4 col-md-6">
				<img src='/assets/GSG-logoText2.svg' alt="Galeri Seni Gajahyana" id="logo" class="mb-md-3" width="80%">
				<div id="description" class="pr-md-4">
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus hic aliquid illo ipsa, animi inventore debitis, quis dolores nostrum recusandae quidem consequuntur rerum magni exercitationem vero vel. Neque, dicta totam.
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3">
				<h5>Site Maps</h5>
				<ul class="list-unstyled quick-links">
					<li><a href={{route('guest.home')}}><i class="fa fa-angle-right"></i>Home</a></li>
					<li><a href={{route('guest.contents')}}><i class="fa fa-angle-right"></i>Konten</a></li>
					<li><a href={{route('guest.events')}}><i class="fa fa-angle-right"></i>Event</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3">
				<h5>Quick links</h5>
				<ul class="list-unstyled quick-links">
					<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
					<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
					<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
					<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
				<ul class="list-unstyled list-inline social text-center">
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
				</ul>
			</div>
			<hr/>
		</div>
	</div>
</section>
<style>
/* Footer */
/* @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); */
section {
    padding: 20px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #7cb342 !important;
}

#footer #logo{
	width: 70%;
	display: block;
}

#footer #description{
	color: #fff;
}

#footer h5{
	padding-left: 10px;
	border-left: 1px solid #eeeeee;
	padding-bottom: 6px;
	margin-bottom: 20px;
	color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
	margin-right: 5px;
	font-size: 20px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size: 24px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
		#footer h5 {
			padding-left: 0;
			border-left: transparent;
			padding-bottom: 0px;
			margin-bottom: 10px;
	}
}
</style>