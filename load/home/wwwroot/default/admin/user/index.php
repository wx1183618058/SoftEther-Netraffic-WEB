<?php
include("../system.php");

$u = $_GET['user'];
$p = $_GET['pass'];
$res=db(_openvpn_)->where(array(_iuser_=>$u,_ipass_=>$p))->find();
if(!$res){
	header('no this user');
	exit;
}
?>
<html class=" "><head><title>个人中心</title><!-- <base href="javascript:void(0)/"> --><meta charset="utf-8"><meta content="text/html; charset=utf-8" http-equiv="Content-Type"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="renderer" content="webkit"><meta http-equiv="Cache-Control" content="no-siteapp"><meta content="Table" name="author"><meta name="copyright" content="Copyright (c) 2010-2016 MaiZuo."><meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="blank" name="apple-mobile-web-app-status-bar-style"><meta name="apple-touch-fullscreen" content="yes"><meta content="telephone=no" name="format-detection"><meta name="description" content=""><style type="text/css">/* Slider */
.slick-slider
{
    position: relative;

    display: block;

    -moz-box-sizing: border-box;
         box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}</style><style type="text/css">@charset 'UTF-8';
/* Slider */
.slick-loading .slick-list
{
    background: #fff url(http://static.m.maizuo.com/v4/static/app/asset/c5cd7f5300576ab4c88202b42f6ded62.gif) center center no-repeat;
}

