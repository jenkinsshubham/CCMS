<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News | SIT</title>    <style type="text/css">
    body{margin:0;padding:0;overflow-x:hidden;}
    img{border:none;}
    #container{text-align:left;overflow:hidden;margin:0;padding:0;width:100%;height:400px;font-family:Arial, Helvetica, sans-serif;font-size:12px;border:0px solid #CCCCCC;}
    #header{margin:0px;padding:5px 5px 5px 5px;color:#FFFFFF;background-color:#00548E;background-image:none;}
    #header .feed_title{margin:0;padding:0;font-weight:bold;word-wrap:break-word;}
    #header .feed_title a:link{color:#FFFFFF;text-decoration:none;}
    #header .feed_title a:visited{color:#FFFFFF;text-decoration:none;}
    #header .feed_title a:hover{color:#FFFFFF;text-decoration:underline;}
    #header .feed_title a:active{color:#FFFFFF;text-decoration:none;}
    #content{overflow:hidden;margin:0 20px 0 0;padding:5px 0px 0px 0px;background-color:#FFFFFF;background-image:none;}
    #content .feed_item{margin:0 0 7px 0;padding:0 0 7px 0;border-bottom:1px dashed #CCCCCC;clear:both;}
    #content .feed_item_title{margin:1px 0 1px 3px;padding:1px 2px 1px 3px;color:#00548E;font-weight:bold;}
    #content .feed_item_title a:link{color:#00548E;text-decoration:none;}
    #content .feed_item_title a:visited{color:#00548E;text-decoration:none;}
    #content .feed_item_title a:hover{color:#00548E;text-decoration:underline;}
    #content .feed_item_title a:active{color:#00548E;text-decoration:none;}
    #content .feed_item_podcast{margin:0 0 0 3px;padding:0 0 0 3px;}
    #content .feed_item_date{margin:0 0 0 3px;padding:0 2px 0 3px;color:#666666;overflow:hidden;text-overflow:ellipsis;clear:both;}
    #content .feed_item_link{margin:0 0 0 3px;padding:0 2px 0 3px;color:#666666;overflow:hidden;text-overflow:ellipsis;clear:both;}
    #content .feed_item_link a:link{color:#666666; text-decoration:none;}
    #content .feed_item_link a:visited{color:#666666; text-decoration:none;}
    #content .feed_item_link a:hover{color:#666666; text-decoration:none;}
    #content .feed_item_link a:active{color:#666666; text-decoration:none;}
    #content .feed_item_description{margin:0 20px 0 3px;padding:0 2px 0 3px;color:#666666;line-height:135%;word-wrap:break-word;clear:both;}
    #content .feed_item_thumbnail{width:110px; height:100px; float:left; margin:5px; overflow:hidden;}
    #footer{display:none;height:0px;margin:0px;padding:0px;color:#FFFFFF;background-color:#FFFFFF;background-image:none;}
    .scroll-pane{width: 100%;overflow:auto;}
    </style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style type='text/css'>
/*
 * CSS Styles that are needed by jScrollPane for it to operate correctly.
 *
 * Include this stylesheet in your site or copy and paste the styles below into your stylesheet - jScrollPane
 * may not operate correctly without them.
 */

.jspContainer
{
	overflow: hidden;
	position: relative;
}

.jspPane
{
  padding: 5 0 0 0!important;
	position: absolute;
}

.jspVerticalBar
{
	position: absolute;
	top: 0;
	right: 0;
	width: 10px;
	height: 100%;
	background: red;
}
/*
.jspHorizontalBar
{
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 16px;
	background: red;
}
*/
.jspCap
{
	display: none;
}

.jspHorizontalBar .jspCap
{
	float: left;
}

.jspTrack
{
	background: #eee;
	position: relative;
}

.jspDrag
{
	background: #ccc;
	position: relative;
	top: 0;
	left: 0;
	cursor: pointer;
}

.jspHorizontalBar .jspTrack,
.jspHorizontalBar .jspDrag
{
	float: left;
	height: 100%;
}

.jspArrow
{
	background: #50506d;
	text-indent: -20000px;
	display: block;
	cursor: pointer;
	padding: 0;
	margin: 0;
}

.jspArrow.jspDisabled
{
	cursor: default;
	background: #80808d;
}

.jspVerticalBar .jspArrow
{
	height: 16px;
}

.jspHorizontalBar .jspArrow
{
	width: 10px;
	float: left;
	height: 100%;
}

.jspVerticalBar .jspArrow:focus
{
	outline: none;
}

.jspCorner
{
	background: #eeeef4;
	float: left;
	height: 100%;
}

/* Yuk! CSS Hack for IE6 3 pixel bug :( */
* html .jspCorner
{
	margin: 0 -3px 0 0;
}
</style>
<script type="text/javascript">
/*! Copyright (c) 2013 Brandon Aaron (http://brandon.aaron.sh)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * jquery.mousewheel.js
 * Version: 3.1.9
 *
 * Requires: jQuery 1.2.2+
 */

