<!DOCTYPE html>
<html>
<head>
	<title>SIT</title>

<link href='http://fonts.googleapis.com/css?family=Playfair+Display:300,400,700|Raleway:300,400,700|Pacifico|Montserrat:400,700&amp;subset=cyrillic' rel='stylesheet' type='text/css'/>
<link href='<?php echo STYLERS ?>css/bootstrap.min.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo STYLERS ?>css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
<link href="<?php echo STYLERS ?>css/carousel.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td, figure {    margin: 0;    padding: 0;}
article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {     display:block;}
table {    border-collapse: separate;    border-spacing: 0;}
caption, th, td {    text-align: left;    font-weight: normal;}
sup{    vertical-align: super;    font-size:smaller;}
code{    font-family: 'Courier New', Courier, monospace;    font-size:12px;    color:#272727;}
::selection {  background: #333;  color: #fff;  }
::-moz-selection {  background: #333;  color: #fff;  }
a img{	border: none;}
ol, ul { padding: 10px 0 20px;  margin: 0 0 0 35px;  text-align: left;  }
ol li { list-style-type: decimal;  padding:0 0 5px;  }
ul li { list-style-type: square;  padding: 0 0 5px;  }
ul ul, ol ol { padding: 0; }
h1, h2, h3, h4, h5, h6 { font-family: $(header.font); font-weight: normal;}


/*****************************************
Global Links CSS
******************************************/
a{ color: #555; outline:none; text-decoration: none; }
a:hover, a:focus { color: #222; text-decoration:none; }
body{ background: $(body.background.color); color: #888; padding: 0; font-family: 'raleway', sans-serif; font-size: 15px; line-height: 25px; }
.clr { clear:both; float:none; }

/*****************************************
Wrappers
******************************************/
.ct-wrapper { padding: 0px 20px; position: relative; max-width: 1080px; margin: 0 auto; }
.outer-wrapper { margin: 50px 0 25px;  margin-top: 50px; position: relative; }
.header-wrapper {
  display: inline-block;
  float: left;
  width: 100%;
  z-index: 100;
  position: relative;
  background-color: #F9F9F9;
-webkit-box-shadow: 0px -19px 20px 10px #000;
  box-shadow: 0px -19px 20px 10px #000;
-moz-box-shadow: 0px -19px 20px 10px #000;
}
.main-wrapper {   width: 70%;float: left;}
div#content {
	margin:0;
  margin-right: 20px;
}
.sidebar-wrapper { width: 30%;float: right;}

/**** Layout Styling CSS *****/
body#layout .header-wrapper { margin-top: 40px; }
body#layout .outer-wrapper, body#layout .sidebar-wrapper, body#layout .ct-wrapper { margin: 0; padding: 0; }
body#layout #About { width: 100%; }
.section, .widget{margin:0;}
#layout div#navigation {
  display: block;
  width: auto;
}


input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
border-radius: 0;
font-size: 13px;
-moz-box-shadow: 0px 0px 0px rgba(0,0,0,0), 0 0 10px rgba(0, 0, 0, 0) inset;
-webkit-box-shadow: 0px 0px 0px rgba(0,0,0,0), 0 0 10px rgba(0, 0, 0, 0) inset;
box-shadow: 0px 0px 0px rgba(0,0,0,0), 0 0 10px rgba(0, 0, 0, 0) inset;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
-ms-box-sizing: border-box;
box-sizing: border-box;
line-height: 1em;
padding: 15px 10px!important;
height: 50px;
vertical-align: middle;
background: #fff;
border: none;
-webkit-transition: all 0.2s linear 0s;
-moz-transition: all 0.2s linear 0s;
-ms-transition: all 0.2s linear 0s;
-o-transition: all 0.2s linear 0s;
transition: all 0.2s linear 0s;
}


/*****************************************
Header CSS
******************************************/
.navigation {
  border-top: 1px solid #ddd;
  padding: 2px 0 3px;
  display: TABLE;
  width: 100%;
}

#header {
  display: block;
text-align:center;
}
#header-inner{ margin:20px 0; padding: 0; }

#header h1 {
  font-family: "raleway",cursive;
  font-size: 48px;
  font-weight: 300;
  line-height: 1.6;
display:inline-block;
}

#header h1 a, #header h1 a:hover {  color: #333;  display:block; padding:15px 10px;}

#header p.description{ color: #333; font-size: 12px; font-style: italic; text-shadow: 1px 1px #FFFFFF; margin: 0; padding: 0; text-transform:capitalize; }

#header img{   border:0 none; background:none; width:auto; height:auto; margin:0 auto;  }

a.logo-img {
  display: block;
  padding: 25px 0;
}



/*----- Menu -----*/
@media screen and (min-width: 860px) {

/*****************************************
Main Menu CSS
******************************************/
a.toggle-nav {
  display: none;
}
.nav-menu { margin: 0 auto; padding: 0; width: auto; z-index: 299;float:left }
.nav-menu ul{ list-style:none;  margin:0; padding:0; z-index: 999; }

.nav-menu ul li {
  display: inline-block;
  line-height: 1;
  list-style: none;
  padding: 0;
  margin-right: 15px;
}
.nav-menu li a {
  color: #333;
  display: block;
  padding: 15px 5px;
  position: relative;
  text-decoration: none;
}
}
  
  .nav-menu li a{
  text-transform: uppercase;
  font-family: montserrat;
font-size: 13px;
}
 
/*----- Responsive -----*/
@media screen and (max-width: 1150px) {
    
}
 

 
@media screen and (max-width: 860px) {

.one-half {width: 70%;}
.top_menu ul li{margin:0;}

    .nav-menu {
        position:relative;
        display:inline-block;
		margin-left: 20px;
    }
 
    .nav-menu ul.active {
        display:none;
    }
 
    .nav-menu ul {
          width: 100%;
  min-width: 290px;
  position: absolute;
  top: 135%;
  left: 0px;
  padding: 10px 18px;
  box-shadow: 0px 1px 1px rgba(0,0,0,0.15);
  border-radius: 3px;
  background: #303030;
  display: inline-block;
    }
 
    .nav-menu ul:after {
        width:0px;
        height:0px;
        position:absolute;
        top:0%;
        left:22px;
        content:&#39;&#39;;
        transform:translate(0%, -100%);
		border-top-color:transparent;
        border-left:7px solid transparent;
        border-right:7px solid transparent;
        border-bottom:7px solid #303030;
    }
 
    .nav-menu li {
         margin: 12px 0px;
  padding: 0;
  float: none;
  display: block;
    }
 
    .nav-menu ul li a {
        display:block;
		color: #eee;
		padding:0;
    }
 
    .toggle-nav {
        padding: 3px 9px;
		margin-left: 10px;
  position: relative;
  top: 4px;
  float: left;
  display: inline-block;
  box-shadow: 0px 1px 1px rgba(0,0,0,0.15);
  border-radius: 3px;
  background: #303030;
  text-shadow: 0px 1px 0px rgba(0,0,0,0.5);
  color: #777;
  font-size: 22px;
  transition: color linear 0.15s;
    }
 
    .toggle-nav:focus,.toggle-nav:hover, .toggle-nav, .toggle-nav.active {
        text-decoration:none;
        color:#F0BF3E;
    }
   }
</style>

</head>
<body>


<div class="header-wrapper">
  <div class="ct-wrapper">
    <div class="row">
      <div class="header section" id="header"><div class="widget Header" data-version="1" id="Header1">
        <div id="header-inner">
          <div class="titlewrapper">
            <h1 class="title">
              <a href="/">Srinivas Institute Of Technology</a>
            </h1>
          </div>
          <div class="descriptionwrapper">
            <p class="description"><span>A Sharma Rao Foundation</span></p>
          </div>
        </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


</body>
</html>
