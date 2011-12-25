* { margin:0;padding:0; list-style:none; vertical-align:baseline;}
body{
	background:#FFF;
	font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Arial,Helvetica,sans-serif;
}
/* GENERAL */
header, footer, nav, article, section{
	margin:10px auto;
	width:768px;
}
/* HEADER */
header{}
	header h1{
		color:#F58320;
		text-shadow: #CCC 1px 1px 1px;
	}
	header p{
		color:#CCC;
		font-size:16px;
	}
/* NAV */
nav{
	margin-bottom:20px;
	margin-top:20px;
}
	nav ul li{
		float:left;
		margin:0 10px 0 0;
	}
		nav ul li a{
			color:#666;
			font-size:14px;
			text-decoration:none;
		}

/* ARTICLE */
article{}
	article.overview h1 a{
		color:#333;
		font-size:22px;
		text-decoration:none;
		text-shadow: #CCC 1px 1px 1px;
	}
	article.overview p.datetime{
		font-size:11px;
	}
	article.overview ul.categories{
		font-size:12px;
		margin:10px 0;
	}
		article.overview ul.categories li{
			float:left;
			margin:0 10px 0 0;
		}
			article.overview ul.categories li a{
				color:#F58320;
				text-decoration:none;
			}
	article.contents{
		color:#333;
	}
		article.contents h1, 
		article.contents h2, 
		article.contents h3, 
		article.contents h4, 
		article.contents h5, 
		article.contents h6,
		article.contents ul,
		article.contents p,
		article.contents pre{
			margin:25px 0 5px 0;
		}
			article.contents a{
				color:#F58320;
			}
		article.contents pre{
			color:#FFF;
			background:#333;
			padding:10px;
		}
			article.contents pre code{
				color:#FFF;
			}
	article.contents div#share{
		float:right;
		margin-top:15px;
		width:90px;
	}
		article.contents div#share div#twitter{
			margin:5px 0;
		}
	article.contents div#comments{
		margin:50px auto 80px auto;
		width:500px;
	}
		article.contents div#comments h2{
			color:#CCC;
			font-style:italic;
		}
section#posts{}
	section#posts h1 a{
		color:#333;
		font-size:22px;
		text-decoration:none;
		text-shadow: #CCC 1px 1px 1px;
	}
	section#posts h1#title, section#posts h1#title a{
		color:#F58320 !important;
		font-size:15px;
	}
footer{
	margin:40px auto;
}
footer a{
	color:#F58320 !important;
	text-decoration:none;
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
	color:#fff;
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
	color:#CCC;
}
.me0 {	

}
.me2 {	
	color:#CCC;
}

/* brackets */
.br0 {
	color:#D9EB7F;
}

/* strings */
.st0 {
	color:#EBC57F;
}

/* keywords */
.kw1 {
	color: #D57FEB;
}
.kw2 {
	color:#EB7F9A;
	font-style: italic;		
}

.kw3 {
	color:#693A17;
}

/* numbers */
.nu0 {
	color:#7FEB7F;
}

/* vars */
.re0 {
	color:#7FEBE9;
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
	color: #CCC;
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