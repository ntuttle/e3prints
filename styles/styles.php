@import "cssfunctions.less";
@font-face{ 
  font-family:"main";
  src: url('Harabara.ttf');
}
@FF:main;
* {
	margin:0px;
	padding:0px;
	border:none;
	font-family:@FF;
}
body{
	background:url('../img/bg.jpg');
}

pre#debug{
	margin:100px auto;
	padding:25px;
	background:white;
	font:10px courier;
	color:black;
}
form{
	padding:10px 25px 15px;
	margin:150px auto;
	.bgGradient(#cccccc);
	box-shadow:0px 0px 10px black;
	.border(#111111);
	.corner(15px);
	h1{
		color:#008B8B;
		text-shadow:0px 0px 10px white;
		margin:10px 0px;
	}
	hr{
		margin:10px 0px;
	}
	label{
		color:black;
		display:inline-block;
		width:100px;
		text-align:right;
	}
	span#Alert{
		display:block;
		text-align:center;
		color:#ff0000;
		font-size:12px;
		font-style:italic;
	}
	input[type=text],input[type=password]{
		padding:3px 7px;
		font-weight:bold;
		margin:5px 0px;
		.corner(5px);
		outline:none;
		background:white;
		.rborder(#111111);
		.inset(#111111);
		&:hover,&:focus{
			background:white;
		}
	}
	input[type=text].alert,input[type=password].alert{
		.inset(#D90000);
		background:#FFD1D1;
	}
	input[type=button]{
		padding:2px 52px 3px;
		background:yellow;
		margin:5px 10px;
		font-weight:bold;
		.corner(5px);
		&:hover{
			cursor:pointer;
			background:lime;
		}
	}
	input[type=button].grey{
		padding:2px 10px 3px;
		background:none;
		color:grey;
		margin:5px 0px;
		font-weight:normal;
		&:hover{
			cursor:pointer;
			color:magenta;
			font-style:italic;
		}
	}

}
div.TopBanner{
	position:fixed;
	top:0px;
	width:100%;
	height:70px;
	.bgGradient(#cccccc);
	border-bottom:5px solid black;
	.shadow(#000000);
	div.Logo,div.nav{
		display:inline-block;
		width:500px;
		text-align:right;
		a{
			display:inline-block;
			color:black;
			margin:20px 10px;
			text-decoration:none;
			font-weight:bold;
			&:hover{
				font-style:italic;
				color:magenta;
			}
		}
	}
}
div.MainNav{
	position:fixed;
	top:60px;
	valign:center;
	width:100%;
	div.Page{
		.bgGradient(#008B8B);
		.shadow(#000000);
		.corner(3px);
		.border(#008B8B);
		margin:0px auto;
		width:1200px;
		display:inline-block;
		div.Link{
			margin:2px;
			text-align:left;
			a{
				font-size:18px;
				text-decoration:none;
				color:white;
				text-shadow:0px 0px 5px black;
			}
			display:inline-block;
			padding:2px 15px;
			color:black;
			div.LinkDrop{
				text-align:left;
				background:url('../img/T75.png');
				display:none;
			}
			&:hover{
				padding:1px 14px;
				.bgGradient(#ffff00);
				.rborder(#008B8B);
				.inset();
				.corner(3px);
				a{
					color:black;
					text-shadow:none;
				}
				div.LinkDrop{
					padding:5px;
					.corner(0px 15px 15px 15px);
					position:absolute;
					top:27px;
					display:block;
					a{
						color:white;
						text-shadow:0px 0px 5px black;
						font-size:14px;
					}
					div.Link{
						margin:0px;
						text-align:left;
						padding:4px 15px;
						display:block;
						background:none;
						&:hover{
							border:none;
							a{
								color:magenta;
								font-style:italic;
							}
						}
					}
				}
			}
		}
	}
}
div.clear{
	width:100%;
	margin-top:100px;
	div.Content{
		width:1050px;
		display:inline-block;
		margin:10px auto;
		min-height:450px;
		padding:25px;
		background:#ffffff;
		.corner(5px);
		.shadow(#000000);
	}
}
div.footer{
	position:fixed;
	bottom:0px;
	right:0px;
	padding:5px 50px;
	background:url('../img/T75.png');
	font-size:10px;
	color:white;
	a{
		color:white;
		text-decoration:none;
		font-weight:bold;
		&:hover{
			color:orange;
			font-style:italic;
			cursor:pointer;
		}
	}
}