/* Icons */
@font-face
{
    font-family: 'slick';
    font-weight: normal;
    font-style: normal;

    src: url(http://static.m.maizuo.com/v4/static/app/asset/ced611daf7709cc778da928fec876475.eot);
    src: url(http://static.m.maizuo.com/v4/static/app/asset/ced611daf7709cc778da928fec876475.eot?#iefix) format('embedded-opentype'), url(http://static.m.maizuo.com/v4/static/app/asset/b7c9e1e479de3b53f1e4e30ebac2403a.woff) format('woff'), url(http://static.m.maizuo.com/v4/static/app/asset/d41f55a78e6f49a5512878df1737e58a.ttf) format('truetype'), url(http://static.m.maizuo.com/v4/static/app/asset/f97e3bbf73254b0112091d0192f17aec.svg#slick) format('svg');
}
/* Arrows */
.slick-prev,
.slick-next
{
    font-size: 0;
    line-height: 0;

    position: absolute;
    top: 50%;

    display: block;

    width: 20px;
    height: 20px;
    margin-top: -10px;
    padding: 0;

    cursor: pointer;

    color: transparent;
    border: none;
    outline: none;
    background: transparent;
}
.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus
{
    color: transparent;
    outline: none;
    background: transparent;
}
.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before
{
    opacity: 1;
}
.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before
{
    opacity: .25;
}

.slick-prev:before,
.slick-next:before
{
    font-family: 'slick';
    font-size: 20px;
    line-height: 1;

    opacity: .75;
    color: white;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.slick-prev
{
    left: -25px;
}
[dir='rtl'] .slick-prev
{
    right: -25px;
    left: auto;
}
.slick-prev:before
{
    content: '\2190';
}
[dir='rtl'] .slick-prev:before
{
    content: '\2192';
}

.slick-next
{
    right: -25px;
}
[dir='rtl'] .slick-next
{
    right: auto;
    left: -25px;
}
.slick-next:before
{
    content: '\2192';
}
[dir='rtl'] .slick-next:before
{
    content: '\2190';
}

/* Dots */
.slick-slider
{
    margin-bottom: 30px;
}

.slick-dots
{
    position: absolute;
    bottom: -45px;

    display: block;

    width: 100%;
    padding: 0;

    list-style: none;

    text-align: center;
}
.slick-dots li
{
    position: relative;

    display: inline-block;

    width: 20px;
    height: 20px;
    margin: 0 5px;
    padding: 0;

    cursor: pointer;
}
.slick-dots li button
{
    font-size: 0;
    line-height: 0;

    display: block;

    width: 20px;
    height: 20px;
    padding: 5px;

    cursor: pointer;

    color: transparent;
    border: 0;
    outline: none;
    background: transparent;
}
.slick-dots li button:hover,
.slick-dots li button:focus
{
    outline: none;
}
.slick-dots li button:hover:before,
.slick-dots li button:focus:before
{
    opacity: 1;
}
.slick-dots li button:before
{
    font-family: 'slick';
    font-size: 6px;
    line-height: 20px;

    position: absolute;
    top: 0;
    left: 0;

    width: 20px;
    height: 20px;

    content: '\2022';
    text-align: center;

    opacity: .25;
    color: black;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-dots li.slick-active button:before
{
    opacity: .75;
    color: black;
}
</style><style type="text/css">/*!
 * Bootstrap v3.3.6 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */
html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}
body {
  margin: 0;
}
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
menu,
nav,
section,
summary {
  display: block;
}
audio,
canvas,
progress,
video {
  display: inline-block;
  vertical-align: baseline;
}
audio:not([controls]) {
  display: none;
  height: 0;
}
[hidden],
template {
  display: none;
}
a {
  background-color: transparent;
}
a:active,
a:hover {
  outline: 0;
}
abbr[title] {
  border-bottom: 1px dotted;
}
b,
strong {
  font-weight: bold;
}
dfn {
  font-style: italic;
}
h1 {
  margin: .67em 0;
  font-size: 2em;
}
mark {
  color: #000;
  background: #ff0;
}
small {
  font-size: 80%;
}
sub,
sup {
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline;
}
sup {
  top: -.5em;
}
sub {
  bottom: -.25em;
}
img {
  border: 0;
}
svg:not(:root) {
  overflow: hidden;
}
figure {
  margin: 1em 40px;
}
hr {
  height: 0;
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
}
pre {
  overflow: auto;
}
code,
kbd,
pre,
samp {
  font-family: monospace, monospace;
  font-size: 1em;
}
button,
input,
optgroup,
select,
textarea {
  margin: 0;
  font: inherit;
  color: inherit;
}
button {
  overflow: visible;
}
button,
select {
  text-transform: none;
}
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer;
}
button[disabled],
html input[disabled] {
  cursor: default;
}
button::-moz-focus-inner,
input::-moz-focus-inner {
  padding: 0;
  border: 0;
}
input {
  line-height: normal;
}
input[type="checkbox"],
input[type="radio"] {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 0;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}
input[type="search"] {
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
  -webkit-appearance: textfield;
}
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}
fieldset {
  padding: .35em .625em .75em;
  margin: 0 2px;
  border: 1px solid #c0c0c0;
}
legend {
  padding: 0;
  border: 0;
}
textarea {
  overflow: auto;
}
optgroup {
  font-weight: bold;
}
table {
  border-spacing: 0;
  border-collapse: collapse;
}
td,
th {
  padding: 0;
}
/*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
@media print {
  *,
  *:before,
  *:after {
    color: #000 !important;
    text-shadow: none !important;
    background: transparent !important;
    -webkit-box-shadow: none !important;
            box-shadow: none !important;
  }
  a,
  a:visited {
    text-decoration: underline;
  }
  a[href]:after {
    content: " (" attr(href) ")";
  }
  abbr[title]:after {
    content: " (" attr(title) ")";
  }
  a[href^="#"]:after,
  a[href^="javascript:"]:after {
    content: "";
  }
  pre,
  blockquote {
    border: 1px solid #999;

    page-break-inside: avoid;
  }
  thead {
    display: table-header-group;
  }
  tr,
  img {
    page-break-inside: avoid;
  }
  img {
    max-width: 100% !important;
  }
  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }
  h2,
  h3 {
    page-break-after: avoid;
  }
  .navbar {
    display: none;
  }
  .btn > .caret,
  .dropup > .btn > .caret {
    border-top-color: #000 !important;
  }
  .label {
    border: 1px solid #000;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table td,
  .table th {
    background-color: #fff !important;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }
}
@font-face {
  font-family: 'Glyphicons Halflings';

  src: url(http://static.m.maizuo.com/v4/static/app/asset/f4769f9bdb7466be65088239c12046d1.eot);
  src: url(http://static.m.maizuo.com/v4/static/app/asset/f4769f9bdb7466be65088239c12046d1.eot?#iefix) format('embedded-opentype'), url(http://static.m.maizuo.com/v4/static/app/asset/448c34a56d699c29117adc64c43affeb.woff2) format('woff2'), url(http://static.m.maizuo.com/v4/static/app/asset/fa2772327f55d8198301fdb8bcfc8158.woff) format('woff'), url(http://static.m.maizuo.com/v4/static/app/asset/e18bbf611f2a2e43afc071aa2f4e1512.ttf) format('truetype'), url(http://static.m.maizuo.com/v4/static/app/asset/89889688147bd7575d6327160d64e760.svg#glyphicons_halflingsregular) format('svg');
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: normal;
  line-height: 1;

  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.glyphicon-asterisk:before {
  content: "*";
}
.glyphicon-plus:before {
  content: "+";
}
.glyphicon-euro:before,
.glyphicon-eur:before {
  content: "\20AC";
}
.glyphicon-minus:before {
  content: "\2212";
}
.glyphicon-cloud:before {
  content: "\2601";
}
.glyphicon-envelope:before {
  content: "\2709";
}
.glyphicon-pencil:before {
  content: "\270F";
}
.glyphicon-glass:before {
  content: "\E001";
}
.glyphicon-music:before {
  content: "\E002";
}
.glyphicon-search:before {
  content: "\E003";
}
.glyphicon-heart:before {
  content: "\E005";
}
.glyphicon-star:before {
  content: "\E006";
}
.glyphicon-star-empty:before {
  content: "\E007";
}
.glyphicon-user:before {
  content: "\E008";
}
.glyphicon-film:before {
  content: "\E009";
}
.glyphicon-th-large:before {
  content: "\E010";
}
.glyphicon-th:before {
  content: "\E011";
}
.glyphicon-th-list:before {
  content: "\E012";
}
.glyphicon-ok:before {
  content: "\E013";
}
.glyphicon-remove:before {
  content: "\E014";
}
.glyphicon-zoom-in:before {
  content: "\E015";
}
.glyphicon-zoom-out:before {
  content: "\E016";
}
.glyphicon-off:before {
  content: "\E017";
}
.glyphicon-signal:before {
  content: "\E018";
}
.glyphicon-cog:before {
  content: "\E019";
}
.glyphicon-trash:before {
  content: "\E020";
}
.glyphicon-home:before {
  content: "\E021";
}
.glyphicon-file:before {
  content: "\E022";
}
.glyphicon-time:before {
  content: "\E023";
}
.glyphicon-road:before {
  content: "\E024";
}
.glyphicon-download-alt:before {
  content: "\E025";
}
.glyphicon-download:before {
  content: "\E026";
}
.glyphicon-upload:before {
  content: "\E027";
}
.glyphicon-inbox:before {
  content: "\E028";
}
.glyphicon-play-circle:before {
  content: "\E029";
}
.glyphicon-repeat:before {
  content: "\E030";
}
.glyphicon-refresh:before {
  content: "\E031";
}
.glyphicon-list-alt:before {
  content: "\E032";
}
.glyphicon-lock:before {
  content: "\E033";
}
.glyphicon-flag:before {
  content: "\E034";
}
.glyphicon-headphones:before {
  content: "\E035";
}
.glyphicon-volume-off:before {
  content: "\E036";
}
.glyphicon-volume-down:before {
  content: "\E037";
}
.glyphicon-volume-up:before {
  content: "\E038";
}
.glyphicon-qrcode:before {
  content: "\E039";
}
.glyphicon-barcode:before {
  content: "\E040";
}
.glyphicon-tag:before {
  content: "\E041";
}
.glyphicon-tags:before {
  content: "\E042";
}
.glyphicon-book:before {
  content: "\E043";
}
.glyphicon-bookmark:before {
  content: "\E044";
}
.glyphicon-print:before {
  content: "\E045";
}
.glyphicon-camera:before {
  content: "\E046";
}
.glyphicon-font:before {
  content: "\E047";
}
.glyphicon-bold:before {
  content: "\E048";
}
.glyphicon-italic:before {
  content: "\E049";
}
.glyphicon-text-height:before {
  content: "\E050";
}
.glyphicon-text-width:before {
  content: "\E051";
}
.glyphicon-align-left:before {
  content: "\E052";
}
.glyphicon-align-center:before {
  content: "\E053";
}
.glyphicon-align-right:before {
  content: "\E054";
}
.glyphicon-align-justify:before {
  content: "\E055";
}
.glyphicon-list:before {
  content: "\E056";
}
.glyphicon-indent-left:before {
  content: "\E057";
}
.glyphicon-indent-right:before {
  content: "\E058";
}
.glyphicon-facetime-video:before {
  content: "\E059";
}
.glyphicon-picture:before {
  content: "\E060";
}
.glyphicon-map-marker:before {
  content: "\E062";
}
.glyphicon-adjust:before {
  content: "\E063";
}
.glyphicon-tint:before {
  content: "\E064";
}
.glyphicon-edit:before {
  content: "\E065";
}
.glyphicon-share:before {
  content: "\E066";
}
.glyphicon-check:before {
  content: "\E067";
}
.glyphicon-move:before {
  content: "\E068";
}
.glyphicon-step-backward:before {
  content: "\E069";
}
.glyphicon-fast-backward:before {
  content: "\E070";
}
.glyphicon-backward:before {
  content: "\E071";
}
.glyphicon-play:before {
  content: "\E072";
}
.glyphicon-pause:before {
  content: "\E073";
}
.glyphicon-stop:before {
  content: "\E074";
}
.glyphicon-forward:before {
  content: "\E075";
}
.glyphicon-fast-forward:before {
  content: "\E076";
}
.glyphicon-step-forward:before {
  content: "\E077";
}
.glyphicon-eject:before {
  content: "\E078";
}
.glyphicon-chevron-left:before {
  content: "\E079";
}
.glyphicon-chevron-right:before {
  content: "\E080";
}
.glyphicon-plus-sign:before {
  content: "\E081";
}
.glyphicon-minus-sign:before {
  content: "\E082";
}
.glyphicon-remove-sign:before {
  content: "\E083";
}
.glyphicon-ok-sign:before {
  content: "\E084";
}
.glyphicon-question-sign:before {
  content: "\E085";
}
.glyphicon-info-sign:before {
  content: "\E086";
}
.glyphicon-screenshot:before {
  content: "\E087";
}
.glyphicon-remove-circle:before {
  content: "\E088";
}
.glyphicon-ok-circle:before {
  content: "\E089";
}
.glyphicon-ban-circle:before {
  content: "\E090";
}
.glyphicon-arrow-left:before {
  content: "\E091";
}
.glyphicon-arrow-right:before {
  content: "\E092";
}
.glyphicon-arrow-up:before {
  content: "\E093";
}
.glyphicon-arrow-down:before {
  content: "\E094";
}
.glyphicon-share-alt:before {
  content: "\E095";
}
.glyphicon-resize-full:before {
  content: "\E096";
}
.glyphicon-resize-small:before {
  content: "\E097";
}
.glyphicon-exclamation-sign:before {
  content: "\E101";
}
.glyphicon-gift:before {
  content: "\E102";
}
.glyphicon-leaf:before {
  content: "\E103";
}
.glyphicon-fire:before {
  content: "\E104";
}
.glyphicon-eye-open:before {
  content: "\E105";
}
.glyphicon-eye-close:before {
  content: "\E106";
}
.glyphicon-warning-sign:before {
  content: "\E107";
}
.glyphicon-plane:before {
  content: "\E108";
}
.glyphicon-calendar:before {
  content: "\E109";
}
.glyphicon-random:before {
  content: "\E110";
}
.glyphicon-comment:before {
  content: "\E111";
}
.glyphicon-magnet:before {
  content: "\E112";
}
.glyphicon-chevron-up:before {
  content: "\E113";
}
.glyphicon-chevron-down:before {
  content: "\E114";
}
.glyphicon-retweet:before {
  content: "\E115";
}
.glyphicon-shopping-cart:before {
  content: "\E116";
}
.glyphicon-folder-close:before {
  content: "\E117";
}
.glyphicon-folder-open:before {
  content: "\E118";
}
.glyphicon-resize-vertical:before {
  content: "\E119";
}
.glyphicon-resize-horizontal:before {
  content: "\E120";
}
.glyphicon-hdd:before {
  content: "\E121";
}
.glyphicon-bullhorn:before {
  content: "\E122";
}
.glyphicon-bell:before {
  content: "\E123";
}
.glyphicon-certificate:before {
  content: "\E124";
}
.glyphicon-thumbs-up:before {
  content: "\E125";
}
.glyphicon-thumbs-down:before {
  content: "\E126";
}
.glyphicon-hand-right:before {
  content: "\E127";
}
.glyphicon-hand-left:before {
  content: "\E128";
}
.glyphicon-hand-up:before {
  content: "\E129";
}
.glyphicon-hand-down:before {
  content: "\E130";
}
.glyphicon-circle-arrow-right:before {
  content: "\E131";
}
.glyphicon-circle-arrow-left:before {
  content: "\E132";
}
.glyphicon-circle-arrow-up:before {
  content: "\E133";
}
.glyphicon-circle-arrow-down:before {
  content: "\E134";
}
.glyphicon-globe:before {
  content: "\E135";
}
.glyphicon-wrench:before {
  content: "\E136";
}
.glyphicon-tasks:before {
  content: "\E137";
}
.glyphicon-filter:before {
  content: "\E138";
}
.glyphicon-briefcase:before {
  content: "\E139";
}
.glyphicon-fullscreen:before {
  content: "\E140";
}
.glyphicon-dashboard:before {
  content: "\E141";
}
.glyphicon-paperclip:before {
  content: "\E142";
}
.glyphicon-heart-empty:before {
  content: "\E143";
}
.glyphicon-link:before {
  content: "\E144";
}
.glyphicon-phone:before {
  content: "\E145";
}
.glyphicon-pushpin:before {
  content: "\E146";
}
.glyphicon-usd:before {
  content: "\E148";
}
.glyphicon-gbp:before {
  content: "\E149";
}
.glyphicon-sort:before {
  content: "\E150";
}
.glyphicon-sort-by-alphabet:before {
  content: "\E151";
}
.glyphicon-sort-by-alphabet-alt:before {
  content: "\E152";
}
.glyphicon-sort-by-order:before {
  content: "\E153";
}
.glyphicon-sort-by-order-alt:before {
  content: "\E154";
}
.glyphicon-sort-by-attributes:before {
  content: "\E155";
}
.glyphicon-sort-by-attributes-alt:before {
  content: "\E156";
}
.glyphicon-unchecked:before {
  content: "\E157";
}
.glyphicon-expand:before {
  content: "\E158";
}
.glyphicon-collapse-down:before {
  content: "\E159";
}
.glyphicon-collapse-up:before {
  content: "\E160";
}
.glyphicon-log-in:before {
  content: "\E161";
}
.glyphicon-flash:before {
  content: "\E162";
}
.glyphicon-log-out:before {
  content: "\E163";
}
.glyphicon-new-window:before {
  content: "\E164";
}
.glyphicon-record:before {
  content: "\E165";
}
.glyphicon-save:before {
  content: "\E166";
}
.glyphicon-open:before {
  content: "\E167";
}
.glyphicon-saved:before {
  content: "\E168";
}
.glyphicon-import:before {
  content: "\E169";
}
.glyphicon-export:before {
  content: "\E170";
}
.glyphicon-send:before {
  content: "\E171";
}
.glyphicon-floppy-disk:before {
  content: "\E172";
}
.glyphicon-floppy-saved:before {
  content: "\E173";
}
.glyphicon-floppy-remove:before {
  content: "\E174";
}
.glyphicon-floppy-save:before {
  content: "\E175";
}
.glyphicon-floppy-open:before {
  content: "\E176";
}
.glyphicon-credit-card:before {
  content: "\E177";
}
.glyphicon-transfer:before {
  content: "\E178";
}
.glyphicon-cutlery:before {
  content: "\E179";
}
.glyphicon-header:before {
  content: "\E180";
}
.glyphicon-compressed:before {
  content: "\E181";
}
.glyphicon-earphone:before {
  content: "\E182";
}
.glyphicon-phone-alt:before {
  content: "\E183";
}
.glyphicon-tower:before {
  content: "\E184";
}
.glyphicon-stats:before {
  content: "\E185";
}
.glyphicon-sd-video:before {
  content: "\E186";
}
.glyphicon-hd-video:before {
  content: "\E187";
}
.glyphicon-subtitles:before {
  content: "\E188";
}
.glyphicon-sound-stereo:before {
  content: "\E189";
}
.glyphicon-sound-dolby:before {
  content: "\E190";
}
.glyphicon-sound-5-1:before {
  content: "\E191";
}
.glyphicon-sound-6-1:before {
  content: "\E192";
}
.glyphicon-sound-7-1:before {
  content: "\E193";
}
.glyphicon-copyright-mark:before {
  content: "\E194";
}
.glyphicon-registration-mark:before {
  content: "\E195";
}
.glyphicon-cloud-download:before {
  content: "\E197";
}
.glyphicon-cloud-upload:before {
  content: "\E198";
}
.glyphicon-tree-conifer:before {
  content: "\E199";
}
.glyphicon-tree-deciduous:before {
  content: "\E200";
}
.glyphicon-cd:before {
  content: "\E201";
}
.glyphicon-save-file:before {
  content: "\E202";
}
.glyphicon-open-file:before {
  content: "\E203";
}
.glyphicon-level-up:before {
  content: "\E204";
}
.glyphicon-copy:before {
  content: "\E205";
}
.glyphicon-paste:before {
  content: "\E206";
}
.glyphicon-alert:before {
  content: "\E209";
}
.glyphicon-equalizer:before {
  content: "\E210";
}
.glyphicon-king:before {
  content: "\E211";
}
.glyphicon-queen:before {
  content: "\E212";
}
.glyphicon-pawn:before {
  content: "\E213";
}
.glyphicon-bishop:before {
  content: "\E214";
}
.glyphicon-knight:before {
  content: "\E215";
}
.glyphicon-baby-formula:before {
  content: "\E216";
}
.glyphicon-tent:before {
  content: "\26FA";
}
.glyphicon-blackboard:before {
  content: "\E218";
}
.glyphicon-bed:before {
  content: "\E219";
}
.glyphicon-apple:before {
  content: "\F8FF";
}
.glyphicon-erase:before {
  content: "\E221";
}
.glyphicon-hourglass:before {
  content: "\231B";
}
.glyphicon-lamp:before {
  content: "\E223";
}
.glyphicon-duplicate:before {
  content: "\E224";
}
.glyphicon-piggy-bank:before {
  content: "\E225";
}
.glyphicon-scissors:before {
  content: "\E226";
}
.glyphicon-bitcoin:before {
  content: "\E227";
}
.glyphicon-btc:before {
  content: "\E227";
}
.glyphicon-xbt:before {
  content: "\E227";
}
.glyphicon-yen:before {
  content: "\A5";
}
.glyphicon-jpy:before {
  content: "\A5";
}
.glyphicon-ruble:before {
  content: "\20BD";
}
.glyphicon-rub:before {
  content: "\20BD";
}
.glyphicon-scale:before {
  content: "\E230";
}
.glyphicon-ice-lolly:before {
  content: "\E231";
}
.glyphicon-ice-lolly-tasted:before {
  content: "\E232";
}
.glyphicon-education:before {
  content: "\E233";
}
.glyphicon-option-horizontal:before {
  content: "\E234";
}
.glyphicon-option-vertical:before {
  content: "\E235";
}
.glyphicon-menu-hamburger:before {
  content: "\E236";
}
.glyphicon-modal-window:before {
  content: "\E237";
}
.glyphicon-oil:before {
  content: "\E238";
}
.glyphicon-grain:before {
  content: "\E239";
}
.glyphicon-sunglasses:before {
  content: "\E240";
}
.glyphicon-text-size:before {
  content: "\E241";
}
.glyphicon-text-color:before {
  content: "\E242";
}
.glyphicon-text-background:before {
  content: "\E243";
}
.glyphicon-object-align-top:before {
  content: "\E244";
}
.glyphicon-object-align-bottom:before {
  content: "\E245";
}
.glyphicon-object-align-horizontal:before {
  content: "\E246";
}
.glyphicon-object-align-left:before {
  content: "\E247";
}
.glyphicon-object-align-vertical:before {
  content: "\E248";
}
.glyphicon-object-align-right:before {
  content: "\E249";
}
.glyphicon-triangle-right:before {
  content: "\E250";
}
.glyphicon-triangle-left:before {
  content: "\E251";
}
.glyphicon-triangle-bottom:before {
  content: "\E252";
}
.glyphicon-triangle-top:before {
  content: "\E253";
}
.glyphicon-console:before {
  content: "\E254";
}
.glyphicon-superscript:before {
  content: "\E255";
}
.glyphicon-subscript:before {
  content: "\E256";
}
.glyphicon-menu-left:before {
  content: "\E257";
}
.glyphicon-menu-right:before {
  content: "\E258";
}
.glyphicon-menu-down:before {
  content: "\E259";
}
.glyphicon-menu-up:before {
  content: "\E260";
}
* {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
html {
  font-size: 10px;

  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
  background-color: #fff;
}
input,
button,
select,
textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}
a {
  color: #337ab7;
  text-decoration: none;
}
a:hover,
a:focus {
  color: #23527c;
  text-decoration: underline;
}
a:focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
figure {
  margin: 0;
}
img {
  vertical-align: middle;
}
.img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  max-width: 100%;
  height: auto;
}
.img-rounded {
  border-radius: 6px;
}
.img-thumbnail {
  display: inline-block;
  max-width: 100%;
  height: auto;
  padding: 4px;
  line-height: 1.42857143;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  -webkit-transition: all .2s ease-in-out;
       -o-transition: all .2s ease-in-out;
          transition: all .2s ease-in-out;
}
.img-circle {
  border-radius: 50%;
}
hr {
  margin-top: 20px;
  margin-bottom: 20px;
  border: 0;
  border-top: 1px solid #eee;
}
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}
.sr-only-focusable:active,
.sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  clip: auto;
}
[role="button"] {
  cursor: pointer;
}
h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  font-family: inherit;
  font-weight: 500;
  line-height: 1.1;
  color: inherit;
}
h1 small,
h2 small,
h3 small,
h4 small,
h5 small,
h6 small,
.h1 small,
.h2 small,
.h3 small,
.h4 small,
.h5 small,
.h6 small,
h1 .small,
h2 .small,
h3 .small,
h4 .small,
h5 .small,
h6 .small,
.h1 .small,
.h2 .small,
.h3 .small,
.h4 .small,
.h5 .small,
.h6 .small {
  font-weight: normal;
  line-height: 1;
  color: #777;
}
h1,
.h1,
h2,
.h2,
h3,
.h3 {
  margin-top: 20px;
  margin-bottom: 10px;
}
h1 small,
.h1 small,
h2 small,
.h2 small,
h3 small,
.h3 small,
h1 .small,
.h1 .small,
h2 .small,
.h2 .small,
h3 .small,
.h3 .small {
  font-size: 65%;
}
h4,
.h4,
h5,
.h5,
h6,
.h6 {
  margin-top: 10px;
  margin-bottom: 10px;
}
h4 small,
.h4 small,
h5 small,
.h5 small,
h6 small,
.h6 small,
h4 .small,
.h4 .small,
h5 .small,
.h5 .small,
h6 .small,
.h6 .small {
  font-size: 75%;
}
h1,
.h1 {
  font-size: 36px;
}
h2,
.h2 {
  font-size: 30px;
}
h3,
.h3 {
  font-size: 24px;
}
h4,
.h4 {
  font-size: 18px;
}
h5,
.h5 {
  font-size: 14px;
}
h6,
.h6 {
  font-size: 12px;
}
p {
  margin: 0 0 10px;
}
.lead {
  margin-bottom: 20px;
  font-size: 16px;
  font-weight: 300;
  line-height: 1.4;
}
@media (min-width: 768px) {
  .lead {
    font-size: 21px;
  }
}
small,
.small {
  font-size: 85%;
}
mark,
.mark {
  padding: .2em;
  background-color: #fcf8e3;
}
.text-left {
  text-align: left;
}
.text-right {
  text-align: right;
}
.text-center {
  text-align: center;
}
.text-justify {
  text-align: justify;
}
.text-nowrap {
  white-space: nowrap;
}
.text-lowercase {
  text-transform: lowercase;
}
.text-uppercase {
  text-transform: uppercase;
}
.text-capitalize {
  text-transform: capitalize;
}
.text-muted {
  color: #777;
}
.text-primary {
  color: #337ab7;
}
a.text-primary:hover,
a.text-primary:focus {
  color: #286090;
}
.text-success {
  color: #3c763d;
}
a.text-success:hover,
a.text-success:focus {
  color: #2b542c;
}
.text-info {
  color: #31708f;
}
a.text-info:hover,
a.text-info:focus {
  color: #245269;
}
.text-warning {
  color: #8a6d3b;
}
a.text-warning:hover,
a.text-warning:focus {
  color: #66512c;
}
.text-danger {
  color: #a94442;
}
a.text-danger:hover,
a.text-danger:focus {
  color: #843534;
}
.bg-primary {
  color: #fff;
  background-color: #337ab7;
}
a.bg-primary:hover,
a.bg-primary:focus {
  background-color: #286090;
}
.bg-success {
  background-color: #dff0d8;
}
a.bg-success:hover,
a.bg-success:focus {
  background-color: #c1e2b3;
}
.bg-info {
  background-color: #d9edf7;
}
a.bg-info:hover,
a.bg-info:focus {
  background-color: #afd9ee;
}
.bg-warning {
  background-color: #fcf8e3;
}
a.bg-warning:hover,
a.bg-warning:focus {
  background-color: #f7ecb5;
}
.bg-danger {
  background-color: #f2dede;
}
a.bg-danger:hover,
a.bg-danger:focus {
  background-color: #e4b9b9;
}
.page-header {
  padding-bottom: 9px;
  margin: 40px 0 20px;
  border-bottom: 1px solid #eee;
}
ul,
ol {
  margin-top: 0;
  margin-bottom: 10px;
}
ul ul,
ol ul,
ul ol,
ol ol {
  margin-bottom: 0;
}
.list-unstyled {
  padding-left: 0;
  list-style: none;
}
.list-inline {
  padding-left: 0;
  margin-left: -5px;
  list-style: none;
}
.list-inline > li {
  display: inline-block;
  padding-right: 5px;
  padding-left: 5px;
}
dl {
  margin-top: 0;
  margin-bottom: 20px;
}
dt,
dd {
  line-height: 1.42857143;
}
dt {
  font-weight: bold;
}
dd {
  margin-left: 0;
}
@media (min-width: 768px) {
  .dl-horizontal dt {
    float: left;
    width: 160px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .dl-horizontal dd {
    margin-left: 180px;
  }
}
abbr[title],
abbr[data-original-title] {
  cursor: help;
  border-bottom: 1px dotted #777;
}
.initialism {
  font-size: 90%;
  text-transform: uppercase;
}
blockquote {
  padding: 10px 20px;
  margin: 0 0 20px;
  font-size: 17.5px;
  border-left: 5px solid #eee;
}
blockquote p:last-child,
blockquote ul:last-child,
blockquote ol:last-child {
  margin-bottom: 0;
}
blockquote footer,
blockquote small,
blockquote .small {
  display: block;
  font-size: 80%;
  line-height: 1.42857143;
  color: #777;
}
blockquote footer:before,
blockquote small:before,
blockquote .small:before {
  content: '\2014   \A0';
}
.blockquote-reverse,
blockquote.pull-right {
  padding-right: 15px;
  padding-left: 0;
  text-align: right;
  border-right: 5px solid #eee;
  border-left: 0;
}
.blockquote-reverse footer:before,
blockquote.pull-right footer:before,
.blockquote-reverse small:before,
blockquote.pull-right small:before,
.blockquote-reverse .small:before,
blockquote.pull-right .small:before {
  content: '';
}
.blockquote-reverse footer:after,
blockquote.pull-right footer:after,
.blockquote-reverse small:after,
blockquote.pull-right small:after,
.blockquote-reverse .small:after,
blockquote.pull-right .small:after {
  content: '\A0   \2014';
}
address {
  margin-bottom: 20px;
  font-style: normal;
  line-height: 1.42857143;
}
code,
kbd,
pre,
samp {
  font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
}
code {
  padding: 2px 4px;
  font-size: 90%;
  color: #c7254e;
  background-color: #f9f2f4;
  border-radius: 4px;
}
kbd {
  padding: 2px 4px;
  font-size: 90%;
  color: #fff;
  background-color: #333;
  border-radius: 3px;
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
}
kbd kbd {
  padding: 0;
  font-size: 100%;
  font-weight: bold;
  -webkit-box-shadow: none;
          box-shadow: none;
}
pre {
  display: block;
  padding: 9.5px;
  margin: 0 0 10px;
  font-size: 13px;
  line-height: 1.42857143;
  color: #333;
  word-break: break-all;
  word-wrap: break-word;
  background-color: #f5f5f5;
  border: 1px solid #ccc;
  border-radius: 4px;
}
pre code {
  padding: 0;
  font-size: inherit;
  color: inherit;
  white-space: pre-wrap;
  background-color: transparent;
  border-radius: 0;
}
.pre-scrollable {
  max-height: 340px;
  overflow-y: scroll;
}
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
.container-fluid {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.row {
  margin-right: -15px;
  margin-left: -15px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
  float: left;
}
.col-xs-12 {
  width: 100%;
}
.col-xs-11 {
  width: 91.66666667%;
}
.col-xs-10 {
  width: 83.33333333%;
}
.col-xs-9 {
  width: 75%;
}
.col-xs-8 {
  width: 66.66666667%;
}
.col-xs-7 {
  width: 58.33333333%;
}
.col-xs-6 {
  width: 50%;
}
.col-xs-5 {
  width: 41.66666667%;
}
.col-xs-4 {
  width: 33.33333333%;
}
.col-xs-3 {
  width: 25%;
}
.col-xs-2 {
  width: 16.66666667%;
}
.col-xs-1 {
  width: 8.33333333%;
}
.col-xs-pull-12 {
  right: 100%;
}
.col-xs-pull-11 {
  right: 91.66666667%;
}
.col-xs-pull-10 {
  right: 83.33333333%;
}
.col-xs-pull-9 {
  right: 75%;
}
.col-xs-pull-8 {
  right: 66.66666667%;
}
.col-xs-pull-7 {
  right: 58.33333333%;
}
.col-xs-pull-6 {
  right: 50%;
}
.col-xs-pull-5 {
  right: 41.66666667%;
}
.col-xs-pull-4 {
  right: 33.33333333%;
}
.col-xs-pull-3 {
  right: 25%;
}
.col-xs-pull-2 {
  right: 16.66666667%;
}
.col-xs-pull-1 {
  right: 8.33333333%;
}
.col-xs-pull-0 {
  right: auto;
}
.col-xs-push-12 {
  left: 100%;
}
.col-xs-push-11 {
  left: 91.66666667%;
}
.col-xs-push-10 {
  left: 83.33333333%;
}
.col-xs-push-9 {
  left: 75%;
}
.col-xs-push-8 {
  left: 66.66666667%;
}
.col-xs-push-7 {
  left: 58.33333333%;
}
.col-xs-push-6 {
  left: 50%;
}
.col-xs-push-5 {
  left: 41.66666667%;
}
.col-xs-push-4 {
  left: 33.33333333%;
}
.col-xs-push-3 {
  left: 25%;
}
.col-xs-push-2 {
  left: 16.66666667%;
}
.col-xs-push-1 {
  left: 8.33333333%;
}
.col-xs-push-0 {
  left: auto;
}
.col-xs-offset-12 {
  margin-left: 100%;
}
.col-xs-offset-11 {
  margin-left: 91.66666667%;
}
.col-xs-offset-10 {
  margin-left: 83.33333333%;
}
.col-xs-offset-9 {
  margin-left: 75%;
}
.col-xs-offset-8 {
  margin-left: 66.66666667%;
}
.col-xs-offset-7 {
  margin-left: 58.33333333%;
}
.col-xs-offset-6 {
  margin-left: 50%;
}
.col-xs-offset-5 {
  margin-left: 41.66666667%;
}
.col-xs-offset-4 {
  margin-left: 33.33333333%;
}
.col-xs-offset-3 {
  margin-left: 25%;
}
.col-xs-offset-2 {
  margin-left: 16.66666667%;
}
.col-xs-offset-1 {
  margin-left: 8.33333333%;
}
.col-xs-offset-0 {
  margin-left: 0;
}
@media (min-width: 768px) {
  .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
    float: left;
  }
  .col-sm-12 {
    width: 100%;
  }
  .col-sm-11 {
    width: 91.66666667%;
  }
  .col-sm-10 {
    width: 83.33333333%;
  }
  .col-sm-9 {
    width: 75%;
  }
  .col-sm-8 {
    width: 66.66666667%;
  }
  .col-sm-7 {
    width: 58.33333333%;
  }
  .col-sm-6 {
    width: 50%;
  }
  .col-sm-5 {
    width: 41.66666667%;
  }
  .col-sm-4 {
    width: 33.33333333%;
  }
  .col-sm-3 {
    width: 25%;
  }
  .col-sm-2 {
    width: 16.66666667%;
  }
  .col-sm-1 {
    width: 8.33333333%;
  }
  .col-sm-pull-12 {
    right: 100%;
  }
  .col-sm-pull-11 {
    right: 91.66666667%;
  }
  .col-sm-pull-10 {
    right: 83.33333333%;
  }
  .col-sm-pull-9 {
    right: 75%;
  }
  .col-sm-pull-8 {
    right: 66.66666667%;
  }
  .col-sm-pull-7 {
    right: 58.33333333%;
  }
  .col-sm-pull-6 {
    right: 50%;
  }
  .col-sm-pull-5 {
    right: 41.66666667%;
  }
  .col-sm-pull-4 {
    right: 33.33333333%;
  }
  .col-sm-pull-3 {
    right: 25%;
  }
  .col-sm-pull-2 {
    right: 16.66666667%;
  }
  .col-sm-pull-1 {
    right: 8.33333333%;
  }
  .col-sm-pull-0 {
    right: auto;
  }
  .col-sm-push-12 {
    left: 100%;
  }
  .col-sm-push-11 {
    left: 91.66666667%;
  }
  .col-sm-push-10 {
    left: 83.33333333%;
  }
  .col-sm-push-9 {
    left: 75%;
  }
  .col-sm-push-8 {
    left: 66.66666667%;
  }
  .col-sm-push-7 {
    left: 58.33333333%;
  }
  .col-sm-push-6 {
    left: 50%;
  }
  .col-sm-push-5 {
    left: 41.66666667%;
  }
  .col-sm-push-4 {
    left: 33.33333333%;
  }
  .col-sm-push-3 {
    left: 25%;
  }
  .col-sm-push-2 {
    left: 16.66666667%;
  }
  .col-sm-push-1 {
    left: 8.33333333%;
  }
  .col-sm-push-0 {
    left: auto;
  }
  .col-sm-offset-12 {
    margin-left: 100%;
  }
  .col-sm-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-sm-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-sm-offset-9 {
    margin-left: 75%;
  }
  .col-sm-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-sm-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-sm-offset-6 {
    margin-left: 50%;
  }
  .col-sm-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-sm-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-sm-offset-3 {
    margin-left: 25%;
  }
  .col-sm-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-sm-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-sm-offset-0 {
    margin-left: 0;
  }
}
@media (min-width: 992px) {
  .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
  }
  .col-md-12 {
    width: 100%;
  }
  .col-md-11 {
    width: 91.66666667%;
  }
  .col-md-10 {
    width: 83.33333333%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-8 {
    width: 66.66666667%;
  }
  .col-md-7 {
    width: 58.33333333%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-5 {
    width: 41.66666667%;
  }
  .col-md-4 {
    width: 33.33333333%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-2 {
    width: 16.66666667%;
  }
  .col-md-1 {
    width: 8.33333333%;
  }
  .col-md-pull-12 {
    right: 100%;
  }
  .col-md-pull-11 {
    right: 91.66666667%;
  }
  .col-md-pull-10 {
    right: 83.33333333%;
  }
  .col-md-pull-9 {
    right: 75%;
  }
  .col-md-pull-8 {
    right: 66.66666667%;
  }
  .col-md-pull-7 {
    right: 58.33333333%;
  }
  .col-md-pull-6 {
    right: 50%;
  }
  .col-md-pull-5 {
    right: 41.66666667%;
  }
  .col-md-pull-4 {
    right: 33.33333333%;
  }
  .col-md-pull-3 {
    right: 25%;
  }
  .col-md-pull-2 {
    right: 16.66666667%;
  }
  .col-md-pull-1 {
    right: 8.33333333%;
  }
  .col-md-pull-0 {
    right: auto;
  }
  .col-md-push-12 {
    left: 100%;
  }
  .col-md-push-11 {
    left: 91.66666667%;
  }
  .col-md-push-10 {
    left: 83.33333333%;
  }
  .col-md-push-9 {
    left: 75%;
  }
  .col-md-push-8 {
    left: 66.66666667%;
  }
  .col-md-push-7 {
    left: 58.33333333%;
  }
  .col-md-push-6 {
    left: 50%;
  }
  .col-md-push-5 {
    left: 41.66666667%;
  }
  .col-md-push-4 {
    left: 33.33333333%;
  }
  .col-md-push-3 {
    left: 25%;
  }
  .col-md-push-2 {
    left: 16.66666667%;
  }
  .col-md-push-1 {
    left: 8.33333333%;
  }
  .col-md-push-0 {
    left: auto;
  }
  .col-md-offset-12 {
    margin-left: 100%;
  }
  .col-md-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-md-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-md-offset-9 {
    margin-left: 75%;
  }
  .col-md-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-md-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-md-offset-6 {
    margin-left: 50%;
  }
  .col-md-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-md-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-md-offset-3 {
    margin-left: 25%;
  }
  .col-md-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-md-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-md-offset-0 {
    margin-left: 0;
  }
}
@media (min-width: 1200px) {
  .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
    float: left;
  }
  .col-lg-12 {
    width: 100%;
  }
  .col-lg-11 {
    width: 91.66666667%;
  }
  .col-lg-10 {
    width: 83.33333333%;
  }
  .col-lg-9 {
    width: 75%;
  }
  .col-lg-8 {
    width: 66.66666667%;
  }
  .col-lg-7 {
    width: 58.33333333%;
  }
  .col-lg-6 {
    width: 50%;
  }
  .col-lg-5 {
    width: 41.66666667%;
  }
  .col-lg-4 {
    width: 33.33333333%;
  }
  .col-lg-3 {
    width: 25%;
  }
  .col-lg-2 {
    width: 16.66666667%;
  }
  .col-lg-1 {
    width: 8.33333333%;
  }
  .col-lg-pull-12 {
    right: 100%;
  }
  .col-lg-pull-11 {
    right: 91.66666667%;
  }
  .col-lg-pull-10 {
    right: 83.33333333%;
  }
  .col-lg-pull-9 {
    right: 75%;
  }
  .col-lg-pull-8 {
    right: 66.66666667%;
  }
  .col-lg-pull-7 {
    right: 58.33333333%;
  }
  .col-lg-pull-6 {
    right: 50%;
  }
  .col-lg-pull-5 {
    right: 41.66666667%;
  }
  .col-lg-pull-4 {
    right: 33.33333333%;
  }
  .col-lg-pull-3 {
    right: 25%;
  }
  .col-lg-pull-2 {
    right: 16.66666667%;
  }
  .col-lg-pull-1 {
    right: 8.33333333%;
  }
  .col-lg-pull-0 {
    right: auto;
  }
  .col-lg-push-12 {
    left: 100%;
  }
  .col-lg-push-11 {
    left: 91.66666667%;
  }
  .col-lg-push-10 {
    left: 83.33333333%;
  }
  .col-lg-push-9 {
    left: 75%;
  }
  .col-lg-push-8 {
    left: 66.66666667%;
  }
  .col-lg-push-7 {
    left: 58.33333333%;
  }
  .col-lg-push-6 {
    left: 50%;
  }
  .col-lg-push-5 {
    left: 41.66666667%;
  }
  .col-lg-push-4 {
    left: 33.33333333%;
  }
  .col-lg-push-3 {
    left: 25%;
  }
  .col-lg-push-2 {
    left: 16.66666667%;
  }
  .col-lg-push-1 {
    left: 8.33333333%;
  }
  .col-lg-push-0 {
    left: auto;
  }
  .col-lg-offset-12 {
    margin-left: 100%;
  }
  .col-lg-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-lg-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-lg-offset-9 {
    margin-left: 75%;
  }
  .col-lg-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-lg-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-lg-offset-6 {
    margin-left: 50%;
  }
  .col-lg-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-lg-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-lg-offset-3 {
    margin-left: 25%;
  }
  .col-lg-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-lg-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-lg-offset-0 {
    margin-left: 0;
  }
}
table {
  background-color: transparent;
}
caption {
  padding-top: 8px;
  padding-bottom: 8px;
  color: #777;
  text-align: left;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid #ddd;
}
.table .table {
  background-color: #fff;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 5px;
}
.table-bordered {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}
.table-hover > tbody > tr:hover {
  background-color: #f5f5f5;
}
table col[class*="col-"] {
  position: static;
  display: table-column;
  float: none;
}
table td[class*="col-"],
table th[class*="col-"] {
  position: static;
  display: table-cell;
  float: none;
}
.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
  background-color: #f5f5f5;
}
.table-hover > tbody > tr > td.active:hover,
.table-hover > tbody > tr > th.active:hover,
.table-hover > tbody > tr.active:hover > td,
.table-hover > tbody > tr:hover > .active,
.table-hover > tbody > tr.active:hover > th {
  background-color: #e8e8e8;
}
.table > thead > tr > td.success,
.table > tbody > tr > td.success,
.table > tfoot > tr > td.success,
.table > thead > tr > th.success,
.table > tbody > tr > th.success,
.table > tfoot > tr > th.success,
.table > thead > tr.success > td,
.table > tbody > tr.success > td,
.table > tfoot > tr.success > td,
.table > thead > tr.success > th,
.table > tbody > tr.success > th,
.table > tfoot > tr.success > th {
  background-color: #dff0d8;
}
.table-hover > tbody > tr > td.success:hover,
.table-hover > tbody > tr > th.success:hover,
.table-hover > tbody > tr.success:hover > td,
.table-hover > tbody > tr:hover > .success,
.table-hover > tbody > tr.success:hover > th {
  background-color: #d0e9c6;
}
.table > thead > tr > td.info,
.table > tbody > tr > td.info,
.table > tfoot > tr > td.info,
.table > thead > tr > th.info,
.table > tbody > tr > th.info,
.table > tfoot > tr > th.info,
.table > thead > tr.info > td,
.table > tbody > tr.info > td,
.table > tfoot > tr.info > td,
.table > thead > tr.info > th,
.table > tbody > tr.info > th,
.table > tfoot > tr.info > th {
  background-color: #d9edf7;
}
.table-hover > tbody > tr > td.info:hover,
.table-hover > tbody > tr > th.info:hover,
.table-hover > tbody > tr.info:hover > td,
.table-hover > tbody > tr:hover > .info,
.table-hover > tbody > tr.info:hover > th {
  background-color: #c4e3f3;
}
.table > thead > tr > td.warning,
.table > tbody > tr > td.warning,
.table > tfoot > tr > td.warning,
.table > thead > tr > th.warning,
.table > tbody > tr > th.warning,
.table > tfoot > tr > th.warning,
.table > thead > tr.warning > td,
.table > tbody > tr.warning > td,
.table > tfoot > tr.warning > td,
.table > thead > tr.warning > th,
.table > tbody > tr.warning > th,
.table > tfoot > tr.warning > th {
  background-color: #fcf8e3;
}
.table-hover > tbody > tr > td.warning:hover,
.table-hover > tbody > tr > th.warning:hover,
.table-hover > tbody > tr.warning:hover > td,
.table-hover > tbody > tr:hover > .warning,
.table-hover > tbody > tr.warning:hover > th {
  background-color: #faf2cc;
}
.table > thead > tr > td.danger,
.table > tbody > tr > td.danger,
.table > tfoot > tr > td.danger,
.table > thead > tr > th.danger,
.table > tbody > tr > th.danger,
.table > tfoot > tr > th.danger,
.table > thead > tr.danger > td,
.table > tbody > tr.danger > td,
.table > tfoot > tr.danger > td,
.table > thead > tr.danger > th,
.table > tbody > tr.danger > th,
.table > tfoot > tr.danger > th {
  background-color: #f2dede;
}
.table-hover > tbody > tr > td.danger:hover,
.table-hover > tbody > tr > th.danger:hover,
.table-hover > tbody > tr.danger:hover > td,
.table-hover > tbody > tr:hover > .danger,
.table-hover > tbody > tr.danger:hover > th {
  background-color: #ebcccc;
}
.table-responsive {
  min-height: .01%;
  overflow-x: auto;
}
@media screen and (max-width: 767px) {
  .table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd;
  }
  .table-responsive > .table {
    margin-bottom: 0;
  }
  .table-responsive > .table > thead > tr > th,
  .table-responsive > .table > tbody > tr > th,
  .table-responsive > .table > tfoot > tr > th,
  .table-responsive > .table > thead > tr > td,
  .table-responsive > .table > tbody > tr > td,
  .table-responsive > .table > tfoot > tr > td {
    white-space: nowrap;
  }
  .table-responsive > .table-bordered {
    border: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:first-child,
  .table-responsive > .table-bordered > tbody > tr > th:first-child,
  .table-responsive > .table-bordered > tfoot > tr > th:first-child,
  .table-responsive > .table-bordered > thead > tr > td:first-child,
  .table-responsive > .table-bordered > tbody > tr > td:first-child,
  .table-responsive > .table-bordered > tfoot > tr > td:first-child {
    border-left: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:last-child,
  .table-responsive > .table-bordered > tbody > tr > th:last-child,
  .table-responsive > .table-bordered > tfoot > tr > th:last-child,
  .table-responsive > .table-bordered > thead > tr > td:last-child,
  .table-responsive > .table-bordered > tbody > tr > td:last-child,
  .table-responsive > .table-bordered > tfoot > tr > td:last-child {
    border-right: 0;
  }
  .table-responsive > .table-bordered > tbody > tr:last-child > th,
  .table-responsive > .table-bordered > tfoot > tr:last-child > th,
  .table-responsive > .table-bordered > tbody > tr:last-child > td,
  .table-responsive > .table-bordered > tfoot > tr:last-child > td {
    border-bottom: 0;
  }
}
fieldset {
  min-width: 0;
  padding: 0;
  margin: 0;
  border: 0;
}
legend {
  display: block;
  width: 100%;
  padding: 0;
  margin-bottom: 20px;
  font-size: 21px;
  line-height: inherit;
  color: #333;
  border: 0;
  border-bottom: 1px solid #e5e5e5;
}
label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
  font-weight: bold;
}
input[type="search"] {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
input[type="radio"],
input[type="checkbox"] {
  margin: 4px 0 0;
  margin-top: 1px \9;
  line-height: normal;
}
input[type="file"] {
  display: block;
}
input[type="range"] {
  display: block;
  width: 100%;
}
select[multiple],
select[size] {
  height: auto;
}
input[type="file"]:focus,
input[type="radio"]:focus,
input[type="checkbox"]:focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
output {
  display: block;
  padding-top: 7px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
}
.form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
}
.form-control::-moz-placeholder {
  color: #999;
  opacity: 1;
}
.form-control:-ms-input-placeholder {
  color: #999;
}
.form-control::-webkit-input-placeholder {
  color: #999;
}
.form-control::-ms-expand {
  background-color: transparent;
  border: 0;
}
.form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
  background-color: #eee;
  opacity: 1;
}
.form-control[disabled],
fieldset[disabled] .form-control {
  cursor: not-allowed;
}
textarea.form-control {
  height: auto;
}
input[type="search"] {
  -webkit-appearance: none;
}
@media screen and (-webkit-min-device-pixel-ratio: 0) {
  input[type="date"].form-control,
  input[type="time"].form-control,
  input[type="datetime-local"].form-control,
  input[type="month"].form-control {
    line-height: 34px;
  }
  input[type="date"].input-sm,
  input[type="time"].input-sm,
  input[type="datetime-local"].input-sm,
  input[type="month"].input-sm,
  .input-group-sm input[type="date"],
  .input-group-sm input[type="time"],
  .input-group-sm input[type="datetime-local"],
  .input-group-sm input[type="month"] {
    line-height: 30px;
  }
  input[type="date"].input-lg,
  input[type="time"].input-lg,
  input[type="datetime-local"].input-lg,
  input[type="month"].input-lg,
  .input-group-lg input[type="date"],
  .input-group-lg input[type="time"],
  .input-group-lg input[type="datetime-local"],
  .input-group-lg input[type="month"] {
    line-height: 46px;
  }
}
.form-group {
  margin-bottom: 15px;
}
.radio,
.checkbox {
  position: relative;
  display: block;
  margin-top: 10px;
  margin-bottom: 10px;
}
.radio label,
.checkbox label {
  min-height: 20px;
  padding-left: 20px;
  margin-bottom: 0;
  font-weight: normal;
  cursor: pointer;
}
.radio input[type="radio"],
.radio-inline input[type="radio"],
.checkbox input[type="checkbox"],
.checkbox-inline input[type="checkbox"] {
  position: absolute;
  margin-top: 4px \9;
  margin-left: -20px;
}
.radio + .radio,
.checkbox + .checkbox {
  margin-top: -5px;
}
.radio-inline,
.checkbox-inline {
  position: relative;
  display: inline-block;
  padding-left: 20px;
  margin-bottom: 0;
  font-weight: normal;
  vertical-align: middle;
  cursor: pointer;
}
.radio-inline + .radio-inline,
.checkbox-inline + .checkbox-inline {
  margin-top: 0;
  margin-left: 10px;
}
input[type="radio"][disabled],
input[type="checkbox"][disabled],
input[type="radio"].disabled,
input[type="checkbox"].disabled,
fieldset[disabled] input[type="radio"],
fieldset[disabled] input[type="checkbox"] {
  cursor: not-allowed;
}
.radio-inline.disabled,
.checkbox-inline.disabled,
fieldset[disabled] .radio-inline,
fieldset[disabled] .checkbox-inline {
  cursor: not-allowed;
}
.radio.disabled label,
.checkbox.disabled label,
fieldset[disabled] .radio label,
fieldset[disabled] .checkbox label {
  cursor: not-allowed;
}
.form-control-static {
  min-height: 34px;
  padding-top: 7px;
  padding-bottom: 7px;
  margin-bottom: 0;
}
.form-control-static.input-lg,
.form-control-static.input-sm {
  padding-right: 0;
  padding-left: 0;
}
.input-sm {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
select.input-sm {
  height: 30px;
  line-height: 30px;
}
textarea.input-sm,
select[multiple].input-sm {
  height: auto;
}
.form-group-sm .form-control {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
.form-group-sm select.form-control {
  height: 30px;
  line-height: 30px;
}
.form-group-sm textarea.form-control,
.form-group-sm select[multiple].form-control {
  height: auto;
}
.form-group-sm .form-control-static {
  height: 30px;
  min-height: 32px;
  padding: 6px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.input-lg {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
select.input-lg {
  height: 46px;
  line-height: 46px;
}
textarea.input-lg,
select[multiple].input-lg {
  height: auto;
}
.form-group-lg .form-control {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
.form-group-lg select.form-control {
  height: 46px;
  line-height: 46px;
}
.form-group-lg textarea.form-control,
.form-group-lg select[multiple].form-control {
  height: auto;
}
.form-group-lg .form-control-static {
  height: 46px;
  min-height: 38px;
  padding: 11px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.has-feedback {
  position: relative;
}
.has-feedback .form-control {
  padding-right: 42.5px;
}
.form-control-feedback {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  pointer-events: none;
}
.input-lg + .form-control-feedback,
.input-group-lg + .form-control-feedback,
.form-group-lg .form-control + .form-control-feedback {
  width: 46px;
  height: 46px;
  line-height: 46px;
}
.input-sm + .form-control-feedback,
.input-group-sm + .form-control-feedback,
.form-group-sm .form-control + .form-control-feedback {
  width: 30px;
  height: 30px;
  line-height: 30px;
}
.has-success .help-block,
.has-success .control-label,
.has-success .radio,
.has-success .checkbox,
.has-success .radio-inline,
.has-success .checkbox-inline,
.has-success.radio label,
.has-success.checkbox label,
.has-success.radio-inline label,
.has-success.checkbox-inline label {
  color: #3c763d;
}
.has-success .form-control {
  border-color: #3c763d;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
.has-success .form-control:focus {
  border-color: #2b542c;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
}
.has-success .input-group-addon {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #3c763d;
}
.has-success .form-control-feedback {
  color: #3c763d;
}
.has-warning .help-block,
.has-warning .control-label,
.has-warning .radio,
.has-warning .checkbox,
.has-warning .radio-inline,
.has-warning .checkbox-inline,
.has-warning.radio label,
.has-warning.checkbox label,
.has-warning.radio-inline label,
.has-warning.checkbox-inline label {
  color: #8a6d3b;
}
.has-warning .form-control {
  border-color: #8a6d3b;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
.has-warning .form-control:focus {
  border-color: #66512c;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
}
.has-warning .input-group-addon {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #8a6d3b;
}
.has-warning .form-control-feedback {
  color: #8a6d3b;
}
.has-error .help-block,
.has-error .control-label,
.has-error .radio,
.has-error .checkbox,
.has-error .radio-inline,
.has-error .checkbox-inline,
.has-error.radio label,
.has-error.checkbox label,
.has-error.radio-inline label,
.has-error.checkbox-inline label {
  color: #a94442;
}
.has-error .form-control {
  border-color: #a94442;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
.has-error .form-control:focus {
  border-color: #843534;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
}
.has-error .input-group-addon {
  color: #a94442;
  background-color: #f2dede;
  border-color: #a94442;
}
.has-error .form-control-feedback {
  color: #a94442;
}
.has-feedback label ~ .form-control-feedback {
  top: 25px;
}
.has-feedback label.sr-only ~ .form-control-feedback {
  top: 0;
}
.help-block {
  display: block;
  margin-top: 5px;
  margin-bottom: 10px;
  color: #737373;
}
@media (min-width: 768px) {
  .form-inline .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
  }
  .form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
  }
  .form-inline .form-control-static {
    display: inline-block;
  }
  .form-inline .input-group {
    display: inline-table;
    vertical-align: middle;
  }
  .form-inline .input-group .input-group-addon,
  .form-inline .input-group .input-group-btn,
  .form-inline .input-group .form-control {
    width: auto;
  }
  .form-inline .input-group > .form-control {
    width: 100%;
  }
  .form-inline .control-label {
    margin-bottom: 0;
    vertical-align: middle;
  }
  .form-inline .radio,
  .form-inline .checkbox {
    display: inline-block;
    margin-top: 0;
    margin-bottom: 0;
    vertical-align: middle;
  }
  .form-inline .radio label,
  .form-inline .checkbox label {
    padding-left: 0;
  }
  .form-inline .radio input[type="radio"],
  .form-inline .checkbox input[type="checkbox"] {
    position: relative;
    margin-left: 0;
  }
  .form-inline .has-feedback .form-control-feedback {
    top: 0;
  }
}
.form-horizontal .radio,
.form-horizontal .checkbox,
.form-horizontal .radio-inline,
.form-horizontal .checkbox-inline {
  padding-top: 7px;
  margin-top: 0;
  margin-bottom: 0;
}
.form-horizontal .radio,
.form-horizontal .checkbox {
  min-height: 27px;
}
.form-horizontal .form-group {
  margin-right: -15px;
  margin-left: -15px;
}
@media (min-width: 768px) {
  .form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right;
  }
}
.form-horizontal .has-feedback .form-control-feedback {
  right: 15px;
}
@media (min-width: 768px) {
  .form-horizontal .form-group-lg .control-label {
    padding-top: 11px;
    font-size: 18px;
  }
}
@media (min-width: 768px) {
  .form-horizontal .form-group-sm .control-label {
    padding-top: 6px;
    font-size: 12px;
  }
}
.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
      touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
.btn:focus,
.btn:active:focus,
.btn.active:focus,
.btn.focus,
.btn:active.focus,
.btn.active.focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
.btn:hover,
.btn:focus,
.btn.focus {
  color: #333;
  text-decoration: none;
}
.btn:active,
.btn.active {
  background-image: none;
  outline: 0;
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
          box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
}
.btn.disabled,
.btn[disabled],
fieldset[disabled] .btn {
  cursor: not-allowed;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
          box-shadow: none;
  opacity: .65;
}
a.btn.disabled,
fieldset[disabled] a.btn {
  pointer-events: none;
}
.btn-default {
  color: #333;
  background-color: #fff;
  border-color: #ccc;
}
.btn-default:focus,
.btn-default.focus {
  color: #333;
  background-color: #e6e6e6;
  border-color: #8c8c8c;
}
.btn-default:hover {
  color: #333;
  background-color: #e6e6e6;
  border-color: #adadad;
}
.btn-default:active,
.btn-default.active,
.open > .dropdown-toggle.btn-default {
  color: #333;
  background-color: #e6e6e6;
  border-color: #adadad;
}
.btn-default:active:hover,
.btn-default.active:hover,
.open > .dropdown-toggle.btn-default:hover,
.btn-default:active:focus,
.btn-default.active:focus,
.open > .dropdown-toggle.btn-default:focus,
.btn-default:active.focus,
.btn-default.active.focus,
.open > .dropdown-toggle.btn-default.focus {
  color: #333;
  background-color: #d4d4d4;
  border-color: #8c8c8c;
}
.btn-default:active,
.btn-default.active,
.open > .dropdown-toggle.btn-default {
  background-image: none;
}
.btn-default.disabled:hover,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default:hover,
.btn-default.disabled:focus,
.btn-default[disabled]:focus,
fieldset[disabled] .btn-default:focus,
.btn-default.disabled.focus,
.btn-default[disabled].focus,
fieldset[disabled] .btn-default.focus {
  background-color: #fff;
  border-color: #ccc;
}
.btn-default .badge {
  color: #fff;
  background-color: #333;
}
.btn-primary {
  color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4;
}
.btn-primary:focus,
.btn-primary.focus {
  color: #fff;
  background-color: #286090;
  border-color: #122b40;
}
.btn-primary:hover {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}
.btn-primary:active,
.btn-primary.active,
.open > .dropdown-toggle.btn-primary {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}
.btn-primary:active:hover,
.btn-primary.active:hover,
.open > .dropdown-toggle.btn-primary:hover,
.btn-primary:active:focus,
.btn-primary.active:focus,
.open > .dropdown-toggle.btn-primary:focus,
.btn-primary:active.focus,
.btn-primary.active.focus,
.open > .dropdown-toggle.btn-primary.focus {
  color: #fff;
  background-color: #204d74;
  border-color: #122b40;
}
.btn-primary:active,
.btn-primary.active,
.open > .dropdown-toggle.btn-primary {
  background-image: none;
}
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled.focus,
.btn-primary[disabled].focus,
fieldset[disabled] .btn-primary.focus {
  background-color: #337ab7;
  border-color: #2e6da4;
}
.btn-primary .badge {
  color: #337ab7;
  background-color: #fff;
}
.btn-success {
  color: #fff;
  background-color: #5cb85c;
  border-color: #4cae4c;
}
.btn-success:focus,
.btn-success.focus {
  color: #fff;
  background-color: #449d44;
  border-color: #255625;
}
.btn-success:hover {
  color: #fff;
  background-color: #449d44;
  border-color: #398439;
}
.btn-success:active,
.btn-success.active,
.open > .dropdown-toggle.btn-success {
  color: #fff;
  background-color: #449d44;
  border-color: #398439;
}
.btn-success:active:hover,
.btn-success.active:hover,
.open > .dropdown-toggle.btn-success:hover,
.btn-success:active:focus,
.btn-success.active:focus,
.open > .dropdown-toggle.btn-success:focus,
.btn-success:active.focus,
.btn-success.active.focus,
.open > .dropdown-toggle.btn-success.focus {
  color: #fff;
  background-color: #398439;
  border-color: #255625;
}
.btn-success:active,
.btn-success.active,
.open > .dropdown-toggle.btn-success {
  background-image: none;
}
.btn-success.disabled:hover,
.btn-success[disabled]:hover,
fieldset[disabled] .btn-success:hover,
.btn-success.disabled:focus,
.btn-success[disabled]:focus,
fieldset[disabled] .btn-success:focus,
.btn-success.disabled.focus,
.btn-success[disabled].focus,
fieldset[disabled] .btn-success.focus {
  background-color: #5cb85c;
  border-color: #4cae4c;
}
.btn-success .badge {
  color: #5cb85c;
  background-color: #fff;
}
.btn-info {
  color: #fff;
  background-color: #5bc0de;
  border-color: #46b8da;
}
.btn-info:focus,
.btn-info.focus {
  color: #fff;
  background-color: #31b0d5;
  border-color: #1b6d85;
}
.btn-info:hover {
  color: #fff;
  background-color: #31b0d5;
  border-color: #269abc;
}
.btn-info:active,
.btn-info.active,
.open > .dropdown-toggle.btn-info {
  color: #fff;
  background-color: #31b0d5;
  border-color: #269abc;
}
.btn-info:active:hover,
.btn-info.active:hover,
.open > .dropdown-toggle.btn-info:hover,
.btn-info:active:focus,
.btn-info.active:focus,
.open > .dropdown-toggle.btn-info:focus,
.btn-info:active.focus,
.btn-info.active.focus,
.open > .dropdown-toggle.btn-info.focus {
  color: #fff;
  background-color: #269abc;
  border-color: #1b6d85;
}
.btn-info:active,
.btn-info.active,
.open > .dropdown-toggle.btn-info {
  background-image: none;
}
.btn-info.disabled:hover,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info:hover,
.btn-info.disabled:focus,
.btn-info[disabled]:focus,
fieldset[disabled] .btn-info:focus,
.btn-info.disabled.focus,
.btn-info[disabled].focus,
fieldset[disabled] .btn-info.focus {
  background-color: #5bc0de;
  border-color: #46b8da;
}
.btn-info .badge {
  color: #5bc0de;
  background-color: #fff;
}
.btn-warning {
  color: #fff;
  background-color: #f0ad4e;
  border-color: #eea236;
}
.btn-warning:focus,
.btn-warning.focus {
  color: #fff;
  background-color: #ec971f;
  border-color: #985f0d;
}
.btn-warning:hover {
  color: #fff;
  background-color: #ec971f;
  border-color: #d58512;
}
.btn-warning:active,
.btn-warning.active,
.open > .dropdown-toggle.btn-warning {
  color: #fff;
  background-color: #ec971f;
  border-color: #d58512;
}
.btn-warning:active:hover,
.btn-warning.active:hover,
.open > .dropdown-toggle.btn-warning:hover,
.btn-warning:active:focus,
.btn-warning.active:focus,
.open > .dropdown-toggle.btn-warning:focus,
.btn-warning:active.focus,
.btn-warning.active.focus,
.open > .dropdown-toggle.btn-warning.focus {
  color: #fff;
  background-color: #d58512;
  border-color: #985f0d;
}
.btn-warning:active,
.btn-warning.active,
.open > .dropdown-toggle.btn-warning {
  background-image: none;
}
.btn-warning.disabled:hover,
.btn-warning[disabled]:hover,
fieldset[disabled] .btn-warning:hover,
.btn-warning.disabled:focus,
.btn-warning[disabled]:focus,
fieldset[disabled] .btn-warning:focus,
.btn-warning.disabled.focus,
.btn-warning[disabled].focus,
fieldset[disabled] .btn-warning.focus {
  background-color: #f0ad4e;
  border-color: #eea236;
}
.btn-warning .badge {
  color: #f0ad4e;
  background-color: #fff;
}
.btn-danger {
  color: #fff;
  background-color: #d9534f;
  border-color: #d43f3a;
}
.btn-danger:focus,
.btn-danger.focus {
  color: #fff;
  background-color: #c9302c;
  border-color: #761c19;
}
.btn-danger:hover {
  color: #fff;
  background-color: #c9302c;
  border-color: #ac2925;
}
.btn-danger:active,
.btn-danger.active,
.open > .dropdown-toggle.btn-danger {
  color: #fff;
  background-color: #c9302c;
  border-color: #ac2925;
}
.btn-danger:active:hover,
.btn-danger.active:hover,
.open > .dropdown-toggle.btn-danger:hover,
.btn-danger:active:focus,
.btn-danger.active:focus,
.open > .dropdown-toggle.btn-danger:focus,
.btn-danger:active.focus,
.btn-danger.active.focus,
.open > .dropdown-toggle.btn-danger.focus {
  color: #fff;
  background-color: #ac2925;
  border-color: #761c19;
}
.btn-danger:active,
.btn-danger.active,
.open > .dropdown-toggle.btn-danger {
  background-image: none;
}
.btn-danger.disabled:hover,
.btn-danger[disabled]:hover,
fieldset[disabled] .btn-danger:hover,
.btn-danger.disabled:focus,
.btn-danger[disabled]:focus,
fieldset[disabled] .btn-danger:focus,
.btn-danger.disabled.focus,
.btn-danger[disabled].focus,
fieldset[disabled] .btn-danger.focus {
  background-color: #d9534f;
  border-color: #d43f3a;
}
.btn-danger .badge {
  color: #d9534f;
  background-color: #fff;
}
.btn-link {
  font-weight: normal;
  color: #337ab7;
  border-radius: 0;
}
.btn-link,
.btn-link:active,
.btn-link.active,
.btn-link[disabled],
fieldset[disabled] .btn-link {
  background-color: transparent;
  -webkit-box-shadow: none;
          box-shadow: none;
}
.btn-link,
.btn-link:hover,
.btn-link:focus,
.btn-link:active {
  border-color: transparent;
}
.btn-link:hover,
.btn-link:focus {
  color: #23527c;
  text-decoration: underline;
  background-color: transparent;
}
.btn-link[disabled]:hover,
fieldset[disabled] .btn-link:hover,
.btn-link[disabled]:focus,
fieldset[disabled] .btn-link:focus {
  color: #777;
  text-decoration: none;
}
.btn-lg,
.btn-group-lg > .btn {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
.btn-sm,
.btn-group-sm > .btn {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
.btn-xs,
.btn-group-xs > .btn {
  padding: 1px 5px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
.btn-block {
  display: block;
  width: 100%;
}
.btn-block + .btn-block {
  margin-top: 5px;
}
input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%;
}
.fade {
  opacity: 0;
  -webkit-transition: opacity .15s linear;
       -o-transition: opacity .15s linear;
          transition: opacity .15s linear;
}
.fade.in {
  opacity: 1;
}
.collapse {
  display: none;
}
.collapse.in {
  display: block;
}
tr.collapse.in {
  display: table-row;
}
tbody.collapse.in {
  display: table-row-group;
}
.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  -webkit-transition-timing-function: ease;
       -o-transition-timing-function: ease;
          transition-timing-function: ease;
  -webkit-transition-duration: .35s;
       -o-transition-duration: .35s;
          transition-duration: .35s;
  -webkit-transition-property: height, visibility;
       -o-transition-property: height, visibility;
          transition-property: height, visibility;
}
.caret {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 2px;
  vertical-align: middle;
  border-top: 4px dashed;
  border-top: 4px solid \9;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent;
}
.dropup,
.dropdown {
  position: relative;
}
.dropdown-toggle:focus {
  outline: 0;
}
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
          box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
.dropdown-menu.pull-right {
  right: 0;
  left: auto;
}
.dropdown-menu .divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}
.dropdown-menu > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.42857143;
  color: #333;
  white-space: nowrap;
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
  color: #262626;
  text-decoration: none;
  background-color: #f5f5f5;
}
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  color: #fff;
  text-decoration: none;
  background-color: #337ab7;
  outline: 0;
}
.dropdown-menu > .disabled > a,
.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
  color: #777;
}
.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
}
.open > .dropdown-menu {
  display: block;
}
.open > a {
  outline: 0;
}
.dropdown-menu-right {
  right: 0;
  left: auto;
}
.dropdown-menu-left {
  right: auto;
  left: 0;
}
.dropdown-header {
  display: block;
  padding: 3px 20px;
  font-size: 12px;
  line-height: 1.42857143;
  color: #777;
  white-space: nowrap;
}
.dropdown-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 990;
}
.pull-right > .dropdown-menu {
  right: 0;
  left: auto;
}
.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
  content: "";
  border-top: 0;
  border-bottom: 4px dashed;
  border-bottom: 4px solid \9;
}
.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-bottom: 2px;
}
@media (min-width: 768px) {
  .navbar-right .dropdown-menu {
    right: 0;
    left: auto;
  }
  .navbar-right .dropdown-menu-left {
    right: auto;
    left: 0;
  }
}
.btn-group,
.btn-group-vertical {
  position: relative;
  display: inline-block;
  vertical-align: middle;
}
.btn-group > .btn,
.btn-group-vertical > .btn {
  position: relative;
  float: left;
}
.btn-group > .btn:hover,
.btn-group-vertical > .btn:hover,
.btn-group > .btn:focus,
.btn-group-vertical > .btn:focus,
.btn-group > .btn:active,
.btn-group-vertical > .btn:active,
.btn-group > .btn.active,
.btn-group-vertical > .btn.active {
  z-index: 2;
}
.btn-group .btn + .btn,
.btn-group .btn + .btn-group,
.btn-group .btn-group + .btn,
.btn-group .btn-group + .btn-group {
  margin-left: -1px;
}
.btn-toolbar {
  margin-left: -5px;
}
.btn-toolbar .btn,
.btn-toolbar .btn-group,
.btn-toolbar .input-group {
  float: left;
}
.btn-toolbar > .btn,
.btn-toolbar > .btn-group,
.btn-toolbar > .input-group {
  margin-left: 5px;
}
.btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
  border-radius: 0;
}
.btn-group > .btn:first-child {
  margin-left: 0;
}
.btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.btn-group > .btn:last-child:not(:first-child),
.btn-group > .dropdown-toggle:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.btn-group > .btn-group {
  float: left;
}
.btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
  border-radius: 0;
}
.btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child,
.btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.btn-group .dropdown-toggle:active,
.btn-group.open .dropdown-toggle {
  outline: 0;
}
.btn-group > .btn + .dropdown-toggle {
  padding-right: 8px;
  padding-left: 8px;
}
.btn-group > .btn-lg + .dropdown-toggle {
  padding-right: 12px;
  padding-left: 12px;
}
.btn-group.open .dropdown-toggle {
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
          box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
}
.btn-group.open .dropdown-toggle.btn-link {
  -webkit-box-shadow: none;
          box-shadow: none;
}
.btn .caret {
  margin-left: 0;
}
.btn-lg .caret {
  border-width: 5px 5px 0;
  border-bottom-width: 0;
}
.dropup .btn-lg .caret {
  border-width: 0 5px 5px;
}
.btn-group-vertical > .btn,
.btn-group-vertical > .btn-group,
.btn-group-vertical > .btn-group > .btn {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%;
}
.btn-group-vertical > .btn-group > .btn {
  float: none;
}
.btn-group-vertical > .btn + .btn,
.btn-group-vertical > .btn + .btn-group,
.btn-group-vertical > .btn-group + .btn,
.btn-group-vertical > .btn-group + .btn-group {
  margin-top: -1px;
  margin-left: 0;
}
.btn-group-vertical > .btn:not(:first-child):not(:last-child) {
  border-radius: 0;
}
.btn-group-vertical > .btn:first-child:not(:last-child) {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.btn-group-vertical > .btn:last-child:not(:first-child) {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
}
.btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
  border-radius: 0;
}
.btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child,
.btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.btn-group-justified {
  display: table;
  width: 100%;
  table-layout: fixed;
  border-collapse: separate;
}
.btn-group-justified > .btn,
.btn-group-justified > .btn-group {
  display: table-cell;
  float: none;
  width: 1%;
}
.btn-group-justified > .btn-group .btn {
  width: 100%;
}
.btn-group-justified > .btn-group .dropdown-menu {
  left: auto;
}
[data-toggle="buttons"] > .btn input[type="radio"],
[data-toggle="buttons"] > .btn-group > .btn input[type="radio"],
[data-toggle="buttons"] > .btn input[type="checkbox"],
[data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"] {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none;
}
.input-group {
  position: relative;
  display: table;
  border-collapse: separate;
}
.input-group[class*="col-"] {
  float: none;
  padding-right: 0;
  padding-left: 0;
}
.input-group .form-control {
  position: relative;
  z-index: 2;
  float: left;
  width: 100%;
  margin-bottom: 0;
}
.input-group .form-control:focus {
  z-index: 3;
}
.input-group-lg > .form-control,
.input-group-lg > .input-group-addon,
.input-group-lg > .input-group-btn > .btn {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
select.input-group-lg > .form-control,
select.input-group-lg > .input-group-addon,
select.input-group-lg > .input-group-btn > .btn {
  height: 46px;
  line-height: 46px;
}
textarea.input-group-lg > .form-control,
textarea.input-group-lg > .input-group-addon,
textarea.input-group-lg > .input-group-btn > .btn,
select[multiple].input-group-lg > .form-control,
select[multiple].input-group-lg > .input-group-addon,
select[multiple].input-group-lg > .input-group-btn > .btn {
  height: auto;
}
.input-group-sm > .form-control,
.input-group-sm > .input-group-addon,
.input-group-sm > .input-group-btn > .btn {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
select.input-group-sm > .form-control,
select.input-group-sm > .input-group-addon,
select.input-group-sm > .input-group-btn > .btn {
  height: 30px;
  line-height: 30px;
}
textarea.input-group-sm > .form-control,
textarea.input-group-sm > .input-group-addon,
textarea.input-group-sm > .input-group-btn > .btn,
select[multiple].input-group-sm > .form-control,
select[multiple].input-group-sm > .input-group-addon,
select[multiple].input-group-sm > .input-group-btn > .btn {
  height: auto;
}
.input-group-addon,
.input-group-btn,
.input-group .form-control {
  display: table-cell;
}
.input-group-addon:not(:first-child):not(:last-child),
.input-group-btn:not(:first-child):not(:last-child),
.input-group .form-control:not(:first-child):not(:last-child) {
  border-radius: 0;
}
.input-group-addon,
.input-group-btn {
  width: 1%;
  white-space: nowrap;
  vertical-align: middle;
}
.input-group-addon {
  padding: 6px 12px;
  font-size: 14px;
  font-weight: normal;
  line-height: 1;
  color: #555;
  text-align: center;
  background-color: #eee;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.input-group-addon.input-sm {
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 3px;
}
.input-group-addon.input-lg {
  padding: 10px 16px;
  font-size: 18px;
  border-radius: 6px;
}
.input-group-addon input[type="radio"],
.input-group-addon input[type="checkbox"] {
  margin-top: 0;
}
.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .btn-group > .btn,
.input-group-btn:first-child > .dropdown-toggle,
.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),
.input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group-addon:first-child {
  border-right: 0;
}
.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .btn-group > .btn,
.input-group-btn:last-child > .dropdown-toggle,
.input-group-btn:first-child > .btn:not(:first-child),
.input-group-btn:first-child > .btn-group:not(:first-child) > .btn {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.input-group-addon:last-child {
  border-left: 0;
}
.input-group-btn {
  position: relative;
  font-size: 0;
  white-space: nowrap;
}
.input-group-btn > .btn {
  position: relative;
}
.input-group-btn > .btn + .btn {
  margin-left: -1px;
}
.input-group-btn > .btn:hover,
.input-group-btn > .btn:focus,
.input-group-btn > .btn:active {
  z-index: 2;
}
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .btn-group {
  margin-right: -1px;
}
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .btn-group {
  z-index: 2;
  margin-left: -1px;
}
.nav {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}
.nav > li {
  position: relative;
  display: block;
}
.nav > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
}
.nav > li > a:hover,
.nav > li > a:focus {
  text-decoration: none;
  background-color: #eee;
}
.nav > li.disabled > a {
  color: #777;
}
.nav > li.disabled > a:hover,
.nav > li.disabled > a:focus {
  color: #777;
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
}
.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {
  background-color: #eee;
  border-color: #337ab7;
}
.nav .nav-divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}
.nav > li > a > img {
  max-width: none;
}
.nav-tabs {
  border-bottom: 1px solid #ddd;
}
.nav-tabs > li {
  float: left;
  margin-bottom: -1px;
}
.nav-tabs > li > a {
  margin-right: 2px;
  line-height: 1.42857143;
  border: 1px solid transparent;
  border-radius: 4px 4px 0 0;
}
.nav-tabs > li > a:hover {
  border-color: #eee #eee #ddd;
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
  color: #555;
  cursor: default;
  background-color: #fff;
  border: 1px solid #ddd;
  border-bottom-color: transparent;
}
.nav-tabs.nav-justified {
  width: 100%;
  border-bottom: 0;
}
.nav-tabs.nav-justified > li {
  float: none;
}
.nav-tabs.nav-justified > li > a {
  margin-bottom: 5px;
  text-align: center;
}
.nav-tabs.nav-justified > .dropdown .dropdown-menu {
  top: auto;
  left: auto;
}
@media (min-width: 768px) {
  .nav-tabs.nav-justified > li {
    display: table-cell;
    width: 1%;
  }
  .nav-tabs.nav-justified > li > a {
    margin-bottom: 0;
  }
}
.nav-tabs.nav-justified > li > a {
  margin-right: 0;
  border-radius: 4px;
}
.nav-tabs.nav-justified > .active > a,
.nav-tabs.nav-justified > .active > a:hover,
.nav-tabs.nav-justified > .active > a:focus {
  border: 1px solid #ddd;
}
@media (min-width: 768px) {
  .nav-tabs.nav-justified > li > a {
    border-bottom: 1px solid #ddd;
    border-radius: 4px 4px 0 0;
  }
  .nav-tabs.nav-justified > .active > a,
  .nav-tabs.nav-justified > .active > a:hover,
  .nav-tabs.nav-justified > .active > a:focus {
    border-bottom-color: #fff;
  }
}
.nav-pills > li {
  float: left;
}
.nav-pills > li > a {
  border-radius: 4px;
}
.nav-pills > li + li {
  margin-left: 2px;
}
.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus {
  color: #fff;
  background-color: #337ab7;
}
.nav-stacked > li {
  float: none;
}
.nav-stacked > li + li {
  margin-top: 2px;
  margin-left: 0;
}
.nav-justified {
  width: 100%;
}
.nav-justified > li {
  float: none;
}
.nav-justified > li > a {
  margin-bottom: 5px;
  text-align: center;
}
.nav-justified > .dropdown .dropdown-menu {
  top: auto;
  left: auto;
}
@media (min-width: 768px) {
  .nav-justified > li {
    display: table-cell;
    width: 1%;
  }
  .nav-justified > li > a {
    margin-bottom: 0;
  }
}
.nav-tabs-justified {
  border-bottom: 0;
}
.nav-tabs-justified > li > a {
  margin-right: 0;
  border-radius: 4px;
}
.nav-tabs-justified > .active > a,
.nav-tabs-justified > .active > a:hover,
.nav-tabs-justified > .active > a:focus {
  border: 1px solid #ddd;
}
@media (min-width: 768px) {
  .nav-tabs-justified > li > a {
    border-bottom: 1px solid #ddd;
    border-radius: 4px 4px 0 0;
  }
  .nav-tabs-justified > .active > a,
  .nav-tabs-justified > .active > a:hover,
  .nav-tabs-justified > .active > a:focus {
    border-bottom-color: #fff;
  }
}
.tab-content > .tab-pane {
  display: none;
}
.tab-content > .active {
  display: block;
}
.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.navbar {
  position: relative;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent;
}
@media (min-width: 768px) {
  .navbar {
    border-radius: 4px;
  }
}
@media (min-width: 768px) {
  .navbar-header {
    float: left;
  }
}
.navbar-collapse {
  padding-right: 15px;
  padding-left: 15px;
  overflow-x: visible;
  -webkit-overflow-scrolling: touch;
  border-top: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
          box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
}
.navbar-collapse.in {
  overflow-y: auto;
}
@media (min-width: 768px) {
  .navbar-collapse {
    width: auto;
    border-top: 0;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
  .navbar-collapse.collapse {
    display: block !important;
    height: auto !important;
    padding-bottom: 0;
    overflow: visible !important;
  }
  .navbar-collapse.in {
    overflow-y: visible;
  }
  .navbar-fixed-top .navbar-collapse,
  .navbar-static-top .navbar-collapse,
  .navbar-fixed-bottom .navbar-collapse {
    padding-right: 0;
    padding-left: 0;
  }
}
.navbar-fixed-top .navbar-collapse,
.navbar-fixed-bottom .navbar-collapse {
  max-height: 340px;
}
@media (max-device-width: 480px) and (orientation: landscape) {
  .navbar-fixed-top .navbar-collapse,
  .navbar-fixed-bottom .navbar-collapse {
    max-height: 200px;
  }
}
.container > .navbar-header,
.container-fluid > .navbar-header,
.container > .navbar-collapse,
.container-fluid > .navbar-collapse {
  margin-right: -15px;
  margin-left: -15px;
}
@media (min-width: 768px) {
  .container > .navbar-header,
  .container-fluid > .navbar-header,
  .container > .navbar-collapse,
  .container-fluid > .navbar-collapse {
    margin-right: 0;
    margin-left: 0;
  }
}
.navbar-static-top {
  z-index: 1000;
  border-width: 0 0 1px;
}
@media (min-width: 768px) {
  .navbar-static-top {
    border-radius: 0;
  }
}
.navbar-fixed-top,
.navbar-fixed-bottom {
  position: fixed;
  right: 0;
  left: 0;
  z-index: 1030;
}
@media (min-width: 768px) {
  .navbar-fixed-top,
  .navbar-fixed-bottom {
    border-radius: 0;
  }
}
.navbar-fixed-top {
  top: 0;
  border-width: 0 0 1px;
}
.navbar-fixed-bottom {
  bottom: 0;
  margin-bottom: 0;
  border-width: 1px 0 0;
}
.navbar-brand {
  float: left;
  height: 50px;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px;
}
.navbar-brand:hover,
.navbar-brand:focus {
  text-decoration: none;
}
.navbar-brand > img {
  display: block;
}
@media (min-width: 768px) {
  .navbar > .container .navbar-brand,
  .navbar > .container-fluid .navbar-brand {
    margin-left: -15px;
  }
}
.navbar-toggle {
  position: relative;
  float: right;
  padding: 9px 10px;
  margin-top: 8px;
  margin-right: 15px;
  margin-bottom: 8px;
  background-color: transparent;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
.navbar-toggle:focus {
  outline: 0;
}
.navbar-toggle .icon-bar {
  display: block;
  width: 22px;
  height: 2px;
  border-radius: 1px;
}
.navbar-toggle .icon-bar + .icon-bar {
  margin-top: 4px;
}
@media (min-width: 768px) {
  .navbar-toggle {
    display: none;
  }
}
.navbar-nav {
  margin: 7.5px -15px;
}
.navbar-nav > li > a {
  padding-top: 10px;
  padding-bottom: 10px;
  line-height: 20px;
}
@media (max-width: 767px) {
  .navbar-nav .open .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0;
    background-color: transparent;
    border: 0;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
  .navbar-nav .open .dropdown-menu > li > a,
  .navbar-nav .open .dropdown-menu .dropdown-header {
    padding: 5px 15px 5px 25px;
  }
  .navbar-nav .open .dropdown-menu > li > a {
    line-height: 20px;
  }
  .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-nav .open .dropdown-menu > li > a:focus {
    background-image: none;
  }
}
@media (min-width: 768px) {
  .navbar-nav {
    float: left;
    margin: 0;
  }
  .navbar-nav > li {
    float: left;
  }
  .navbar-nav > li > a {
    padding-top: 15px;
    padding-bottom: 15px;
  }
}
.navbar-form {
  padding: 10px 15px;
  margin-top: 8px;
  margin-right: -15px;
  margin-bottom: 8px;
  margin-left: -15px;
  border-top: 1px solid transparent;
  border-bottom: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
          box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
}
@media (min-width: 768px) {
  .navbar-form .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
  }
  .navbar-form .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
  }
  .navbar-form .form-control-static {
    display: inline-block;
  }
  .navbar-form .input-group {
    display: inline-table;
    vertical-align: middle;
  }
  .navbar-form .input-group .input-group-addon,
  .navbar-form .input-group .input-group-btn,
  .navbar-form .input-group .form-control {
    width: auto;
  }
  .navbar-form .input-group > .form-control {
    width: 100%;
  }
  .navbar-form .control-label {
    margin-bottom: 0;
    vertical-align: middle;
  }
  .navbar-form .radio,
  .navbar-form .checkbox {
    display: inline-block;
    margin-top: 0;
    margin-bottom: 0;
    vertical-align: middle;
  }
  .navbar-form .radio label,
  .navbar-form .checkbox label {
    padding-left: 0;
  }
  .navbar-form .radio input[type="radio"],
  .navbar-form .checkbox input[type="checkbox"] {
    position: relative;
    margin-left: 0;
  }
  .navbar-form .has-feedback .form-control-feedback {
    top: 0;
  }
}
@media (max-width: 767px) {
  .navbar-form .form-group {
    margin-bottom: 5px;
  }
  .navbar-form .form-group:last-child {
    margin-bottom: 0;
  }
}
@media (min-width: 768px) {
  .navbar-form {
    width: auto;
    padding-top: 0;
    padding-bottom: 0;
    margin-right: 0;
    margin-left: 0;
    border: 0;
    -webkit-box-shadow: none;
            box-shadow: none;
  }
}
.navbar-nav > li > .dropdown-menu {
  margin-top: 0;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
  margin-bottom: 0;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.navbar-btn {
  margin-top: 8px;
  margin-bottom: 8px;
}
.navbar-btn.btn-sm {
  margin-top: 10px;
  margin-bottom: 10px;
}
.navbar-btn.btn-xs {
  margin-top: 14px;
  margin-bottom: 14px;
}
.navbar-text {
  margin-top: 15px;
  margin-bottom: 15px;
}
@media (min-width: 768px) {
  .navbar-text {
    float: left;
    margin-right: 15px;
    margin-left: 15px;
  }
}
@media (min-width: 768px) {
  .navbar-left {
    float: left !important;
  }
  .navbar-right {
    float: right !important;
    margin-right: -15px;
  }
  .navbar-right ~ .navbar-right {
    margin-right: 0;
  }
}
.navbar-default {
  background-color: #f8f8f8;
  border-color: #e7e7e7;
}
.navbar-default .navbar-brand {
  color: #777;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #5e5e5e;
  background-color: transparent;
}
.navbar-default .navbar-text {
  color: #777;
}
.navbar-default .navbar-nav > li > a {
  color: #777;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #333;
  background-color: transparent;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #555;
  background-color: #e7e7e7;
}
.navbar-default .navbar-nav > .disabled > a,
.navbar-default .navbar-nav > .disabled > a:hover,
.navbar-default .navbar-nav > .disabled > a:focus {
  color: #ccc;
  background-color: transparent;
}
.navbar-default .navbar-toggle {
  border-color: #ddd;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #ddd;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #888;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #e7e7e7;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #555;
  background-color: #e7e7e7;
}
@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #777;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #333;
    background-color: transparent;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #555;
    background-color: #e7e7e7;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #ccc;
    background-color: transparent;
  }
}
.navbar-default .navbar-link {
  color: #777;
}
.navbar-default .navbar-link:hover {
  color: #333;
}
.navbar-default .btn-link {
  color: #777;
}
.navbar-default .btn-link:hover,
.navbar-default .btn-link:focus {
  color: #333;
}
.navbar-default .btn-link[disabled]:hover,
fieldset[disabled] .navbar-default .btn-link:hover,
.navbar-default .btn-link[disabled]:focus,
fieldset[disabled] .navbar-default .btn-link:focus {
  color: #ccc;
}
.navbar-inverse {
  background-color: #222;
  border-color: #080808;
}
.navbar-inverse .navbar-brand {
  color: #9d9d9d;
}
.navbar-inverse .navbar-brand:hover,
.navbar-inverse .navbar-brand:focus {
  color: #fff;
  background-color: transparent;
}
.navbar-inverse .navbar-text {
  color: #9d9d9d;
}
.navbar-inverse .navbar-nav > li > a {
  color: #9d9d9d;
}
.navbar-inverse .navbar-nav > li > a:hover,
.navbar-inverse .navbar-nav > li > a:focus {
  color: #fff;
  background-color: transparent;
}
.navbar-inverse .navbar-nav > .active > a,
.navbar-inverse .navbar-nav > .active > a:hover,
.navbar-inverse .navbar-nav > .active > a:focus {
  color: #fff;
  background-color: #080808;
}
.navbar-inverse .navbar-nav > .disabled > a,
.navbar-inverse .navbar-nav > .disabled > a:hover,
.navbar-inverse .navbar-nav > .disabled > a:focus {
  color: #444;
  background-color: transparent;
}
.navbar-inverse .navbar-toggle {
  border-color: #333;
}
.navbar-inverse .navbar-toggle:hover,
.navbar-inverse .navbar-toggle:focus {
  background-color: #333;
}
.navbar-inverse .navbar-toggle .icon-bar {
  background-color: #fff;
}
.navbar-inverse .navbar-collapse,
.navbar-inverse .navbar-form {
  border-color: #101010;
}
.navbar-inverse .navbar-nav > .open > a,
.navbar-inverse .navbar-nav > .open > a:hover,
.navbar-inverse .navbar-nav > .open > a:focus {
  color: #fff;
  background-color: #080808;
}
@media (max-width: 767px) {
  .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
    border-color: #080808;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu .divider {
    background-color: #080808;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
    color: #9d9d9d;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #fff;
    background-color: transparent;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #080808;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #444;
    background-color: transparent;
  }
}
.navbar-inverse .navbar-link {
  color: #9d9d9d;
}
.navbar-inverse .navbar-link:hover {
  color: #fff;
}
.navbar-inverse .btn-link {
  color: #9d9d9d;
}
.navbar-inverse .btn-link:hover,
.navbar-inverse .btn-link:focus {
  color: #fff;
}
.navbar-inverse .btn-link[disabled]:hover,
fieldset[disabled] .navbar-inverse .btn-link:hover,
.navbar-inverse .btn-link[disabled]:focus,
fieldset[disabled] .navbar-inverse .btn-link:focus {
  color: #444;
}
.breadcrumb {
  padding: 8px 15px;
  margin-bottom: 20px;
  list-style: none;
  background-color: #f5f5f5;
  border-radius: 4px;
}
.breadcrumb > li {
  display: inline-block;
}
.breadcrumb > li + li:before {
  padding: 0 5px;
  color: #ccc;
  content: "/\A0";
}
.breadcrumb > .active {
  color: #777;
}
.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #337ab7;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #337ab7;
  border-color: #337ab7;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
.pager {
  padding-left: 0;
  margin: 20px 0;
  text-align: center;
  list-style: none;
}
.pager li {
  display: inline;
}
.pager li > a,
.pager li > span {
  display: inline-block;
  padding: 5px 14px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 15px;
}
.pager li > a:hover,
.pager li > a:focus {
  text-decoration: none;
  background-color: #eee;
}
.pager .next > a,
.pager .next > span {
  float: right;
}
.pager .previous > a,
.pager .previous > span {
  float: left;
}
.pager .disabled > a,
.pager .disabled > a:hover,
.pager .disabled > a:focus,
.pager .disabled > span {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
}
.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}
a.label:hover,
a.label:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}
.label:empty {
  display: none;
}
.btn .label {
  position: relative;
  top: -1px;
}
.label-default {
  background-color: #777;
}
.label-default[href]:hover,
.label-default[href]:focus {
  background-color: #5e5e5e;
}
.label-primary {
  background-color: #337ab7;
}
.label-primary[href]:hover,
.label-primary[href]:focus {
  background-color: #286090;
}
.label-success {
  background-color: #5cb85c;
}
.label-success[href]:hover,
.label-success[href]:focus {
  background-color: #449d44;
}
.label-info {
  background-color: #5bc0de;
}
.label-info[href]:hover,
.label-info[href]:focus {
  background-color: #31b0d5;
}
.label-warning {
  background-color: #f0ad4e;
}
.label-warning[href]:hover,
.label-warning[href]:focus {
  background-color: #ec971f;
}
.label-danger {
  background-color: #d9534f;
}
.label-danger[href]:hover,
.label-danger[href]:focus {
  background-color: #c9302c;
}
.badge {
  display: inline-block;
  min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  background-color: #777;
  border-radius: 10px;
}
.badge:empty {
  display: none;
}
.btn .badge {
  position: relative;
  top: -1px;
}
.btn-xs .badge,
.btn-group-xs > .btn .badge {
  top: 0;
  padding: 1px 5px;
}
a.badge:hover,
a.badge:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}
.list-group-item.active > .badge,
.nav-pills > .active > a > .badge {
  color: #337ab7;
  background-color: #fff;
}
.list-group-item > .badge {
  float: right;
}
.list-group-item > .badge + .badge {
  margin-right: 5px;
}
.nav-pills > li > a > .badge {
  margin-left: 3px;
}
.jumbotron {
  padding-top: 30px;
  padding-bottom: 30px;
  margin-bottom: 30px;
  color: inherit;
  background-color: #eee;
}
.jumbotron h1,
.jumbotron .h1 {
  color: inherit;
}
.jumbotron p {
  margin-bottom: 15px;
  font-size: 21px;
  font-weight: 200;
}
.jumbotron > hr {
  border-top-color: #d5d5d5;
}
.container .jumbotron,
.container-fluid .jumbotron {
  padding-right: 15px;
  padding-left: 15px;
  border-radius: 6px;
}
.jumbotron .container {
  max-width: 100%;
}
@media screen and (min-width: 768px) {
  .jumbotron {
    padding-top: 48px;
    padding-bottom: 48px;
  }
  .container .jumbotron,
  .container-fluid .jumbotron {
    padding-right: 60px;
    padding-left: 60px;
  }
  .jumbotron h1,
  .jumbotron .h1 {
    font-size: 63px;
  }
}
.thumbnail {
  display: block;
  padding: 4px;
  margin-bottom: 20px;
  line-height: 1.42857143;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  -webkit-transition: border .2s ease-in-out;
       -o-transition: border .2s ease-in-out;
          transition: border .2s ease-in-out;
}
.thumbnail > img,
.thumbnail a > img {
  margin-right: auto;
  margin-left: auto;
}
a.thumbnail:hover,
a.thumbnail:focus,
a.thumbnail.active {
  border-color: #337ab7;
}
.thumbnail .caption {
  padding: 9px;
  color: #333;
}
.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}
.alert h4 {
  margin-top: 0;
  color: inherit;
}
.alert .alert-link {
  font-weight: bold;
}
.alert > p,
.alert > ul {
  margin-bottom: 0;
}
.alert > p + p {
  margin-top: 5px;
}
.alert-dismissable,
.alert-dismissible {
  padding-right: 35px;
}
.alert-dismissable .close,
.alert-dismissible .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit;
}
.alert-success {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}
.alert-success hr {
  border-top-color: #c9e2b3;
}
.alert-success .alert-link {
  color: #2b542c;
}
.alert-info {
  color: #31708f;
  background-color: #d9edf7;
  border-color: #bce8f1;
}
.alert-info hr {
  border-top-color: #a6e1ec;
}
.alert-info .alert-link {
  color: #245269;
}
.alert-warning {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #faebcc;
}
.alert-warning hr {
  border-top-color: #f7e1b5;
}
.alert-warning .alert-link {
  color: #66512c;
}
.alert-danger {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
}
.alert-danger hr {
  border-top-color: #e4b9c0;
}
.alert-danger .alert-link {
  color: #843534;
}
@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
.progress {
  height: 20px;
  margin-bottom: 20px;
  overflow: hidden;
  background-color: #f5f5f5;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
}
.progress-bar {
  float: left;
  width: 0;
  height: 100%;
  font-size: 12px;
  line-height: 20px;
  color: #fff;
  text-align: center;
  background-color: #337ab7;
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
  -webkit-transition: width .6s ease;
       -o-transition: width .6s ease;
          transition: width .6s ease;
}
.progress-striped .progress-bar,
.progress-bar-striped {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
          background-size: 40px 40px;
}
.progress.active .progress-bar,
.progress-bar.active {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
       -o-animation: progress-bar-stripes 2s linear infinite;
          animation: progress-bar-stripes 2s linear infinite;
}
.progress-bar-success {
  background-color: #5cb85c;
}
.progress-striped .progress-bar-success {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.progress-bar-info {
  background-color: #5bc0de;
}
.progress-striped .progress-bar-info {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.progress-bar-warning {
  background-color: #f0ad4e;
}
.progress-striped .progress-bar-warning {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.progress-bar-danger {
  background-color: #d9534f;
}
.progress-striped .progress-bar-danger {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
}
.media {
  margin-top: 15px;
}
.media:first-child {
  margin-top: 0;
}
.media,
.media-body {
  overflow: hidden;
  zoom: 1;
}
.media-body {
  width: 10000px;
}
.media-object {
  display: block;
}
.media-object.img-thumbnail {
  max-width: none;
}
.media-right,
.media > .pull-right {
  padding-left: 10px;
}
.media-left,
.media > .pull-left {
  padding-right: 10px;
}
.media-left,
.media-right,
.media-body {
  display: table-cell;
  vertical-align: top;
}
.media-middle {
  vertical-align: middle;
}
.media-bottom {
  vertical-align: bottom;
}
.media-heading {
  margin-top: 0;
  margin-bottom: 5px;
}
.media-list {
  padding-left: 0;
  list-style: none;
}
.list-group {
  padding-left: 0;
  margin-bottom: 20px;
}
.list-group-item {
  position: relative;
  display: block;
  padding: 10px 15px;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid #ddd;
}
.list-group-item:first-child {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
.list-group-item:last-child {
  margin-bottom: 0;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
}
a.list-group-item,
button.list-group-item {
  color: #555;
}
a.list-group-item .list-group-item-heading,
button.list-group-item .list-group-item-heading {
  color: #333;
}
a.list-group-item:hover,
button.list-group-item:hover,
a.list-group-item:focus,
button.list-group-item:focus {
  color: #555;
  text-decoration: none;
  background-color: #f5f5f5;
}
button.list-group-item {
  width: 100%;
  text-align: left;
}
.list-group-item.disabled,
.list-group-item.disabled:hover,
.list-group-item.disabled:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #eee;
}
.list-group-item.disabled .list-group-item-heading,
.list-group-item.disabled:hover .list-group-item-heading,
.list-group-item.disabled:focus .list-group-item-heading {
  color: inherit;
}
.list-group-item.disabled .list-group-item-text,
.list-group-item.disabled:hover .list-group-item-text,
.list-group-item.disabled:focus .list-group-item-text {
  color: #777;
}
.list-group-item.active,
.list-group-item.active:hover,
.list-group-item.active:focus {
  z-index: 2;
  color: #fff;
  background-color: #337ab7;
  border-color: #337ab7;
}
.list-group-item.active .list-group-item-heading,
.list-group-item.active:hover .list-group-item-heading,
.list-group-item.active:focus .list-group-item-heading,
.list-group-item.active .list-group-item-heading > small,
.list-group-item.active:hover .list-group-item-heading > small,
.list-group-item.active:focus .list-group-item-heading > small,
.list-group-item.active .list-group-item-heading > .small,
.list-group-item.active:hover .list-group-item-heading > .small,
.list-group-item.active:focus .list-group-item-heading > .small {
  color: inherit;
}
.list-group-item.active .list-group-item-text,
.list-group-item.active:hover .list-group-item-text,
.list-group-item.active:focus .list-group-item-text {
  color: #c7ddef;
}
.list-group-item-success {
  color: #3c763d;
  background-color: #dff0d8;
}
a.list-group-item-success,
button.list-group-item-success {
  color: #3c763d;
}
a.list-group-item-success .list-group-item-heading,
button.list-group-item-success .list-group-item-heading {
  color: inherit;
}
a.list-group-item-success:hover,
button.list-group-item-success:hover,
a.list-group-item-success:focus,
button.list-group-item-success:focus {
  color: #3c763d;
  background-color: #d0e9c6;
}
a.list-group-item-success.active,
button.list-group-item-success.active,
a.list-group-item-success.active:hover,
button.list-group-item-success.active:hover,
a.list-group-item-success.active:focus,
button.list-group-item-success.active:focus {
  color: #fff;
  background-color: #3c763d;
  border-color: #3c763d;
}
.list-group-item-info {
  color: #31708f;
  background-color: #d9edf7;
}
a.list-group-item-info,
button.list-group-item-info {
  color: #31708f;
}
a.list-group-item-info .list-group-item-heading,
button.list-group-item-info .list-group-item-heading {
  color: inherit;
}
a.list-group-item-info:hover,
button.list-group-item-info:hover,
a.list-group-item-info:focus,
button.list-group-item-info:focus {
  color: #31708f;
  background-color: #c4e3f3;
}
a.list-group-item-info.active,
button.list-group-item-info.active,
a.list-group-item-info.active:hover,
button.list-group-item-info.active:hover,
a.list-group-item-info.active:focus,
button.list-group-item-info.active:focus {
  color: #fff;
  background-color: #31708f;
  border-color: #31708f;
}
.list-group-item-warning {
  color: #8a6d3b;
  background-color: #fcf8e3;
}
a.list-group-item-warning,
button.list-group-item-warning {
  color: #8a6d3b;
}
a.list-group-item-warning .list-group-item-heading,
button.list-group-item-warning .list-group-item-heading {
  color: inherit;
}
a.list-group-item-warning:hover,
button.list-group-item-warning:hover,
a.list-group-item-warning:focus,
button.list-group-item-warning:focus {
  color: #8a6d3b;
  background-color: #faf2cc;
}
a.list-group-item-warning.active,
button.list-group-item-warning.active,
a.list-group-item-warning.active:hover,
button.list-group-item-warning.active:hover,
a.list-group-item-warning.active:focus,
button.list-group-item-warning.active:focus {
  color: #fff;
  background-color: #8a6d3b;
  border-color: #8a6d3b;
}
.list-group-item-danger {
  color: #a94442;
  background-color: #f2dede;
}
a.list-group-item-danger,
button.list-group-item-danger {
  color: #a94442;
}
a.list-group-item-danger .list-group-item-heading,
button.list-group-item-danger .list-group-item-heading {
  color: inherit;
}
a.list-group-item-danger:hover,
button.list-group-item-danger:hover,
a.list-group-item-danger:focus,
button.list-group-item-danger:focus {
  color: #a94442;
  background-color: #ebcccc;
}
a.list-group-item-danger.active,
button.list-group-item-danger.active,
a.list-group-item-danger.active:hover,
button.list-group-item-danger.active:hover,
a.list-group-item-danger.active:focus,
button.list-group-item-danger.active:focus {
  color: #fff;
  background-color: #a94442;
  border-color: #a94442;
}
.list-group-item-heading {
  margin-top: 0;
  margin-bottom: 5px;
}
.list-group-item-text {
  margin-bottom: 0;
  line-height: 1.3;
}
.panel {
  margin-bottom: 20px;
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.panel-body {
  padding: 15px;
}
.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel-heading > .dropdown .dropdown-toggle {
  color: inherit;
}
.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
  color: inherit;
}
.panel-title > a,
.panel-title > small,
.panel-title > .small,
.panel-title > small > a,
.panel-title > .small > a {
  color: inherit;
}
.panel-footer {
  padding: 10px 15px;
  background-color: #f5f5f5;
  border-top: 1px solid #ddd;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .list-group,
.panel > .panel-collapse > .list-group {
  margin-bottom: 0;
}
.panel > .list-group .list-group-item,
.panel > .panel-collapse > .list-group .list-group-item {
  border-width: 1px 0;
  border-radius: 0;
}
.panel > .list-group:first-child .list-group-item:first-child,
.panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {
  border-top: 0;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel > .list-group:last-child .list-group-item:last-child,
.panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {
  border-bottom: 0;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .panel-heading + .panel-collapse > .list-group .list-group-item:first-child {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.panel-heading + .list-group .list-group-item:first-child {
  border-top-width: 0;
}
.list-group + .panel-footer {
  border-top-width: 0;
}
.panel > .table,
.panel > .table-responsive > .table,
.panel > .panel-collapse > .table {
  margin-bottom: 0;
}
.panel > .table caption,
.panel > .table-responsive > .table caption,
.panel > .panel-collapse > .table caption {
  padding-right: 15px;
  padding-left: 15px;
}
.panel > .table:first-child,
.panel > .table-responsive:first-child > .table:first-child {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel > .table:first-child > thead:first-child > tr:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child td:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child,
.panel > .table:first-child > thead:first-child > tr:first-child th:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child th:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child {
  border-top-left-radius: 3px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:last-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child,
.panel > .table:first-child > tbody:first-child > tr:first-child td:last-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child,
.panel > .table:first-child > thead:first-child > tr:first-child th:last-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child,
.panel > .table:first-child > tbody:first-child > tr:first-child th:last-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child {
  border-top-right-radius: 3px;
}
.panel > .table:last-child,
.panel > .table-responsive:last-child > .table:last-child {
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child {
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:first-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
.panel > .table:last-child > tbody:last-child > tr:last-child th:first-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child {
  border-bottom-left-radius: 3px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
.panel > .table:last-child > tbody:last-child > tr:last-child th:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child {
  border-bottom-right-radius: 3px;
}
.panel > .panel-body + .table,
.panel > .panel-body + .table-responsive,
.panel > .table + .panel-body,
.panel > .table-responsive + .panel-body {
  border-top: 1px solid #ddd;
}
.panel > .table > tbody:first-child > tr:first-child th,
.panel > .table > tbody:first-child > tr:first-child td {
  border-top: 0;
}
.panel > .table-bordered,
.panel > .table-responsive > .table-bordered {
  border: 0;
}
.panel > .table-bordered > thead > tr > th:first-child,
.panel > .table-responsive > .table-bordered > thead > tr > th:first-child,
.panel > .table-bordered > tbody > tr > th:first-child,
.panel > .table-responsive > .table-bordered > tbody > tr > th:first-child,
.panel > .table-bordered > tfoot > tr > th:first-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child,
.panel > .table-bordered > thead > tr > td:first-child,
.panel > .table-responsive > .table-bordered > thead > tr > td:first-child,
.panel > .table-bordered > tbody > tr > td:first-child,
.panel > .table-responsive > .table-bordered > tbody > tr > td:first-child,
.panel > .table-bordered > tfoot > tr > td:first-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child {
  border-left: 0;
}
.panel > .table-bordered > thead > tr > th:last-child,
.panel > .table-responsive > .table-bordered > thead > tr > th:last-child,
.panel > .table-bordered > tbody > tr > th:last-child,
.panel > .table-responsive > .table-bordered > tbody > tr > th:last-child,
.panel > .table-bordered > tfoot > tr > th:last-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child,
.panel > .table-bordered > thead > tr > td:last-child,
.panel > .table-responsive > .table-bordered > thead > tr > td:last-child,
.panel > .table-bordered > tbody > tr > td:last-child,
.panel > .table-responsive > .table-bordered > tbody > tr > td:last-child,
.panel > .table-bordered > tfoot > tr > td:last-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child {
  border-right: 0;
}
.panel > .table-bordered > thead > tr:first-child > td,
.panel > .table-responsive > .table-bordered > thead > tr:first-child > td,
.panel > .table-bordered > tbody > tr:first-child > td,
.panel > .table-responsive > .table-bordered > tbody > tr:first-child > td,
.panel > .table-bordered > thead > tr:first-child > th,
.panel > .table-responsive > .table-bordered > thead > tr:first-child > th,
.panel > .table-bordered > tbody > tr:first-child > th,
.panel > .table-responsive > .table-bordered > tbody > tr:first-child > th {
  border-bottom: 0;
}
.panel > .table-bordered > tbody > tr:last-child > td,
.panel > .table-responsive > .table-bordered > tbody > tr:last-child > td,
.panel > .table-bordered > tfoot > tr:last-child > td,
.panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td,
.panel > .table-bordered > tbody > tr:last-child > th,
.panel > .table-responsive > .table-bordered > tbody > tr:last-child > th,
.panel > .table-bordered > tfoot > tr:last-child > th,
.panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {
  border-bottom: 0;
}
.panel > .table-responsive {
  margin-bottom: 0;
  border: 0;
}
.panel-group {
  margin-bottom: 20px;
}
.panel-group .panel {
  margin-bottom: 0;
  border-radius: 4px;
}
.panel-group .panel + .panel {
  margin-top: 5px;
}
.panel-group .panel-heading {
  border-bottom: 0;
}
.panel-group .panel-heading + .panel-collapse > .panel-body,
.panel-group .panel-heading + .panel-collapse > .list-group {
  border-top: 1px solid #ddd;
}
.panel-group .panel-footer {
  border-top: 0;
}
.panel-group .panel-footer + .panel-collapse .panel-body {
  border-bottom: 1px solid #ddd;
}
.panel-default {
  border-color: #ddd;
}
.panel-default > .panel-heading {
  color: #333;
  background-color: #f5f5f5;
  border-color: #ddd;
}
.panel-default > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #ddd;
}
.panel-default > .panel-heading .badge {
  color: #f5f5f5;
  background-color: #333;
}
.panel-default > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #ddd;
}
.panel-primary {
  border-color: #337ab7;
}
.panel-primary > .panel-heading {
  color: #fff;
  background-color: #337ab7;
  border-color: #337ab7;
}
.panel-primary > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #337ab7;
}
.panel-primary > .panel-heading .badge {
  color: #337ab7;
  background-color: #fff;
}
.panel-primary > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #337ab7;
}
.panel-success {
  border-color: #d6e9c6;
}
.panel-success > .panel-heading {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}
.panel-success > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #d6e9c6;
}
.panel-success > .panel-heading .badge {
  color: #dff0d8;
  background-color: #3c763d;
}
.panel-success > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #d6e9c6;
}
.panel-info {
  border-color: #bce8f1;
}
.panel-info > .panel-heading {
  color: #31708f;
  background-color: #d9edf7;
  border-color: #bce8f1;
}
.panel-info > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #bce8f1;
}
.panel-info > .panel-heading .badge {
  color: #d9edf7;
  background-color: #31708f;
}
.panel-info > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #bce8f1;
}
.panel-warning {
  border-color: #faebcc;
}
.panel-warning > .panel-heading {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #faebcc;
}
.panel-warning > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #faebcc;
}
.panel-warning > .panel-heading .badge {
  color: #fcf8e3;
  background-color: #8a6d3b;
}
.panel-warning > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #faebcc;
}
.panel-danger {
  border-color: #ebccd1;
}
.panel-danger > .panel-heading {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
}
.panel-danger > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #ebccd1;
}
.panel-danger > .panel-heading .badge {
  color: #f2dede;
  background-color: #a94442;
}
.panel-danger > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #ebccd1;
}
.embed-responsive {
  position: relative;
  display: block;
  height: 0;
  padding: 0;
  overflow: hidden;
}
.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
.embed-responsive-16by9 {
  padding-bottom: 56.25%;
}
.embed-responsive-4by3 {
  padding-bottom: 75%;
}
.well {
  min-height: 20px;
  padding: 19px;
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
}
.well blockquote {
  border-color: #ddd;
  border-color: rgba(0, 0, 0, .15);
}
.well-lg {
  padding: 24px;
  border-radius: 6px;
}
.well-sm {
  padding: 9px;
  border-radius: 3px;
}
.close {
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  filter: alpha(opacity=20);
  opacity: .2;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  filter: alpha(opacity=50);
  opacity: .5;
}
button.close {
  -webkit-appearance: none;
  padding: 0;
  cursor: pointer;
  background: transparent;
  border: 0;
}
.modal-open {
  overflow: hidden;
}
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: none;
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
  outline: 0;
}
.modal.fade .modal-dialog {
  -webkit-transition: -webkit-transform .3s ease-out;
       -o-transition:      -o-transform .3s ease-out;
          transition:         transform .3s ease-out;
  -webkit-transform: translate(0, -25%);
      -ms-transform: translate(0, -25%);
       -o-transform: translate(0, -25%);
          transform: translate(0, -25%);
}
.modal.in .modal-dialog {
  -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
       -o-transform: translate(0, 0);
          transform: translate(0, 0);
}
.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}
.modal-dialog {
  position: relative;
  width: auto;
  margin: 10px;
}
.modal-content {
  position: relative;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  outline: 0;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
          box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
}
.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000;
}
.modal-backdrop.fade {
  filter: alpha(opacity=0);
  opacity: 0;
}
.modal-backdrop.in {
  filter: alpha(opacity=50);
  opacity: .5;
}
.modal-header {
  padding: 15px;
  border-bottom: 1px solid #e5e5e5;
}
.modal-header .close {
  margin-top: -2px;
}
.modal-title {
  margin: 0;
  line-height: 1.42857143;
}
.modal-body {
  position: relative;
  padding: 15px;
}
.modal-footer {
  padding: 15px;
  text-align: right;
  border-top: 1px solid #e5e5e5;
}
.modal-footer .btn + .btn {
  margin-bottom: 0;
  margin-left: 5px;
}
.modal-footer .btn-group .btn + .btn {
  margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
  margin-left: 0;
}
.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll;
}
@media (min-width: 768px) {
  .modal-dialog {
    width: 600px;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
  .modal-sm {
    width: 300px;
  }
}
@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}
.tooltip {
  position: absolute;
  z-index: 1070;
  display: block;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
  filter: alpha(opacity=0);
  opacity: 0;

  line-break: auto;
}
.tooltip.in {
  filter: alpha(opacity=90);
  opacity: .9;
}
.tooltip.top {
  padding: 5px 0;
  margin-top: -3px;
}
.tooltip.right {
  padding: 0 5px;
  margin-left: 3px;
}
.tooltip.bottom {
  padding: 5px 0;
  margin-top: 3px;
}
.tooltip.left {
  padding: 0 5px;
  margin-left: -3px;
}
.tooltip-inner {
  max-width: 200px;
  padding: 3px 8px;
  color: #fff;
  text-align: center;
  background-color: #000;
  border-radius: 4px;
}
.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}
.tooltip.top .tooltip-arrow {
  bottom: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000;
}
.tooltip.top-left .tooltip-arrow {
  right: 5px;
  bottom: 0;
  margin-bottom: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000;
}
.tooltip.top-right .tooltip-arrow {
  bottom: 0;
  left: 5px;
  margin-bottom: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000;
}
.tooltip.right .tooltip-arrow {
  top: 50%;
  left: 0;
  margin-top: -5px;
  border-width: 5px 5px 5px 0;
  border-right-color: #000;
}
.tooltip.left .tooltip-arrow {
  top: 50%;
  right: 0;
  margin-top: -5px;
  border-width: 5px 0 5px 5px;
  border-left-color: #000;
}
.tooltip.bottom .tooltip-arrow {
  top: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000;
}
.tooltip.bottom-left .tooltip-arrow {
  top: 0;
  right: 5px;
  margin-top: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000;
}
.tooltip.bottom-right .tooltip-arrow {
  top: 0;
  left: 5px;
  margin-top: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000;
}
.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: none;
  max-width: 276px;
  padding: 1px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
          box-shadow: 0 5px 10px rgba(0, 0, 0, .2);

  line-break: auto;
}
.popover.top {
  margin-top: -10px;
}
.popover.right {
  margin-left: 10px;
}
.popover.bottom {
  margin-top: 10px;
}
.popover.left {
  margin-left: -10px;
}
.popover-title {
  padding: 8px 14px;
  margin: 0;
  font-size: 14px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 5px 5px 0 0;
}
.popover-content {
  padding: 9px 14px;
}
.popover > .arrow,
.popover > .arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}
.popover > .arrow {
  border-width: 11px;
}
.popover > .arrow:after {
  content: "";
  border-width: 10px;
}
.popover.top > .arrow {
  bottom: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-color: #999;
  border-top-color: rgba(0, 0, 0, .25);
  border-bottom-width: 0;
}
.popover.top > .arrow:after {
  bottom: 1px;
  margin-left: -10px;
  content: " ";
  border-top-color: #fff;
  border-bottom-width: 0;
}
.popover.right > .arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-right-color: #999;
  border-right-color: rgba(0, 0, 0, .25);
  border-left-width: 0;
}
.popover.right > .arrow:after {
  bottom: -10px;
  left: 1px;
  content: " ";
  border-right-color: #fff;
  border-left-width: 0;
}
.popover.bottom > .arrow {
  top: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-width: 0;
  border-bottom-color: #999;
  border-bottom-color: rgba(0, 0, 0, .25);
}
.popover.bottom > .arrow:after {
  top: 1px;
  margin-left: -10px;
  content: " ";
  border-top-width: 0;
  border-bottom-color: #fff;
}
.popover.left > .arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-right-width: 0;
  border-left-color: #999;
  border-left-color: rgba(0, 0, 0, .25);
}
.popover.left > .arrow:after {
  right: 1px;
  bottom: -10px;
  content: " ";
  border-right-width: 0;
  border-left-color: #fff;
}
.carousel {
  position: relative;
}
.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}
.carousel-inner > .item {
  position: relative;
  display: none;
  -webkit-transition: .6s ease-in-out left;
       -o-transition: .6s ease-in-out left;
          transition: .6s ease-in-out left;
}
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  line-height: 1;
}
@media all and (transform-3d), (-webkit-transform-3d) {
  .carousel-inner > .item {
    -webkit-transition: -webkit-transform .6s ease-in-out;
         -o-transition:      -o-transform .6s ease-in-out;
            transition:         transform .6s ease-in-out;

    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    -webkit-perspective: 1000px;
            perspective: 1000px;
  }
  .carousel-inner > .item.next,
  .carousel-inner > .item.active.right {
    left: 0;
    -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
  }
  .carousel-inner > .item.prev,
  .carousel-inner > .item.active.left {
    left: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
  }
  .carousel-inner > .item.next.left,
  .carousel-inner > .item.prev.right,
  .carousel-inner > .item.active {
    left: 0;
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
}
.carousel-inner > .active,
.carousel-inner > .next,
.carousel-inner > .prev {
  display: block;
}
.carousel-inner > .active {
  left: 0;
}
.carousel-inner > .next,
.carousel-inner > .prev {
  position: absolute;
  top: 0;
  width: 100%;
}
.carousel-inner > .next {
  left: 100%;
}
.carousel-inner > .prev {
  left: -100%;
}
.carousel-inner > .next.left,
.carousel-inner > .prev.right {
  left: 0;
}
.carousel-inner > .active.left {
  left: -100%;
}
.carousel-inner > .active.right {
  left: 100%;
}
.carousel-control {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15%;
  font-size: 20px;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
  background-color: rgba(0, 0, 0, 0);
  filter: alpha(opacity=50);
  opacity: .5;
}
.carousel-control.left {
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
  background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
  background-repeat: repeat-x;
}
.carousel-control.right {
  right: 0;
  left: auto;
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
  background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
  background-repeat: repeat-x;
}
.carousel-control:hover,
.carousel-control:focus {
  color: #fff;
  text-decoration: none;
  filter: alpha(opacity=90);
  outline: 0;
  opacity: .9;
}
.carousel-control .icon-prev,
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right {
  position: absolute;
  top: 50%;
  z-index: 5;
  display: inline-block;
  margin-top: -10px;
}
.carousel-control .icon-prev,
.carousel-control .glyphicon-chevron-left {
  left: 50%;
  margin-left: -10px;
}
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-right {
  right: 50%;
  margin-right: -10px;
}
.carousel-control .icon-prev,
.carousel-control .icon-next {
  width: 20px;
  height: 20px;
  font-family: serif;
  line-height: 1;
}
.carousel-control .icon-prev:before {
  content: '\2039';
}
.carousel-control .icon-next:before {
  content: '\203A';
}
.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 15;
  width: 60%;
  padding-left: 0;
  margin-left: -30%;
  text-align: center;
  list-style: none;
}
.carousel-indicators li {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 1px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #000 \9;
  background-color: rgba(0, 0, 0, 0);
  border: 1px solid #fff;
  border-radius: 10px;
}
.carousel-indicators .active {
  width: 12px;
  height: 12px;
  margin: 0;
  background-color: #fff;
}
.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
}
.carousel-caption .btn {
  text-shadow: none;
}
@media screen and (min-width: 768px) {
  .carousel-control .glyphicon-chevron-left,
  .carousel-control .glyphicon-chevron-right,
  .carousel-control .icon-prev,
  .carousel-control .icon-next {
    width: 30px;
    height: 30px;
    margin-top: -10px;
    font-size: 30px;
  }
  .carousel-control .glyphicon-chevron-left,
  .carousel-control .icon-prev {
    margin-left: -10px;
  }
  .carousel-control .glyphicon-chevron-right,
  .carousel-control .icon-next {
    margin-right: -10px;
  }
  .carousel-caption {
    right: 20%;
    left: 20%;
    padding-bottom: 30px;
  }
  .carousel-indicators {
    bottom: 20px;
  }
}
.clearfix:before,
.clearfix:after,
.dl-horizontal dd:before,
.dl-horizontal dd:after,
.container:before,
.container:after,
.container-fluid:before,
.container-fluid:after,
.row:before,
.row:after,
.form-horizontal .form-group:before,
.form-horizontal .form-group:after,
.btn-toolbar:before,
.btn-toolbar:after,
.btn-group-vertical > .btn-group:before,
.btn-group-vertical > .btn-group:after,
.nav:before,
.nav:after,
.navbar:before,
.navbar:after,
.navbar-header:before,
.navbar-header:after,
.navbar-collapse:before,
.navbar-collapse:after,
.pager:before,
.pager:after,
.panel-body:before,
.panel-body:after,
.modal-header:before,
.modal-header:after,
.modal-footer:before,
.modal-footer:after {
  display: table;
  content: " ";
}
.clearfix:after,
.dl-horizontal dd:after,
.container:after,
.container-fluid:after,
.row:after,
.form-horizontal .form-group:after,
.btn-toolbar:after,
.btn-group-vertical > .btn-group:after,
.nav:after,
.navbar:after,
.navbar-header:after,
.navbar-collapse:after,
.pager:after,
.panel-body:after,
.modal-header:after,
.modal-footer:after {
  clear: both;
}
.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}
.pull-right {
  float: right !important;
}
.pull-left {
  float: left !important;
}
.hide {
  display: none !important;
}
.show {
  display: block !important;
}
.invisible {
  visibility: hidden;
}
.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}
.hidden {
  display: none !important;
}
.affix {
  position: fixed;
}
@-ms-viewport {
  width: device-width;
}
.visible-xs,
.visible-sm,
.visible-md,
.visible-lg {
  display: none !important;
}
.visible-xs-block,
.visible-xs-inline,
.visible-xs-inline-block,
.visible-sm-block,
.visible-sm-inline,
.visible-sm-inline-block,
.visible-md-block,
.visible-md-inline,
.visible-md-inline-block,
.visible-lg-block,
.visible-lg-inline,
.visible-lg-inline-block {
  display: none !important;
}
@media (max-width: 767px) {
  .visible-xs {
    display: block !important;
  }
  table.visible-xs {
    display: table !important;
  }
  tr.visible-xs {
    display: table-row !important;
  }
  th.visible-xs,
  td.visible-xs {
    display: table-cell !important;
  }
}
@media (max-width: 767px) {
  .visible-xs-block {
    display: block !important;
  }
}
@media (max-width: 767px) {
  .visible-xs-inline {
    display: inline !important;
  }
}
@media (max-width: 767px) {
  .visible-xs-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .visible-sm {
    display: block !important;
  }
  table.visible-sm {
    display: table !important;
  }
  tr.visible-sm {
    display: table-row !important;
  }
  th.visible-sm,
  td.visible-sm {
    display: table-cell !important;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .visible-sm-block {
    display: block !important;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .visible-sm-inline {
    display: inline !important;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .visible-sm-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .visible-md {
    display: block !important;
  }
  table.visible-md {
    display: table !important;
  }
  tr.visible-md {
    display: table-row !important;
  }
  th.visible-md,
  td.visible-md {
    display: table-cell !important;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .visible-md-block {
    display: block !important;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .visible-md-inline {
    display: inline !important;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .visible-md-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 1200px) {
  .visible-lg {
    display: block !important;
  }
  table.visible-lg {
    display: table !important;
  }
  tr.visible-lg {
    display: table-row !important;
  }
  th.visible-lg,
  td.visible-lg {
    display: table-cell !important;
  }
}
@media (min-width: 1200px) {
  .visible-lg-block {
    display: block !important;
  }
}
@media (min-width: 1200px) {
  .visible-lg-inline {
    display: inline !important;
  }
}
@media (min-width: 1200px) {
  .visible-lg-inline-block {
    display: inline-block !important;
  }
}
@media (max-width: 767px) {
  .hidden-xs {
    display: none !important;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .hidden-sm {
    display: none !important;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .hidden-md {
    display: none !important;
  }
}
@media (min-width: 1200px) {
  .hidden-lg {
    display: none !important;
  }
}
.visible-print {
  display: none !important;
}
@media print {
  .visible-print {
    display: block !important;
  }
  table.visible-print {
    display: table !important;
  }
  tr.visible-print {
    display: table-row !important;
  }
  th.visible-print,
  td.visible-print {
    display: table-cell !important;
  }
}
.visible-print-block {
  display: none !important;
}
@media print {
  .visible-print-block {
    display: block !important;
  }
}
.visible-print-inline {
  display: none !important;
}
@media print {
  .visible-print-inline {
    display: inline !important;
  }
}
.visible-print-inline-block {
  display: none !important;
}
@media print {
  .visible-print-inline-block {
    display: inline-block !important;
  }
}
@media print {
  .hidden-print {
    display: none !important;
  }
}
/*# sourceMappingURL=bootstrap.css.map */
</style><style type="text/css">/* Make clicks pass-through */
#nprogress {
  pointer-events: none;
}

