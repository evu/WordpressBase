/*! modernizr 3.1.0 (Custom Build) | MIT *
 * http://modernizr.com/download/?-backgroundsize-canvas-canvastext-cssanimations-csscalc-csscolumns-cssfilters-cssmask-csstransforms-csstransforms3d-csstransitions-cssvhunit-cssvwunit-flexbox-hashchange-history-inputtypes-localstorage-requestanimationframe-srcset-svg-touchevents-video-hasevent-mq-printshiv !*/
!function(e,t,n){function r(e){var t=b.className,n=Modernizr._config.classPrefix||"";if(x&&(t=t.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),x?b.className.baseVal=t:b.className=t)}function o(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):x?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function a(e,t){return typeof e===t}function i(){var e,t,n,r,o,i,s;for(var l in S)if(S.hasOwnProperty(l)){if(e=[],t=S[l],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(r=a(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)i=e[o],s=i.split("."),1===s.length?Modernizr[s[0]]=r:(!Modernizr[s[0]]||Modernizr[s[0]]instanceof Boolean||(Modernizr[s[0]]=new Boolean(Modernizr[s[0]])),Modernizr[s[0]][s[1]]=r),y.push((r?"":"no-")+s.join("-"))}}function s(){var e=t.body;return e||(e=o(x?"svg":"body"),e.fake=!0),e}function l(e,n,r,a){var i,l,c,u,d="modernizr",f=o("div"),p=s();if(parseInt(r,10))for(;r--;)c=o("div"),c.id=a?a[r]:d+(r+1),f.appendChild(c);return i=o("style"),i.type="text/css",i.id="s"+d,(p.fake?p:f).appendChild(i),p.appendChild(f),i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),f.id=d,p.fake&&(p.style.background="",p.style.overflow="hidden",u=b.style.overflow,b.style.overflow="hidden",b.appendChild(p)),l=n(f,e),p.fake?(p.parentNode.removeChild(p),b.style.overflow=u,b.offsetHeight):f.parentNode.removeChild(f),!!l}function c(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function u(e,t){return function(){return e.apply(t,arguments)}}function d(e,t,n){var r;for(var o in e)if(e[o]in t)return n===!1?e[o]:(r=t[e[o]],a(r,"function")?u(r,n||t):r);return!1}function f(e,t){return!!~(""+e).indexOf(t)}function p(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(t,r){var o=t.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(p(t[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var a=[];o--;)a.push("("+p(t[o])+":"+r+")");return a=a.join(" or "),l("@supports ("+a+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function h(e,t,r,i){function s(){u&&(delete B.style,delete B.modElem)}if(i=a(i,"undefined")?!1:i,!a(r,"undefined")){var l=m(e,r);if(!a(l,"undefined"))return l}for(var u,d,p,h,v,g=["modernizr","tspan"];!B.style;)u=!0,B.modElem=o(g.shift()),B.style=B.modElem.style;for(p=e.length,d=0;p>d;d++)if(h=e[d],v=B.style[h],f(h,"-")&&(h=c(h)),B.style[h]!==n){if(i||a(r,"undefined"))return s(),"pfx"==t?h:!0;try{B.style[h]=r}catch(y){}if(B.style[h]!=v)return s(),"pfx"==t?h:!0}return s(),!1}function v(e,t,n,r,o){var i=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+$.join(i+" ")+i).split(" ");return a(t,"string")||a(t,"undefined")?h(s,t,r,o):(s=(e+" "+R.join(i+" ")+i).split(" "),d(s,t,n))}function g(e,t,r){return v(e,n,n,t,r)}var y=[],b=t.documentElement,x="svg"===b.nodeName.toLowerCase();x||!function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=E.elements;return"string"==typeof e?e.split(" "):e}function o(e,t){var n=E.elements;"string"!=typeof n&&(n=n.join(" ")),"string"!=typeof e&&(e=e.join(" ")),E.elements=n+" "+e,c(t)}function a(e){var t=C[e[S]];return t||(t={},T++,e[S]=T,C[T]=t),t}function i(e,n,r){if(n||(n=t),v)return n.createElement(e);r||(r=a(n));var o;return o=r.cache[e]?r.cache[e].cloneNode():x.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!o.canHaveChildren||b.test(e)||o.tagUrn?o:r.frag.appendChild(o)}function s(e,n){if(e||(e=t),v)return e.createDocumentFragment();n=n||a(e);for(var o=n.frag.cloneNode(),i=0,s=r(),l=s.length;l>i;i++)o.createElement(s[i]);return o}function l(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return E.shivMethods?i(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-:]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(E,t.frag)}function c(e){e||(e=t);var r=a(e);return!E.shivCSS||h||r.hasCSS||(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),v||l(e,r),e}function u(e){for(var t,n=e.getElementsByTagName("*"),o=n.length,a=RegExp("^(?:"+r().join("|")+")$","i"),i=[];o--;)t=n[o],a.test(t.nodeName)&&i.push(t.applyElement(d(t)));return i}function d(e){for(var t,n=e.attributes,r=n.length,o=e.ownerDocument.createElement(k+":"+e.nodeName);r--;)t=n[r],t.specified&&o.setAttribute(t.nodeName,t.nodeValue);return o.style.cssText=e.style.cssText,o}function f(e){for(var t,n=e.split("{"),o=n.length,a=RegExp("(^|[\\s,>+~])("+r().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),i="$1"+k+"\\:$2";o--;)t=n[o]=n[o].split("}"),t[t.length-1]=t[t.length-1].replace(a,i),n[o]=t.join("}");return n.join("{")}function p(e){for(var t=e.length;t--;)e[t].removeNode()}function m(e){function t(){clearTimeout(i._removeSheetTimer),r&&r.removeNode(!0),r=null}var r,o,i=a(e),s=e.namespaces,l=e.parentWindow;return!_||e.printShived?e:("undefined"==typeof s[k]&&s.add(k),l.attachEvent("onbeforeprint",function(){t();for(var a,i,s,l=e.styleSheets,c=[],d=l.length,p=Array(d);d--;)p[d]=l[d];for(;s=p.pop();)if(!s.disabled&&w.test(s.media)){try{a=s.imports,i=a.length}catch(m){i=0}for(d=0;i>d;d++)p.push(a[d]);try{c.push(s.cssText)}catch(m){}}c=f(c.reverse().join("")),o=u(e),r=n(e,c)}),l.attachEvent("onafterprint",function(){p(o),clearTimeout(i._removeSheetTimer),i._removeSheetTimer=setTimeout(t,500)}),e.printShived=!0,e)}var h,v,g="3.7.3",y=e.html5||{},b=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,x=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,S="_html5shiv",T=0,C={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",h="hidden"in e,v=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){h=!0,v=!0}}();var E={elements:y.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",version:g,shivCSS:y.shivCSS!==!1,supportsUnknownElements:v,shivMethods:y.shivMethods!==!1,type:"default",shivDocument:c,createElement:i,createDocumentFragment:s,addElements:o};e.html5=E,c(t);var w=/^$|\b(?:all|print)\b/,k="html5shiv",_=!v&&function(){var n=t.documentElement;return!("undefined"==typeof t.namespaces||"undefined"==typeof t.parentWindow||"undefined"==typeof n.applyElement||"undefined"==typeof n.removeNode||"undefined"==typeof e.attachEvent)}();E.type+=" print",E.shivPrint=m,m(t),"object"==typeof module&&module.exports&&(module.exports=E)}("undefined"!=typeof e?e:this,t);var S=[],T={_version:"3.1.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){S.push({name:e,fn:t,options:n})},addAsyncTest:function(e){S.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=T,Modernizr=new Modernizr,Modernizr.addTest("history",function(){var t=navigator.userAgent;return-1===t.indexOf("Android 2.")&&-1===t.indexOf("Android 4.0")||-1===t.indexOf("Mobile Safari")||-1!==t.indexOf("Chrome")||-1!==t.indexOf("Windows Phone")?e.history&&"pushState"in e.history:!1}),Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),Modernizr.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(t){return!1}});var C=function(e){function n(t,n){var a;return t?(n&&"string"!=typeof n||(n=o(n||"div")),t="on"+t,a=t in n,!a&&r&&(n.setAttribute||(n=o("div")),n.setAttribute(t,""),a="function"==typeof n[t],n[t]!==e&&(n[t]=e),n.removeAttribute(t)),a):!1}var r=!("onblur"in t.documentElement);return n}();T.hasEvent=C,Modernizr.addTest("hashchange",function(){return C("hashchange",e)===!1?!1:t.documentMode===n||t.documentMode>7}),Modernizr.addTest("canvas",function(){var e=o("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("canvastext",function(){return Modernizr.canvas===!1?!1:"function"==typeof o("canvas").getContext("2d").fillText}),Modernizr.addTest("video",function(){var e=o("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("srcset","srcset"in o("img"));var E=o("input"),w="search tel url email datetime date month week time datetime-local number range color".split(" "),k={};Modernizr.inputtypes=function(e){for(var r,o,a,i=e.length,s=":)",l=0;i>l;l++)E.setAttribute("type",r=e[l]),a="text"!==E.type&&"style"in E,a&&(E.value=s,E.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(r)&&E.style.WebkitAppearance!==n?(b.appendChild(E),o=t.defaultView,a=o.getComputedStyle&&"textfield"!==o.getComputedStyle(E,null).WebkitAppearance&&0!==E.offsetHeight,b.removeChild(E)):/^(search|tel)$/.test(r)||(a=/^(url|email|number)$/.test(r)?E.checkValidity&&E.checkValidity()===!1:E.value!=s)),k[e[l]]=!!a;return k}(w);var _=T._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];T._prefixes=_,Modernizr.addTest("csscalc",function(){var e="width:",t="calc(10px);",n=o("a");return n.style.cssText=e+_.join(t+e),!!n.style.length});var N="CSS"in e&&"supports"in e.CSS,z="supportsCSS"in e;Modernizr.addTest("supports",N||z);var j=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return l("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n}}();T.mq=j;var A=T.testStyles=l;Modernizr.addTest("touchevents",function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var r=["@media (",_.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");A(r,function(e){n=9===e.offsetTop})}return n}),A("#modernizr { height: 50vh; }",function(t){var n=parseInt(e.innerHeight/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).height,10);Modernizr.addTest("cssvhunit",r==n)}),A("#modernizr { width: 50vw; }",function(t){var n=parseInt(e.innerWidth/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).width,10);Modernizr.addTest("cssvwunit",r==n)});var P="Moz O ms Webkit",$=T._config.usePrefixes?P.split(" "):[];T._cssomPrefixes=$;var M=function(t){var r,o=_.length,a=e.CSSRule;if("undefined"==typeof a)return n;if(!t)return!1;if(t=t.replace(/^@/,""),r=t.replace(/-/g,"_").toUpperCase()+"_RULE",r in a)return"@"+t;for(var i=0;o>i;i++){var s=_[i],l=s.toUpperCase()+"_"+r;if(l in a)return"@-"+s.toLowerCase()+"-"+t}return!1};T.atRule=M;var R=T._config.usePrefixes?P.toLowerCase().split(" "):[];T._domPrefixes=R;var F={elem:o("modernizr")};Modernizr._q.push(function(){delete F.elem});var B={style:F.elem.style};Modernizr._q.unshift(function(){delete B.style}),T.testAllProps=v;var O=T.prefixed=function(e,t,n){return 0===e.indexOf("@")?M(e):(-1!=e.indexOf("-")&&(e=c(e)),t?v(e,t,n):v(e,"pfx"))};Modernizr.addTest("requestanimationframe",!!O("requestAnimationFrame",e),{aliases:["raf"]}),T.testAllProps=g,Modernizr.addTest("cssanimations",g("animationName","a",!0)),Modernizr.addTest("backgroundsize",g("backgroundSize","100%",!0)),function(){Modernizr.addTest("csscolumns",function(){var e=!1,t=g("columnCount");try{(e=!!t)&&(e=new Boolean(e))}catch(n){}return e});for(var e,t,n=["Width","Span","Fill","Gap","Rule","RuleColor","RuleStyle","RuleWidth","BreakBefore","BreakAfter","BreakInside"],r=0;r<n.length;r++)e=n[r].toLowerCase(),t=g("column"+n[r]),("breakbefore"===e||"breakafter"===e||"breakinside"==e)&&(t=t||g(n[r])),Modernizr.addTest("csscolumns."+e,t)}(),Modernizr.addTest("cssfilters",function(){if(Modernizr.supports)return g("filter","blur(2px)");var e=o("a");return e.style.cssText=_.join("filter:blur(2px); "),!!e.style.length&&(t.documentMode===n||t.documentMode>9)}),Modernizr.addTest("flexbox",g("flexBasis","1px",!0)),Modernizr.addTest("cssmask",g("maskRepeat","repeat-x",!0)),Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&g("transform","scale(1)",!0)}),Modernizr.addTest("csstransitions",g("transition","all",!0)),Modernizr.addTest("csstransforms3d",function(){var e=!!g("perspective","1px",!0),t=Modernizr._config.usePrefixes;if(e&&(!t||"webkitPerspective"in b.style)){var n,r="#modernizr{width:0;height:0}";Modernizr.supports?n="@supports (perspective: 1px)":(n="@media (transform-3d)",t&&(n+=",(-webkit-transform-3d)")),n+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",A(r+n,function(t){e=7===t.offsetWidth&&18===t.offsetHeight})}return e}),i(),r(y),delete T.addTest,delete T.addAsyncTest;for(var L=0;L<Modernizr._q.length;L++)Modernizr._q[L]();e.Modernizr=Modernizr}(window,document);