(function (factory) {
    if ( typeof define === 'function' && define.amd ) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS style for Browserify
        module.exports = factory;
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    var toFix  = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'],
        toBind = ( 'onwheel' in document || document.documentMode >= 9 ) ?
                    ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'],
        slice  = Array.prototype.slice,
        nullLowestDeltaTimeout, lowestDelta;

    if ( $.event.fixHooks ) {
        for ( var i = toFix.length; i; ) {
            $.event.fixHooks[ toFix[--i] ] = $.event.mouseHooks;
        }
    }

    var special = $.event.special.mousewheel = {
        version: '3.1.9',

        setup: function() {
            if ( this.addEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.addEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = handler;
            }
            // Store the line height and page height for this particular element
            $.data(this, 'mousewheel-line-height', special.getLineHeight(this));
            $.data(this, 'mousewheel-page-height', special.getPageHeight(this));
        },

        teardown: function() {
            if ( this.removeEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.removeEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = null;
            }
        },

        getLineHeight: function(elem) {
            return parseInt($(elem)['offsetParent' in $.fn ? 'offsetParent' : 'parent']().css('fontSize'), 10);
        },

        getPageHeight: function(elem) {
            return $(elem).height();
        },

        settings: {
            adjustOldDeltas: true
        }
    };

    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.bind('mousewheel', fn) : this.trigger('mousewheel');
        },

        unmousewheel: function(fn) {
            return this.unbind('mousewheel', fn);
        }
    });


    function handler(event) {
        var orgEvent   = event || window.event,
            args       = slice.call(arguments, 1),
            delta      = 0,
            deltaX     = 0,
            deltaY     = 0,
            absDelta   = 0;
        event = $.event.fix(orgEvent);
        event.type = 'mousewheel';

        // Old school scrollwheel delta
        if ( 'detail'      in orgEvent ) { deltaY = orgEvent.detail * -1;      }
        if ( 'wheelDelta'  in orgEvent ) { deltaY = orgEvent.wheelDelta;       }
        if ( 'wheelDeltaY' in orgEvent ) { deltaY = orgEvent.wheelDeltaY;      }
        if ( 'wheelDeltaX' in orgEvent ) { deltaX = orgEvent.wheelDeltaX * -1; }

        // Firefox < 17 horizontal scrolling related to DOMMouseScroll event
        if ( 'axis' in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
            deltaX = deltaY * -1;
            deltaY = 0;
        }

        // Set delta to be deltaY or deltaX if deltaY is 0 for backwards compatabilitiy
        delta = deltaY === 0 ? deltaX : deltaY;

        // New school wheel delta (wheel event)
        if ( 'deltaY' in orgEvent ) {
            deltaY = orgEvent.deltaY * -1;
            delta  = deltaY;
        }
        if ( 'deltaX' in orgEvent ) {
            deltaX = orgEvent.deltaX;
            if ( deltaY === 0 ) { delta  = deltaX * -1; }
        }

        // No change actually happened, no reason to go any further
        if ( deltaY === 0 && deltaX === 0 ) { return; }

        // Need to convert lines and pages to pixels if we aren't already in pixels
        // There are three delta modes:
        //   * deltaMode 0 is by pixels, nothing to do
        //   * deltaMode 1 is by lines
        //   * deltaMode 2 is by pages
        if ( orgEvent.deltaMode === 1 ) {
            var lineHeight = $.data(this, 'mousewheel-line-height');
            delta  *= lineHeight;
            deltaY *= lineHeight;
            deltaX *= lineHeight;
        } else if ( orgEvent.deltaMode === 2 ) {
            var pageHeight = $.data(this, 'mousewheel-page-height');
            delta  *= pageHeight;
            deltaY *= pageHeight;
            deltaX *= pageHeight;
        }

        // Store lowest absolute delta to normalize the delta values
        absDelta = Math.max( Math.abs(deltaY), Math.abs(deltaX) );

        if ( !lowestDelta || absDelta < lowestDelta ) {
            lowestDelta = absDelta;

            // Adjust older deltas if necessary
            if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
                lowestDelta /= 40;
            }
        }

        // Adjust older deltas if necessary
        if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
            // Divide all the things by 40!
            delta  /= 40;
            deltaX /= 40;
            deltaY /= 40;
        }

        // Get a whole, normalized value for the deltas
        delta  = Math[ delta  >= 1 ? 'floor' : 'ceil' ](delta  / lowestDelta);
        deltaX = Math[ deltaX >= 1 ? 'floor' : 'ceil' ](deltaX / lowestDelta);
        deltaY = Math[ deltaY >= 1 ? 'floor' : 'ceil' ](deltaY / lowestDelta);

        // Add information to the event object
        event.deltaX = deltaX;
        event.deltaY = deltaY;
        event.deltaFactor = lowestDelta;
        // Go ahead and set deltaMode to 0 since we converted to pixels
        // Although this is a little odd since we overwrite the deltaX/Y
        // properties with normalized deltas.
        event.deltaMode = 0;

        // Add event and delta to the front of the arguments
        args.unshift(event, delta, deltaX, deltaY);

        // Clearout lowestDelta after sometime to better
        // handle multiple device types that give different
        // a different lowestDelta
        // Ex: trackpad = 3 and mouse wheel = 120
        if (nullLowestDeltaTimeout) { clearTimeout(nullLowestDeltaTimeout); }
        nullLowestDeltaTimeout = setTimeout(nullLowestDelta, 200);

        return ($.event.dispatch || $.event.handle).apply(this, args);
    }

    function nullLowestDelta() {
        lowestDelta = null;
    }

    function shouldAdjustOldDeltas(orgEvent, absDelta) {
        // If this is an older event and the delta is divisable by 120,
        // then we are assuming that the browser is treating this as an
        // older mouse wheel event and that we should divide the deltas
        // by 40 to try and get a more usable deltaFactor.
        // Side note, this actually impacts the reported scroll distance
        // in older browsers and can cause scrolling to be slower than native.
        // Turn this off by setting $.event.special.mousewheel.settings.adjustOldDeltas to false.
        return special.settings.adjustOldDeltas && orgEvent.type === 'mousewheel' && absDelta % 120 === 0;
    }

}));
</script>
<script type="text/javascript">
/*!
 * jScrollPane - v2.0.19 - 2013-11-16
 * http://jscrollpane.kelvinluck.com/
 *
 * Copyright (c) 2013 Kelvin Luck
 * Dual licensed under the MIT or GPL licenses.
 */
