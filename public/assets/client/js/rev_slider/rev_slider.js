var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
if(htmlDiv) {
htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
}else{
var htmlDiv = document.createElement("div");
htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
}



             
if (setREVStartSize!==undefined) setREVStartSize(
{c: '#rev_slider_328_1', responsiveLevels: [1240,1024,778,480], gridwidth: [1240,1024,778,480], gridheight: [700,700,700,700], sliderLayout: 'fullwidth'});

var revapi328,
tpj;	
(function() {			
if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();	
function onLoad() {				
if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}
if(tpj("#rev_slider_328_1").revolution == undefined){
revslider_showDoubleJqueryError("#rev_slider_328_1");
}else{
revapi328 = tpj("#rev_slider_328_1").show().revolution({
sliderType:"standard",
jsFileLocation:"//revolution.themepunch.com/wp-content/plugins/revslider/public/assets/js/",
sliderLayout:"fullwidth",
dottedOverlay:"none",
delay:10000,
navigation: {
keyboardNavigation:"off",
keyboard_direction: "horizontal",
mouseScrollNavigation:"off",
mouseScrollReverse:"default",
onHoverStop:"off",
touch:{
touchenabled:"on",
touchOnDesktop:"off",
swipe_threshold: 75,
swipe_min_touches: 1,
swipe_direction: "horizontal",
drag_block_vertical: false
}
,
arrows: {
style:"metis",
enable:true,
hide_onmobile:true,
hide_under:778,
hide_onleave:false,
tmp:'',
left: {
h_align:"left",
v_align:"center",
h_offset:0,
v_offset:0
},
right: {
h_align:"right",
v_align:"center",
h_offset:0,
v_offset:0
}
}
,
bullets: {
enable:true,
hide_onmobile:false,
style:"hermes",
hide_onleave:false,
direction:"horizontal",
h_align:"center",
v_align:"bottom",
h_offset:0,
v_offset:20,
space:5,
tmp:''
}
},
responsiveLevels:[1240,1024,778,480],
visibilityLevels:[1240,1024,778,480],
gridwidth:[1240,1024,778,480],
gridheight:[700,700,700,700],
lazyType:"none",
parallax: {
type:"scroll",
origo:"slidercenter",
speed:400,
speedbg:0,
speedls:0,
levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
},
shadow:0,
spinner:"spinner5",
stopLoop:"off",
stopAfterLoops:-1,
stopAtSlide:-1,
shuffle:"off",
autoHeight:"off",
hideThumbsOnMobile:"off",
hideSliderAtLimit:0,
hideCaptionAtLimit:0,
hideAllCaptionAtLilmit:0,
debugMode:false,
fallbacks: {
simplifyAll:"off",
nextSlideOnWindowFocus:"off",
disableFocusListener:false,
}
});
}; /* END OF revapi call */

if(typeof ExplodingLayersAddOn !== "undefined") ExplodingLayersAddOn(tpj, revapi328);

//RsTypewriterAddOn(tpj, revapi328);
//try {initSocialSharing("328");} catch(err){}
}; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */
 