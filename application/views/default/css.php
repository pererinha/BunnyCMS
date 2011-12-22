html * {margin:0;padding:0;}
body{
	color:#666;
	background:#F5F5F5;
	font-family:Georgia, Helvetica, Arial, sans-serif;
}
a{
	color:#256FCF;
	text-decoration:none;
}
	a:hover{
		background:#256FCF;
		color:#FFF;
		text-shadow:none;
	}
h1, h2, h3{font-family: 'Convergence', sans-serif;}
section, header, footer, nav{
	width:800px;
	margin:0 auto;
}

header{
	margin:20px auto;
}
	header h1{
		color:#666;
		font-size:50px;
		line-height:75px;
		text-shadow: 0px 2px 3px #F5F5F5;
	}
	header p{

	}
nav{
	border:1px solid #CCC;
	border-left:none;
	border-right:none;
	padding:5px 0;
}
	nav ul{
		list-style:none;
	}
		nav ul li{
			float:left;
		}
			nav ul li a{
				margin:5px;
			}

section{}
	section h2{
		font-size:35px;
		margin:30px 0 10px 0;
		text-shadow: 0px 2px 3px #F5F5F5;
	}
.overview *{
	font-size:12px;
}
	.overview p{
		color:#999;
		float:left;
		margin:0 0 10px 0;
	}
	.overview ul{
		list-style:none;
	}
		.overview ul li{
			float: left;
			padding:0 5px 0 5px;
		}
article.contents{}
	article.contents h3{
		border-bottom:1px solid #CCC;
		color:#999;
		font-size:28px;
		margin:40px 0 20px 0;
		text-shadow: 0px 2px 3px #F5F5F5;
	}
	article.contents p{
		line-height:26px;
	}
		article.contents p{
			margin:0 0 15px 0;
		}
	article.contents ul, article.contents ol{
		line-height:26px;
		margin:15px 0 15px 25px;
	}
#twitter{
	width:100px;
	float:right;
}
#facebook-like{
	margin:30px 0 0 0;
}
#pagination{
	margin:40px 0 0 0;
	text-align:center;
}
ul#posts{
	list-style:none;
}
	ul#posts li h3{
		font-size:23px;
		margin:20px 0 10px 0;
	}
footer{
	border-top:1px solid #CCC;
	color:#999;
	font-size:14px;
	margin-bottom:30px;
	margin-top:60px;
	padding:15px 0 0 0;
}
/* @override http://localhost/mark_story2/site/css/geshi.css */
/**
 * GeSHi CSS Inspired by 
 * TextMate Theme Dawn
 *
 * Copyright 2008 Mark Story 
 * 
 * This work is licensed under the Creative Commons Attribution-Share Alike 2.5 Canada License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-sa/2.5/ca/ 
 * or send a letter to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
 *
 * @copyright		Copyright 2008, Mark Story.
 * @link			http://mark-story.com
 * @license			http://creativecommons.org/licenses/by-sa/2.5/ca/
 */

/*
* Global geshi styles
**********************/
article.contents pre {
	padding: 5px;
	background: #FFF;
	margin:10px;
}
article.contents pre ol {
	list-style: decimal;
	list-style-position: outside;
	padding: 0;
	margin: 0;
}
article.contents pre ol li {
	margin: 0 0 0 35px;
	padding: 0;
	color: #333;
	clear: none;
}
pre ol li div {
	color:#000;
}

/* Line highlights */
.li1 {
	background: #E4E8EF;
}


/* comments */
.co1,
.coMULTI {
	color:#5A526E;	
}
/* methods */
.me1{
	color:#000;
}
.me0 {	

}
.me2 {	
	color:#000;
}

/* brackets */
.br0 {
	color:#000;
}

/* strings */
.st0 {
	color:#0B6125;
}

/* keywords */
.kw1 {
	color: #794938;
}
.kw2 {
	color:#A71D5D;
	font-style: italic;		
}

.kw3 {
	color:#693A17;
}

/* numbers */
.nu0 {
	color:#811F24;
}

/* vars */
.re0 {
	color:#434A97;
}


/* 
* CSS selectors 
*****************/
/* classnames */

[lang=css] .kw2,
.css .kw2 {
	color:#C24F24;
}
[lang=css] .kw1,
.css .kw1 {
	color:#691C97;
}
[lang=css] .re0,
.css .re0 {
	color: #C24F24;
}
.re1 {
	color: #C24F24;
}
/* px values */
[lang=css] .re3,
.css .re3 {
	color:#84252A;
}

/*
* Python
****************/
[lang=python] ol li div,
.python ol li div {
	color: #000;
}
[lang=python] .kw2,
.python .kw2 {
	font-style: normal;
}
[lang=python] .kw1 {
	color: #A91D5D;
}
/*
* Javascript
****************/
[lang=javascript] .me1,
.javascript .me1 {
	color: #794938;
}


.clear{clear:both;}