!function(a,b,c){a.fn.jScrollPane=function(d){function e(d,e){function f(b){var e,h,j,l,m,n,q=!1,r=!1;if(P=b,Q===c)m=d.scrollTop(),n=d.scrollLeft(),d.css({overflow:"hidden",padding:0}),R=d.innerWidth()+tb,S=d.innerHeight(),d.width(R),Q=a('<div class="jspPane" />').css("padding",sb).append(d.children()),T=a('<div class="jspContainer" />').css({width:R+"px",height:S+"px"}).append(Q).appendTo(d);else{if(d.css("width",""),q=P.stickToBottom&&C(),r=P.stickToRight&&D(),l=d.innerWidth()+tb!=R||d.outerHeight()!=S,l&&(R=d.innerWidth()+tb,S=d.innerHeight(),T.css({width:R+"px",height:S+"px"})),!l&&ub==U&&Q.outerHeight()==V)return d.width(R),void 0;ub=U,Q.css("width",""),d.width(R),T.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()}Q.css("overflow","auto"),U=b.contentWidth?b.contentWidth:Q[0].scrollWidth,V=Q[0].scrollHeight,Q.css("overflow",""),W=U/R,X=V/S,Y=X>1,Z=W>1,Z||Y?(d.addClass("jspScrollable"),e=P.maintainPosition&&(ab||db),e&&(h=A(),j=B()),g(),i(),k(),e&&(y(r?U-R:h,!1),x(q?V-S:j,!1)),H(),E(),N(),P.enableKeyboardNavigation&&J(),P.clickOnTrack&&o(),L(),P.hijackInternalLinks&&M()):(d.removeClass("jspScrollable"),Q.css({top:0,left:0,width:T.width()-tb}),F(),I(),K(),p()),P.autoReinitialise&&!rb?rb=setInterval(function(){f(P)},P.autoReinitialiseDelay):!P.autoReinitialise&&rb&&clearInterval(rb),m&&d.scrollTop(0)&&x(m,!1),n&&d.scrollLeft(0)&&y(n,!1),d.trigger("jsp-initialised",[Z||Y])}function g(){Y&&(T.append(a('<div class="jspVerticalBar" />').append(a('<div class="jspCap jspCapTop" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragTop" />'),a('<div class="jspDragBottom" />'))),a('<div class="jspCap jspCapBottom" />'))),eb=T.find(">.jspVerticalBar"),fb=eb.find(">.jspTrack"),$=fb.find(">.jspDrag"),P.showArrows&&(jb=a('<a class="jspArrow jspArrowUp" />').bind("mousedown.jsp",m(0,-1)).bind("click.jsp",G),kb=a('<a class="jspArrow jspArrowDown" />').bind("mousedown.jsp",m(0,1)).bind("click.jsp",G),P.arrowScrollOnHover&&(jb.bind("mouseover.jsp",m(0,-1,jb)),kb.bind("mouseover.jsp",m(0,1,kb))),l(fb,P.verticalArrowPositions,jb,kb)),hb=S,T.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function(){hb-=a(this).outerHeight()}),$.hover(function(){$.addClass("jspHover")},function(){$.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",G),$.addClass("jspActive");var c=b.pageY-$.position().top;return a("html").bind("mousemove.jsp",function(a){r(a.pageY-c,!1)}).bind("mouseup.jsp mouseleave.jsp",q),!1}),h())}function h(){fb.height(hb+"px"),ab=0,gb=P.verticalGutter+fb.outerWidth(),Q.width(R-gb-tb);try{0===eb.position().left&&Q.css("margin-left",gb+"px")}catch(a){}}function i(){Z&&(T.append(a('<div class="jspHorizontalBar" />').append(a('<div class="jspCap jspCapLeft" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragLeft" />'),a('<div class="jspDragRight" />'))),a('<div class="jspCap jspCapRight" />'))),lb=T.find(">.jspHorizontalBar"),mb=lb.find(">.jspTrack"),bb=mb.find(">.jspDrag"),P.showArrows&&(pb=a('<a class="jspArrow jspArrowLeft" />').bind("mousedown.jsp",m(-1,0)).bind("click.jsp",G),qb=a('<a class="jspArrow jspArrowRight" />').bind("mousedown.jsp",m(1,0)).bind("click.jsp",G),P.arrowScrollOnHover&&(pb.bind("mouseover.jsp",m(-1,0,pb)),qb.bind("mouseover.jsp",m(1,0,qb))),l(mb,P.horizontalArrowPositions,pb,qb)),bb.hover(function(){bb.addClass("jspHover")},function(){bb.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",G),bb.addClass("jspActive");var c=b.pageX-bb.position().left;return a("html").bind("mousemove.jsp",function(a){t(a.pageX-c,!1)}).bind("mouseup.jsp mouseleave.jsp",q),!1}),nb=T.innerWidth(),j())}function j(){T.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function(){nb-=a(this).outerWidth()}),mb.width(nb+"px"),db=0}function k(){if(Z&&Y){var b=mb.outerHeight(),c=fb.outerWidth();hb-=b,a(lb).find(">.jspCap:visible,>.jspArrow").each(function(){nb+=a(this).outerWidth()}),nb-=c,S-=c,R-=b,mb.parent().append(a('<div class="jspCorner" />').css("width",b+"px")),h(),j()}Z&&Q.width(T.outerWidth()-tb+"px"),V=Q.outerHeight(),X=V/S,Z&&(ob=Math.ceil(1/W*nb),ob>P.horizontalDragMaxWidth?ob=P.horizontalDragMaxWidth:ob<P.horizontalDragMinWidth&&(ob=P.horizontalDragMinWidth),bb.width(ob+"px"),cb=nb-ob,u(db)),Y&&(ib=Math.ceil(1/X*hb),ib>P.verticalDragMaxHeight?ib=P.verticalDragMaxHeight:ib<P.verticalDragMinHeight&&(ib=P.verticalDragMinHeight),$.height(ib+"px"),_=hb-ib,s(ab))}function l(a,b,c,d){var e,f="before",g="after";"os"==b&&(b=/Mac/.test(navigator.platform)?"after":"split"),b==f?g=b:b==g&&(f=b,e=c,c=d,d=e),a[f](c)[g](d)}function m(a,b,c){return function(){return n(a,b,this,c),this.blur(),!1}}function n(b,c,d,e){d=a(d).addClass("jspActive");var f,g,h=!0,i=function(){0!==b&&vb.scrollByX(b*P.arrowButtonSpeed),0!==c&&vb.scrollByY(c*P.arrowButtonSpeed),g=setTimeout(i,h?P.initialDelay:P.arrowRepeatFreq),h=!1};i(),f=e?"mouseout.jsp":"mouseup.jsp",e=e||a("html"),e.bind(f,function(){d.removeClass("jspActive"),g&&clearTimeout(g),g=null,e.unbind(f)})}function o(){p(),Y&&fb.bind("mousedown.jsp",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d,e=a(this),f=e.offset(),g=b.pageY-f.top-ab,h=!0,i=function(){var a=e.offset(),c=b.pageY-a.top-ib/2,f=S*P.scrollPagePercent,k=_*f/(V-S);if(0>g)ab-k>c?vb.scrollByY(-f):r(c);else{if(!(g>0))return j(),void 0;c>ab+k?vb.scrollByY(f):r(c)}d=setTimeout(i,h?P.initialDelay:P.trackClickRepeatFreq),h=!1},j=function(){d&&clearTimeout(d),d=null,a(document).unbind("mouseup.jsp",j)};return i(),a(document).bind("mouseup.jsp",j),!1}}),Z&&mb.bind("mousedown.jsp",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d,e=a(this),f=e.offset(),g=b.pageX-f.left-db,h=!0,i=function(){var a=e.offset(),c=b.pageX-a.left-ob/2,f=R*P.scrollPagePercent,k=cb*f/(U-R);if(0>g)db-k>c?vb.scrollByX(-f):t(c);else{if(!(g>0))return j(),void 0;c>db+k?vb.scrollByX(f):t(c)}d=setTimeout(i,h?P.initialDelay:P.trackClickRepeatFreq),h=!1},j=function(){d&&clearTimeout(d),d=null,a(document).unbind("mouseup.jsp",j)};return i(),a(document).bind("mouseup.jsp",j),!1}})}function p(){mb&&mb.unbind("mousedown.jsp"),fb&&fb.unbind("mousedown.jsp")}function q(){a("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp"),$&&$.removeClass("jspActive"),bb&&bb.removeClass("jspActive")}function r(a,b){Y&&(0>a?a=0:a>_&&(a=_),b===c&&(b=P.animateScroll),b?vb.animate($,"top",a,s):($.css("top",a),s(a)))}function s(a){a===c&&(a=$.position().top),T.scrollTop(0),ab=a;var b=0===ab,e=ab==_,f=a/_,g=-f*(V-S);(wb!=b||yb!=e)&&(wb=b,yb=e,d.trigger("jsp-arrow-change",[wb,yb,xb,zb])),v(b,e),Q.css("top",g),d.trigger("jsp-scroll-y",[-g,b,e]).trigger("scroll")}function t(a,b){Z&&(0>a?a=0:a>cb&&(a=cb),b===c&&(b=P.animateScroll),b?vb.animate(bb,"left",a,u):(bb.css("left",a),u(a)))}function u(a){a===c&&(a=bb.position().left),T.scrollTop(0),db=a;var b=0===db,e=db==cb,f=a/cb,g=-f*(U-R);(xb!=b||zb!=e)&&(xb=b,zb=e,d.trigger("jsp-arrow-change",[wb,yb,xb,zb])),w(b,e),Q.css("left",g),d.trigger("jsp-scroll-x",[-g,b,e]).trigger("scroll")}function v(a,b){P.showArrows&&(jb[a?"addClass":"removeClass"]("jspDisabled"),kb[b?"addClass":"removeClass"]("jspDisabled"))}function w(a,b){P.showArrows&&(pb[a?"addClass":"removeClass"]("jspDisabled"),qb[b?"addClass":"removeClass"]("jspDisabled"))}function x(a,b){var c=a/(V-S);r(c*_,b)}function y(a,b){var c=a/(U-R);t(c*cb,b)}function z(b,c,d){var e,f,g,h,i,j,k,l,m,n=0,o=0;try{e=a(b)}catch(p){return}for(f=e.outerHeight(),g=e.outerWidth(),T.scrollTop(0),T.scrollLeft(0);!e.is(".jspPane");)if(n+=e.position().top,o+=e.position().left,e=e.offsetParent(),/^body|html$/i.test(e[0].nodeName))return;h=B(),j=h+S,h>n||c?l=n-P.horizontalGutter:n+f>j&&(l=n-S+f+P.horizontalGutter),isNaN(l)||x(l,d),i=A(),k=i+R,i>o||c?m=o-P.horizontalGutter:o+g>k&&(m=o-R+g+P.horizontalGutter),isNaN(m)||y(m,d)}function A(){return-Q.position().left}function B(){return-Q.position().top}function C(){var a=V-S;return a>20&&a-B()<10}function D(){var a=U-R;return a>20&&a-A()<10}function E(){T.unbind(Bb).bind(Bb,function(a,b,c,d){var e=db,f=ab,g=a.deltaFactor||P.mouseWheelSpeed;return vb.scrollBy(c*g,-d*g,!1),e==db&&f==ab})}function F(){T.unbind(Bb)}function G(){return!1}function H(){Q.find(":input,a").unbind("focus.jsp").bind("focus.jsp",function(a){z(a.target,!1)})}function I(){Q.find(":input,a").unbind("focus.jsp")}function J(){function b(){var a=db,b=ab;switch(c){case 40:vb.scrollByY(P.keyboardSpeed,!1);break;case 38:vb.scrollByY(-P.keyboardSpeed,!1);break;case 34:case 32:vb.scrollByY(S*P.scrollPagePercent,!1);break;case 33:vb.scrollByY(-S*P.scrollPagePercent,!1);break;case 39:vb.scrollByX(P.keyboardSpeed,!1);break;case 37:vb.scrollByX(-P.keyboardSpeed,!1)}return e=a!=db||b!=ab}var c,e,f=[];Z&&f.push(lb[0]),Y&&f.push(eb[0]),Q.focus(function(){d.focus()}),d.attr("tabindex",0).unbind("keydown.jsp keypress.jsp").bind("keydown.jsp",function(d){if(d.target===this||f.length&&a(d.target).closest(f).length){var g=db,h=ab;switch(d.keyCode){case 40:case 38:case 34:case 32:case 33:case 39:case 37:c=d.keyCode,b();break;case 35:x(V-S),c=null;break;case 36:x(0),c=null}return e=d.keyCode==c&&g!=db||h!=ab,!e}}).bind("keypress.jsp",function(a){return a.keyCode==c&&b(),!e}),P.hideFocus?(d.css("outline","none"),"hideFocus"in T[0]&&d.attr("hideFocus",!0)):(d.css("outline",""),"hideFocus"in T[0]&&d.attr("hideFocus",!1))}function
K(){d.attr("tabindex","-1").removeAttr("tabindex").unbind("keydown.jsp keypress.jsp")}function L(){if(location.hash&&location.hash.length>1){var b,c,d=escape(location.hash.substr(1));try{b=a("#"+d+', a[name="'+d+'"]')}catch(e){return}b.length&&Q.find(d)&&(0===T.scrollTop()?c=setInterval(function(){T.scrollTop()>0&&(z(b,!0),a(document).scrollTop(T.position().top),clearInterval(c))},50):(z(b,!0),a(document).scrollTop(T.position().top)))}}function M(){a(document.body).data("jspHijack")||(a(document.body).data("jspHijack",!0),a(document.body).delegate("a[href*=#]","click",function(c){var d,e,f,g,h,i,j=this.href.substr(0,this.href.indexOf("#")),k=location.href;if(-1!==location.href.indexOf("#")&&(k=location.href.substr(0,location.href.indexOf("#"))),j===k){d=escape(this.href.substr(this.href.indexOf("#")+1));try{e=a("#"+d+', a[name="'+d+'"]')}catch(l){return}e.length&&(f=e.closest(".jspScrollable"),g=f.data("jsp"),g.scrollToElement(e,!0),f[0].scrollIntoView&&(h=a(b).scrollTop(),i=e.offset().top,(h>i||i>h+a(b).height())&&f[0].scrollIntoView()),c.preventDefault())}}))}function N(){var a,b,c,d,e,f=!1;T.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.jsp",function(g){var h=g.originalEvent.touches[0];a=A(),b=B(),c=h.pageX,d=h.pageY,e=!1,f=!0}).bind("touchmove.jsp",function(g){if(f){var h=g.originalEvent.touches[0],i=db,j=ab;return vb.scrollTo(a+c-h.pageX,b+d-h.pageY),e=e||Math.abs(c-h.pageX)>5||Math.abs(d-h.pageY)>5,i==db&&j==ab}}).bind("touchend.jsp",function(){f=!1}).bind("click.jsp-touchclick",function(){return e?(e=!1,!1):void 0})}function O(){var a=B(),b=A();d.removeClass("jspScrollable").unbind(".jsp"),d.replaceWith(Ab.append(Q.children())),Ab.scrollTop(a),Ab.scrollLeft(b),rb&&clearInterval(rb)}var P,Q,R,S,T,U,V,W,X,Y,Z,$,_,ab,bb,cb,db,eb,fb,gb,hb,ib,jb,kb,lb,mb,nb,ob,pb,qb,rb,sb,tb,ub,vb=this,wb=!0,xb=!0,yb=!1,zb=!1,Ab=d.clone(!1,!1).empty(),Bb=a.fn.mwheelIntent?"mwheelIntent.jsp":"mousewheel.jsp";"border-box"===d.css("box-sizing")?(sb=0,tb=0):(sb=d.css("paddingTop")+" "+d.css("paddingRight")+" "+d.css("paddingBottom")+" "+d.css("paddingLeft"),tb=(parseInt(d.css("paddingLeft"),10)||0)+(parseInt(d.css("paddingRight"),10)||0)),a.extend(vb,{reinitialise:function(b){b=a.extend({},P,b),f(b)},scrollToElement:function(a,b,c){z(a,b,c)},scrollTo:function(a,b,c){y(a,c),x(b,c)},scrollToX:function(a,b){y(a,b)},scrollToY:function(a,b){x(a,b)},scrollToPercentX:function(a,b){y(a*(U-R),b)},scrollToPercentY:function(a,b){x(a*(V-S),b)},scrollBy:function(a,b,c){vb.scrollByX(a,c),vb.scrollByY(b,c)},scrollByX:function(a,b){var c=A()+Math[0>a?"floor":"ceil"](a),d=c/(U-R);t(d*cb,b)},scrollByY:function(a,b){var c=B()+Math[0>a?"floor":"ceil"](a),d=c/(V-S);r(d*_,b)},positionDragX:function(a,b){t(a,b)},positionDragY:function(a,b){r(a,b)},animate:function(a,b,c,d){var e={};e[b]=c,a.animate(e,{duration:P.animateDuration,easing:P.animateEase,queue:!1,step:d})},getContentPositionX:function(){return A()},getContentPositionY:function(){return B()},getContentWidth:function(){return U},getContentHeight:function(){return V},getPercentScrolledX:function(){return A()/(U-R)},getPercentScrolledY:function(){return B()/(V-S)},getIsScrollableH:function(){return Z},getIsScrollableV:function(){return Y},getContentPane:function(){return Q},scrollToBottom:function(a){r(_,a)},hijackInternalLinks:a.noop,destroy:function(){O()}}),f(e)}return d=a.extend({},a.fn.jScrollPane.defaults,d),a.each(["arrowButtonSpeed","trackClickSpeed","keyboardSpeed"],function(){d[this]=d[this]||d.speed}),this.each(function(){var b=a(this),c=b.data("jsp");c?c.reinitialise(d):(a("script",b).filter('[type="text/javascript"],:not([type])').remove(),c=new e(b,d),b.data("jsp",c))})},a.fn.jScrollPane.defaults={showArrows:!1,maintainPosition:!0,stickToBottom:!1,stickToRight:!1,clickOnTrack:!0,autoReinitialise:!1,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,contentWidth:c,animateScroll:!1,animateDuration:300,animateEase:"linear",hijackInternalLinks:!1,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:3,arrowButtonSpeed:0,arrowRepeatFreq:50,arrowScrollOnHover:!1,trackClickSpeed:0,trackClickRepeatFreq:70,verticalArrowPositions:"split",horizontalArrowPositions:"split",enableKeyboardNavigation:!0,hideFocus:!1,keyboardSpeed:0,initialDelay:300,speed:30,scrollPagePercent:.8}}(jQuery,this);
</script>

<script type='text/javascript'>
<!--
function getObjectHeight(obj) {
  var result = 0;
  if(obj.offsetHeight){
    result = obj.offsetHeight;
  } else if (obj.clip && obj.clip.height){
    result = obj.clip.height;
  } else if (obj.style && obj.style.pixelHeight) {
    result = obj.style.pixelHeight;
  } else if (obj.scrollHeight) {
    result = obj.scrollHeight;
  }
  return strToInt(result);
}

function getElementStyle(obj,IEStyleProp,CSSStyleProp) {
  if(obj.currentStyle){
    return obj.currentStyle[IEStyleProp];
  } else if (window.getComputedStyle) {
    return window.getComputedStyle(obj,'').getPropertyValue(CSSStyleProp);
  } else if (document.defaultView.getComputedStyle) {
    return document.defaultView.getComputedStyle(obj,'').getPropertyValue(CSSStyleProp);
  }
  return '';
}

function getPlayerTag(url) {
  var playerWidth = 150;
  var playerHeightMovie = 120;
  var playerHeightSound = 45;
  var playerHeight = playerHeightMovie;
  var fileExtension = url.replace(/^.*\\./,'');
  var tag;
  if(fileExtension == 'mp3' || fileExtension == 'asf' || fileExtension == 'wma' || fileExtension == 'wav' || fileExtension == 'aiff' || fileExtension == 'mpg' || fileExtension == 'mpeg' || fileExtension == 'avi'){
    if(fileExtension == 'mp3' || fileExtension == 'wav'){
      playerHeight = playerHeightSound;
    }
    tag = '<OBJECT CLASSID=\"CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95\" '
      + 'WIDTH=\"' + playerWidth + '\" '
      + 'HEIGHT=\"' + playerHeight + '\" '
      + 'ALIGN=\"middle\" '
      + 'STANDBY=\"Loading Microsoft Windows Media Player components...\" '
      + 'CODEBASE=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112\" '
      + 'TYPE=\"application/x-oleobject\">'
      + '<PARAM NAME=\"AutoStart\" VALUE=\"false\">'
      + '<PARAM NAME=\"FileName\" VALUE=\"' + url + '\">'
      + '<PARAM NAME=\"ShowControls\" VALUE=\"true\">'
      + '<PARAM NAME=\"ShowStatusBar\" VALUE=\"false\">'
      + '<EMBED WIDTH=\"' + playerWidth + '\" HEIGHT=\"' + playerHeight + '\" SRC=\"' + url + '\" '
      + 'ALIGN=\"middle\" AUTOSTART=\"0\" SHOWCONTROLS=\"1 SHOWSTATUSBAR=\"0\" TYPE=\"application/x-mplayer2\" PLUGINSPAGE=\"http://www.microsoft.com/Windows/MediaPlayer/\" />'
      + '</OBJECT>';
  } else if(fileExtension == 'qt' || fileExtension == 'mov'){
    tag = '<OBJECT CLASSID=\"CLSID:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" '
      + 'WIDTH=\"' + playerWidth + '\" '
      + 'HEIGHT=\"' + playerHeight + '\" '
      + 'ALIGN=\"middle\" '
      + 'STANDBY=\"Loading QuickTime Player components...\" ENABLEJAVASCRIPT=\"true\" TYPE=\"video/quicktime\" '
      + 'CODEBASE=\"http://www.apple.com/qtactivex/qtplugin.cab\">'
      + '<PARAM NAME=\"AutoPlay\" VALUE=\"false\">'
      + '<PARAM NAME=\"Src\" VALUE=\"',url,'\">'
      + '<PARAM NAME=\"Controller\" VALUE=\"true\">'
      + '<EMBED WIDTH=\"' + playerWidth + '\" HEIGHT=\"' + playerHeight + '\" SRC=\"' + url + '\" '
      + 'ALIGN=\"middle\" AUTOPLAY=\"false\" CONTROLLER=\"true\" TYPE=\"video/quicktime\" ENABLEJAVASCRIPT=\"true\" '
      + 'PLUGINSPAGE=\"http://www.apple.com/quicktime/download/\" />'
      + '</OBJECT>';
  } else if(fileExtension == 'rm'){
    tag = '<OBJECT CLASSID=\"CLSID:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" '
      + 'WIDTH=\"' + playerWidth + '\" '
      + 'HEIGHT=\"' + playerHeight + '\" '
      + 'ALIGN=\"middle\">'
      + '<PARAM NAME=\"AutoStart\" VALUE=\"false\">'
      + '<PARAM NAME=\"Src\" VALUE=\"' + url + '\">'
      + '<PARAM NAME=\"Console\" VALUE=\"oneyhkplayerdiv9\">'
      + '<PARAM NAME=\"Controls\" VALUE=\"imagewindow\">'
      + '<EMBED WIDTH=\"' + playerWidth + '\" '
      + 'HEIGHT=\"' + playerHeight + '\" '
      + 'ALIGN=\"middle\" AUTOSTART=\"false\" CONTROLS=\"imagewindow\" CONSOLE=\"oneyhkplayerdiv9\" SRC=\"' + url + '\" '
      + 'TYPE=\"audio/x-pn-realaudio-plugin\" PLUGINSPAGE=\"http://www.real.com/\" />'
      + '</OBJECT>';
  } else if(fileExtension == 'swf'){
    tag = '<OBJECT CLASSID=\"CLSID:D27CDB6E-AE6D-11CF-96B8-444553540000\" '
      + 'WIDTH=\"' + playerWidth + '\" '
      + 'HEIGHT=\"' + playerHeight + '\" '
      + 'ALIGN=\"middle\" TYPE=\"application/x-oleobject\">'
      + '<PARAM NAME=\"MOVIE\" VALUE=\"' + url + '\">'
      + '<PARAM NAME=\"SWLIVECONNECT\" VALUE=\"true\">'
      + '<PARAM NAME=\"PLAY\" VALUE=\"false\">'
      + '<PARAM NAME=\"LOOP\" VALUE=\"false\">'
      + '<PARAM NAME=\"MENU\" VALUE=\"false\">'
      + '<PARAM NAME=\"QUALITY\" VALUE=\"high\">'
      + '<PARAM NAME=\"BGCOLOR\" VALUE=\"#FFFFFF\">'
      + '<PARAM NAME=\"FLASHVARS\" VALUE=\"\">'
      + '<PARAM NAME=\"SCALE\" VALUE=\"default\">'
      + '<PARAM NAME=\"WMODE\" VALUE=\"window\">'
      + '<PARAM NAME=\"ALLOWSCRIPTACCESS\" VALUE=\"sameDomain\">'
      + '<EMBED WIDTH=\"' + playerWidth + '\" HEIGHT=\"' + playerHeight + '\" ALIGN=\"middle\" TYPE=\"application/x-shockwave-flash\" '
      + 'SRC=\"' + url + '\" SWLIVECONNECT=\"true\" PLAY=\"false\" LOOP=\"false\" '
      + 'MENU=\"false\" QUALITY=\"high\" BGCOLOR=\"#FFFFFF\" FLASHVARS=\"\" SCALE=\"default\" WMODE=\"window\" ALLOWSCRIPTACCESS=\"sameDomain\" '
      + 'PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\" /></OBJECT>';
  } else {
    if(url.indexOf('youtube')){
      //var pos1 = url.indexOf('v=') + 2;
      //var pos2 = url.indexOf('&', pos2);
      //var youtube_url = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.youtube.com/embed/' + url.substring(pos1, pos2);
      youtube_url = url.replace('watch?v=','embed/');
      tag = '<IFRAME '
        + 'WIDTH=\"' + playerWidth + '\" '
        + 'HEIGHT=\"' + playerHeight + '\" '
        + 'SRC=\"' + youtube_url + '\" '
        + 'FRAMEBORDER=\"0\" allowfullscreen> '
        + '</IFRAME>';
    }
  }
  return tag;
}

function strToInt(str) {
  num = parseInt(str);
  if(isNaN(num)){
    return 0;
  } else if(!num) {
    return 0;
  }
    return num;
}

var autoscrollTimer;
function init() {
  var anchorTarget = '_blank';
  var itemPodcast = 'off';

  var containerObj = document.getElementById('container');
  var headerObj = document.getElementById('header') ? document.getElementById('header') : "";
  var contentObj = document.getElementById('content');
  var footerObj = document.getElementById('footer');

  var totalHeight = getObjectHeight(containerObj);
  var borderSize = 0 * 2;
  var headerHeight = headerObj ? getObjectHeight(headerObj) + strToInt(getElementStyle(headerObj,'marginTop','margin-top')) + strToInt(getElementStyle(headerObj,'marginBottom','margin-bottom')) : 0;
  var contentMargin = strToInt(getElementStyle(contentObj,'marginTop','margin-top')) + strToInt(getElementStyle(contentObj,'marginBottom','margin-bottom'))
  var contentPadding = strToInt(getElementStyle(contentObj,'paddingTop','padding-top')) + strToInt(getElementStyle(contentObj,'paddingBottom','padding-bottom'));
  var footerHeight = getObjectHeight(footerObj) + strToInt(getElementStyle(footerObj,'marginTop','margin-top')) + strToInt(getElementStyle(footerObj,'marginBottom','margin-bottom'));
  var contentHeight = totalHeight - borderSize - headerHeight - contentMargin - contentPadding - footerHeight;
  var tmpHeight = contentHeight - contentPadding;

  var divElem = document.getElementsByTagName('div');
  var noneFlag = 0;
  var itemCounter = 1;
  for(var i=0; i < divElem.length; i++){
    if(divElem[i].className == 'feed_item'){
      if(!noneFlag){
        for(var j=0; j < divElem[i].childNodes.length; j++) {
          if(divElem[i].childNodes[j].className == 'feed_item_title'){
          } else if(divElem[i].childNodes[j].className == 'feed_item_podcast') {
            if(itemPodcast == 'player'){
              divElem[i].childNodes[j].innerHTML = getPlayerTag(divElem[i].childNodes[j].childNodes[0].href) ? getPlayerTag(divElem[i].childNodes[j].childNodes[0].href) : divElem[i].childNodes[j].innerHTML;
            }
          } 
        }
        var tmpObjHeight = getObjectHeight(divElem[i]);
        var tmpMarginTop = strToInt(getElementStyle(divElem[i],'marginTop','margin-top'));
        var tmpMarginBottom = strToInt(getElementStyle(divElem[i],'marginBottom','margin-bottom'));
        tmpHeight -= tmpObjHeight - tmpMarginTop;
        if(tmpHeight < 0 && itemCounter != 1){
          if ('' != 'on_scrollbar'  &&
              '' != 'on_flexcroll'  &&
              'on' != 'on' &&
             'on' == 'off') {
            divElem[i].style.display = 'none';
            noneFlag = 1;
          }
        }
        tmpHeight -= tmpMarginBottom;
      } else {
        divElem[i].style.display = 'none';
      }
      itemCounter++;
    }
  }
  contentObj.style.height = contentHeight + 'px';

  var aElem = document.getElementsByTagName('a');
  for(var i=0; i < aElem.length; i++){
    aElem[i].target = anchorTarget;
  }
        autoscrollOn();
    $("#container").hover(autoscrollOff, autoscrollOn);
  
            containerObj.style.height = parseInt(containerObj.style.height);
      $('.scroll-pane').height(parseInt(containerObj.style.height) - headerHeight);
      $('.scroll-pane').jScrollPane({contentWidth: '0px'});
      
    $('.scroll-pane').jScrollPane().data().jsp.scrollTo(0,0);
  $('.scroll-pane').jScrollPane().data().jsp.destroy();
    
}


function autoscrollOff(){
  clearInterval(autoscrollTimer);
    $('.scroll-pane').jScrollPane({contentWidth: '0px'});
  }
function autoscrollOn(){
  autoscrollTimer = setInterval("autoscroll()", 3 * 1000);
    $('.scroll-pane').jScrollPane({contentWidth: '0px'}).data().jsp.scrollTo(0,0);
  $('.scroll-pane').jScrollPane({contentWidth: '0px'}).data().jsp.destroy();
  }

var cnt = 0;
var mt = 0;
function autoscroll() {
    var item = $(".feed_item").eq(0);
  var item_height = item.outerHeight(true);
  $('#itemlist').animate(
    { 'marginTop':"-"+item_height+"px", },
    {
        complete:function(){
            var item = $(".feed_item:first");
            item.appendTo('#itemlist');
            $('#itemlist').css({'marginTop':'0px'});
        },
        duration: 800,
    }
  );
  }


window.onload = init;
-->
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<!-- off cache -->
<div id="container">
    <!--<div id="header"><div class="feed_title"><a href="#" target="_blank" rel="nofollow">Recent Updates</a></div></div>-->

<div id="content" class="scroll-pane">

  <div id="itemlist">

  <div class="feed_item">
    <div class="feed_item_title"><a href="" target="_blank" rel="nofollow">State repression in Egypt worst in decades, says act...</a></div>
          <div class="feed_item_description">
            Campaigning journalist Hossam Bahgat speaks out amid further crackdown as fifth anniversary of uprising approaches The scale of state repression in...    </div>
        <div class="feed_item_date">Jan 24, 2016  5:37:48 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/us-news/2016/jan/24/east-coast-blizzard-states-lift-travel-bans-new-york-philadelphia-winter-storm" target="_blank" rel="nofollow">East coast blizzard: a sense of relief as states dig...</a></div>
          <div class="feed_item_description">
            Officials survey the damage after cities were at a standstill throughout the weekend, but ‘Snowzilla’ didn’t quite reach the scale of past supersto...    </div>
        <div class="feed_item_date">Jan 24, 2016  7:17:40 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/isis-video-paris-attackers-iraq-syria-david-cameron" target="_blank" rel="nofollow">Isis video threatening UK claims to show Paris attac...</a></div>
          <div class="feed_item_description">
            If confirmed, video containing beheadings and target practice and showing prime minister David Cameron would establish coordination with group A vi...    </div>
        <div class="feed_item_date">Jan 25, 2016 12:48:43 AM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/society/2016/jan/24/protests-held-italy-support-legalising-same-sex-unions-gay-marriage" target="_blank" rel="nofollow">'We don’t have more time': Italy approaches defining...</a></div>
          <div class="feed_item_description">
            Senate due to vote on whether to change law in only western European country not yet recognising civil unions or gay marriage Hundreds of thousands...    </div>
        <div class="feed_item_date">Jan 24, 2016  3:56:41 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/centre-right-candidate-wins-portugals-presidential-election" target="_blank" rel="nofollow">Centre-right candidate wins Portugal's presidential ...</a></div>
          <div class="feed_item_description">
            Marcelo Rebelo de Sousa, TV pundit and law professor, gains 52.4% of the vote to secure ceremonial post A centre-right candidate has recorded an em...    </div>
        <div class="feed_item_date">Jan 24, 2016 10:56:19 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/us-news/2016/jan/24/earthquake-hits-alaska-overnight" target="_blank" rel="nofollow">Magnitude 7.1 earthquake hits Alaska, one house expl...</a></div>
          <div class="feed_item_description">
            No reported injuries or widespread damage reported after earthquake struck around 1.30am in Sunday A magnitude-7.1 earthquake knocked items off she...    </div>
        <div class="feed_item_date">Jan 24, 2016  9:51:46 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/norway-halts-return-of-asylum-seekers-who-entered-via-russia" target="_blank" rel="nofollow">Norway's asylum policy in chaos amid Russian intrans...</a></div>
          <div class="feed_item_description">
            Human rights groups and church hit out at Norwegian government clampdown as Russian security concerns halt expulsions Norway’s attempt to deport hu...    </div>
        <div class="feed_item_date">Jan 24, 2016  4:48:14 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/sport/2016/jan/24/adidas-iaaf-end-sponsorship-report" target="_blank" rel="nofollow">Adidas to end sponsorship of IAAF over doping scanda...</a></div>
          <div class="feed_item_description">
            • German sportswear giant had signed a contract until 2019 • BBC reports decision could cost governing body millions of dollars Adidas has written ...    </div>
        <div class="feed_item_date">Jan 24, 2016 10:31:00 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/shimon-peres-taken-to-hospital-israel-president-former" target="_blank" rel="nofollow">Shimon Peres taken to hospital with chest pains</a></div>
          <div class="feed_item_description">
            Former Israeli president and PM with long career in politics was discharged from hospital last week after heart attack Israel’s former president Sh...    </div>
        <div class="feed_item_date">Jan 24, 2016  7:55:18 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/search-for-us-workers-kidnapped-in-baghdad-focuses-on-sadr-city" target="_blank" rel="nofollow">Search for US workers kidnapped in Baghdad focuses o...</a></div>
          <div class="feed_item_description">
            Iraqi intelligence officers say efforts to find three contractors are concentrated in the predominantly Shia neighbourhood The search for three US ...    </div>
        <div class="feed_item_date">Jan 24, 2016  6:37:35 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/politics/2016/jan/25/anger-at-lynton-crosbys-uk-australian-of-the-year-award-over-tobacco-lobby-links" target="_blank" rel="nofollow">Anger at Lynton Crosby's UK Australian of the Year a...</a></div>
          <div class="feed_item_description">
            Public Health Association of Australia CEO is ‘flabbergasted’ at Crosby’s honour for role in running Conservative party’s election campaign The chi...    </div>
        <div class="feed_item_date">Jan 24, 2016  7:16:01 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/europes-big-banks-remain-wary-doing-business-with-iran" target="_blank" rel="nofollow">Europe's big banks remain wary of doing business wit...</a></div>
          <div class="feed_item_description">
            Sanctions have been lifted but uncertainty over US authorities’ stance means banks are reluctant to handle payments A week after the lifting of san...    </div>
        <div class="feed_item_date">Jan 24, 2016  6:54:51 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/us-news/2016/jan/24/denver-jail-death-homeless-man-police-restraint-tactic" target="_blank" rel="nofollow">Denver jail death shines light on problems with comm...</a></div>
          <div class="feed_item_description">
            Officials release surveillance footage of homeless man who died because of ‘complications of positional asphyxia’, according to the medical examine...    </div>
        <div class="feed_item_date">Jan 24, 2016  9:12:40 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/tv-pundit-marcelo-rebelo-de-sousa-favourite-to-win-portuguese-presidential-election" target="_blank" rel="nofollow">TV pundit favourite to win Portuguese presidential e...</a></div>
          <div class="feed_item_description">
            Voting begins in ballot that is expected to result in Marcelo Rebelo de Sousa taking ceremonial post that has become crucial A well-known TV politi...    </div>
        <div class="feed_item_date">Jan 24, 2016  6:50:03 PM</div>
      </div>
  <div class="feed_item">
    <div class="feed_item_title"><a href="http://www.theguardian.com/world/2016/jan/24/japan-born-sumo-wrestler-kotoshogiku-first-in-10-years-to-win-tournament" target="_blank" rel="nofollow">Japan's decade-long wait for sumo champion comes to ...</a></div>
          <div class="feed_item_description">
            Kotoshogiku, 31, claims Emperor’s Cup in what may mark beginning of challenge to years of domination by Mongolian fighters Japan’s agonising wait f...    </div>
        <div class="feed_item_date">Jan 24, 2016  3:59:11 PM</div>
      </div>



  </div><!--#itemlist-->

</div><!--#content and #flexcroll-->
<div id="footer"></div>

</div><!--#container-->

</body>
</html>