#nprogress .bar {
  background: #29d;

  position: fixed;
  z-index: 1031;
  top: 0;
  left: 0;

  width: 100%;
  height: 2px;
}

/* Fancy blur effect */
#nprogress .peg {
  display: block;
  position: absolute;
  right: 0px;
  width: 100px;
  height: 100%;
  box-shadow: 0 0 10px #29d, 0 0 5px #29d;
  opacity: 1.0;

  -webkit-transform: rotate(3deg) translate(0px, -4px);
      -ms-transform: rotate(3deg) translate(0px, -4px);
          transform: rotate(3deg) translate(0px, -4px);
}

/* Remove these to get rid of the spinner */
#nprogress .spinner {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 15px;
  right: 15px;
}

#nprogress .spinner-icon {
  width: 18px;
  height: 18px;
  box-sizing: border-box;

  border: solid 2px transparent;
  border-top-color: #29d;
  border-left-color: #29d;
  border-radius: 50%;

  -webkit-animation: nprogress-spinner 400ms linear infinite;
          animation: nprogress-spinner 400ms linear infinite;
}

.nprogress-custom-parent {
  overflow: hidden;
  position: relative;
}

.nprogress-custom-parent #nprogress .spinner,
.nprogress-custom-parent #nprogress .bar {
  position: absolute;
}

@-webkit-keyframes nprogress-spinner {
  0%   { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}
@keyframes nprogress-spinner {
  0%   { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style><style type="text/css">body,
input,
button,
select,
textarea,
table {
  font: 12px/1.5 Tahoma, Helvetica, Arial, sans-serif;
  font-family: 'Microsoft YaHei', Tahoma, Helvetica, Arial, sans-serif;
}
a,
a:hover,
a:focus {
  color: #333;
  text-decoration: none;
}
.content-wrap {
  width: 1000px;
  margin: 10px auto;
}
.content {
  margin-top: 50px;
}
body {
  overflow-x: hidden;
  background-color: #e1e1e1;
  -webkit-user-select: none;
  user-select: none;
}
button,
a {
  outline: none;
}
dd {
  -webkit-user-select: text;
  user-select: text;
}
.snap-drawer li > a {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/93127eb50d7a79c66816224099c0240b.png);
  background-repeat: no-repeat;
  background-position: center right;
  margin-right: 15px;
  background-size: 9px 15px;
}
.snap-content {
  padding-right: 0px;
  padding-left: 0px;
}
.debug-tip {
  position: fixed;
  bottom: 0;
  height: 50px;
  color: #fff;
  text-shadow: 0 0 3px #000;
  z-index: 600;
  text-align: right;
  line-height: 50px;
  opacity: 0.5;
  right: 0;
  padding: 0 2em;
  border-top-left-radius: 10px;
  display: none;
}
.debug-tip.hover {
  background: rgba(0,0,0,0.1);
}
.cpn-back-to-top {
  -webkit-transition: 800ms all ease;
  transition: 800ms all ease;
  position: fixed;
  bottom: 0;
  right: 0;
  padding: 10px;
  z-index: 400;
}
.cpn-back-to-top .circle {
  background-color: rgba(0,0,0,0.7);
  width: 48px;
  height: 48px;
  line-height: 48px;
  color: #fff;
  text-align: center;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}
.cpn-back-to-top i {
  font-size: 28px;
}
.cpn-back-to-top.cpn-back-to-top-hide {
  -webkit-transform: translateY(68px);
  transform: translateY(68px);
}
.cpn-primary-button {
  font-size: 14px;
  min-width: 156px;
  height: 36px;
  line-height: 36px;
  border: none;
  background-color: #fe8233;
  padding: 0;
  margin: 0;
  border-radius: 18px;
  color: #fff;
  -webkit-transition: 0.5s ease;
}
.cpn-primary-button:hover,
.cpn-primary-button.hover {
  background-color: #e47630;
}
.cpn-primary-button.disabled {
  background-color: #ccc;
}
.cpn-check-box {
  line-height: 16px;
  text-align: center;
  cursor: pointer;
  padding: 8px;
}
.cpn-check-box .box {
  border: 1px solid #ccc;
  color: #fe8233;
  width: 16px;
  height: 16px;
}
.cpn-check-box i {
  font-size: 18px;
}
.cpn-check-box.disabled .box {
  background-color: #dedede;
}
.application-sidebar ul,
.application-sidebar li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.application-sidebar a {
  color: #9a9a9a;
  font-size: 14px;
}
.application-sidebar .sidebar-container {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  color: #9a9a9a;
  z-index: 501;
}
.application-sidebar .sidebar-container .sidebar-overlay {
  background: rgba(0,0,0,0.5);
  position: absolute;
  top: 50px;
  right: 0;
  bottom: 0;
  left: 0;
  transition: all ease 0.4s;
  -webkit-transition: all ease 0.4s;
}
.application-sidebar .sidebar-container .sidebar-overlay nav {
  border-top: 1px solid #222;
  box-shadow: 0 1px 1px #363636 inset;
  background: #282828;
  position: absolute;
  display: block;
  top: 0;
  right: 110px;
  bottom: 0;
  left: 0;
  transition: all ease 0.4s;
  -webkit-transition: all ease 0.4s;
}
.application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 50px;
}
.application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background-color: #383636;
}
.application-sidebar .sidebar-container .sidebar-overlay nav li a {
  display: block;
  width: 100%;
  padding: 0 16px;
  border-bottom: 1px dotted #333;
}
.application-sidebar .sidebar-container .sidebar-overlay nav li a .right {
  float: right;
  color: #666;
  font-size: 14px;
}
.application-sidebar .sidebar-container .sidebar-overlay .sink {
  position: absolute;
  bottom: 0;
  width: 100%;
  text-align: center;
}
.application-sidebar .sidebar-container .sidebar-overlay .sink .rollback {
  display: inline-block;
  font-size: 12px;
  height: 20px;
  border-radius: 8px;
  border: #363636 1px solid;
  color: #9a9a9a;
  text-align: center;
  line-height: 24px;
  height: 26px;
  padding: 0 1em;
  margin-bottom: 2em;
  box-shadow: 0 -1px rgba(0,0,0,0.7), 0 -1px 0 rgba(154,154,154,0.4) inset;
}
.application-sidebar .sidebar-container .sidebar-overlay .sink .rollback.hover {
  background-color: #363636;
}
.application-sidebar .sidebar-container .sidebar-overlay .sink .version {
  border-top: 1px solid #333;
  padding: 1em 2em;
  text-align: center;
  box-shadow: 0 1px #222 inset;
}
.application-sidebar .transition-sidebar-enter .sidebar-overlay {
  opacity: 0.1;
}
.application-sidebar .transition-sidebar-enter .sidebar-overlay nav {
  transform: translate3D(-300px, 0, 0);
  -webkit-transform: translate3D(-300px, 0, 0);
}
.application-sidebar .transition-sidebar-enter.transition-sidebar-enter-active .sidebar-overlay {
  opacity: 1;
}
.application-sidebar .transition-sidebar-enter.transition-sidebar-enter-active .sidebar-overlay nav {
  transform: translate3D(0, 0, 0);
  -webkit-transform: translate3D(0, 0, 0);
}
.application-sidebar .transition-sidebar-leave .sidebar-overlay {
  opacity: 1;
}
.application-sidebar .transition-sidebar-leave .sidebar-overlay nav {
  transform: translate3D(0, 0, 0);
  -webkit-transform: translate3D(0, 0, 0);
}
.application-sidebar .transition-sidebar-leave.transition-sidebar-leave-active .sidebar-overlay {
  opacity: 0.1;
}
.application-sidebar .transition-sidebar-leave.transition-sidebar-leave-active .sidebar-overlay nav {
  transform: translate3D(-300px, 0, 0);
  -webkit-transform: translate3D(-300px, 0, 0);
}
.fixfixed #toolbar {
  position: absolute;
}
#toolbar {
  background: #282828;
  position: fixed;
  z-index: 500;
  top: 0;
  right: 0;
  left: 0;
  width: auto;
  height: 50px;
  line-height: 50px;
  overflow: hidden;
}
#toolbar h1 {
  color: #fff;
  font-size: 16px;
  line-height: 50px;
  text-align: left;
  text-shadow: 0 -1px 0 rgba(0,0,0,0.8);
  width: auto;
  height: 50px;
  margin: 0 auto;
  float: left;
}
#toolbar h1 a {
  font-size: 16px;
  line-height: 50px;
  text-align: left;
  text-shadow: 0 -1px 0 rgba(0,0,0,0.8);
}
#toolbar h1 a .toolbar-title-icon {
  float: left;
  width: 48px;
  text-align: center;
  border-right: 1px solid #222;
  box-shadow: 1px 0 1px #363636;
  color: #999;
}
#toolbar h1 a .toolbar-title-icon.hover {
  background-color: #383636;
}
#toolbar h1 a .toolbar-title {
  padding: 0 1em;
  float: left;
  font-size: 14px;
  color: #efefef;
  text-overflow: ellipsis;
  white-space: nowrap;
  displdday: inline-block;
  overflow: hidden;
}
@media (max-width: 320px) {
  #toolbar h1 a .toolbar-title {
    width: 150px;
  }
}
@media (min-width: 320px) and (max-width: 375px) {
  #toolbar h1 a .toolbar-title {
    max-width: 200px;
  }
}
#toolbar h1 a .toolbar-title img {
  height: 26px;
}
#nav-right {
  float: right;
}
#nav-right a {
  color: #999;
}
#nav-right .city {
  float: left;
  font-size: 14px;
  padding: 0 6px;
}
#nav-right .city i {
  font-size: 12px;
}
#nav-right .user {
  float: left;
  font-size: 16px;
  width: 48px;
  text-align: center;
}
#open-left {
  display: block;
  text-align: center;
  line-height: 50px;
  height: 50px;
  float: left;
}
.notybar-bar {
  position: fixed;
  top: 0;
  width: 100%;
  height: 50px;
  background-color: #353535;
  z-index: 10000;
  line-height: 22px;
  padding: 14px 24px;
  font-size: 12px;
  -webkit-transition: all 0.6s ease;
  transition: all 0.6s ease;
  -webkit-transform: rotate3d(1, 0, 0, 90deg);
  transform: rotate3d(1, 0, 0, 90deg);
  -webkit-transform-origin: 0 25px -25px;
  transform-origin: 0 25px -25px;
  opacity: 0;
}
.notybar-bar .notybar-message {
  width: 100%;
  word-wrap: break-word;
  word-break: break-all;
  height: 22px;
  overflow: hidden;
  color: #fff;
}
.notybar-bar.danger {
  background-color: #d9534f;
}
.notybar-bar.warning {
  background-color: #f0ad4e;
}
.notybar-bar.success {
  background-color: #5cb85c;
}
.notybar-bar.info {
  background-color: #5bc0de;
}
.notybar-upside {
  -webkit-transition: all 0.6s ease;
  transition: all 0.6s ease;
  -webkit-transform-origin: 0 25px -25px;
  transform-origin: 0 25px -25px;
}
.notybar-pop {
  -webkit-transform: translate3d(0, 100%, 0);
  transform: translate3d(0, 100%, 0);
}
body.notybar-active .notybar-bar {
  -webkit-transform: none;
  transform: none;
  opacity: 1;
}
body.notybar-active .notybar-upside {
  -webkit-transform: rotatex(-90deg);
  transform: rotatex(-90deg);
}
#disqus_thread {
  margin-top: 20px;
}
* {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.features {
  background: #3498db;
  color: #fff;
}
.features h3 {
  background: #fff;
  color: #3498db;
  font-size: 36px;
  line-height: 100px;
  margin: 10px;
  padding: 2%;
  position: relative;
  text-align: center;
}
.variable-width .slick-slide p {
  background: #fff;
  height: 100px;
  color: #3498db;
  margin: 5px;
  line-height: 100px;
}
.button {
  background: #3498db;
  color: #fff;
  display: block;
  font-size: 16px;
  margin: 20px auto;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  width: 48%;
}
.buttons {
  padding: 0 20px 20px;
  margin-bottom: 10px;
}
.buttons .button {
  background: #fff;
  color: #3498db;
  float: left;
  margin: 5px;
}
.center .slick-center h3 {
  -moz-transform: scale(1.08);
  -ms-transform: scale(1.08);
  -o-transform: scale(1.08);
  -webkit-transform: scale(1.08);
  color: #e67e22;
  opacity: 1;
  transform: scale(1.08);
}
.center h3 {
  opacity: 0.8;
  transition: all 300ms ease;
}
.content {
  margin-top: 50px;
  padding: 20px;
  width: 600px;
}
.content:after,
.buttons::after {
  clear: both;
  content: "";
  display: table;
}
.destroy {
  font-weight: 400;
  margin-top: 40px;
}
.features {
  display: block;
  list-style-type: none;
  margin-top: 30px;
  padding: 0;
  text-align: center;
}
.features li {
  margin: 20px 0;
}
.filter .button {
  background: #fff;
  color: #3498db;
  margin-bottom: 40px;
}
.fixed-header {
  background: #fff;
  box-shadow: 2px 0 5px rgba(0,0,0,0.5);
  display: none;
  padding: 10px;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 10000;
}
.fixed-header .header-content {
  margin: auto;
  width: 600px;
}
.fixed-header .subheading {
  display: none;
}
.fixed-header h1.title {
  float: left;
  font-size: 24px;
  margin: 0;
}
.fixed-header ul.nav {
  float: right;
  margin: 0;
  padding: 5px;
}
.fixed-header ul.nav li {
  margin: 0 0 0 10px;
}
.header {
  padding: 20px 0;
}
.margin-40 {
  margin-bottom: 40px;
}
.more,
.button.first {
  margin-top: 40px;
}
.red {
  background: #e74c3c;
  color: #fff;
}
.slick-slide .image {
  padding: 10px;
}
.slick-slide img {
  border: 0px solid #fff;
  display: block;
  width: 100%;
}
.slick-slide img.slick-loading {
  border: 0;
}
.slick-slider {
  margin: 0px auto;
}
.subheading {
  color: #555;
  font-size: 12px;
  font-style: italic;
  font-weight: 400;
  margin: 10px auto;
  text-align: center;
}
.white {
  background: #fff;
  color: #3498db;
}
.white pre,
.white hr {
  background: #3498db;
}
@media (max-width: 420px) {
  ul.nav li a {
    display: block;
    font-size: 10px;
  }
}
@media (max-width: 768px) {
  .features h3 {
    font-size: 24px;
  }
  .button {
    margin: 0 auto 20px;
    width: auto;
  }
  .button.first {
    margin-top: 40px;
  }
  .buttons {
    padding: 0 0 20px;
  }
  .buttons .button {
    float: left;
    font-size: 12px;
    margin: 1%;
    width: 48%;
  }
  .center {
    margin-left: -40px;
    margin-right: -40px;
  }
  .center .slick-center h3 {
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    -webkit-transform: scale(1);
    color: #e67e22;
    opacity: 1;
    transform: scale(1);
  }
  .center h3 {
    -moz-transform: scale(0.95);
    -ms-transform: scale(0.95);
    -o-transform: scale(0.95);
    -webkit-transform: scale(0.95);
    opacity: 0.8;
    transform: scale(0.95);
    transition: all 300ms ease;
  }
  .content {
    margin-top: 50px;
    padding: 0px;
    width: auto;
  }
  .fixed-header .header-content {
    width: auto;
  }
  pre {
    font-size: 12px;
    overflow-x: scroll;
  }
  table {
    font-size: 14px;
    line-height: 18px;
    margin: 40px auto 20px;
    display: block;
    float: left;
  }
  tr {
    width: 100%;
    border-right: none;
    border-bottom: 1px solid #fff;
    margin: 0px 0px 20px;
    padding: 0px 0px 20px;
    background: transparent;
    float: left;
  }
  thead {
    display: none;
  }
  td {
    border: 0;
    padding: 10px 0px;
  }
  td,
  tbody {
    display: block;
    width: 100% !important;
  }
  table.settings td:nth-of-type(1),
  table.methods td:nth-of-type(1) {
    font-weight: bold;
    font-size: 16px;
    line-height: 18px;
  }
  table.settings td:nth-of-type(2):before {
    content: 'Type: ';
    font-weight: bold;
  }
  table.settings td:nth-of-type(3):before {
    content: 'Default: ';
    font-weight: bold;
  }
  table.methods td:nth-of-type(2):before {
    content: 'Arguments: ';
    font-weight: bold;
  }
}
@-webkit-keyframes scale-box {
  0% {
    -webkit-transform: scale3d(1.2, 1.2, 1.2);
    opacity: 0.4;
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
.messenger-view {
  display: flex;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  -webkit-box-align: center;
  -webkit-align-items: center;
  align-items: center;
  justify-content: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  position: fixed;
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.6);
  top: 0;
  left: 0;
  z-index: 500;
}
.messenger-box {
  -webkit-box-flex: 0.8;
  -webkit-flex: 0.8;
  flex: 0.8;
  -webkit-animation-name: scale-box;
  -webkit-animation-duration: 0.2s;
  -webkit-animation-timing-function: ease-in;
  animation-name: scale-box;
  animation-duration: 0.2s;
  animation-timing-function: ease-in;
  position: relative;
  max-width: 80%;
  min-width: 80%;
  height: 200px;
}
.messenger-box .title {
  font-size: 16px;
  background-color: #f5f5f5;
  line-height: 44px;
  text-align: center;
  border-radius: 10px 10px 0 0;
}
.messenger-box .wrapper {
  background-color: #fff;
  color: #777;
  font-size: 15px;
  text-align: center;
  padding: 20px 26px;
  border-radius: 0px 0px 10px 10px;
}
.messenger-box .wrapper p {
  margin-bottom: 40px;
}
.messenger-box .wrapper div {
  display: flex;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  -webkit-box-align: center;
  -webkit-align-items: center;
  align-items: center;
  justify-content: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  position: relative;
}
.messenger-box .wrapper button {
  -webkit-box-flex: 0.45;
  -webkit-flex: 0.45;
  flex: 0.45;
  display: block;
  border: 0;
  background-color: #ff8132;
  line-height: 36px;
  font-size: 16px;
  color: #fff;
  border-radius: 18px;
  max-width: 44%;
  margin: 0 auto;
}
.messenger-box .wrapper button:first-child {
  align-items: flex-start;
}
.messenger-box .wrapper button:last-child {
  align-items: flex-end;
}
.messenger-box .wrapper button:active {
  background-color: #e47630;
}
@-moz-keyframes scale-box {
  0% {
    transform: scale3d(1.2, 1.2, 1.2);
    opacity: 0.4;
  }
  100% {
    transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
@-webkit-keyframes scale-box {
  0% {
    transform: scale3d(1.2, 1.2, 1.2);
    opacity: 0.4;
  }
  100% {
    transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
@-o-keyframes scale-box {
  0% {
    transform: scale3d(1.2, 1.2, 1.2);
    opacity: 0.4;
  }
  100% {
    transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
@keyframes scale-box {
  0% {
    transform: scale3d(1.2, 1.2, 1.2);
    opacity: 0.4;
  }
  100% {
    transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
</style><style type="text/css">
@font-face {font-family: "iconfont";
  src: url(http://static.m.maizuo.com/v4/static/app/asset/714cb3eaef93795bf1ef91aa2c879f3b.eot); /* IE9*/
  src: url(http://static.m.maizuo.com/v4/static/app/asset/714cb3eaef93795bf1ef91aa2c879f3b.eot#iefix) format('embedded-opentype'), 
  url(http://static.m.maizuo.com/v4/static/app/asset/837a1e6ad7889023a43fbfc79f422c6e.woff) format('woff'), 
  url(http://static.m.maizuo.com/v4/static/app/asset/d50fd4e0478960f566bb4a5afc553acd.ttf) format('truetype'), 
  url(http://static.m.maizuo.com/v4/static/app/asset/31eb010e57fcb58299c215e4fc18a8ce.svg#iconfont) format('svg'); /* iOS 4.1- */
}

.iconfont {
  font-family:"iconfont" !important;
  font-size:16px;
  font-style:normal;
  -webkit-font-smoothing: antialiased;
  -webkit-text-stroke-width: 0.2px;
  -moz-osx-font-smoothing: grayscale;
}
.icon-refresh:before { content: "\E636"; }
.icon-qrcode:before { content: "\E63B"; }
.icon-ok:before { content: "\E62E"; }
.icon-close:before { content: "\E62F"; }
.icon-question:before { content: "\E63F"; }
.icon-top:before { content: "\E638"; }
.icon-add-filled:before { content: "\E600"; }
.icon-application-filled:before { content: "\E601"; }
.icon-dropdown:before { content: "\E602"; }
.icon-arrow-left:before { content: "\E603"; }
.icon-arrow-right:before { content: "\E604"; }
.icon-presold-filled:before { content: "\E605"; }
.icon-zuo:before { content: "\E606"; }
.icon-bus:before { content: "\E607"; }
.icon-card-filled:before { content: "\E608"; }
.icon-coin-filled:before { content: "\E609"; }
.icon-coupon-filled:before { content: "\E60A"; }
.icon-chair:before { content: "\E60B"; }
.icon-cinema-title:before { content: "\E60C"; }
.icon-cinema:before { content: "\E60D"; }
.icon-clean-filled:before { content: "\E60E"; }
.icon-concact-filled:before { content: "\E60F"; }
.icon-tong:before { content: "\E610"; }
.icon-feedback-filled:before { content: "\E611"; }
.icon-active-title:before { content: "\E612"; }
.icon-active:before { content: "\E613"; }
.icon-gift:before { content: "\E614"; }
.icon-glasses:before { content: "\E615"; }
.icon-dislike:before { content: "\E616"; }
.icon-like:before { content: "\E617"; }
.icon-list:before { content: "\E618"; }
.icon-location:before { content: "\E619"; }
.icon-film-title:before { content: "\E61A"; }
.icon-film:before { content: "\E61B"; }
.icon-notice-filled:before { content: "\E61C"; }
.icon-order-add-filled:before { content: "\E61D"; }
.icon-parking:before { content: "\E61E"; }
.icon-user-filled:before { content: "\E61F"; }
.icon-phone:before { content: "\E620"; }
.icon-yu-filled:before { content: "\E621"; }
.icon-recommend:before { content: "\E622"; }
.icon-reduce-filled:before { content: "\E623"; }
.icon-sandglass-filled:before { content: "\E624"; }
.icon-score-filled:before { content: "\E625"; }
.icon-schedule:before { content: "\E626"; }
.icon-setting-filled:before { content: "\E627"; }
.icon-ticket-filled:before { content: "\E628"; }
.icon-ticket:before { content: "\E629"; }
.icon-upgrade-filled:before { content: "\E62A"; }
.icon-user:before { content: "\E62B"; }
.icon-order-filled:before { content: "\E62C"; }
.icon-location-filled:before { content: "\E62D"; }
.icon-search:before { content: "\E630"; }
.icon-check:before { content: "\E631"; }
.icon-modify:before { content: "\E632"; }
.icon-maizuo:before { content: "\E633"; }
.icon-play:before { content: "\E634"; }
.icon-help-filled:before { content: "\E635"; }
.icon-presold-triangle:before { content: "\E637"; }
.icon-info:before { content: "\E63C"; }
.icon-lover:before { content: "\E639"; }
.icon-clock:before { content: "\E63A"; }
.icon-warn:before { content: "\E640"; }
.icon-seat-ok:before { content: "\E63D"; }
.icon-yuwan-boy:before { content: "\E642"; }
.icon-yuwan-girl:before { content: "\E643"; }
.icon-cola:before { content: "\E63E"; }
.icon-coin:before { content: "\E641"; }
.icon-bag:before { content: "\E644"; }
.icon-home:before { content: "\E645"; }
.icon-reduce-rectangle:before { content: "\E646"; }
.icon-add-rectangle:before { content: "\E647"; }
.icon-uncovered:before { content: "\E648"; }
.icon-safe:before { content: "\E649"; }
.icon-lock:before { content: "\E64A"; }
.icon-phone-ok:before { content: "\E64B"; }
.icon-phone1:before { content: "\E64C"; }
.icon-invalid:before { content: "\E64D"; }
</style><style type="text/css">a:hover {
  outline: none;
}
.content {
  padding: 0 !important;
  margin: 0 auto !important;
}
.application-view {
  padding: 0px 0 0;
}
.order-detail-view .slick-dots {
  bottom: 5px;
  margin-bottom: 0;
}
.order-detail-view .slick-dots li {
  height: 10px;
  width: 10px;
  margin: 3px;
}
.channel {
  margin: 0 17px;
  padding-top: 10px;
}
.channel ul {
  text-align: center;
  height: 65px;
  line-height: 65px;
  margin-top: 7px;
  margin-bottom: 7px;
}
.channel ul li a {
  width: 33px;
  height: 50px;
  display: inline-block;
}
.channel ul li img {
  height: 50px;
}
.channel ul li:first-child {
  border-right: 1px dotted #c7c7c7;
}
.channel ul li:last-child {
  border-left: 1px dotted #c7c7c7;
}
.movie ul {
  padding-top: 18px;
}
.movie ul li {
  margin: 0 17px 17px 17px;
  background-color: #f9f9f9;
  -webkit-box-shadow: 0.5px 0.5px 1px #a8a8a8;
  -moz-box-shadow: 0.5px 0.5px 1px #a8a8a8;
  box-shadow: 0.5px 0.5px 1px #a8a8a8;
  cursor: pointer;
}
.movie ul li .movie-item-img {
  overflow: hidden;
  position: relative;
}
.movie ul li .movie-item-img .presold-tip {
  position: absolute;
  top: 0;
  left: 0;
  height: 56px;
  width: 54px;
}
.movie ul li .desc {
  height: 50px;
}
.movie ul li .desc .left {
  height: 50px;
  padding-right: 0;
  padding-top: 13px;
  padding-left: 28px;
}
.movie ul li .desc .left .film-name {
  font-size: 12px;
  line-height: 15px;
  -webkit-user-select: text;
  user-select: text;
}
.movie ul li .desc .left .count {
  font-size: 8px;
  color: #9a9a9a;
  line-height: 15px;
}
.movie ul li .desc .right {
  padding-left: 0;
}
.movie ul li .desc .right .score {
  color: #f78360;
  display: inline-block;
  line-height: 50px;
  float: right;
  margin-right: 15px;
  font-size: 18px;
}
.movie ul li .upcoming-desc {
  height: 35px;
}
.movie ul li .upcoming-desc .left {
  height: 35px;
  padding-right: 0;
  padding-top: 10px;
  padding-left: 28px;
}
.movie ul li .upcoming-desc .left .film-name {
  font-size: 12px;
  line-height: 15px;
}
.movie ul li .upcoming-desc .left .count {
  font-size: 8px;
  color: #9a9a9a;
  line-height: 15px;
}
.movie ul li .upcoming-desc .right {
  padding-left: 0;
}
.movie ul li .upcoming-desc .right .showing-date {
  font-size: 10px;
  color: RGB(245, 162, 125);
  line-height: 15px;
  height: 35px;
  padding-right: 0;
  padding-top: 10px;
  padding-left: 28px;
}
.movie ul .movie-item.hover {
  background-color: #e1e1e1;
  opacity: 0.8;
}
.more-button {
  width: 160px;
  height: 30px;
  border: 1px solid #aaa;
  border-radius: 15px;
  margin: 10px auto 30px;
  text-align: center;
  line-height: 30px;
  font-size: 12px;
  color: #616161;
  cursor: pointer;
}
.more-button.hover {
  opacity: 0.8;
}
.dividing-line {
  position: relative;
  margin-top: 30px;
  margin-bottom: 30px;
  border-bottom: 1px solid #a8a8a8;
}
.upcoming {
  width: 65px;
  height: 20px;
  margin: 0 auto;
  margin-bottom: -10px;
  border-radius: 5px;
  font-size: 10px;
  line-height: 20px;
  text-align: center;
  color: #eee;
  background-color: #a7a7a7;
}
</style><style type="text/css">.login-view,
.bind-view {
  position: absolute;
  min-height: 100%;
  width: 100%;
  background-color: #f6f6f6;
}
.login-view input:-webkit-autofill,
.bind-view input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0px 1000px #f6f6f6 inset;
}
.login-view input:focus,
.bind-view input:focus {
  outline: none;
  box-shadow: none;
}
.login-view .setting-tips,
.bind-view .setting-tips {
  padding: 10px 31px 0;
}
.login-view form,
.bind-view form {
  padding: 0px 31px 0px 31px;
}
.login-view form .form-group,
.bind-view form .form-group {
  margin: 30px 0 0;
  position: relative;
}
.login-view form .form-group .input-bg,
.bind-view form .form-group .input-bg {
  position: absolute;
  top: 20px;
  height: 12px;
  width: 100%;
  border: solid #c4c4c4;
  border-width: 0 1px 1px 1px;
}
.login-view form .sms-code,
.bind-view form .sms-code {
  width: 95px;
  position: absolute;
  right: 5px;
  top: -5px;
  background-color: #29a097;
  color: #fff;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 3px;
  cursor: pointer;
}
.login-view form .sms-code .sms-code-row,
.bind-view form .sms-code .sms-code-row {
  left: -6px;
  position: absolute;
  top: 8px;
  content: '';
  width: 0;
  height: 0;
  border-top: solid 6px transparent;
  border-bottom: solid 6px transparent;
  border-right: solid 6px #29a097;
  display: block;
}
.login-view form .sms-code .sms-code-tex,
.bind-view form .sms-code .sms-code-tex {
  font-style: normal;
}
.login-view input.form-control,
.bind-view input.form-control {
  border: none;
  background-color: #f6f6f6;
  border-radius: 0px;
  box-shadow: none;
  outline: none;
}
.login-view .captcha,
.bind-view .captcha {
  display: none;
}
.login-view .captcha .code,
.bind-view .captcha .code {
  display: inline-block;
  width: 50%;
}
.login-view .captcha img,
.bind-view .captcha img {
  vertical-align: top;
  float: right;
  margin-right: 5px;
}
.login-view .captcha.active,
.bind-view .captcha.active {
  display: block;
}
.login-view .submit,
.bind-view .submit {
  width: 163px;
  background-color: #fe8233;
  color: #fff;
  border: none;
  border-radius: 36px;
  margin-top: 45px;
  padding: 8px 12px;
  font-size: 15px;
  outline: none;
}
.login-view .submit:focus,
.bind-view .submit:focus {
  outline: none;
  border: none;
}
.login-view .submit.hover,
.bind-view .submit.hover {
  background-color: hover-btn2-color;
}
.login-view .wechat-form,
.bind-view .wechat-form,
.login-view .m-qq-browser-form,
.bind-view .m-qq-browser-form {
  text-align: center;
  margin-top: 60px;
}
.login-view .wechat-form button.disabled,
.bind-view .wechat-form button.disabled,
.login-view .m-qq-browser-form button.disabled,
.bind-view .m-qq-browser-form button.disabled {
  background-color: #ccc;
}
.login-view .wechat-form p,
.bind-view .wechat-form p,
.login-view .m-qq-browser-form p,
.bind-view .m-qq-browser-form p {
  padding: 10px 0;
  color: #999;
  font-size: 10px;
}
.login-view .success-view p,
.bind-view .success-view p {
  text-align: center;
  opacity: 0.7;
  font-weight: normal;
}
.login-view .success-view p.bind-mobile,
.bind-view .success-view p.bind-mobile {
  font-size: 18px;
  opacity: 1;
  padding: 20px 0 10px;
}
.login-view .success-view a,
.bind-view .success-view a {
  display: block;
  text-align: center;
  text-decoration: none;
}
.login-view .success-view div,
.bind-view .success-view div {
  position: relative;
  height: 240px;
  text-align: center;
  width: 100%;
}
.login-view .success-view div:before,
.bind-view .success-view div:before {
  font-size: 190px;
  font-family: 'IconFont';
  content: '\E64C';
  color: #e5e5e5;
}
.login-view .success-view div i,
.bind-view .success-view div i {
  position: absolute;
  margin-left: -119px;
  top: 105px;
  font-size: 50px;
  color: #00c3d1;
}
.other-login .title {
  border-top: 1px solid #d6d6d6;
}
.other-login .title span {
  margin-top: -10px;
  color: #c4c4c4;
  background-color: #f6f6f6;
  width: 85px;
}
.other-login ul {
  margin-top: 45px;
  text-align: center;
}
.worng-msg {
  display: block;
  height: 16px;
  color: #fe8233;
  padding-left: 8px;
}
.login-debug {
  text-align: center;
  margin-top: 10px;
}
.login-debug button {
  background-color: #ffd0b2;
}
</style><style type="text/css">.snap-content {
  background-color: #fff !important;
}
.district .content {
  display: block;
}
.district .content .cinema-wrap {
  margin: 0 auto;
  border-bottom: 1px solid #e1e1e1;
  cursor: pointer;
  min-width: 320px;
}
.district .content .cinema-wrap .cinema {
  border-radius: 5px;
  padding: 10px 0 12px 16px;
  cursor: pointer;
}
.district .content .cinema-wrap .cinema.hover {
  background-color: #f7f5f5;
}
.district .content .cinema-wrap .cinema .nav {
  padding-right: 15px;
  line-height: 36px;
  color: #c6c6c6;
}
.district .content .cinema-wrap .cinema .cinema-title-price {
  font-size: 16px;
  color: #fc8637;
}
.district .content .cinema-wrap .cinema .cinema-title {
  width: 75%;
  min-width: 230px;
  float: left;
  cursor: pointer;
  overflow: hidden;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname {
  display: inline-block;
  font-size: 16px;
  width: 100%;
  margin-bottom: 5px;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname i:first-child {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  display: inline-block;
  vertical-align: text-top;
  max-width: 80%;
}
@media screen and (max-width: 320px) {
  .district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname i:first-child {
    max-width: 180px;
  }
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname i {
  font-style: normal;
  margin-right: 3px;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname .book,
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname .ticket {
  font-size: 20px;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname .book {
  color: #fc8558;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-cinemaname .ticket {
  color: #88aec8;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-address {
  display: inline-block;
  font-size: 12px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 100%;
  color: #ccc;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-location {
  font-size: 12px;
  color: #ccc;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip {
  display: inline-block;
  margin-bottom: 5px;
  font-size: 10px;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip i {
  display: inline-block;
  border-radius: 3px;
  padding: 0 5px;
  margin: 0 5px;
  font-style: normal;
  color: #fff;
  height: 15px;
  line-height: 15px;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip .tip_04 {
  border: 1px solid #e1e1e1;
  color: #e1e1e1;
  background-color: #fff;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip .tip_03 {
  background-color: #00c2a4;
  display: none;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip .tip_02 {
  background-color: #ff7674;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip .tip_01 {
  background-color: #51add0;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip .tip_05 {
  background-color: #ff9658;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip .no_tip {
  display: none;
}
.district .content .cinema-wrap .cinema .cinema-title .cinema-title-tip.no-buy {
  display: none;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-date {
  margin: 2px auto;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-date .schedule-date-item {
  height: 35px;
  width: 96px;
  margin: 5px 0 0 10px;
  padding: 0 15px;
  display: inline-block;
  border-radius: 35px;
  font-size: 10px;
  line-height: 35px;
  text-align: center;
  background-color: #fff;
  color: #555;
  cursor: pointer;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-date .schedule-date-item.active {
  background-color: #ff6a19;
  color: #eee;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-item {
  padding: 11px 20px 0;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-item.hover {
  background-color: #f7f5f5;
  opacity: 0.8;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-item:last-child .schedule-detail-wrap {
  border-bottom: none;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap {
  height: auto;
  width: 100%;
  border-bottom: dashed 1px rgba(85,85,85,0.3);
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-arrow {
  float: right;
  line-height: 60px;
  color: #c6c6c6;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left {
  position: relative;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-showtime {
  font-size: 16px;
  line-height: 25px;
  color: #000;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-price {
  font-size: 16px;
  color: #f67222;
  float: right;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-price-gray {
  font-size: 16px;
  color: #999;
  float: right;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-des {
  color: #959595;
  float: left;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-origin-price {
  text-decoration: line-through;
  font-size: 8px;
  color: #c6c6c6;
  float: right;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .label-tips {
  height: 50px;
  position: absolute;
  right: 78px;
  text-align: center;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .label-tips .tip_02 {
  border: 1px solid #fa8988;
  color: #fa8988;
  font-size: 10px;
  border-radius: 3px;
  padding: 0 4px;
  height: 15px;
  margin: 3px auto;
  line-height: 15px;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-list .schedule-detail .schedule-detail-wrap .schedule-detail-left .label-tips .tip_03 {
  border: 1px solid #ff9658;
  color: #ff9658;
  font-size: 10px;
  border-radius: 3px;
  padding: 0 4px;
  height: 15px;
  margin: 3px auto;
  line-height: 15px;
}
.district .content .cinema-wrap .cinema-schedule-wrap .cinema-schedule-no-data {
  text-align: center;
  line-height: 50px;
}
.district .title {
  height: 40px;
  line-height: 40px;
  font-size: 14px;
  padding-left: 16px;
  background: #e1e1e1;
  margin-bottom: 1px;
  color: #636363;
  cursor: pointer;
}
.district .content {
  margin-top: 0px;
  display: none;
  width: 100%;
  padding: 0;
}
.active .content {
  display: block;
}
.schedule {
  width: 100%;
  overflow: hidden;
}
.schedule .date-choosed {
  color: #eee;
  background-color: #ff6a19;
}
.schedule-list-show {
  display: block !important;
}
.cinema-schedule {
  position: absolute;
  min-height: 100%;
  width: 100%;
  background-color: #fff;
}
.cinema-schedule .cinema-film-list {
  background-color: #38403e;
}
.cinema-schedule .cinema-film-list .slider {
  padding: 12px 0 0 0;
}
.cinema-schedule .cinema-film-list .slider .filmItem {
  position: relative;
}
.cinema-schedule .cinema-film-list .slider .arrow {
  position: absolute;
  top: 0;
  right: 10px;
  width: 35%;
}
.cinema-schedule .cinema-film-list .slider .film-list-film-name {
  display: none;
}
.cinema-schedule .cinema-film-list .slider .film-list-img {
  background-color: #38403e;
  opacity: 0.4;
  padding: 0 10px;
}
.cinema-schedule .cinema-film-list .slider .film-list-img img {
  border: #eee 1px solid;
  width: 100%;
}
.cinema-schedule .cinema-film-list .slider .slick-center .film-list-film-name {
  display: block;
  text-align: center;
  margin: 10px -20px;
  color: #fff;
}
.cinema-schedule .cinema-film-list .slider .slick-center .film-list-img {
  background-color: #38403e;
  opacity: 1;
}
.cinema-schedule .cinema-film-list .slider .slick-center .film-list-img img {
  width: 100%;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap {
  height: 100%;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .cinema-schedule-date .schedule-date-item {
  height: 25px;
  width: 96px;
  margin: 5px 15px;
  display: inline-block;
  font-size: 10px;
  line-height: 25px;
  text-align: center;
  color: #555;
  cursor: pointer;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-item {
  padding: 11px 20px 0;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-item.hover {
  background-color: #f7f5f5;
  opacity: 0.8;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap {
  height: auto;
  width: 100%;
  cursor: pointer;
  border-bottom: dashed 1px rgba(85,85,85,0.3);
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-arrow {
  float: right;
  color: #c6c6c6;
  line-height: 60px;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left {
  position: relative;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-showtime {
  font-size: 16px;
  line-height: 25px;
  color: #000;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-price {
  font-size: 16px;
  color: #f67222;
  float: right;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-price-gray {
  font-size: 16px;
  color: #999;
  float: right;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-des {
  font-size: 8px;
  line-height: 18px;
  color: #727272;
  float: left;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .schedule-detail-origin-price {
  text-decoration: line-through;
  font-size: 8px;
  color: #222;
  float: right;
  color: #c6c6c6;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .label-tips {
  height: 50px;
  position: absolute;
  right: 78px;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .label-tips .tip_02 {
  border: 1px solid #fa8988;
  color: #fa8988;
  font-size: 10px;
  border-radius: 3px;
  padding: 0 4px;
  height: 15px;
  margin: 3px auto;
  line-height: 15px;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-wrap .schedule-list-wrap .schedule-detail .schedule-detail-wrap .schedule-detail-left .label-tips .tip_03 {
  border: 1px solid #ff9658;
  color: #ff9658;
  font-size: 10px;
  border-radius: 3px;
  padding: 0 4px;
  height: 15px;
  margin: 3px auto;
  line-height: 15px;
}
.cinema-schedule .cinema-schedule-list .date-slider {
  border-bottom: 1px solid #e9681f;
}
.cinema-schedule .cinema-schedule-list .date-choosed {
  border-bottom: 5px solid #e9681f;
}
.cinema-schedule .cinema-schedule-list .date-choosed .schedule-date-item {
  border-radius: 0;
  height: 21px;
}
.cinema-schedule .cinema-schedule-list .cinema-schedule-no-data {
  text-align: center;
  line-height: 50px;
}
.cinema-view {
  background-color: #fff;
  width: 100%;
}
.cinema-view.cinema-detail-view {
  background-color: #ebebeb !important;
  padding: 0;
  margin: 0 auto;
  max-width: 640px;
}
.cinema-view .row {
  margin: 0;
}
.cinema-view .col-xs-12 {
  padding: 0;
}
.cinema-view button:focus {
  outline: none;
  border: none;
}
.cinema-view .no_border {
  border: none !important;
}
.cinema-view .detail-box {
  padding: 25px 17px 0;
  background-color: #f9f9f9;
  text-align: center;
}
.cinema-view .detail-box .box-warp {
  display: inline-block;
  width: 100%;
  min-width: 286px;
  text-align: left;
}
.cinema-view .detail-box .btn-default {
  width: 94px;
  border-radius: 38px;
  height: 34px;
  border: none;
  font-size: 13px;
  position: absolute;
  right: 0px;
  top: -10px;
}
.cinema-view .detail-box .sundry-btn,
.cinema-view .detail-box .seat-btn {
  background-color: #fe8233;
  color: #fff;
}
.cinema-view .detail-box .sundry-btn.hover,
.cinema-view .detail-box .seat-btn.hover {
  background-color: #e47630;
}
.cinema-view .detail-box .youhui-btn,
.cinema-view .detail-box .check-btn {
  color: #ff8032;
  background-color: #f9f9f9;
  border: 1px solid #ff8032;
}
.cinema-view .detail-box .youhui-btn.hover,
.cinema-view .detail-box .check-btn.hover {
  background-color: #f5f2f2;
  opacity: 0.8;
}
.cinema-view .detail-box .pic_01 {
  margin-top: 5px;
}
.cinema-view .detail-box h3 {
  font-size: 15px;
  color: #000;
}
.cinema-view .detail-box h4 {
  font-size: 14px;
  color: #000;
}
.cinema-view .detail-box div.img {
  margin: 15px 17px 0 0;
}
.cinema-view .detail-box div.img.m_t {
  margin-top: 5px;
}
.cinema-view .detail-box div.img i {
  font-size: 28px;
}
.cinema-view .detail-box div.img i.icon-chair {
  color: #ff8160;
}
.cinema-view .detail-box div.img i.icon-location {
  color: #7bafe1;
}
.cinema-view .detail-box div.img i.icon-ticket {
  color: #40b5b5;
}
.cinema-view .detail-box div.img i.icon-schedule {
  color: #ff8160;
}
.cinema-view .detail-box div.img i.icon-phone {
  color: #df8f9f;
  margin-top: 5px;
}
.cinema-view .detail-box div.img i.icon-cola {
  color: #3697d1;
}
.cinema-view .detail-box div.box {
  border-bottom: 1px #d6d6d6 dotted;
  position: relative;
  padding-bottom: 25px;
  margin-left: 45px;
}
.cinema-view .detail-box div.box span {
  color: #737373;
}
.cinema-view .detail-box div.box ul {
  width: 80%;
  padding-left: 15px;
  padding-top: 10px;
  color: #ffb787;
  margin-bottom: 0;
}
.cinema-view .other-detail-box {
  min-width: 320px;
  padding: 15px 0 30px;
  background-color: #f9f9f9;
  margin-top: 15px;
  cursor: pointer;
}
.cinema-view .other-detail-box ul {
  position: relative;
}
.cinema-view .other-detail-box li {
  border-bottom: 1px #d6d6d6 solid;
  padding: 0;
}
.cinema-view .other-detail-box li .li-w {
  padding: 0 12px 5px;
  margin-bottom: 2px;
}
.cinema-view .other-detail-box li .li-warp {
  position: relative;
  overflow: hidden;
  width: 38px;
  margin: 0 auto;
}
.cinema-view .other-detail-box li .li-warp .img_top {
  color: #cdcdcd;
}
.cinema-view .other-detail-box li .li-warp .img_top.iconfont:before {
  border: 1px solid #cdcdcd;
}
.cinema-view .other-detail-box li .li-warp .img_bot {
  color: #fe8233;
}
.cinema-view .other-detail-box li .li-warp .img_bot.iconfont:before {
  border: 1px solid #fe8233;
}
.cinema-view .other-detail-box li .li-warp span {
  color: #737373;
  display: block;
  width: 38px;
  text-align: center;
  margin-top: 45px;
}
.cinema-view .other-detail-box li .li-warp i {
  float: left;
  font-size: 30px;
}
.cinema-view .other-detail-box li .li-warp i.iconfont:before {
  border-radius: 50%;
  padding: 3px;
}
.cinema-view .other-detail-box li .li-warp .img_bot {
  margin-top: -150px;
}
.cinema-view .other-detail-box li.active {
  border: none;
}
.cinema-view .other-detail-box li.active .li-w {
  border-bottom: 3px #ff8032 solid;
}
.cinema-view .other-detail-box li.active .li-w .img_top {
  margin-top: -150px;
}
.cinema-view .other-detail-box li.active .li-w .img_bot {
  margin-top: 0;
}
.cinema-view .other-detail-box .li-box {
  padding: 0 30px;
}
.apply-cinema-view {
  background-color: #fff;
}
.apply-cinema-view .header {
  position: fixed;
  padding: 0;
  width: 100%;
  background-color: #fff;
}
.apply-cinema-view .city {
  background-color: #ebebeb;
  padding: 11px 10px;
  font-size: 13px;
}
.apply-cinema-view .city p {
  margin: 0;
}
.apply-cinema-view .city p .name {
  color: #ff8132;
}
.apply-cinema-view .toggle {
  padding: 15px 20px;
  font-size: 13px;
}
.apply-cinema-view .toggle button {
  border: none;
  color: #666;
  background-color: #fff;
  border-radius: 30px;
  padding: 6px 25px;
}
.apply-cinema-view .toggle button.active {
  background-color: #ff8132;
  color: #fff;
}
.apply-cinema-view .toggle p {
  color: #999;
  margin: 0;
}
.apply-cinema-view .cinema {
  height: 100%;
  padding-top: 106px;
}
.apply-cinema-view .cinema img {
  width: 20%;
  margin: 50px auto;
  display: block;
}
.apply-cinema-view .cinema .item {
  padding: 15px;
  margin: 0 10px;
  border-top: 1px solid #f2f2f2;
}
.apply-cinema-view .cinema .item p {
  font-size: 16px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.apply-cinema-view .cinema .item span {
  color: #ccc;
  margin-right: 10px;
}
</style><style type="text/css">.film-view ul,
.film-view li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.film-view .player_mask {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: none;
}
.film-view .player_mask .prevue-player {
  height: 300px;
  margin-top: 50px;
}
.film-view .prevue-button-wrap {
  position: relative;
}
.film-view .prevue-button-wrap .prevue-button {
  cursor: pointer;
  height: 40px;
  width: 40px;
  position: absolute;
  top: -50px;
  right: 15px;
  color: #fff;
  background-color: rgba(0,0,0,0.343);
  text-align: center;
  line-height: 37px;
  border-radius: 20px;
  border: solid 1px #eee;
}
.film-view .film-list {
  padding: 0 10px;
}
.film-view .film-list > li {
  padding: 20px 0;
  width: 100%;
}
.film-view .film-list .cover {
  width: 60px;
}
.film-view .film-img-wrap {
  overflow: hidden;
}
.film-view .film-img-wrap img {
  width: 100%;
}
.film-view .film-intro {
  -webkit-user-select: text;
  user-select: text;
}
.film-view .film-intro .film-word1 {
  margin: 16px auto;
  border-left: 16px solid RGB(228, 200, 156);
  font-size: 16px;
  padding-left: 4px;
}
.film-view .film-intro .film-word2 {
  height: 18px;
  overflow: hidden;
  margin-bottom: 10px;
  padding-left: 20px;
}
.film-view .film-intro .film-word3 {
  text-overflow: ellipsis;
  margin-bottom: 80px;
  padding-left: 20px;
  padding-right: 20px;
}
.film-view .operation {
  position: fixed;
  left: 0;
  bottom: 20px;
  width: 100%;
  text-align: center;
}
.film-view .film-buy {
  height: 38px;
  width: 120px;
  margin: 0 auto;
  border-radius: 18px;
  text-align: center;
  color: #eee;
  line-height: 38px;
  font-size: 16px;
  background-color: RGB(254, 130, 51);
}
</style><style type="text/css">.snap-content {
  background-color: #f9f9f9 !important;
}
.film-view ul,
.film-view li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.film-view li.hover {
  background-color: #f7f5f5;
  opacity: 0.8;
}
.film-view .film-list-wrap {
  padding-left: 15px;
  padding-right: 15px;
  background-color: #f9f9f9;
  width: 100%;
  position: absolute;
  min-height: 100%;
}
.film-view .film-list-nav {
  height: 46px;
  margin: 0 auto;
  border-bottom: solid #fe6e00 1px;
}
.film-view .film-list-nav .now-playing,
.film-view .film-list-nav .coming-soon {
  float: left;
  width: 50%;
  height: 100%;
  text-align: center;
  font-size: 16px;
  line-height: 46px;
  color: #6a6a6a;
  cursor: pointer;
}
.film-view .film-list-nav .choosing {
  color: #fe6e00;
  border-bottom: solid;
}
.film-view .film-list {
  padding: 0;
}
.film-view .film-list > li {
  padding: 20px 0;
  width: 100%;
}
.film-view .film-list .cover {
  width: 60px;
}
.film-view .film-list li:last-child .film-item {
  border-bottom: none;
}
.film-view .film-list .film-item {
  width: 100%;
  padding: 20px 0;
  border-bottom: dashed 1px #c9c9c9;
  cursor: pointer;
}
.film-view .film-list .film-item .film-item-img {
  width: 60px;
  float: left;
  overflow: hidden;
}
.film-view .film-list .film-item .film-item-img img {
  width: 100%;
}
.film-view .film-list .film-item .film-desc {
  padding-left: 15px;
  display: inline-block;
  width: 75%;
}
.film-view .film-list .film-item .film-desc .film-name {
  font-size: 16px;
  line-height: 32px;
  color: #000;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.film-view .film-list .film-item .film-desc .film-next-arrow {
  float: right;
  line-height: 29px;
  color: #c6c6c6;
}
.film-view .film-list .film-item .film-desc .film-next-arrow .film-next-icon {
  font-size: 10px !important;
}
.film-view .film-list .film-item .film-desc .film-tip-icon-next {
  float: right;
  font-size: 16px;
  line-height: 32px;
  color: #777;
  width: 35px;
}
.film-view .film-list .film-item .film-desc .film-grade {
  float: right;
  font-size: 16px;
  line-height: 32px;
  color: #fc7103;
}
.film-view .film-list .film-item .film-desc .film-tip-icon-presold {
  float: right;
  font-size: 16px;
  line-height: 32px;
  color: #fc7103;
  width: 35px;
}
.film-view .film-list .film-item .film-desc .film-tip-icon {
  float: right;
  font-size: 16px;
  line-height: 32px;
  color: #fc7103;
  width: 35px;
}
.film-view .film-list .film-item .film-desc .film-tip-icon .film-yu-icon {
  width: 35px;
  height: 35px;
  text-align: center;
  line-height: 32px;
  font-size: 32px;
}
.film-view .film-list .film-item .film-desc .film-intro {
  height: 24px;
  line-height: 24px;
  color: #8e8e8e;
  font-size: 12px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 100%;
  display: inline-block;
}
.film-view .film-list .film-item .film-desc .film-counts {
  line-height: 24px;
  color: #8e8e8e;
  font-size: 12px;
}
.film-view .film-list .film-item .film-desc .film-premiere-date {
  line-height: 24px;
  color: #ffb375;
  font-size: 12px;
}
.film-view .film-list .film-item .film-desc .film-count-color1 {
  color: #8aa2bf;
}
.film-view .loading-more {
  display: none;
  height: 40px;
  text-align: center;
  font-size: 14px;
  color: #777;
}
.apply-film-view {
  line-height: 40px;
  font-size: 14px;
  background-color: #fff;
}
.apply-film-view p {
  position: fixed;
  background-color: #e1e1e1;
  width: 100%;
  padding-left: 10px;
  margin-bottom: 0px;
}
.apply-film-view .color01 {
  color: #fe6e00;
  margin: 0 3px;
}
.apply-film-view ul {
  padding-top: 40px;
}
.apply-film-view ul li {
  border-bottom: 1px solid #f2f2f2;
  padding-left: 10px;
}
.apply-film-view ul li.hover {
  background-color: #f7f5f5;
  opacity: 0.8;
}
.apply-film-view ul li span {
  margin-right: 8px;
}
.apply-film-view ul li:last-child {
  border-bottom: none;
}
</style><style type="text/css">.preorder-list-view {
  background-color: #e8e8e8;
}
.preorder-list-view .preorder-panel {
  background-color: #fff;
  margin: 21px 16px;
  padding: 14px;
  border-radius: 8px;
}
.preorder-list-view .preorder-panel h3 {
  color: #60979f;
  font-size: 14px;
  border-bottom: 1px dotted #aaa;
  line-height: 32px;
  margin: 0;
  padding: 0 2px 12px;
}
.preorder-list-view .preorder-panel h3 .price {
  color: #fe8233;
  font-size: 18px;
  float: right;
}
.preorder-list-view .preorder-panel .detail {
  padding-top: 12px;
  min-height: 82px;
}
.preorder-list-view .preorder-panel .detail .title {
  line-height: 60px;
  font-size: 24px;
  min-width: 84px;
  width: 20%;
  text-align: center;
  float: left;
  color: #fe8233;
}
.preorder-list-view .preorder-panel .detail .title .subtitle {
  font-size: 12px;
  color: #666;
  line-height: 0;
  margin: 28px 0 0;
}
.preorder-list-view .preorder-panel .detail .information {
  float: left;
  padding: 2px 8px;
  width: 65%;
}
.preorder-list-view .preorder-panel .detail .information .name {
  font-size: 14px;
  color: #191919;
  line-height: 38px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.preorder-list-view .preorder-panel .detail .information .description {
  font-size: 12px;
  color: #6e6e6e;
  line-height: 16px;
}
</style><style type="text/css">@-webkit-keyframes code-flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
.cpn-counter {
  display: -webkit-inline-box;
  display: -webkit-inline-flex;
  display: inline-flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  align-items: center;
  -webkit-box-pack: space-between;
  -webkit-justify-content: space-between;
  justify-content: space-between;
  border: 1px solid #fff;
  border-radius: 17px;
  height: 34px;
  min-width: 108px;
  line-height: 28px;
  color: #fff;
}
.cpn-counter .number {
  min-width: 42px;
  display: block;
  text-align: center;
  line-height: 34px;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  flex: 1;
}
.cpn-counter .subtract,
.cpn-counter .plus {
  margin: 1px 2px 0;
}
.cpn-counter .subtract .iconfont,
.cpn-counter .plus .iconfont {
  font-size: 28px;
  color: #fff;
}
.cpn-counter .subtract .iconfont.hover,
.cpn-counter .plus .iconfont.hover {
  color: #eee;
}
.preorder-detail-view {
  position: absolute;
  width: 100%;
  min-height: 100%;
}
.preorder-detail-view .preorder-confirm {
  position: relative;
  width: 100%;
  height: 100%;
  padding-bottom: 80px;
}
.preorder-detail-view .preorder-confirm .information {
  padding: 2px 18px;
  color: #fff;
  position: relative;
}
.preorder-detail-view .preorder-confirm .information:after {
  content: '';
  height: 4px;
  width: 100%;
  display: block;
  position: absolute;
  bottom: 0;
  left: 0;
}
.preorder-detail-view .preorder-confirm .information h3 {
  margin: 0;
  padding: 18px 0;
  border-bottom: 1px dashed #eee;
  font-size: 20px;
  line-height: 20px;
}
.preorder-detail-view .preorder-confirm .information h3 i {
  font-size: 20px;
}
.preorder-detail-view .preorder-confirm .information h3 .subtitle {
  float: right;
  color: #fff;
  font-size: 15px;
  line-height: 20px;
}
.preorder-detail-view .preorder-confirm .information .detail {
  padding: 4px 0;
}
.preorder-detail-view .preorder-confirm .information .detail .seat {
  padding-right: 1em;
}
.preorder-detail-view .preorder-confirm .information .detail p {
  font-size: 12px;
  margin: 10px 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -webkit-align-items: center;
  align-items: center;
}
.preorder-detail-view .preorder-confirm .information .detail .show-time {
  color: #ffff82;
  opacity: 0.9;
}
.preorder-detail-view .preorder-confirm .information .detail h4 {
  font-size: 15px;
  margin: 18px 0;
}
.preorder-detail-view .preorder-confirm .information .detail h4 .film {
  display: inline-block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  max-width: 60%;
  vertical-align: bottom;
  margin-right: 5px;
}
.preorder-detail-view .preorder-confirm .information .detail input {
  background-color: transparent;
  border: 1px solid #fff;
  text-align: center;
}
.preorder-detail-view .preorder-confirm .information .sundry-wrap {
  border-top: 1px dashed #eee;
  min-height: 44px;
  font-size: 14px;
  padding: 16px 0;
  display: flex;
}
.preorder-detail-view .preorder-confirm .information .sundry-wrap .sundry-detail {
  flex: 1;
  display: inline-block;
}
.preorder-detail-view .preorder-confirm .information .sundry-wrap .sundry-total {
  display: inline-block;
  float: right;
}
.preorder-detail-view .preorder-confirm .information .summation {
  padding: 18px;
  position: absolute;
  top: 0;
  right: 0;
}
.preorder-detail-view .preorder-confirm .information .summation p {
  text-align: right;
  margin: 0;
  padding: 0;
  color: rgba(255,255,255,0.8);
}
.preorder-detail-view .preorder-confirm .information .summation .cny,
.preorder-detail-view .preorder-confirm .information .summation .price {
  font-size: 20px;
  color: #fff;
}
.preorder-detail-view .preorder-confirm .information .summation .cny {
  margin-left: 0.4em;
}
.preorder-detail-view .preorder-confirm .information .summation .price {
  margin-left: 0.2em;
}
.preorder-detail-view .preorder-confirm .information .summation .count {
  display: block;
  text-align: right;
  opacity: 0.6;
}
.preorder-detail-view .preorder-confirm .information.exchange-ticket {
  background-color: #00b094;
}
.preorder-detail-view .preorder-confirm .information.exchange-ticket:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/6a1dd3a1766107b4ad00499e153292ab.png);
}
.preorder-detail-view .preorder-confirm .information.seat-ticket,
.preorder-detail-view .preorder-confirm .information.baochang-ticket,
.preorder-detail-view .preorder-confirm .information.sundry-ticket {
  background-color: #0da7c5;
}
.preorder-detail-view .preorder-confirm .information.seat-ticket:after,
.preorder-detail-view .preorder-confirm .information.baochang-ticket:after,
.preorder-detail-view .preorder-confirm .information.sundry-ticket:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/44ad58088bec3334dc0a083ed76dc5b6.png);
}
.preorder-detail-view .preorder-confirm .information.active-ticket {
  background-color: #e77285;
}
.preorder-detail-view .preorder-confirm .information.active-ticket:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/077a81d6e4f7694413bd672d96f021f5.png);
}
.preorder-detail-view .preorder-confirm .mobile {
  margin: 10px auto;
  height: 50px;
  padding: 0 14px;
  font-size: 15px;
  display: flex;
  background: #fff;
}
.preorder-detail-view .preorder-confirm .mobile label {
  font-weight: normal;
  font-size: 12px;
  line-height: 48px;
}
.preorder-detail-view .preorder-confirm .mobile input {
  background: transparent;
  border: none;
  height: 100%;
  flex: 1;
  margin: 0 14px;
}
.preorder-detail-view .preorder-confirm .mobile input:disabled {
  -webkit-opacity: 1;
  -webkit-text-fill-color: #999;
}
.preorder-detail-view .preorder-confirm .mobile .clear-mobile {
  border: 1px solid #ddd;
  height: 20px;
  width: 20px;
  border-radius: 10px;
  text-align: center;
  margin-top: 15px;
  color: #ddd;
  line-height: 17px;
  display: inline-block;
}
.preorder-detail-view .preorder-confirm .mobile.disabled {
  color: #999;
}
.preorder-detail-view .preorder-confirm .payment-code {
  margin: 10px auto;
  padding: 8px 14px;
  font-size: 15px;
  background: #fff;
}
.preorder-detail-view .preorder-confirm .payment-code div {
  display: -webkit-box;
  display: -webkit-flex;
  display: flex;
  padding-top: 4px;
}
.preorder-detail-view .preorder-confirm .payment-code div label {
  font-weight: normal;
  font-size: 12px;
  line-height: 40px;
  min-width: 60px;
}
.preorder-detail-view .preorder-confirm .payment-code div input {
  border: none;
  height: 30px;
  width: 1px;
  position: absolute;
  z-index: -1;
  opacity: 0.01;
  left: -20px;
  -webkit-appearance: none;
  appearance: none;
}
.preorder-detail-view .preorder-confirm .payment-code div input:focus {
  outline: none;
}
.preorder-detail-view .preorder-confirm .payment-code div.payment-forget {
  display: block;
  text-align: right;
}
.preorder-detail-view .preorder-confirm .payment-code div ul {
  display: -webkit-box;
  display: -webkit-flex;
  display: flex;
  box-sizing: border-box;
  -webkit-box-flex: 1;
  box-flex: 1;
  -webkit-flex: 1;
  flex: 1;
  overflow: hidden;
  height: 44px;
  border: 1px solid #fff;
  border-radius: 4px;
  font-size: 24px;
  line-height: 46px;
  padding: 2px;
  margin-bottom: 8px;
  min-width: 180px;
}
.preorder-detail-view .preorder-confirm .payment-code div ul li {
  -webkit-box-flex: 1;
  box-flex: 1;
  -webkit-flex: 1;
  flex: 1;
  min-width: 30px;
  margin-right: 2px;
  background-color: #efefef;
  overflow: hidden;
  text-align: center;
}
.preorder-detail-view .preorder-confirm .payment-code div ul li:last-child {
  margin-right: 0;
  border-radius: 0 2px 2px 0;
}
.preorder-detail-view .preorder-confirm .payment-code div ul li:first-child {
  border-radius: 2px 0 0 2px;
}
.preorder-detail-view .preorder-confirm .payment-code div ul li span {
  background-color: #fe8233;
  display: inline-block;
  position: relative;
  height: 20px;
  width: 1px;
  top: -2px;
  -webkit-animation: code-flash 0.8s cubic-bezier(0.9, -0.04, 0, 1.13) infinite;
  animotion: code-flash 0.8s cubic-bezier(0.9, -0.04, 0, 1.13) infinite;
}
.preorder-detail-view .preorder-confirm .payment-code div ul li i {
  background: #555;
  height: 10px;
  width: 10px;
  display: inline-block;
  border-radius: 50%;
  visibility: hidden;
}
.preorder-detail-view .preorder-confirm .payment-code div ul li i.visible {
  visibility: visible;
}
.preorder-detail-view .preorder-confirm .payment-code span {
  font-size: 10px;
  color: #26a69a;
}
.preorder-detail-view .preorder-confirm .payment-code.disabled {
  color: #777;
}
.preorder-detail-view .preorder-confirm .notice {
  margin: 2em 0 0;
  padding: 0 18px;
}
.preorder-detail-view .preorder-confirm .notice p {
  font-size: 11px;
  margin: 1em 0;
  padding: 0 1em;
  text-indent: -0.5em;
  color: #555;
}
.preorder-detail-view .preorder-confirm .notice .strong {
  color: #fe8233;
}
.preorder-detail-view .preorder-confirm .summation-coupon {
  background-color: #fff;
  min-height: 72px;
  padding: 14px;
  margin-bottom: 20px;
}
.preorder-detail-view .preorder-confirm .summation-coupon div,
.preorder-detail-view .preorder-confirm .summation-coupon .tips-selected {
  display: block;
  margin-bottom: 4px;
  color: #757575;
}
.preorder-detail-view .preorder-confirm .summation-coupon .tips-selected {
  color: #bdbdbd;
  font-size: 10px;
  text-align: right;
}
.preorder-detail-view .preorder-confirm .summation-coupon .price,
.preorder-detail-view .preorder-confirm .summation-coupon .tip {
  float: right;
  color: #ff8132;
}
.preorder-detail-view .preorder-confirm .summation-coupon .price {
  color: #757575;
}
.preorder-detail-view .preorder-confirm .operation {
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  height: 50px;
  margin: 0;
  background-color: #fff;
  border-top: 1px solid #dcdcdc;
}
.preorder-detail-view .preorder-confirm .confirm {
  font-size: 14px;
  min-width: 100px;
  height: 50px;
  line-height: 50px;
  float: right;
  border-radius: 0;
}
.preorder-detail-view .preorder-confirm .balance {
  text-align: left;
  float: left;
  line-height: 50px;
  padding: 0 0 0 18px;
}
.preorder-detail-view .preorder-confirm .balance .price {
  font-size: 26px;
}
.preorder-detail-view .preorder-confirm {
  background-color: #ebebeb;
}
.preorder-detail-view .preorder-confirm .redeem,
.preorder-detail-view .preorder-confirm .discount {
  padding-bottom: 10px;
}
.preorder-detail-view .preorder-confirm .redeem ul,
.preorder-detail-view .preorder-confirm .discount ul,
.preorder-detail-view .preorder-confirm .redeem li,
.preorder-detail-view .preorder-confirm .discount li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.preorder-detail-view .preorder-confirm .redeem ul,
.preorder-detail-view .preorder-confirm .discount ul {
  padding: 0 14px;
  background: #fff;
}
.preorder-detail-view .preorder-confirm .redeem li,
.preorder-detail-view .preorder-confirm .discount li {
  line-height: 20px;
  min-height: 60px;
  font-size: 12px;
  padding: 24px 0;
  border-bottom: 1px dashed #ccc;
  cursor: pointer;
}
.preorder-detail-view .preorder-confirm .redeem li:last-child,
.preorder-detail-view .preorder-confirm .discount li:last-child {
  border-bottom: none;
}
.preorder-detail-view .preorder-confirm .redeem li .right,
.preorder-detail-view .preorder-confirm .discount li .right {
  float: right;
}
.preorder-detail-view .preorder-confirm .redeem li .tip,
.preorder-detail-view .preorder-confirm .discount li .tip {
  float: left;
  padding-right: 0.5em;
}
.preorder-detail-view .preorder-confirm .redeem li .price,
.preorder-detail-view .preorder-confirm .discount li .price {
  color: #666;
}
.preorder-detail-view .preorder-confirm .redeem li .arrow,
.preorder-detail-view .preorder-confirm .discount li .arrow {
  color: #999;
}
.preorder-detail-view .preorder-confirm .redeem li .checkbox,
.preorder-detail-view .preorder-confirm .discount li .checkbox {
  float: right;
  margin: -4px -8px;
}
.preorder-detail-view .preorder-confirm .redeem li .title,
.preorder-detail-view .preorder-confirm .discount li .title {
  width: 52%;
  display: inline-block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.preorder-detail-view .preorder-confirm .redeem li.selected,
.preorder-detail-view .preorder-confirm .discount li.selected {
  color: #fe8233;
}
.preorder-detail-view .preorder-confirm .redeem .disabled,
.preorder-detail-view .preorder-confirm .discount .disabled {
  opacity: 0.5;
}
.preorder-detail-view .preorder-confirm .redeem .hide,
.preorder-detail-view .preorder-confirm .discount .hide {
  display: none;
}
.preorder-detail-view .preorder-confirm .balance {
  font-size: 14px;
  line-height: 18px;
  padding: 14px;
  text-align: center;
}
.preorder-detail-view .preorder-confirm .balance .cny,
.preorder-detail-view .preorder-confirm .balance .price {
  color: #fe8233;
}
.preorder-detail-view .preorder-confirm .balance .cny {
  padding: 0 0.25em 0 0.5em;
}
.preorder-detail-view .preorder-confirm .balance .price {
  font-size: 26px;
}
@-moz-keyframes code-flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@-webkit-keyframes code-flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@-o-keyframes code-flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@keyframes code-flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
</style><style type="text/css">.preorder-loading-view .board {
  text-align: center;
  margin-top: 150px;
}
.preorder-loading-view .board img {
  zoom: 0.5;
}
.preorder-loading-view p {
  margin: 0;
  padding: 0.2em 0;
  font-size: 12px;
  color: #777;
}
.preorder-loading-view .cover {
  padding-right: 0.3em;
}
.preorder-loading-view .message {
  padding-left: 1em;
}
</style><style type="text/css">.pay-view {
  background-color: #ebebeb;
}
.pay-view .redeem,
.pay-view .discount {
  padding-top: 16px;
}
.pay-view .redeem ul,
.pay-view .discount ul,
.pay-view .redeem li,
.pay-view .discount li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-view .redeem ul,
.pay-view .discount ul {
  padding: 0 14px;
  background: #fff;
}
.pay-view .redeem li,
.pay-view .discount li {
  min-height: 60px;
  font-size: 12px;
  padding: 24px 0;
  border-bottom: 1px dashed #ccc;
  cursor: pointer;
}
.pay-view .redeem li:last-child,
.pay-view .discount li:last-child {
  border-bottom: none;
}
.pay-view .redeem li .right,
.pay-view .discount li .right {
  float: right;
}
.pay-view .redeem li .tip,
.pay-view .discount li .tip {
  float: left;
  padding-right: 0.5em;
}
.pay-view .redeem li .tip.selected,
.pay-view .discount li .tip.selected {
  color: #fe8233;
}
.pay-view .redeem li .price,
.pay-view .discount li .price {
  color: #666;
}
.pay-view .redeem li .arrow,
.pay-view .discount li .arrow {
  color: #999;
}
.pay-view .redeem li .checkbox,
.pay-view .discount li .checkbox {
  float: left;
  margin: -6px -8px;
}
.pay-view .notice {
  margin-bottom: 80px;
  padding: 0 18px;
  line-height: 2em;
}
.pay-view .notice ul {
  padding: 0 0 0 18px;
}
.pay-view .notice li {
  color: #666;
}
.pay-view .balance {
  font-size: 12px;
  line-height: 26px;
  min-height: 106px;
  text-align: left;
  background-color: #fff;
  color: #757575;
  padding: 14px;
  margin: 4px 0 10px 0;
}
.pay-view .balance .price,
.pay-view .balance .reduce {
  color: #fe8233;
}
.pay-view .balance .price,
.pay-view .balance .reduce,
.pay-view .balance .items {
  text-align: right;
  display: inline-block;
  float: right;
}
.pay-view .payment {
  margin-bottom: 18px;
}
.pay-view .payment ul,
.pay-view .payment li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-view .payment ul {
  padding: 0 14px;
  background: #fff;
}
.pay-view .payment li {
  min-height: 60px;
  border-bottom: 1px dashed #ccc;
  padding: 20px 0;
}
.pay-view .payment li:last-child {
  border-bottom: none;
}
.pay-view .payment .label {
  float: left;
  width: 38px;
  height: 20px;
  border-radius: 10px;
  display: block;
  margin: 4px 7px;
  padding: 0;
  line-height: 20px;
}
.pay-view .payment .label img {
  width: 100%;
}
.pay-view .payment .description {
  float: left;
  margin-left: 18px;
}
.pay-view .payment .description h4 {
  font-size: 14px;
  margin: 0;
}
.pay-view .payment .description p {
  color: #999;
  font-size: 9px;
  margin: 0;
  line-height: 2em;
}
.pay-view .payment .checkbox {
  float: right;
  margin: 0 -8px;
}
.pay-view .operation {
  position: fixed;
  display: flex;
  bottom: 0;
  width: 100%;
  height: 50px;
  margin: 0;
  background-color: #fff;
  border-top: 1px solid #dcdcdc;
}
.pay-view .operation .confirm {
  font-size: 14px;
  min-width: 100px;
  height: 50px;
  line-height: 50px;
  flex: 1;
  border-radius: 0;
  float: right;
}
.pay-view .operation .balance {
  display: inline-block;
  line-height: 18px;
  width: 68%;
  text-align: left;
}
.pay-view .operation .balance .cny,
.pay-view .operation .balance .price {
  color: #fe8233;
  display: inline-block;
  float: left;
}
.pay-view .operation .balance .price {
  font-size: 26px;
  padding-right: 6px;
}
.pay-view .operation .balance .cny {
  font-size: 14px;
  padding: 0.35em 0.25em 0 0.5em;
}
.pay-view .operation .balance .pay-type {
  font-size: 16px;
  display: inline-block;
  padding-top: 0.1em;
}
</style><style type="text/css">.pay-coupon-view {
  position: absolute;
  height: 100%;
  width: 100%;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/3c4771ba8ce431d164897b8a2d13a05e.png);
}
.pay-coupon-view .coupon-list ul,
.pay-coupon-view .coupon-list li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-coupon-view .coupon-list li {
  margin: 14px;
  min-height: 96px;
  position: relative;
  display: block;
  display: flex;
  display: -webkit-flex;
  cursor: pointer;
  background-color: #fff;
  border-right: 1px solid #e0e0e0;
  border-top: 1px solid #e0e0e0;
}
.pay-coupon-view .coupon-list li .total {
  float: left;
  width: 80px;
  line-height: 96px;
  text-align: center;
  background-color: #f9a15e;
  font-size: 32px;
  color: #fff;
  -webkit-flex: none;
  flex: none;
}
.pay-coupon-view .coupon-list li .total sup {
  font-size: 12px;
  top: -16px;
}
.pay-coupon-view .coupon-list li .information {
  font-size: 12px;
  color: #333;
  background-color: #fff;
  float: left;
  padding: 16px;
}
.pay-coupon-view .coupon-list li .information h3 {
  color: #f9a15e;
  font-size: 12px;
  margin: 12px 0;
}
.pay-coupon-view .coupon-list li .information p {
  margin: 0;
}
.pay-coupon-view .coupon-list li .information .check {
  color: #f6b43c;
  position: absolute;
  right: 18px;
  top: 28px;
}
.pay-coupon-view .coupon-list li .information .check i {
  font-size: 32px;
}
.pay-coupon-view .coupon-list li .total:after {
  content: '';
  height: 7px;
  width: 100%;
  display: block;
  position: absolute;
  bottom: -7px;
  left: 0;
  background-size: 7px 7px;
  background-repeat: repeat-x;
}
.pay-coupon-view .coupon-list li:after {
  content: '';
  height: 7px;
  width: 100%;
  display: block;
  position: absolute;
  bottom: -7px;
  left: 0;
  background-size: 7px 7px;
  background-repeat: repeat-x;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/962b30790a3980f0fd192da263fff61a.png);
}
.pay-coupon-view .coupon-list li .total:after {
  width: 80px;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/81a5468cade0c58f338febc5eb47f3df.png);
  z-index: 2;
}
.pay-coupon-view .coupon-list li.disabled .total {
  background-color: #cecece;
}
.pay-coupon-view .coupon-list li.disabled .total:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/0cf884d22f846aa92e9f587243ce5dfa.png);
}
.pay-coupon-view .coupon-list li.disabled .information {
  color: #cecece;
}
.pay-coupon-view .coupon-list li.disabled .information h3 {
  color: #cecece;
}
</style><style type="text/css">.pay-discount-view {
  position: absolute;
  height: 100%;
  width: 100%;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/3c4771ba8ce431d164897b8a2d13a05e.png);
}
.pay-discount-view .discount-list ul,
.pay-discount-view .discount-list li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-discount-view .discount-list li {
  margin: 8px auto;
  min-height: 75px;
  position: relative;
  display: block;
  cursor: pointer;
  padding: 0 20px;
  background-color: #fff;
  border-right: 1px solid #e0e0e0;
  border-top: 1px solid #e0e0e0;
}
.pay-discount-view .discount-list li .name {
  width: 100%;
  line-height: 50px;
}
.pay-discount-view .discount-list li .description {
  width: 100%;
  color: #aaa;
}
.pay-discount-view .discount-list li .check {
  color: #f6b43c;
  position: absolute;
  right: 20px;
  top: 28px;
}
.pay-discount-view .discount-list li .check i {
  font-size: 16px;
}
.pay-discount-view .discount-list li .total {
  float: left;
  width: 80px;
  line-height: 96px;
  text-align: center;
  background-color: #f9a15e;
  font-size: 32px;
  color: #fff;
  -webkit-flex: none;
  flex: none;
}
.pay-discount-view .discount-list li .total sup {
  font-size: 12px;
  top: -16px;
}
.pay-discount-view .discount-list li:after {
  content: '';
  height: 7px;
  width: 100%;
  display: block;
  position: absolute;
  bottom: -7px;
  left: 0;
  background-size: 7px 7px;
  background-repeat: repeat-x;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/962b30790a3980f0fd192da263fff61a.png);
}
.pay-discount-view .discount-list li .total:after {
  width: 80px;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/81a5468cade0c58f338febc5eb47f3df.png);
  z-index: 2;
}
.pay-discount-view .discount-list li.disabled {
  background-color: #f1f1f1;
}
.pay-discount-view .discount-list li.disabled .total {
  background-color: #cecece;
}
.pay-discount-view .discount-list li.disabled .total:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/0cf884d22f846aa92e9f587243ce5dfa.png);
}
.pay-discount-view .discount-list li.disabled .information {
  color: #cecece;
}
.pay-discount-view .discount-list li.disabled .information h3 {
  color: #cecece;
}
</style><style type="text/css">.fixfixed .pay-card-query-view .nav {
  position: absolute;
}
.pay-card-query-view {
  position: absolute;
  height: 100%;
  width: 100%;
  background-color: #fcfcfc;
}
.pay-card-query-view .query-form ul,
.pay-card-query-view .query-form li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-card-query-view .query-form .tab {
  color: #666;
  border-bottom: 1px solid #ff7100;
}
.pay-card-query-view .query-form .tab li {
  display: inline-block;
  text-align: center;
  width: 50%;
  line-height: 45px;
  font-size: 16px;
  transition: all 0.2s ease;
  -webkit-transition: all 0.2s ease;
  cursor: pointer;
}
.pay-card-query-view .query-form .tab li.active {
  color: #ff7100;
  box-shadow: 0 -4px #ff7100 inset;
}
.pay-card-query-view .query-form .panel-content {
  transition: all 0.2s ease;
  -webkit-transition: all 0.2s ease;
  text-align: center;
  font-size: 14px;
  color: #202020;
  position: relative;
  padding: 0 36px;
}
.pay-card-query-view .query-form .panel-content p {
  margin: 0 auto;
  text-align: left;
  padding: 14px 8px 0;
  position: relative;
  top: 12px;
}
.pay-card-query-view .query-form .panel-content p label {
  font-weight: normal;
}
.pay-card-query-view .query-form .panel-content input {
  width: 60%;
  border: none;
  background: transparent;
  line-height: 30px;
  padding-left: 0.5em;
}
.pay-card-query-view .query-form .panel-content .input-bg {
  border: solid #ccc;
  border-width: 0 1px 1px;
  display: inline-block;
  height: 8px;
  width: 100%;
}
.pay-card-query-view .query-form .panel-content .icon-qrcode {
  float: right;
  color: #26a69a;
  font-size: 28px;
  padding: 0;
  line-height: 100%;
}
.pay-card-query-view .query-form .digital-panel .digital {
  display: none;
}
.pay-card-query-view .query-form .material-panel .material {
  display: none;
}
.pay-card-query-view .operation {
  text-align: center;
  padding: 50px 0 20px;
}
.pay-card-query-view .nav {
  width: 100%;
  text-align: center;
}
.pay-card-query-view .nav button {
  border: 0;
  background-color: transparent;
  height: 45px;
  font-size: 14px;
  color: rgba(0,0,0,0.54);
  text-decoration: underline;
}
.pay-card-query-view .nav button:disabled {
  opacity: 0.5;
}
.pay-card-binded-view {
  position: absolute;
  min-height: 100%;
  height: auto;
  width: 100%;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/3c4771ba8ce431d164897b8a2d13a05e.png);
}
.pay-card-binded-view .card-list {
  margin: 42px auto 50px;
}
.pay-card-binded-view .card-list ul,
.pay-card-binded-view .card-list li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-card-binded-view .card-list ul {
  padding: 16px 10px;
}
.pay-card-binded-view .card-list li {
  margin-bottom: 16px;
  position: relative;
  display: flex;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  -webkit-flex-direction: row;
  flex-direction: row;
  -webkit-box-orient: horizontal;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
}
.pay-card-binded-view .card-list li .card-select {
  min-width: 46px;
  width: auto;
  height: auto;
  text-align: center;
}
.pay-card-binded-view .card-list li .card-select span {
  display: inline-block;
  height: 26px;
  width: 26px;
  border-radius: 100%;
  background-color: #fff;
  border: solid 1px rgba(0,0,0,0.26);
}
.pay-card-binded-view .card-list li .card-select.selected {
  border: 0;
  background: none;
}
.pay-card-binded-view .card-list li .card-select.invalid {
  border: solid 1px rgba(0,0,0,0.26);
  background: none;
  padding: 1px 4px;
  border-radius: 4px;
  opacity: 0.5;
}
.pay-card-binded-view .card-list li .card-select .icon-ok {
  color: #fff;
  background: #ff8132;
  border-radius: 100%;
  font-size: 26px;
  line-height: 100%;
  padding: 0 0 2px 2px;
}
.pay-card-binded-view .card-list li .card-item {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  border-radius: 8px;
  box-shadow: 0.5px 0.5px 1px #dad4d4;
  margin-left: 10px;
}
.pay-card-binded-view .card-list li .card-item h3 {
  margin: 0;
  padding: 12px;
  font-size: 18px;
  color: #fff;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  display: flex;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  -webkit-flex-direction: row;
  flex-direction: row;
  -webkit-box-orient: horizontal;
}
.pay-card-binded-view .card-list li .card-item h3 .balance {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  font-size: 32px;
}
.pay-card-binded-view .card-list li .card-item h3 .balance .unit {
  font-size: 16px;
  opacity: 0.8;
}
.pay-card-binded-view .card-list li .card-item h3 .sub {
  display: flex;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  flex-direction: column;
  -ms-flex-direction: column;
  -webkit-flex-direction: column;
  -webkit-box-orient: vertical;
  opacity: 0.8;
  font-size: 12px;
  line-height: normal;
  text-align: right;
  justify-content: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
}
.pay-card-binded-view .card-list li .card-item h3 .sub p {
  margin: 0 0 4px;
}
.pay-card-binded-view .card-list li .card-item h3.ticket {
  background-color: #00c1b3;
}
.pay-card-binded-view .card-list li .card-item h3.presold {
  background-color: #ff7e91;
}
.pay-card-binded-view .card-list li .card-item h3.recharging {
  background-color: #00accd;
}
.pay-card-binded-view .card-list li .card-item .detail {
  padding: 12px 15px 5px;
  background-color: #fff;
  border-bottom-left-radius: 8px;
  border-bottom-right-radius: 8px;
  color: #727272;
  font-size: 12px;
  line-height: 18px;
}
.pay-card-binded-view .card-list li .card-item .detail p {
  margin: 0 0 5px 0;
  padding: 0;
}
.pay-card-binded-view .card-list li .card-item .detail .label {
  font-style: normal;
  border: 1px solid #ff7e91;
  color: #ff7e91;
  margin-left: 10px;
  padding: 2px 6px;
  line-height: 100%;
  vertical-align: middle;
  display: inline-block;
}
.pay-card-binded-view .nav {
  width: 100%;
  background: #fff;
  position: fixed;
  top: 50px;
  padding-left: 16px;
  line-height: 42px;
  height: 42px;
  display: table;
}
.pay-card-binded-view .nav .icon-add-filled {
  color: #ff7100;
  vertical-align: sub;
  font-size: 20px;
}
.pay-card-binded-view .nav button {
  border: 0;
  background: none;
  color: #6d6d6d;
  margin-left: 4px;
  vertical-align: middle;
}
.pay-card-binded-view .nav button:disabled {
  color: #e6e6e6;
}
.pay-card-binded-view .operation {
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  height: 50px;
  margin: 0;
  background-color: #fff;
  border-top: 1px solid #dcdcdc;
}
.pay-card-binded-view .operation .balance {
  font-size: 14px;
  line-height: 18px;
  padding: 14px;
  text-align: center;
  float: left;
}
.pay-card-binded-view .operation .balance .price {
  color: #ff8132;
}
.pay-card-binded-view .operation .confirm {
  font-size: 14px;
  min-width: 100px;
  height: 50px;
  line-height: 50px;
  float: right;
  border-radius: 0;
}
.pay-card-binded-view .tips {
  display: block;
  width: 100%;
  position: fixed;
  color: #ff8132;
  bottom: 50px;
  text-align: center;
  line-height: 32px;
  background: rgba(255,255,255,0.6);
}
.pay-card-selected-view {
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #ebebeb;
}
.pay-card-selected-view .card-list {
  font-size: 12px;
}
.pay-card-selected-view .card-list ul,
.pay-card-selected-view .card-list li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pay-card-selected-view .card-list li {
  margin: 12px 0;
  padding: 0 16px;
  line-height: 50px;
  background: #fff;
  position: relative;
}
.pay-card-selected-view .card-list li .attr {
  margin: 0;
  padding: 0;
  border-bottom: 1px dotted #e3e3e3;
  color: #666;
}
.pay-card-selected-view .card-list li .attr .strong {
  color: #333;
  min-width: 5em;
  display: inline-block;
  padding-right: 1em;
}
.pay-card-selected-view .card-list li .operation {
  position: absolute;
  top: 0;
  right: 0;
}
.pay-card-selected-view .card-list li .operation button {
  background: none;
  color: #999;
  width: 3em;
  height: 3em;
  border: none;
}
.pay-card-selected-view .card-list li .operation button:hover {
  color: #000;
}
.pay-card-selected-view .information {
  text-align: right;
  color: #666;
  padding-right: 12px;
  font-size: 12px;
}
.pay-card-selected-view .information span.strong {
  color: #ff7100;
}
.pay-card-selected-view .information p.strong {
  color: #222;
  font-size: 14px;
}
.pay-card-selected-view .operation {
  text-align: center;
}
.pay-card-selected-view .operation .add {
  text-align: left;
  line-height: 60px;
  padding: 0 16px;
  color: #333;
  background-color: #fff;
  cursor: pointer;
}
.pay-card-selected-view .operation .add .right {
  float: right;
}
.pay-card-selected-view .operation .confirm {
  margin-top: 18px;
}
.pay-card-detail-view {
  position: absolute;
  height: 100%;
  width: 100%;
  background-color: #ebebeb;
}
.pay-card-detail-view section {
  color: #fff;
  padding: 22px;
}
.pay-card-detail-view section.exchange {
  background-color: #00c1b3;
}
.pay-card-detail-view section.presold {
  background-color: #ff7e91;
}
.pay-card-detail-view section.recharging {
  background-color: #00accd;
}
.pay-card-detail-view section .name,
.pay-card-detail-view section .count,
.pay-card-detail-view section .disabled {
  text-align: center;
  font-size: 15px;
}
.pay-card-detail-view section .name .num,
.pay-card-detail-view section .count .num,
.pay-card-detail-view section .disabled .num {
  font-size: 36px;
}
.pay-card-detail-view section button {
  background: none;
  border: 1px solid #fff;
  border-radius: 40px;
  line-height: 40px;
  width: 66%;
  margin: 0 auto 24px;
  display: block;
  font-size: 16px;
}
.pay-card-detail-view section div {
  display: flex;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  opacity: 0.8;
}
.pay-card-detail-view section div .title {
  min-width: 62px;
}
.pay-card-detail-view .operation {
  font-size: 14px;
  margin-top: 12px;
  background-color: #fff;
  padding: 0 12px;
}
.pay-card-detail-view .operation div {
  line-height: 48px;
}
.pay-card-detail-view .operation div:first-child {
  border-bottom: 1px solid #efefef;
}
.pay-card-detail-view .operation div .iconfont {
  float: right;
  color: #ccc;
}
.pay-card-detail-view .operation .recharging {
  border: 0;
}
</style><style type="text/css">.city-view .city-index-title {
  padding-left: 15px;
  font-size: 14px;
  line-height: 40px;
  background-color: #ebebeb;
  margin-top: -1px;
}
.city-view .city-index-detail {
  background-color: #fff;
}
.city-view .city-index-detail ul {
  margin: 0;
  min-width: 320px;
}
.city-view .city-index-detail .city-item-detail {
  width: 25%;
  font-size: 16px;
  line-height: 46px;
  text-align: center;
  display: inline-block;
  cursor: pointer;
  color: #838383;
  border-bottom: #ebebeb 1px solid;
}
.city-view .city-index-detail .city-item-detail-gprs {
  color: #e2941a;
}
.city-view .city-navbar {
  position: fixed;
  width: 30px;
  right: 5px;
  top: 55px;
  padding: 15px 0;
  border-radius: 15px;
  background-color: #bbb;
  opacity: 0.9;
}
.city-view .city-navbar .city-navbar-item {
  cursor: pointer;
  line-height: 20px;
  text-align: center;
  color: #fff;
}
.city-view .nav-tip-template {
  position: fixed;
  display: none;
  width: 60px;
  height: 50px;
  font-size: 30px;
  text-align: center;
  border-radius: 15px;
  background-color: #c1e2b3;
}
</style><style type="text/css">.order-detail-view {
  min-width: 320px;
}
.order-detail-view .inner {
  max-width: 414px;
  margin: 0 auto;
}
.order-detail-view .inner p {
  margin-bottom: 0;
}
.order-detail-view .exchange .ticket {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/343db3c1ef1bf5933c61b3699a7a0126.png) #01c3a4 repeat-x bottom;
}
.order-detail-view .seat .ticket {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/bb579e624dedb6f9617ccd2c55d75648.png) #00accd repeat-x bottom;
}
.order-detail-view .active .ticket {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/a961d6b7fd8dfcd70fa155f4d647ac08.png) #ff7f93 repeat-x bottom;
}
.order-detail-view .ticket {
  padding: 20px 15px;
  color: rgba(255,255,255,0.59);
}
.order-detail-view .ticket .title {
  color: #fff;
  font-size: 15px;
}
.order-detail-view .ticket .title span {
  margin-right: 10px;
}
.order-detail-view .ticket .ticket-cinema span {
  margin-right: 10px;
}
.order-detail-view .ticket .no-machine {
  text-align: center;
  color: #fff;
  margin-top: 15px;
}
.order-detail-view .ticket .no-machine img {
  margin-right: 5px;
}
.order-detail-view .ticket .no-machine span {
  text-decoration: underline;
}
.order-detail-view .ticket .no-machine i {
  font-size: 12px;
  margin-right: 5px;
}
.order-detail-view .ticket .baochang-msg {
  margin-top: 5px;
}
.order-detail-view .ticket .description {
  cursor: pointer;
}
.order-detail-view .ticket .description span {
  vertical-align: middle;
}
.order-detail-view .ticket .description i {
  font-size: 14px;
  vertical-align: middle;
  line-height: 16px;
  margin-left: 5px;
}
.order-detail-view .order,
.order-detail-view .cinema,
.order-detail-view .limit-cinema,
.order-detail-view .service,
.order-detail-view .active-panel {
  background-color: #fff;
  padding: 10px 15px;
  margin-top: 10px;
}
.order-detail-view .order label,
.order-detail-view .cinema label,
.order-detail-view .limit-cinema label,
.order-detail-view .service label,
.order-detail-view .active-panel label {
  width: 80px;
  font-weight: normal;
}
.order-detail-view .order {
  font-size: 14px;
}
.order-detail-view .order span {
  color: #757575;
}
.order-detail-view .order .refun {
  text-align: right;
}
.order-detail-view .order .refun span {
  color: #bdbdbd;
  margin-left: 5px;
  font-size: 12px;
  vertical-align: middle;
}
.order-detail-view .order .refun i {
  font-size: 14px;
  vertical-align: middle;
  line-height: 16px;
}
.order-detail-view .cinema,
.order-detail-view .service-left {
  font-size: 15px;
}
.order-detail-view .cinema span,
.order-detail-view .service-left span {
  font-size: 12px;
  color: #bdbdbd;
}
.order-detail-view .cinema span {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  display: inline-block;
  width: 100%;
}
.order-detail-view .cinema p i {
  font-style: normal;
  margin-right: 5px;
}
.order-detail-view .limit-cinema,
.order-detail-view .active-panel {
  font-size: 15px;
}
.order-detail-view .limit-cinema span,
.order-detail-view .active-panel span {
  color: #757575;
}
.order-detail-view .limit-cinema span.check,
.order-detail-view .active-panel span.check {
  float: right;
  color: #607faa;
  text-overflow: underline;
}
.order-detail-view .code-detail {
  margin-top: 10px;
}
.order-detail-view .code-detail .code {
  display: inline-block;
  width: 85%;
}
.order-detail-view .code-detail .code-img {
  display: inline-block;
  width: 12%;
  vertical-align: top;
  text-align: center;
}
.order-detail-view .code-detail .code-img i {
  font-size: 35px;
}
.order-detail-view .code-detail .code-list {
  display: inline-block;
  width: 70%;
  vertical-align: top;
}
.order-detail-view .code-detail .code-list span {
  display: inline-block;
}
.order-detail-view .service .service-left {
  width: 60%;
  display: inline-block;
}
.order-detail-view .service .phone {
  width: 40%;
  text-align: right;
  display: inline-block;
  vertical-align: top;
  margin-top: 10px;
  color: #607faa;
  font-size: 14px;
}
.order-detail-view .order-billboard {
  background-color: #fff;
  max-width: 640px;
  padding: 10px 10px 0 10px;
}
.order-detail-view .order-billboard .slick-slide {
  position: relative;
}
.order-detail-view .order-billboard .slick-slide a i {
  font-style: normal;
  color: #fff;
  font-size: 10px;
  padding: 2px 6px;
  background-color: #ff5000;
  position: absolute;
  border-radius: 0 0 6px 0;
  top: 0;
  left: 0;
}
.order-detail-view .box-warp {
  background-color: rgba(0,0,0,0.43);
  position: fixed;
  top: 50px;
  padding-top: 50px;
  height: 100%;
  width: 100%;
}
.order-detail-view .box-warp .code-box {
  width: 300px;
  margin: 0 auto;
  background-color: #ebebeb;
  border-radius: 10px;
}
.order-detail-view .box-warp .code-box img {
  width: 100%;
  margin-bottom: 8px;
}
.order-detail-view .box-warp .code-box .code {
  padding: 0 35px 20px;
  text-align: center;
}
.order-detail-view .box-warp .code-box .close-box {
  padding: 10px;
  text-align: right;
}
.order-detail-view .box-warp .code-box .close-box span {
  display: inline-block;
  width: 23px;
  height: 23px;
  border-radius: 50%;
  background-color: #fff;
  line-height: 23px;
  text-align: center;
  cursor: pointer;
}
.order-detail-view .box-warp .code-box .close-box span i {
  color: #bdbdbd;
}
.order-detail-view .box-warp .description-box {
  width: 300px;
  margin: 0 auto;
  background-color: #fff;
  border-radius: 10px;
}
.order-detail-view .box-warp .description-box .close-box {
  padding: 12px 0;
  background-color: #d7d7d7;
  border-radius: 10px 10px 0 0;
  text-align: center;
}
.order-detail-view .box-warp .description-box .close-box p {
  font-size: 16px;
  margin-bottom: 0;
  display: inline-block;
}
.order-detail-view .box-warp .description-box .close-box span {
  float: right;
  display: inline-block;
  width: 23px;
  height: 23px;
  border-radius: 50%;
  background-color: #fff;
  line-height: 23px;
  text-align: center;
  margin-right: 10px;
}
.order-detail-view .box-warp .description-box .close-box span i {
  color: #bdbdbd;
}
.order-detail-view .box-warp .description-box .description-cnt {
  padding: 15px;
}
.order-detail-view .box-warp .description-box .description-cnt poiter,
.order-detail-view .box-warp .description-box .description-cnt h4 {
  font-size: 15px;
  color: #ff5000;
}
.order-detail-view .add-wechat {
  font-size: 14px;
  color: #607faa;
  text-align: center;
  margin: 20px 0;
}
</style><style type="text/css">body {
  background-color: #ebebeb;
}
table {
  font-size: 14px;
  line-height: 18px;
  margin: 40px auto 20px;
  display: block;
  float: left;
}
td,
tbody {
  display: block;
  width: 100% !important;
}
tr {
  width: 100%;
  border-right: none;
  border-bottom: 1px solid #fff;
  margin: 0px 0px 20px;
  padding: 0px 0px 20px;
  background: transparent;
  float: left;
}
td {
  border: 0;
  padding: 10px 0px;
}
.empty-tip {
  text-align: center;
}
.empty-tip img {
  margin-top: 20px;
}
#center-view,
.center-home-view,
.setting-view {
  position: absolute;
  height: 100%;
  width: 100%;
}
#center-view .center-header-wrap,
.center-home-view .center-header-wrap,
.setting-view .center-header-wrap {
  background-color: #303030;
  color: #fff;
}
#center-view .center-header-wrap header,
.center-home-view .center-header-wrap header,
.setting-view .center-header-wrap header {
  padding: 36px 12px 24px 10%;
}
#center-view .center-header-wrap header .avatar,
.center-home-view .center-header-wrap header .avatar,
.setting-view .center-header-wrap header .avatar {
  width: 92px;
  height: 92px;
  border-radius: 50%;
  margin-right: 14px;
  float: left;
}
#center-view .center-header-wrap header .detail,
.center-home-view .center-header-wrap header .detail,
.setting-view .center-header-wrap header .detail {
  float: left;
  margin-top: 16px;
}
#center-view .center-header-wrap header .detail p,
.center-home-view .center-header-wrap header .detail p,
.setting-view .center-header-wrap header .detail p {
  margin-bottom: 2px;
}
#center-view .center-header-wrap header .detail .username,
.center-home-view .center-header-wrap header .detail .username,
.setting-view .center-header-wrap header .detail .username {
  font-size: 14px;
}
#center-view .center-header-wrap header .detail .i-modify,
.center-home-view .center-header-wrap header .detail .i-modify,
.setting-view .center-header-wrap header .detail .i-modify {
  color: #626262;
}
#center-view .center-header-wrap header .detail .email,
.center-home-view .center-header-wrap header .detail .email,
.setting-view .center-header-wrap header .detail .email {
  font-size: 12px;
  color: #fff;
}
#center-view .center-header-wrap header .detail .operation,
.center-home-view .center-header-wrap header .detail .operation,
.setting-view .center-header-wrap header .detail .operation {
  font-size: 12px;
  color: #ffbd80;
  margin-top: 0;
  text-decoration: underline;
}
#center-view .center-header-wrap header .detail .operation .logout,
.center-home-view .center-header-wrap header .detail .operation .logout,
.setting-view .center-header-wrap header .detail .operation .logout {
  padding: 5px 20px 5px 0;
  cursor: pointer;
}
#center-view .center-header-wrap header .detail .operation .bind,
.center-home-view .center-header-wrap header .detail .operation .bind,
.setting-view .center-header-wrap header .detail .operation .bind {
  padding: 0 10px 0 0;
}
#center-view .center-nav,
.center-home-view .center-nav,
.setting-view .center-nav,
#center-view .setting-nav,
.center-home-view .setting-nav,
.setting-view .setting-nav {
  padding: 0;
  width: 100%;
}
#center-view .center-nav .menu-wrapper:not(.yinhua).hover,
.center-home-view .center-nav .menu-wrapper:not(.yinhua).hover,
.setting-view .center-nav .menu-wrapper:not(.yinhua).hover,
#center-view .setting-nav .menu-wrapper:not(.yinhua).hover,
.center-home-view .setting-nav .menu-wrapper:not(.yinhua).hover,
.setting-view .setting-nav .menu-wrapper:not(.yinhua).hover {
  background-color: #e1e1e1;
  opacity: 0.8;
}
#center-view .center-nav .menu-wrapper,
.center-home-view .center-nav .menu-wrapper,
.setting-view .center-nav .menu-wrapper,
#center-view .setting-nav .menu-wrapper,
.center-home-view .setting-nav .menu-wrapper,
.setting-view .setting-nav .menu-wrapper {
  width: 100%;
  margin: 14px 0;
  line-height: 59px;
  background-color: #fff;
  cursor: pointer;
  font-size: 12px;
  color: #222;
}
#center-view .center-nav .menu-wrapper .menu,
.center-home-view .center-nav .menu-wrapper .menu,
.setting-view .center-nav .menu-wrapper .menu,
#center-view .setting-nav .menu-wrapper .menu,
.center-home-view .setting-nav .menu-wrapper .menu,
.setting-view .setting-nav .menu-wrapper .menu {
  margin: 0 12px;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon,
.setting-view .center-nav .menu-wrapper .menu .menu-icon,
#center-view .setting-nav .menu-wrapper .menu .menu-icon,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon {
  font-size: 24px;
  vertical-align: sub;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-ticket-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-ticket-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-ticket-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-ticket-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-ticket-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-ticket-filled {
  color: #7bcdcc;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-sandglass-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-sandglass-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-sandglass-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-sandglass-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-sandglass-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-sandglass-filled {
  color: #bbcea5;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-coin-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-coin-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-coin-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-coin-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-coin-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-coin-filled {
  color: #faa0b5;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-card-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-card-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-card-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-card-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-card-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-card-filled {
  color: #80dae6;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-coupon-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-coupon-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-coupon-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-coupon-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-coupon-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-coupon-filled {
  color: #ffb978;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-setting-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-setting-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-setting-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-setting-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-setting-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-setting-filled {
  color: #a4c9e5;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-lock,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-lock,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-lock,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-lock,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-lock,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-lock {
  color: #91cf88;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-phone-ok,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-phone-ok,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-phone-ok,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-phone-ok,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-phone-ok,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-phone-ok {
  color: #36bfd1;
}
#center-view .center-nav .menu-wrapper .menu .menu-icon.icon-clean-filled,
.center-home-view .center-nav .menu-wrapper .menu .menu-icon.icon-clean-filled,
.setting-view .center-nav .menu-wrapper .menu .menu-icon.icon-clean-filled,
#center-view .setting-nav .menu-wrapper .menu .menu-icon.icon-clean-filled,
.center-home-view .setting-nav .menu-wrapper .menu .menu-icon.icon-clean-filled,
.setting-view .setting-nav .menu-wrapper .menu .menu-icon.icon-clean-filled {
  color: #999;
}
#center-view .center-nav .menu-wrapper .menu .title,
.center-home-view .center-nav .menu-wrapper .menu .title,
.setting-view .center-nav .menu-wrapper .menu .title,
#center-view .setting-nav .menu-wrapper .menu .title,
.center-home-view .setting-nav .menu-wrapper .menu .title,
.setting-view .setting-nav .menu-wrapper .menu .title {
  margin-left: 9px;
  line-height: 35px;
  vertical-align: inherit;
}
#center-view .center-nav .menu-wrapper .menu .value,
.center-home-view .center-nav .menu-wrapper .menu .value,
.setting-view .center-nav .menu-wrapper .menu .value,
#center-view .setting-nav .menu-wrapper .menu .value,
.center-home-view .setting-nav .menu-wrapper .menu .value,
.setting-view .setting-nav .menu-wrapper .menu .value {
  color: #e7a858;
}
#center-view .center-nav .menu-wrapper .menu .trigger-icon,
.center-home-view .center-nav .menu-wrapper .menu .trigger-icon,
.setting-view .center-nav .menu-wrapper .menu .trigger-icon,
#center-view .setting-nav .menu-wrapper .menu .trigger-icon,
.center-home-view .setting-nav .menu-wrapper .menu .trigger-icon,
.setting-view .setting-nav .menu-wrapper .menu .trigger-icon {
  color: #bdbdbd;
}
#center-view .center-nav .menu-wrapper.cash,
.center-home-view .center-nav .menu-wrapper.cash,
.setting-view .center-nav .menu-wrapper.cash,
#center-view .setting-nav .menu-wrapper.cash,
.center-home-view .setting-nav .menu-wrapper.cash,
.setting-view .setting-nav .menu-wrapper.cash,
#center-view .center-nav .menu-wrapper.yinhua,
.center-home-view .center-nav .menu-wrapper.yinhua,
.setting-view .center-nav .menu-wrapper.yinhua,
#center-view .setting-nav .menu-wrapper.yinhua,
.center-home-view .setting-nav .menu-wrapper.yinhua,
.setting-view .setting-nav .menu-wrapper.yinhua {
  margin-bottom: 0;
}
#center-view .center-nav .menu-wrapper.cash .menu,
.center-home-view .center-nav .menu-wrapper.cash .menu,
.setting-view .center-nav .menu-wrapper.cash .menu,
#center-view .setting-nav .menu-wrapper.cash .menu,
.center-home-view .setting-nav .menu-wrapper.cash .menu,
.setting-view .setting-nav .menu-wrapper.cash .menu,
#center-view .center-nav .menu-wrapper.yinhua .menu,
.center-home-view .center-nav .menu-wrapper.yinhua .menu,
.setting-view .center-nav .menu-wrapper.yinhua .menu,
#center-view .setting-nav .menu-wrapper.yinhua .menu,
.center-home-view .setting-nav .menu-wrapper.yinhua .menu,
.setting-view .setting-nav .menu-wrapper.yinhua .menu {
  border-bottom: solid 1px #eaeaea;
}
#center-view .center-nav .menu-wrapper.card,
.center-home-view .center-nav .menu-wrapper.card,
.setting-view .center-nav .menu-wrapper.card,
#center-view .setting-nav .menu-wrapper.card,
.center-home-view .setting-nav .menu-wrapper.card,
.setting-view .setting-nav .menu-wrapper.card {
  margin-top: 0;
}
#center-view .center-nav .menu-wrapper.setting .value-wrap,
.center-home-view .center-nav .menu-wrapper.setting .value-wrap,
.setting-view .center-nav .menu-wrapper.setting .value-wrap,
#center-view .setting-nav .menu-wrapper.setting .value-wrap,
.center-home-view .setting-nav .menu-wrapper.setting .value-wrap,
.setting-view .setting-nav .menu-wrapper.setting .value-wrap {
  display: none;
}
#center-view .center-nav .menu-wrapper.cash,
.center-home-view .center-nav .menu-wrapper.cash,
.setting-view .center-nav .menu-wrapper.cash,
#center-view .setting-nav .menu-wrapper.cash,
.center-home-view .setting-nav .menu-wrapper.cash,
.setting-view .setting-nav .menu-wrapper.cash {
  margin-bottom: 0;
}
#center-view .center-nav .menu-wrapper.yinhua,
.center-home-view .center-nav .menu-wrapper.yinhua,
.setting-view .center-nav .menu-wrapper.yinhua,
#center-view .setting-nav .menu-wrapper.yinhua,
.center-home-view .setting-nav .menu-wrapper.yinhua,
.setting-view .setting-nav .menu-wrapper.yinhua {
  margin: 0 auto;
}
#center-view .center-nav .menu-wrapper.yinhua .trigger-icon,
.center-home-view .center-nav .menu-wrapper.yinhua .trigger-icon,
.setting-view .center-nav .menu-wrapper.yinhua .trigger-icon,
#center-view .setting-nav .menu-wrapper.yinhua .trigger-icon,
.center-home-view .setting-nav .menu-wrapper.yinhua .trigger-icon,
.setting-view .setting-nav .menu-wrapper.yinhua .trigger-icon {
  overflow: hidden;
  vertical-align: middle;
  width: 17px;
  height: 17px;
  display: inline-block;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/99f363fc4f65f8188ec90bd8ba985643.png) no-repeat;
  background-size: 17px 17px;
}
#center-view .center-nav .menu-wrapper.yinhua .trigger-icon.active,
.center-home-view .center-nav .menu-wrapper.yinhua .trigger-icon.active,
.setting-view .center-nav .menu-wrapper.yinhua .trigger-icon.active,
#center-view .setting-nav .menu-wrapper.yinhua .trigger-icon.active,
.center-home-view .setting-nav .menu-wrapper.yinhua .trigger-icon.active,
.setting-view .setting-nav .menu-wrapper.yinhua .trigger-icon.active {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3f6e44c992043619a175b19dd80523ac.gif) no-repeat;
  background-size: 17px 17px;
}
#center-view .center-nav .menu-wrapper.card,
.center-home-view .center-nav .menu-wrapper.card,
.setting-view .center-nav .menu-wrapper.card,
#center-view .setting-nav .menu-wrapper.card,
.center-home-view .setting-nav .menu-wrapper.card,
.setting-view .setting-nav .menu-wrapper.card {
  margin-top: 0;
}
.center-mytickets-view {
  padding: 14px 0 !important;
  position: absolute;
  min-height: 100%;
  width: 100%;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3c4771ba8ce431d164897b8a2d13a05e.png) repeat;
}
.center-mytickets-view .card-inner {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3b6db1bce548e2e3302beac254b7c761.png) repeat;
  margin: 0 18px;
  cursor: pointer;
}
.center-mytickets-view .get-more {
  cursor: pointer;
}
.center-mytickets-view .card {
  height: 108px;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/b8ba6a7fc17c5729f063255c910e9812.png) right 0 no-repeat;
  cursor: pointer;
  margin: 0 10px 10px;
  min-width: 300px;
}
.center-mytickets-view .card.deep-blue-card .card-warp {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/f101d2921b31766f44dafce43b70a31f.png) no-repeat;
}
.center-mytickets-view .card.deep-blue-card .card-type {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/d28d4ed542c4c1e19e3ebaac41225ca7.png) repeat-x;
}
.center-mytickets-view .card.deep-blue-card .detail-wrap {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/23820272395b66fa025bbfa4b7202308.png) no-repeat;
}
.center-mytickets-view .card.green-card .card-warp {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/2662a3da07ca3f0edf31ecc2b3b96309.png) no-repeat;
}
.center-mytickets-view .card.green-card .card-type {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/1d36e67e2977f55a7219266e168ec2e4.png) repeat-x;
}
.center-mytickets-view .card.green-card .detail-wrap {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/ee6ca9fc2aaef2436e42e2339007f068.png) no-repeat;
}
.center-mytickets-view .card.red-card .card-warp {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/dbcc3fec96f9bb84b978fa1bb14dd7b6.png) no-repeat;
}
.center-mytickets-view .card.red-card .card-type {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/85c74be57d784c76e148cb7a14a2ca43.png) repeat-x;
}
.center-mytickets-view .card.red-card .detail-wrap {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/e9c24a9dc2b6afda7c62fbd07f9bd5bf.png) no-repeat;
}
.center-mytickets-view .card.gray-card .card-warp {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/092d7ea9b3797c127f9f214992b0cacd.png) no-repeat;
}
.center-mytickets-view .card.gray-card .card-type {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/a89642e8f4cf88b82cf6c076e80f82e9.png) repeat-x;
}
.center-mytickets-view .card.gray-card .detail-wrap {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/d718f076523da7f3b6c5133848ba1eb2.png) no-repeat;
}
.center-mytickets-view .card.light-blue-card {
  background-position: 0 -518px;
}
.center-mytickets-view .card .card-type {
  display: inline-block;
  width: 30%;
  height: 108px;
  padding: 25px 15px 20px 10px;
  text-align: center;
}
.center-mytickets-view .card .card-type .good-type {
  font-size: 15px;
  color: #fff;
}
.center-mytickets-view .card .card-type .baochang-tip {
  position: relative;
  color: #fff;
}
.center-mytickets-view .card .card-type .ticket-type {
  font-size: 18px;
  color: #fff;
  margin-bottom: 0px;
}
.center-mytickets-view .card .card-type .sundry-label {
  color: #fff;
  display: block;
  margin-top: -22px;
  font-size: 10px;
}
.center-mytickets-view .card .detail-wrap {
  display: inline-block;
  height: 105px;
  width: 70%;
  padding: 10px 0 0 20px;
  font-size: 11px;
}
.center-mytickets-view .card .detail-wrap .date {
  color: #959595;
}
.center-mytickets-view .card .detail-wrap .order-status {
  float: right;
  color: #f38725;
}
.center-mytickets-view .card .detail-wrap .detail {
  font-size: 12px;
  width: 100%;
  float: left;
  color: #000;
}
.center-mytickets-view .card .detail-wrap .detail .cnt {
  display: inline-block;
  width: 95%;
  min-width: 123px;
}
.center-mytickets-view .card .detail-wrap .detail p {
  margin: 0;
}
.center-mytickets-view .card .detail-wrap .detail .count {
  font-style: normal;
}
.center-mytickets-view .card .detail-wrap .detail .title span {
  display: inline-block;
  width: 70%;
  min-width: 90px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.center-mytickets-view .card .detail-wrap .detail .cinema {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.center-mytickets-view .card .detail-wrap .detail .count {
  vertical-align: top;
}
.center-mytickets-view .card.exchange-card .good-type,
.center-mytickets-view .card.active-card .good-type {
  font-size: 12px;
}
.center-mytickets-view .card.baochang-card .good-type {
  font-size: 18px;
  margin-bottom: 0;
}
.center-mytickets-view .card.seat-card .good-type,
.center-mytickets-view .card.sundry-card .good-type {
  line-height: 54px;
}
.center-mytickets-view .card.gray-card .detail-wrap .order-status {
  color: #b8b8b8;
}
.center-mytickets-view .card.gray-card .detail-wrap .detail .cnt {
  color: #b8b8b8;
}
.center-mytickets-view .card.gray-card .detail-wrap .detail .cnt .date {
  color: #b8b8b8;
}
.center-mytickets-view .get-more .more {
  cursor: pointer;
  margin-top: 0px;
  padding: 15px 0;
}
.fixfixed .toggle-btn {
  position: absolute !important;
}
@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}
.coupon-view {
  position: absolute;
  width: 100%;
  min-height: 100%;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3c4771ba8ce431d164897b8a2d13a05e.png) repeat;
  padding: 0 0 28px;
}
.coupon-view .coupon-card {
  position: relative;
  margin: 15px 15px 0;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/413792f2ee7b1e160e1c30789a0ff887.png) repeat-x bottom;
  background-size: 7px 5px;
  padding-bottom: 5px;
}
.coupon-view .coupon-card .coupon-card-cnt {
  background-color: #fff;
}
.coupon-view .coupon-card .value-wrap {
  color: #fff;
  position: absolute;
  width: 100px;
  height: 100%;
  padding-bottom: 4px;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/39e22a41a9292c006636db55ca314ba7.png) repeat-x bottom;
}
.coupon-view .coupon-card .value-wrap .value-inner {
  padding: 25px 15px 0;
  height: 100%;
  background-color: #ffa260;
  text-align: center;
}
.coupon-view .coupon-card .value-wrap .icon {
  font-size: 18px;
}
.coupon-view .coupon-card .value-wrap .value {
  font-size: 30px;
  vertical-align: -webkit-baseline-middle;
}
.coupon-view .coupon-card .info-wrap {
  display: inline-block;
  margin-left: 115px;
  padding: 15px 0;
  height: 100%;
}
.coupon-view .coupon-card .info-wrap .title {
  font-size: 12px;
  color: #ffa260;
}
.coupon-view .coupon-card .info-wrap .valid-date {
  font-size: 11px;
  margin: 5px 0;
}
.coupon-view .coupon-card .info-wrap .tip {
  color: #818181;
  cursor: pointer;
  font-size: 12px;
}
.coupon-view .coupon-card .info-wrap .detail div {
  min-width: 160px;
}
.coupon-view .coupon-card .triangle {
  width: 0;
  height: 0;
  border: solid 5px;
  border-color: #b5b5b5 transparent transparent transparent;
  position: relative;
  top: 10px;
  left: 3px;
}
.coupon-view .bind-coupon {
  text-align: right;
  color: #ffa260;
  margin: 15px 15px 0 0;
}
.coupon-view .bind-coupon p {
  cursor: pointer;
  display: inline-block;
}
.coupon-bind-view {
  padding: 50px 50px 0;
}
.coupon-bind-view .item-bind {
  position: relative;
  height: 38px;
  margin-bottom: 42px;
}
.coupon-bind-view .item-bind input {
  width: 100%;
  height: 35px;
  border: none;
  background-color: #ebebeb;
  padding: 0 10px;
}
.coupon-bind-view .item-bind input:focus {
  outline: none;
  box-shadow: none;
}
.coupon-bind-view .item-bind .input-bg {
  position: absolute;
  top: 18px;
  height: 12px;
  width: 100%;
  border: solid #c4c4c4;
  border-width: 0 1px 1px 1px;
}
.coupon-bind-view .item-bind .errorMsg {
  color: #ffa260;
}
.coupon-bind-view .operation {
  text-align: center;
}
.coupon-bind-view .close {
  position: absolute;
  right: 10px;
  top: 0px;
  cursor: pointer;
}
.card-view {
  position: absolute;
  width: 100%;
  min-height: 100%;
  padding-top: 58px;
}
.card-view.card-query {
  background: #f6f6f6 !important;
}
.card-view input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0px 1000px #f6f6f6 inset;
}
.card-view input:focus {
  outline: none;
  box-shadow: none;
}
.card-view button:focus {
  outline: none;
  border: none;
}
.card-view .toggle-btn {
  position: fixed;
  top: 50px;
  background-color: #fff;
  color: #6d6d6d;
  border-radius: 0px;
  padding: 6px 15px;
  width: 100%;
}
.card-view .toggle-btn i {
  color: #ff7100;
  margin-right: 10px;
  font-size: 20px;
}
.card-view .toggle-btn:focus {
  outline: none;
  border: none;
}
.card-list .card {
  margin: 0px 20px 15px;
  background-color: #fff;
  border-radius: 10px;
  cursor: pointer;
  box-shadow: 0.5px 0.5px 1px #dad4d4;
  position: relative;
}
.card-list .card .title {
  text-align: right;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  color: #fff;
  padding: 15px;
}
.card-list .card .name {
  margin-bottom: 2px;
}
.card-list .card .card-id {
  margin-bottom: 0px;
}
.card-list .card .tip {
  position: absolute;
  top: 15px;
  left: 15px;
  font-size: 12px;
  margin: 0;
}
.card-list .card .tip i {
  font-size: 34px;
  font-style: normal;
}
.card-list .card .tip i.points {
  font-size: 16px;
}
.card-list .card .tip span {
  margin-left: 5px;
}
.card-list .card .charging-card .title {
  background-color: #00accd;
}
.card-list .card .charging-card.invalid .title {
  background-color: #c8c8c8;
}
.card-list .card .pay-per-ticket-card .title {
  background-color: #00c1b3;
}
.card-list .card .pay-per-ticket-card.invalid .title {
  background-color: #c8c8c8;
}
.card-list .card .preorder-card .title {
  background-color: #ff7f93;
}
.card-list .card .preorder-card.invalid .title {
  background-color: #c8c8c8;
}
.card-list .card .info {
  color: #787878;
  padding: 12px 15px 5px;
  display: inline-block;
  font-size: 12px;
  position: relative;
  width: 100%;
}
.card-list .card .info p {
  margin-bottom: 5px;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
.card-list .card .info .label {
  border-radius: 5px;
  width: 28px;
  color: #ff7e91;
  border: 1px solid #ff7e91;
  padding: 0px 4px;
  font-style: normal;
  margin-left: 10px;
  font-size: 10px;
}
.card-list .card .info .invalid-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 36px;
}
.card-list .card .info .invalid-icon .iconfont {
  font-size: 46px;
  color: #c8c8c8;
}
.card-list .card .card-button {
  display: inline-block;
  margin: 15px 10px 15px 0;
  line-height: 40px;
  text-align: center;
  border-radius: 50%;
  border: 1px solid #f69254;
  color: #f69254;
  width: 40px;
  height: 40px;
  cursor: pointer;
}
.card-list .card.unvaliable .title {
  background-color: #b8b8b8;
}
.card-list .card.unvaliable .title .card-num {
  color: #fff;
}
.card-list .check-invalid-btn {
  background-color: #fff;
  height: 24px;
  width: 45%;
  border-radius: 24px;
  margin: 25px auto 20px;
  padding: 0;
  color: #8a8585;
  font-size: 12px;
  display: block;
  border: none;
}
.card-query {
  font-size: 14px;
  position: absolute;
  min-height: 100%;
  width: 100%;
  background-color: #fcfcfc;
}
.card-query .card_query_bottom {
  width: 160px;
  margin: 25px auto 30px;
  border-radius: 18px;
  background-color: #fe8233;
  height: 36px;
  color: #fff;
  font-size: 14px;
  line-height: 36px;
  border: none;
}
.card-query .card-list-btn {
  margin: 0 auto;
  display: block;
  width: 150px;
  border: none;
  background-color: transparent;
  height: 45px;
  font-size: 14px;
  color: #8a8989;
  text-decoration: underline;
}
.card-query .msg {
  margin: 0 20px;
  color: #fe8233;
  height: 25px;
  padding: 5px 20px;
}
.card-query .card_query_form .tab {
  height: 45px;
  background-color: #fff;
  height: 45px;
  line-height: 45px;
  text-align: center;
  font-size: 15px;
  color: #ccc;
}
.card-query .card_query_form ul {
  margin: 0px;
}
.card-query .card_query_form ul li {
  text-align: center;
  font-size: 16px;
  line-height: 45px;
  box-shadow: 0 -1px #ff7100 inset;
  transition: all 0.2s ease;
  -webkit-transition: all 0.2s ease;
  width: 50%;
}
.card-query .card_query_form ul li.active {
  box-shadow: 0 -4px #ff7100 inset;
}
.card-query .card_query_form ul li.active a {
  color: #ff7100;
}
.card-query .card_query_form .exchanege,
.card-query .card_query_form .material {
  margin-top: 20px;
  padding: 0 32px;
}
.card-query .card_query_form .exchanege div,
.card-query .card_query_form .material div {
  margin-top: 30px;
}
.card-query .card_query_form .exchanege .line,
.card-query .card_query_form .material .line {
  border-width: 0px 1px 1px;
  border-style: solid;
  border-color: #ccc;
  height: 5px;
  margin-top: -5px;
}
.card-query .card_query_form .exchanege label,
.card-query .card_query_form .material label {
  font-weight: normal;
  line-height: 34px;
  margin: 0 15px 0 10px;
  float: left;
}
.card-query .card_query_form .exchanege input,
.card-query .card_query_form .material input {
  border: none;
  background-color: transparent;
  height: 34px;
  width: 55%;
  font-size: 14px;
  vertical-align: top;
  border: none;
  outline: medium;
}
.card-query .card_query_form .exchanege .qrcode,
.card-query .card_query_form .material .qrcode {
  font-size: 24px;
  color: #26a69a;
  float: right;
  margin-right: 15px;
}
.card-detail-view ul,
.card-detail-view li {
  padding: 0;
  margin: 0;
  list-style: none;
}
.card-detail-view ul label,
.card-detail-view li label {
  font-weight: normal;
  margin-right: 10px;
}
.card-detail-view .information {
  padding: 20px;
  color: #fff;
  text-align: center;
}
.card-detail-view .information.pay-per-ticket-card {
  background-color: #00c1b3;
}
.card-detail-view .information.charging-card {
  background-color: #00accd;
}
.card-detail-view .information.preorder-card {
  background-color: #ff7f93;
}
.card-detail-view .name {
  font-size: 14px;
}
.card-detail-view .name span {
  margin-right: 5px;
}
.card-detail-view .tip i {
  font-style: normal;
  font-size: 32px;
  margin-right: 5px;
}
.card-detail-view .tip .points {
  font-size: 16px;
}
.card-detail-view .tip span {
  font-size: 14px;
}
.card-detail-view .operation {
  height: 35px;
  width: 50%;
  margin: 0 auto;
  font-size: 16px;
  border: 1px solid #fff;
  color: #fff;
  border-radius: 35px;
  background-color: transparent;
}
.card-detail-view .operation.disable {
  opacity: 0.7;
}
.card-detail-view .operation.invalid {
  border: none;
}
.card-detail-view .notice {
  margin-top: 20px;
  font-size: 12px;
  opacity: 0.8;
  text-align: left;
}
.card-detail-view .notice ul label {
  float: left;
}
.card-detail-view .notice ul p {
  margin-left: 65px;
}
.card-detail-view .redeem {
  margin-top: 10px;
  color: #000;
  background-color: #fff;
  font-size: 14px;
}
.card-detail-view .redeem li {
  margin: 0 10px;
  padding: 10px 0;
  border-bottom: 1px solid #ebebeb;
  cursor: pointer;
}
.card-detail-view .redeem li:last-child {
  border-bottom: none;
}
.card-detail-view .redeem span {
  color: #6d6c6c;
}
.card-detail-view .redeem i {
  float: right;
  color: #ccc;
}
.card-password-view {
  text-align: center;
  margin: 15px;
  padding: 15px;
  background-color: #fff;
}
.card-password-view p {
  margin: 0;
  font-size: 14px;
}
.card-password-view .price,
.card-password-view .ticket {
  font-size: 36px;
  color: #e9681f;
}
.card-password-view .price .unit,
.card-password-view .ticket .unit {
  font-size: 16px;
  margin-left: 5px;
}
.card-password-view .code {
  width: 200px;
  margin: 10px auto 15px;
}
.card-password-view .notice {
  color: #afaeae;
  font-size: 12px;
  margin: 10px 0 20px;
}
.card-password-view .id,
.card-password-view .password {
  text-align: left;
  padding-left: 35%;
}
@-moz-keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-o-keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style><style type="text/css">.schedule-detail-view {
  background: #323232;
}
.schedule-detail-view .information {
  padding: 12px 14px 12px 16px;
  background: #ebebeb;
  position: absolute;
  width: 100%;
  z-index: 4;
}
.schedule-detail-view .information .left {
  float: left;
}
.schedule-detail-view .information .right {
  float: right;
}
.schedule-detail-view .information h3 {
  margin: 0;
  padding: 0;
  color: #1b1b1b;
  line-height: 24px;
  font-size: 16px;
}
.schedule-detail-view .information p {
  margin: 0;
  padding: 0;
  color: #6d6d6d;
  line-height: 20px;
  font-size: 14px;
}
.schedule-detail-view .information .pay {
  min-width: 112px;
  margin-top: 4px;
  padding: 0 1.5em;
}
.schedule-detail-view .chart {
  width: 100%;
  overflow: hidden;
  background: #323232;
  position: absolute;
  top: 118px;
  left: 0;
  bottom: 0;
  right: 0;
}
.schedule-detail-view .chart .cortain {
  color: #fff;
  position: absolute;
  top: 0;
  width: 100%;
  text-align: center;
  height: 380px;
  line-height: 380px;
  z-index: 3;
  background: rgba(50,50,50,0.8);
}
.schedule-detail-view .chart .surface {
  width: 100%;
  height: 380px;
  position: relative;
}
.schedule-detail-view .chart .surface .zoomable {
  position: absolute;
  left: 0px;
  top: 0px;
  -webkit-transform: scale(1.8);
  transform: scale(1.8);
}
.schedule-detail-view .chart .surface .zoomable .map {
  position: absolute;
}
.schedule-detail-view .chart .surface .minimap {
  -webkit-transform: scale(0.4);
  transform: scale(0.4);
  -webkit-transform-origin: top left;
  transform-origin: top left;
  position: absolute;
  margin: 16px 8px;
  border: 2px solid #707070;
  box-shadow: 0 0 4px 4px #222;
  z-index: 3;
  overflow: hidden;
}
.schedule-detail-view .chart .surface .minimap .focus {
  position: absolute;
  border: 1px solid #fe8233;
  background-color: rgba(254,130,51,0.18);
}
.schedule-detail-view .chart .surface .map {
  background-color: #323232;
}
.schedule-detail-view .chart .surface .map .screen {
  color: #aaa;
  position: absolute;
  text-align: center;
  border-radius: 12px;
  border: 1px solid #4b4b4b;
}
.schedule-detail-view .chart .surface .map .screen span {
  line-height: 12px;
  font-size: 12px;
  margin: 0;
  padding: 0;
  height: 12px;
}
.schedule-detail-view .chart .surface .map .axis-y {
  color: #aaa;
  font-size: 12px;
  line-height: 12px;
}
.schedule-detail-view .chart .surface .map .axis-y .coord {
  position: absolute;
  display: block;
  width: 12px;
  height: 12px;
  text-align: center;
  line-height: 12px;
}
.schedule-detail-view .chart .surface .map .axis-middle-y {
  width: 1px;
  border-left: 1px dotted rgba(255,135,53,0.5);
  position: absolute;
  z-index: 1;
  display: none;
}
.schedule-detail-view .chart .surface .map .seat {
  width: 12px;
  height: 12px;
  border-radius: 2px;
  line-height: 0;
  display: block;
  position: absolute;
  background: #707070;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
  text-align: center;
  overflow: hidden;
}
.schedule-detail-view .chart .surface .map .seat .iconfont {
  font-size: 12px;
  width: 12px;
  height: 12px;
  line-height: 12px;
}
.schedule-detail-view .chart .surface .map .seat.recommend {
  border: 1px solid #aaa;
  -webkit-animation-duration: 2.4s;
  animation-duration: 2.4s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-name: seat-recommend-breathe;
  animation-name: seat-recommend-breathe;
}
.schedule-detail-view .chart .surface .map .seat.recommend .iconfont {
  font-size: 10px;
  line-height: 10px;
}
.schedule-detail-view .chart .surface .map .seat.occupied {
  background: #ff8735;
}
.schedule-detail-view .chart .surface .map .seat.occupied .iconfont {
  color: #fff;
}
.schedule-detail-view .chart .surface .map .seat.reserved {
  background: #55acde;
  -webkit-animation-duration: 1.8s;
  animation-duration: 1.8s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-name: seat-reserved-breathe;
  animation-name: seat-reserved-breathe;
}
.schedule-detail-view .chart .surface .map .seat.reserved .iconfont {
  color: #fff;
}
.schedule-detail-view .chart .surface .map .seat.selected {
  background: #fff;
  -webkit-animation: none;
  animation: none;
}
.schedule-detail-view .chart .surface .map .seat.selected .iconfont {
  color: #ff8735;
}
.schedule-detail-view .chart .surface .map .seat.couple {
  width: 28px;
  border-radius: 3px;
  font-size: 10px;
}
.schedule-detail-view .chart .surface .map .seat.couple span {
  color: #444;
  font-size: 6px;
  line-height: 12px;
}
.schedule-detail-view .chart .surface .map .seat.couple .iconfont {
  color: #aaa;
  font-size: 10px;
}
.schedule-detail-view .chart .surface .map .seat.couple .icon-lover:first-child {
  position: relative;
  left: 0.25em;
}
.schedule-detail-view .chart .surface .map .seat.couple .icon-lover:last-child {
  position: relative;
  left: -0.25em;
  opacity: 0.5;
}
.schedule-detail-view .chart .surface .map .seat.couple.occupied .iconfont {
  color: #fff;
}
.schedule-detail-view .chart .surface .map .seat.couple.selected .iconfont {
  color: #ff8735;
}
.schedule-detail-view .chart .surface .map .seat.avator-yuwan-boy {
  background: #6688c5;
}
.schedule-detail-view .chart .surface .map .seat.avator-yuwan-girl {
  background: #fd4b57;
}
.schedule-detail-view .selected-list {
  position: absolute;
  bottom: 0;
  color: #fff;
  width: 100%;
}
.schedule-detail-view .selected-list ul,
.schedule-detail-view .selected-list li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.schedule-detail-view .selected-list ul {
  width: 100%;
  background: rgba(30,30,30,0.9);
}
.schedule-detail-view .selected-list li {
  padding: 1em 0 1em 1em;
  float: left;
}
@-webkit-keyframes seat-recommend-breathe {
  0%, 100% {
    background: #afafaf;
  }
  55%, 60% {
    background: #787877;
  }
  95% {
    background: #adadad;
  }
}
@-webkit-keyframes seat-reserved-breathe {
  0%, 100% {
    background: #2295de;
  }
  55%, 60% {
    background: #cce3f1;
  }
  95% {
    background: #1795de;
  }
}
@-moz-keyframes seat-recommend-breathe {
  0%, 100% {
    background: #afafaf;
  }
  55%, 60% {
    background: #787877;
  }
  95% {
    background: #adadad;
  }
}
@-webkit-keyframes seat-recommend-breathe {
  0%, 100% {
    background: #afafaf;
  }
  55%, 60% {
    background: #787877;
  }
  95% {
    background: #adadad;
  }
}
@-o-keyframes seat-recommend-breathe {
  0%, 100% {
    background: #afafaf;
  }
  55%, 60% {
    background: #787877;
  }
  95% {
    background: #adadad;
  }
}
@keyframes seat-recommend-breathe {
  0%, 100% {
    background: #afafaf;
  }
  55%, 60% {
    background: #787877;
  }
  95% {
    background: #adadad;
  }
}
@-moz-keyframes seat-reserved-breathe {
  0%, 100% {
    background: #2295de;
  }
  55%, 60% {
    background: #cce3f1;
  }
  95% {
    background: #1795de;
  }
}
@-webkit-keyframes seat-reserved-breathe {
  0%, 100% {
    background: #2295de;
  }
  55%, 60% {
    background: #cce3f1;
  }
  95% {
    background: #1795de;
  }
}
@-o-keyframes seat-reserved-breathe {
  0%, 100% {
    background: #2295de;
  }
  55%, 60% {
    background: #cce3f1;
  }
  95% {
    background: #1795de;
  }
}
@keyframes seat-reserved-breathe {
  0%, 100% {
    background: #2295de;
  }
  55%, 60% {
    background: #cce3f1;
  }
  95% {
    background: #1795de;
  }
}
</style><style type="text/css">.cinema-goods-info {
  padding: 10px !important;
  position: absolute;
  min-height: 100%;
  width: 100%;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3c4771ba8ce431d164897b8a2d13a05e.png) repeat;
}
.cinema-goods-info .ticket_warp {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/b8ba6a7fc17c5729f063255c910e9812.png) no-repeat right 0;
  width: 100%;
  min-width: 300px;
  padding-bottom: 15px;
  height: 123px;
}
.cinema-goods-info .ticket {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/d9f7005d18b8bc9e078e67e254f43771.png) no-repeat;
  cursor: pointer;
}
.cinema-goods-info .ticket .ticket_iner {
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3b6db1bce548e2e3302beac254b7c761.png) repeat;
  margin: 0 18px;
}
.cinema-goods-info .ticket .ticket-type {
  display: inline-block;
  width: 63%;
  height: 108px;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/a653f1c288140e0eaa63583bedce0ef8.png) repeat;
}
.cinema-goods-info .ticket .ticket-price {
  display: inline-block;
  padding-left: 7%;
  height: 108px;
  top: 50px;
  right: 75px;
  text-align: center;
  background: url(http://static.m.maizuo.com/v4/static/app/asset/3b7a58f4c8015c7d060dc95fab608b4a.png) no-repeat;
}
.cinema-goods-info .ticket span {
  display: block;
  margin-left: 8px;
}
.cinema-goods-info .ticket .title {
  color: #fff;
  font-size: 16px;
  margin-top: 28px;
}
.cinema-goods-info .ticket .msg {
  color: #fff;
  opacity: 0.5;
  margin-top: 5px;
}
.cinema-goods-info .ticket .now-price {
  color: #e36f0d;
  font-size: 16px;
  margin-top: 28px;
}
.cinema-goods-info .ticket .price {
  text-decoration: line-through;
  color: #c6c6c6;
}
.cinema-goods-info .show_ticket_type {
  display: inline-block;
  color: #b4b4b4;
  cursor: pointer;
}
</style><style type="text/css">.callback-order-view .success {
  height: 100%;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/9ca368ef3b17c8134b72e70407b835cc.jpg);
}
.callback-order-view .success .heading {
  background-color: #fff;
  padding: 26px 0;
}
.callback-order-view .success .heading p {
  text-align: center;
  font-size: 18px;
  color: #ff822d;
}
.callback-order-view .success .heading img {
  zoom: 0.5;
  max-width: 100%;
}
.callback-order-view .success .information {
  color: #6a6a6a;
}
.callback-order-view .success .information .attribute {
  margin: 34px 0;
  font-size: 14px;
  text-align: center;
}
.callback-order-view .success .information .howto {
  margin: 34px 0;
  padding: 0 38px;
  font-size: 10px;
}
.callback-order-view .success .information .howto h4 {
  font-size: 10px;
}
.callback-order-view .success .information .howto p {
  padding-left: 1em;
}
.callback-order-view .success .information .operation {
  margin: 34px 0;
  text-align: center;
}
.callback-order-view .success .information .operation .to-order {
  background-color: #f6f6f6;
  border: 1px solid #8b8b8b;
  color: #fc8230;
}
.callback-order-view .success.success-baochang .heading h3 {
  line-height: 48px;
  margin-bottom: 36px;
}
.callback-order-view .success.success-baochang .heading h3 p {
  text-align: center;
  font-size: 18px;
  color: #222;
}
.callback-order-view .success.success-baochang .heading h3 .icon-ok {
  text-align: center;
  font-size: 36px;
  color: #5cb85c;
}
.callback-order-view .success.success-baochang .heading p {
  text-align: left;
  padding: 0 36px;
  font-size: 12px;
  color: #757575;
}
.callback-order-view .waiting h3 {
  padding: 24px 0;
  text-align: center;
  font-size: 18px;
}
.callback-order-view .fail h3 {
  padding: 24px 0;
  text-align: center;
  font-size: 18px;
}
.callback-order-view .fail h3 .i-fail {
  color: #fd8342;
}
.callback-order-view .waiting .detail,
.callback-order-view .fail .detail {
  border: 1px solid #d8d8d8;
  margin: 0 10px;
  padding: 0 8px;
  border-radius: 3px;
}
.callback-order-view .waiting .detail p,
.callback-order-view .fail .detail p {
  line-height: 46px;
  border-bottom: 1px dashed #bebebe;
  margin: 0;
  color: #666;
}
.callback-order-view .waiting .detail p .title,
.callback-order-view .fail .detail p .title {
  min-width: 6em;
  display: inline-block;
  color: #111;
  text-align: justify;
  text-justify: inter-ideograph;
  -ms-text-justify: inter-ideograph; /*IE9*/
  -moz-text-align-last: justify;
/*Firefox*/
  -webkit-text-align-last: justify;
/*Chrome*/
}
.callback-order-view .waiting .detail p:last-child,
.callback-order-view .fail .detail p:last-child {
  border-bottom: none;
}
.callback-card-recharging-view {
  position: absolute;
  height: 100%;
  width: 100%;
}
.callback-card-recharging-view .success {
  height: 100%;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/9ca368ef3b17c8134b72e70407b835cc.jpg);
}
.callback-card-recharging-view .success .heading {
  background-color: #fff;
  padding: 26px 0;
}
.callback-card-recharging-view .success .heading p {
  text-align: center;
  font-size: 18px;
  color: #ff822d;
}
.callback-card-recharging-view .success .heading img {
  zoom: 0.5;
  max-width: 100%;
}
.callback-card-recharging-view .success .information {
  color: #6a6a6a;
}
.callback-card-recharging-view .success .information .attribute {
  margin: 34px 24px;
  font-size: 14px;
  text-align: left;
}
.callback-card-recharging-view .success .information .attribute .title {
  font-weight: bold;
  color: #333;
}
.callback-card-recharging-view .success .information .operation {
  margin: 34px 0;
  text-align: center;
}
.callback-card-recharging-view .success .information .operation .to-home {
  background-color: #fc8230;
  color: #f6f6f6;
}
.callback-card-recharging-view .success .information .operation .to-center {
  background-color: #f6f6f6;
  border: 1px solid #ccc;
  color: #fc8230;
}
.callback-card-recharging-view .fail h3 {
  padding: 24px 0;
  text-align: center;
  font-size: 18px;
}
.callback-card-recharging-view .fail h3 .i-fail {
  color: #fd8342;
}
.callback-card-recharging-view .fail .detail {
  border: 1px solid #d8d8d8;
  margin: 0 10px;
  padding: 0 8px;
  border-radius: 3px;
}
.callback-card-recharging-view .fail .detail p {
  line-height: 46px;
  border-bottom: 1px dashed #bebebe;
  margin: 0;
  color: #666;
}
.callback-card-recharging-view .fail .detail p .title {
  min-width: 6em;
  display: inline-block;
  color: #111;
  text-align: justify;
  text-justify: inter-ideograph;
  -ms-text-justify: inter-ideograph; /*IE9*/
  -moz-text-align-last: justify;
/*Firefox*/
  -webkit-text-align-last: justify;
/*Chrome*/
}
.callback-card-recharging-view .fail .detail p:last-child {
  border-bottom: none;
}
</style><style type="text/css">.card-recharging-view {
  background-color: #fff;
}
.card-recharging-view h3 {
  font-size: 12px;
  padding: 14px 16px;
  background-color: #ebebeb;
  color: #666;
  margin: 0;
}
.card-recharging-view .information ul {
  margin: 0;
  padding: 0 16px;
  list-style: none;
}
.card-recharging-view .information li {
  padding: 16px 0;
  font-size: 13px;
  color: #727272;
  border-bottom: 1px dotted #b4b4b4;
}
.card-recharging-view .information li .title {
  color: #111;
}
.card-recharging-view .information li:last-child {
  border-bottom: 0;
}
.card-recharging-view .adjustion .inner {
  margin: 24px 16px;
}
.card-recharging-view .adjustion p {
  text-align: center;
  margin: 12px 0;
}
.card-recharging-view .adjustion .cpn-number-selector {
  border: 1px solid #ccc;
  min-width: 160px;
}
.card-recharging-view .adjustion .cpn-number-selector .number {
  width: 112px;
}
.card-recharging-view .adjustion .cpn-number-selector .subtract,
.card-recharging-view .adjustion .cpn-number-selector .plus {
  background: #fe8233;
  color: #fff;
}
.card-recharging-view .adjustion .note {
  font-size: 10px;
  color: #727272;
}
.card-recharging-view .mobile .inner {
  margin: 22px 0;
}
.card-recharging-view .mobile .inner .control {
  margin: 14px 24px;
}
.card-recharging-view .mobile .inner .control input {
  width: 100%;
  text-align: center;
  line-height: 34px;
  height: 34px;
  border-radius: 34px;
  border: 1px solid #ccc;
}
.card-recharging-view .mobile .inner .note {
  margin: 0 38px 0 56px;
  color: #ff7b14;
  font-size: 8px;
  text-indent: -1.5em;
}
.card-recharging-view .mobile .inner .note .dot {
  padding-right: 0.5em;
}
.card-recharging-view .payment {
  margin-bottom: 80px;
}
.card-recharging-view .payment ul,
.card-recharging-view .payment li {
  margin: 0;
  padding: 0;
  list-style: none;
}
.card-recharging-view .payment ul {
  padding: 0 14px;
  background: #fff;
}
.card-recharging-view .payment li {
  min-height: 60px;
  border-bottom: 1px dashed #ccc;
  padding: 20px 0;
}
.card-recharging-view .payment li:last-child {
  border-bottom: none;
}
.card-recharging-view .payment .label {
  float: left;
  width: 38px;
  height: 20px;
  border-radius: 10px;
  display: block;
  margin: 4px 7px;
  padding: 0;
  line-height: 20px;
}
.card-recharging-view .payment .label img {
  width: 100%;
}
.card-recharging-view .payment .description {
  float: left;
  margin-left: 18px;
}
.card-recharging-view .payment .description h4 {
  font-size: 14px;
  margin: 0;
}
.card-recharging-view .payment .description p {
  color: #999;
  font-size: 9px;
  margin: 0;
  line-height: 2em;
}
.card-recharging-view .payment .checkbox {
  float: right;
  margin: 0 -8px;
}
.card-recharging-view .operation {
  position: fixed;
  bottom: 20px;
  text-align: center;
  width: 100%;
}
</style><style type="text/css">.help-ticket-view {
  position: absolute;
  min-height: 100%;
  background-color: #27a69b;
  width: 100%;
  text-align: center;
}
.help-ticket-view img {
  width: 100%;
  max-width: 640px;
}
</style><style type="text/css">.not-found-view {
  padding: 48px 72px;
  text-align: center;
}
.not-found-view img {
  max-width: 100%;
  margin-bottom: 10px;
}
.not-found-view p {
  font-size: 16px;
  color: #666;
  line-height: 24px;
  margin: 0 0 8px;
}
.not-found-view p a {
  padding: 0 0.2em;
  color: #cb885e;
  text-decoration: underline;
}
</style><style type="text/css">.choose-card-button {
  background-color: #f6f6f6;
  border: 1px solid #fe8233;
  border-radius: 4px;
  color: #fe8233;
  position: absolute;
  right: 0px;
  height: 25px;
  padding: 0 6px;
  line-height: 25px;
}
.material-panel .material {
  top: 15px;
}
.digital-panel .digital {
  top: 35px;
}
</style><style type="text/css">body.theme-unicom-gd .application-sidebar .sidebar-container .sidebar-overlay nav {
  background-color: #f2f0d9;
  border-top: 0 solid rgba(0,0,0,0);
  box-shadow: none;
  color: rgba(0,0,0,0.26);
}
body.theme-unicom-gd .application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 60px;
}
body.theme-unicom-gd .application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background: none;
}
body.theme-unicom-gd .application-sidebar .sidebar-container .sidebar-overlay nav li a {
  border-bottom: 1px dotted rgba(0,0,0,0.12);
}
body.theme-unicom-gd .application-sidebar .sidebar-container .sidebar-overlay nav li a.hover {
  color: #ed6d00;
}
body.theme-unicom-gd #toolbar {
  background-color: #eeecd2;
  color: rgba(0,0,0,0.54);
  text-shadow: none;
}
body.theme-unicom-gd #toolbar h1 {
  color: rgba(0,0,0,0.54);
}
body.theme-unicom-gd #toolbar h1 a {
  text-shadow: none;
}
body.theme-unicom-gd #toolbar .toolbar-title {
  color: rgba(0,0,0,0.54);
  text-shadow: none;
}
body.theme-unicom-gd #toolbar .toolbar-title-icon {
  border-right: 1px solid rgba(0,0,0,0.12);
  box-shadow: none;
}
body.theme-unicom-gd #toolbar .toolbar-title-icon.hover {
  background-color: rgba(0,0,0,0.2);
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav {
  background-color: #f19ec2;
  border-top: 0 solid rgba(0,0,0,0);
  box-shadow: none;
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 50px;
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background: none;
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav li a {
  border-bottom: 1px dotted rgba(255,255,255,0.3);
  color: rgba(255,255,255,0.8);
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav li a .right {
  color: rgba(255,255,255,0.6);
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav li a .right.hover {
  color: #fff;
}
body.theme-piaopiao .application-sidebar .sidebar-container .sidebar-overlay nav li a.hover {
  color: #fff;
}
body.theme-piaopiao #toolbar {
  background-color: #ec7aac;
  color: #fff;
  text-shadow: none;
}
body.theme-piaopiao #toolbar h1 a {
  text-shadow: none;
}
body.theme-piaopiao #toolbar #nav-right a {
  color: #fff;
}
body.theme-piaopiao #toolbar .toolbar-title {
  text-shadow: none;
}
body.theme-piaopiao #toolbar .toolbar-title-icon {
  color: #fff;
  border-right: 1px solid rgba(255,255,255,0.12);
  box-shadow: none;
}
body.theme-piaopiao #toolbar .toolbar-title-icon.hover {
  background-color: rgba(255,255,255,0.2);
}
body.theme-boying .pay-view .coupon,
body.theme-boying .pay-view .discount {
  display: none;
}
body.theme-boying .center-home-view .cash {
  display: none;
}
body.theme-boying .cinema-title-price {
  display: none;
}
body.theme-meadjohnson .application-sidebar .sidebar-container .sidebar-overlay nav {
  background-color: #d7e7ff;
  border-top: 0 solid rgba(0,0,0,0);
  box-shadow: none;
  color: rgba(0,0,0,0.26);
}
body.theme-meadjohnson .application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 60px;
}
body.theme-meadjohnson .application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background: none;
}
body.theme-meadjohnson .application-sidebar .sidebar-container .sidebar-overlay nav li a {
  border-bottom: 1px dotted rgba(0,0,0,0.12);
}
body.theme-meadjohnson .application-sidebar .sidebar-container .sidebar-overlay nav li a.hover {
  color: #ed6d00;
}
body.theme-meadjohnson #toolbar {
  background-color: #d7e7ff;
  color: rgba(0,0,0,0.54);
  text-shadow: none;
}
body.theme-meadjohnson #toolbar h1 {
  color: rgba(0,0,0,0.54);
}
body.theme-meadjohnson #toolbar h1 a {
  text-shadow: none;
}
body.theme-meadjohnson #toolbar .toolbar-title {
  color: rgba(0,0,0,0.54);
  text-shadow: none;
}
body.theme-meadjohnson #toolbar .toolbar-title-icon {
  border-right: 1px solid rgba(0,0,0,0.12);
  box-shadow: none;
}
body.theme-meadjohnson #toolbar .toolbar-title-icon.hover {
  background-color: rgba(0,0,0,0.2);
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav {
  background-color: #3b64ce;
  border-top: 0 solid rgba(0,0,0,0);
  box-shadow: none;
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 50px;
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background: none;
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav li a {
  border-bottom: 1px dotted #5679d5;
  color: rgba(255,255,255,0.6);
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav li a .right {
  color: #6e8cdb;
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav li a .right.hover {
  color: #fff;
}
body.theme-qqguanjia .application-sidebar .sidebar-container .sidebar-overlay nav li a.hover {
  color: #fff;
}
body.theme-qqguanjia #toolbar {
  background-color: #3261d1;
  color: rgba(255,255,255,0.5);
  text-shadow: none;
}
body.theme-qqguanjia #toolbar h1 a {
  text-shadow: none;
}
body.theme-qqguanjia #toolbar #nav-right a {
  color: rgba(255,255,255,0.5);
}
body.theme-qqguanjia #toolbar .toolbar-title {
  text-shadow: none;
}
body.theme-qqguanjia #toolbar .toolbar-title-icon {
  color: rgba(255,255,255,0.5);
  border-right: 1px solid rgba(255,255,255,0.12);
  box-shadow: none;
}
body.theme-qqguanjia #toolbar .toolbar-title-icon.hover {
  background-color: rgba(255,255,255,0.2);
}
body.theme-maizuo-sd-vip .cinema-title-price {
  display: none;
}
body.theme-moviejoy .pay-view .coupon,
body.theme-moviejoy .pay-view .discount {
  display: none;
}
body.theme-moviejoy .center-home-view .cash {
  display: none;
}
body.theme-moviejoy .cinema-title-price {
  display: none;
}
body.theme-wanfuwang .cinema-title-price {
  display: none;
}
body.theme-wanfuwang .application-sidebar .sidebar-container .sidebar-overlay nav {
  background-color: #f1f1f1;
  border-top: 0 solid rgba(0,0,0,0);
  box-shadow: none;
  color: #1c1b20;
}
body.theme-wanfuwang .application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 60px;
  background-color: #f9f9fa;
}
body.theme-wanfuwang .application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background: none;
}
body.theme-wanfuwang .application-sidebar .sidebar-container .sidebar-overlay nav li a {
  border-bottom: 4px solid #f1f1f1;
  color: #1c1b20;
}
body.theme-wanfuwang .application-sidebar .sidebar-container .sidebar-overlay nav li a.hover {
  color: rgba(0,0,0,0.26);
}
body.theme-wanfuwang #toolbar {
  background-color: #f9f9fa;
  color: #1c1b20;
  text-shadow: none;
  border-bottom: 4px solid #f1f1f1;
}
body.theme-wanfuwang #toolbar h1 {
  color: #1c1b20;
}
body.theme-wanfuwang #toolbar h1 a {
  text-shadow: none;
}
body.theme-wanfuwang #toolbar #nav-right a {
  color: #1c1b20;
}
body.theme-wanfuwang #toolbar .toolbar-title {
  color: #1c1b20;
  text-shadow: none;
}
body.theme-wanfuwang #toolbar .toolbar-title-icon {
  border-right: 1px solid rgba(0,0,0,0.12);
  box-shadow: none;
}
body.theme-wanfuwang #toolbar .toolbar-title-icon.hover {
  background-color: rgba(0,0,0,0.1);
}
body.theme-yuwan .order-detail-view .service {
  display: none;
}
body.theme-mqqbrowser .cinema-title-price {
  display: none;
}
body.theme-pingan_chexian .cinema-title-price {
  display: none;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav {
  background-color: #efefef;
  border-top: 0 solid rgba(0,0,0,0);
  box-shadow: none;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav li {
  line-height: 50px;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav li.hover {
  background: #ececec;
  color: #000;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav li a {
  border-bottom: 1px dotted #cbcbcb;
  color: #777;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav li a .right {
  color: #777;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav li a .right.hover {
  color: #000;
}
body.theme-sz-picc-club .application-sidebar .sidebar-container .sidebar-overlay nav li a.hover {
  color: #000;
}
body.theme-sz-picc-club #toolbar {
  background-color: #f9f9f9;
  color: #fff;
  text-shadow: none;
}
body.theme-sz-picc-club #toolbar h1 a {
  text-shadow: none;
}
body.theme-sz-picc-club #toolbar #nav-right a {
  color: #7c7c7c;
}
body.theme-sz-picc-club #toolbar .toolbar-title {
  text-shadow: none;
  color: #7c7c7c;
}
body.theme-sz-picc-club #toolbar .toolbar-title-icon {
  color: #7c7c7c;
  border-right: 1px solid rgba(255,255,255,0.12);
  box-shadow: none;
}
body.theme-sz-picc-club #toolbar .toolbar-title-icon.hover {
  background-color: rgba(255,255,255,0.2);
}
body.theme-pingan_sz_fenghang .cinema-title-price {
  display: none;
}
body.theme-bankcomm_sz .cinema-title-price {
  display: none;
}
body.theme-picc_chexian .cinema-title-price {
  display: none;
}
body.theme-cib .cinema-title-price {
  display: none;
}
body.theme-bank_of_jiangsu .cinema-title-price {
  display: none;
}
body.theme-abchina_sz .cinema-title-price {
  display: none;
}
</style><style type="text/css">.sundry-list-view {
  padding: 10px !important;
  position: absolute;
  min-height: 100%;
  width: 100%;
  background: #00abcc;
}
.sundry-list-view .cinema-name {
  text-align: center;
  color: #fff;
}
.sundry-list-view .address {
  color: rgba(255,255,255,0.6);
  display: table;
  text-align: center;
  width: 100%;
}
.sundry-list-view .sundry-support {
  color: rgba(255,255,179,0.8);
  display: inline-block;
  text-align: center;
  width: 100%;
}
.sundry-list-view .sundry-wrap {
  width: 100%;
  min-width: 300px;
  padding: 14px;
  display: block;
  margin: 10px auto 0 auto;
  border-radius: 4px;
  background: rgba(255,255,255,0.9);
  min-height: 123px;
  position: relative;
}
.sundry-list-view .wrap-above {
  display: inline-block;
  width: 100%;
}
.sundry-list-view .sundry-logo {
  width: 78px;
  height: 78px;
  float: left;
  border: 0;
  margin-right: 14px;
}
.sundry-list-view .label {
  color: #ff8132;
  border-radius: 4px;
  border: 1px solid #ff8132;
  padding: 2px;
  text-align: center;
  position: absolute;
  right: 8px;
  top: 16px;
  font-weight: normal;
}
.sundry-list-view .sundry-title {
  font-size: 16px;
  display: inline-block;
}
.sundry-list-view .sundry-title.petty {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
@media (min-width: 320px) and (max-width: 375px) {
  .sundry-list-view .sundry-title.petty {
    max-width: 33%;
  }
}
@media (min-width: 375px) and (max-width: 640px) {
  .sundry-list-view .sundry-title.petty {
    max-width: 45%;
  }
}
.sundry-list-view .sundry-describe {
  color: #d3d3d3;
  display: block;
}
.sundry-list-view .now-price {
  width: 78px;
  margin: 4px 12px 0 0;
  display: inline-block;
  color: #ff8132;
  text-align: center;
}
.sundry-list-view .price {
  text-decoration: line-through;
  display: inline-block;
}
.sundry-list-view .sundry-counter {
  display: inline-block;
  float: right;
  min-width: 90px;
  top: -12px;
  background: #fff;
  font-size: 18px;
  line-height: 28px;
  border-radius: 20px;
  text-align: center;
  position: relative;
}
.sundry-list-view .sundry-counter .number {
  color: #ff8132;
  display: inline-block;
  margin: 2px;
}
.sundry-list-view .sundry-counter .iconfont {
  font-size: 28px;
  color: #00abcc;
  margin: 2px;
  line-height: 24px;
}
.sundry-list-view .sundry-counter .icon-reduce-filled {
  float: left;
}
.sundry-list-view .sundry-counter .icon-add-filled {
  float: right;
}
.sundry-list-view .guide-wrap {
  margin-bottom: 156px;
}
.sundry-list-view .guide-wrap .guide-title {
  width: 96px;
  color: #fff;
  margin: 24px auto 10px auto;
}
.sundry-list-view .guide-wrap .guide-arrow {
  width: 96px;
  display: block;
  margin: 0 auto;
  height: 11px;
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/d50a6f566d24ff6eb76e59907f71a9b1.png);
  background-size: cover;
  background-repeat: no-repeat;
}
.sundry-list-view .guide-wrap .force-center {
  width: 300px;
  margin: 10px auto;
}
.sundry-list-view .guide-wrap .guide {
  padding: 5px 10px;
  border-radius: 4px;
  background: rgba(0,0,0,0.2);
  color: rgba(255,255,255,0.9);
  width: 30%;
  min-width: 95px;
  height: 64px;
  display: block;
  margin: 2px;
  float: left;
}
.sundry-list-view .guide-wrap .guide-step {
  display: block;
  color: rgba(255,255,179,0.8);
}
.sundry-list-view .guide-wrap .guide-text {
  display: block;
}
.sundry-list-view .cart {
  background: rgba(255,255,255,0.8);
  position: fixed;
  width: 100%;
  bottom: 0;
  left: 0;
  min-height: 48px;
  text-align: center;
  font-size: 14px;
}
.sundry-list-view .cart .total {
  line-height: 18px;
  padding-top: 4px;
}
.sundry-list-view .cart .detail {
  display: block;
  color: #ff8132;
  font-size: 10px;
}
.sundry-list-view .cart .cart-btn {
  height: 48px;
  padding: 10px 0;
  background: #fff;
  width: 100%;
  bottom: 0;
}
.sundry-list-view .cart button {
  width: 50%;
  height: 28px;
  background: #fff;
  border: none;
}
.sundry-list-view .cart .confirm {
  color: #ff8132;
}
.sundry-list-view .cart .cancel {
  border-right: 1px dotted #dedede;
}
</style><style type="text/css">.cpn-number-selector {
  display: inline-block;
  min-width: 84px;
  border: 1px solid #fff;
  border-radius: 17px;
  height: 34px;
  line-height: 33px;
}
.cpn-number-selector .subtract,
.cpn-number-selector .plus {
  margin: 4px;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: #fff;
  display: inline-block;
  color: #fe8233;
  line-height: 23px;
  font-size: 16px;
  text-align: center;
  border: 0;
  padding: 0;
}
.cpn-number-selector .subtract.hover,
.cpn-number-selector .plus.hover {
  background-color: #dedede;
}
.cpn-number-selector .subtract {
  float: left;
}
.cpn-number-selector .plus {
  float: right;
}
.cpn-number-selector .number {
  min-width: 42px;
  text-align: center;
  display: inline-block;
}
.active-detail-view {
  position: absolute;
  width: 100%;
  background-color: #f9f9f9;
  min-height: 100%;
}
.active-detail-view .active-confirm {
  position: relative;
  width: 100%;
  height: 100%;
  padding-bottom: 80px;
}
.active-detail-view .active-confirm .information {
  margin-bottom: 26px;
  padding: 2px 18px;
  color: #fff;
  position: relative;
}
.active-detail-view .active-confirm .information:after {
  content: '';
  height: 4px;
  width: 100%;
  display: block;
  position: absolute;
  bottom: 0;
  left: 0;
}
.active-detail-view .active-confirm .information h3 {
  margin: 0;
  padding: 18px 0;
  border-bottom: 1px dashed #eee;
  font-size: 20px;
  line-height: 20px;
}
.active-detail-view .active-confirm .information h3 i {
  font-size: 20px;
}
.active-detail-view .active-confirm .information h3 .subtitle {
  float: right;
  color: #fff;
  font-size: 15px;
  line-height: 20px;
}
.active-detail-view .active-confirm .information .detail {
  padding: 4px 0;
  border-bottom: 1px dashed #eee;
}
.active-detail-view .active-confirm .information .detail .seat {
  padding-right: 1em;
}
.active-detail-view .active-confirm .information .detail p {
  font-size: 12px;
  margin: 16px 0;
}
.active-detail-view .active-confirm .information .detail h4 {
  font-size: 15px;
  margin: 18px 0;
}
.active-detail-view .active-confirm .information .detail input {
  background-color: transparent;
  border: 1px solid #fff;
  text-align: center;
}
.active-detail-view .active-confirm .information .summation {
  padding: 18px 0;
  font-size: 12px;
  text-align: right;
}
.active-detail-view .active-confirm .information .summation p {
  margin: 0;
  padding: 0;
}
.active-detail-view .active-confirm .information .summation .cny,
.active-detail-view .active-confirm .information .summation .price {
  color: #fdd892;
  font-size: 27px;
}
.active-detail-view .active-confirm .information .summation .cny {
  margin-left: 0.4em;
}
.active-detail-view .active-confirm .information .summation .price {
  margin-left: 0.2em;
}
.active-detail-view .active-confirm .information.exchange-ticket {
  background-color: #00b094;
}
.active-detail-view .active-confirm .information.exchange-ticket:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/6a1dd3a1766107b4ad00499e153292ab.png);
}
.active-detail-view .active-confirm .information.seat-ticket {
  background-color: #0da7c5;
}
.active-detail-view .active-confirm .information.seat-ticket:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/44ad58088bec3334dc0a083ed76dc5b6.png);
}
.active-detail-view .active-confirm .information.active-ticket {
  background-color: #e77285;
}
.active-detail-view .active-confirm .information.active-ticket:after {
  background-image: url(http://static.m.maizuo.com/v4/static/app/asset/077a81d6e4f7694413bd672d96f021f5.png);
}
.active-detail-view .active-confirm .mobile {
  margin: 0 auto;
  width: 284px;
  height: 42px;
  padding: 0 22px;
  border: 1px solid #ccc;
  border-radius: 21px;
  font-size: 13px;
  line-height: 42px;
}
.active-detail-view .active-confirm .mobile input {
  background: transparent;
  border: none;
  height: 100%;
  width: 160px;
  margin-left: 20px;
}
.active-detail-view .active-confirm .mobile.disabled {
  background-color: #eee;
  color: #999;
}
.active-detail-view .active-confirm .notice {
  margin: 2em 0 0;
  padding: 0 18px;
}
.active-detail-view .active-confirm .notice p {
  font-size: 11px;
  margin: 1em 0;
  padding: 0 1em;
  text-indent: -0.5em;
  color: #555;
}
.active-detail-view .active-confirm .notice .strong {
  color: #fe8233;
}
.active-detail-view .active-confirm .operation {
  position: fixed;
  bottom: 0;
  width: 100%;
  margin: 2em 0;
  text-align: center;
}
</style><script type="text/javascript" charset="utf-8" async="" src="js/index-e6bff4.js"></script>
<script type="text/javascript" charset="utf-8" async="" src="js/home-071614.js"></script>
<script type="text/javascript" charset="utf-8" async="" src="js/login-fedb30.js"></script>
</head><body class="theme-default"><main class=""><div class="application" >
<!--<div class="application-head" ><nav id="toolbar" class="notybar-upside" ><h1  class=""><a href="javascript:void(0)javascript: void 0;"  class=""><div class="toolbar-title-icon" ><i class="iconfont icon-list" ></i></div><div class="toolbar-title" >我的</div></a></h1><div id="nav-right"  class=""><a class="city" href="javascript:void(0)#!/city" ><span class="city-content" >武汉</span><span > </span><i class="iconfont icon-dropdown" ></i></a><a class="user" href="javascript:void(0)#!/center" ><i class="iconfont icon-user" ></i></a></div></nav></div>-->
<div class="application-view" >
<section class="center-home-view" >
<div class="center-header-wrap" ><header ><img class="avatar" src="http://pic.maizuo.com/usr/default/maizuomoren66.jpg" ><div class="detail" ><p class="username" ><span ><?php echo $res['iuser'];?></span></p><p class="email" >ID:<?php echo $res['id']?></p><p class="operation" ><span class="logout" >到期时间:<?php echo date('Y-m-d',$res['endtime']);?></span></p></div><div class="clearfix" ></div></header></div>
<section class="center-nav" >
<div class="menu-wrapper " >
	<div class="menu center-block" >
	<i class="iconfont icon-ticket-filled menu-icon" ></i><span class="title" >流量剩余</span>
	<div class="pull-right" ><span class="value-wrap" ><span class="value" ><?php echo round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024);?></span><span> MB</span></span><i class="iconfont icon-arrow-right trigger-icon" ></i>
</div></div></div>

<div class="menu-wrapper " >
	<div class="menu center-block" >
	<i class="iconfont icon-sandglass-filled menu-icon" ></i><span class="title" >套餐总额</span>
	<div class="pull-right" ><span class="value-wrap" ><span class="value" ><?php echo round($res['maxll']/1024/1024);?></span><span > MB</span></span><i class="iconfont icon-arrow-right trigger-icon" ></i>
</div></div></div>

<div class="menu-wrapper card" >
	<div class="menu center-block" >
	<i class="iconfont icon-coupon-filled menu-icon" ></i><span class="title" >剩余时长</span>
	<div class="pull-right" ><span class="value-wrap" ><span class="value" ><?php echo round(($res['endtime']-time())/86400);?></span><span > 天</span></span><i class="iconfont icon-arrow-right trigger-icon" ></i>
</div></div></div>

<div class="menu-wrapper card" >
	<div class="menu center-block" >
	<i class="iconfont icon-coin-filled menu-icon" ></i><span class="title" >接收数据</span>
	<div class="pull-right" ><span class="value-wrap" ><span class="value" ><?php echo round($res['isent']/1024/1024);?></span><span > MB</span></span><i class="iconfont icon-arrow-right trigger-icon" ></i>
</div></div></div>

<div class="menu-wrapper card" >
	<div class="menu center-block" >
	<i class="iconfont icon-card-filled menu-icon" ></i><span class="title" >接收数据</span>
	<div class="pull-right" ><span class="value-wrap" ><span class="value" ><?php echo round($res['irecv']/1024/1024);?></span><span > MB</span></span><i class="iconfont icon-arrow-right trigger-icon" ></i>
</div></div></div>

<div class="menu-wrapper setting" >
<a href="mod.php?user=<?php echo $_GET["user"] ?>&p=pass<?php echo $_GET["pass"]?>"><div class="menu center-block" >
<i class="iconfont icon-setting-filled menu-icon" ></i><span class="title" >修改密码</span><div class="pull-right" ><span class="value-wrap" ><span class="value" >0</span><span > 张</span></span><i class="iconfont icon-arrow-right trigger-icon" ></i></div></div></a>
</div></section></section>
</div>
<aside class="application-sidebar" ><span  class=""></span></aside></div></main>
     </body></html>