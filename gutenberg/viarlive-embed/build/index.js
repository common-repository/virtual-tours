!function(){"use strict";var e,t={989:function(){var e=window.wp.blocks,t=window.wp.element,r=window.wp.i18n,i=window.wp.blockEditor,l=window.wp.components,a=window.wp.data,n=JSON.parse('{"u2":"vl/viarlive-embed"}');const o={};o.viarlive=(0,t.createElement)("svg",{class:"custom-icon custom-icon-viarlive",width:"56",height:"56",viewBox:"0 0 56 56",fill:"none",xmlns:"http://www.w3.org/2000/svg"},(0,t.createElement)("path",{d:"M28 56C43.464 56 56 43.464 56 28C56 12.536 43.464 0 28 0C12.536 0 0 12.536 0 28C0 43.464 12.536 56 28 56Z",fill:"white"}),(0,t.createElement)("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M28 56C43.464 56 56 43.464 56 28C56 12.536 43.464 0 28 0C12.536 0 0 12.536 0 28C0 43.464 12.536 56 28 56ZM38.0347 17.9831H18.0378C17.2387 17.9831 16.5214 18.3328 16.0304 18.8876H40.0421C39.5511 18.3328 38.8338 17.9831 38.0347 17.9831ZM9.94057 23.8004C9.94057 21.6026 11.3837 19.7419 13.3741 19.1142C14.0227 17.1597 15.8656 15.75 18.0378 15.75H38.0347C40.2167 15.75 42.0665 17.1725 42.7072 19.1408C44.6552 19.7931 46.0589 21.6328 46.0589 23.8004V35.1819C46.0589 37.8951 43.8594 40.0947 41.1461 40.0947H35.7284C34.3436 40.0947 33.0657 39.3973 32.298 38.2825H23.8395C23.0821 39.4008 21.8093 40.0947 20.4224 40.0947H14.8534C12.1401 40.0947 9.94057 37.8951 9.94057 35.1819V23.8004ZM25.2605 36.0495H30.8403C29.2756 34.6392 26.8024 34.6328 25.2605 36.0495ZM41.7515 29.491C41.7515 32.0531 39.6745 34.1301 37.1124 34.1301C34.5503 34.1301 32.4734 32.0531 32.4734 29.491C32.4734 26.929 34.5503 24.852 37.1124 24.852C39.6745 24.852 41.7515 26.929 41.7515 29.491ZM23.5265 29.4911C23.5265 32.0532 21.4495 34.1302 18.8874 34.1302C16.3253 34.1302 14.2484 32.0532 14.2484 29.4911C14.2484 26.929 16.3253 24.8521 18.8874 24.8521C21.4495 24.8521 23.5265 26.929 23.5265 29.4911ZM17.2305 29.6567C17.2305 28.9986 17.4572 28.5557 17.7503 28.2757C18.0519 27.9876 18.4635 27.8342 18.8873 27.8342C19.2533 27.8342 19.55 27.5375 19.55 27.1715C19.55 26.8055 19.2533 26.5088 18.8873 26.5088C18.1512 26.5088 17.403 26.7745 16.8348 27.3172C16.2581 27.8681 15.905 28.6678 15.905 29.6567C15.905 30.0227 16.2017 30.3194 16.5677 30.3194C16.9337 30.3194 17.2305 30.0227 17.2305 29.6567ZM35.1241 29.6567C35.1241 28.9986 35.3509 28.5557 35.644 28.2757C35.9456 27.9876 36.3571 27.8342 36.7809 27.8342C37.1469 27.8342 37.4436 27.5375 37.4436 27.1715C37.4436 26.8055 37.1469 26.5088 36.7809 26.5088C36.0449 26.5088 35.2967 26.7745 34.7285 27.3172C34.1517 27.8681 33.7986 28.6678 33.7986 29.6567C33.7986 30.0227 34.0953 30.3194 34.4614 30.3194C34.8274 30.3194 35.1241 30.0227 35.1241 29.6567Z",fill:"#0071E0"}));var c=o;(0,wp.data.dispatch)("core").addEntities([{name:"viarLiveTours",kind:"vl/v1",baseURL:"/vl/v1/viarLiveTours"}]),(0,e.registerBlockType)(n.u2,{icon:c.viarlive,supports:{reusable:!1,html:!1},attributes:{toursObject:{type:"array"},width:{type:"string",default:"600"},height:{type:"string",default:"400"},tour:{type:"string"}},edit:function({attributes:e,setAttributes:n}){const{tour:o,width:c,height:v,toursObject:s}=e,u=[{label:(0,r.__)("Select Tour","vl"),value:""}],d=(0,a.useSelect)((e=>e("core").getEntityRecords("vl/v1","viarLiveTours")),[]);return(0,t.useEffect)((()=>{d&&d.filter((e=>"PRIVATE"!==e.visibility)).map((e=>u.push({label:e.name,value:e.url}))),n({toursObject:u})}),[d]),(0,t.useEffect)((()=>{document.querySelectorAll(".viarlive-tour-block").forEach((e=>{let t=document.createElement("iframe");t.src=e.dataset.url,t.width=e.dataset.width>0?e.dataset.width:"",t.height=e.dataset.height>0?e.dataset.height:"",t.allowFullscreen=!0,t.style.border="none",t.style.background="transparent",e.replaceChildren(t)}))}),[o,c,v]),(0,t.createElement)("div",(0,i.useBlockProps)(),(0,t.createElement)(i.InspectorControls,null,(0,t.createElement)(l.PanelBody,{title:(0,r.__)("Viar.Live Settings","vl")},(0,t.createElement)(l.SelectControl,{label:(0,r.__)("Tours","vl"),options:s,value:o,onChange:e=>{n({tour:e})}}),(0,t.createElement)(l.TextControl,{label:(0,r.__)("Width","vl"),value:c,onChange:e=>{n({width:e})},help:(0,r.__)("Specify the block width","vl")}),(0,t.createElement)(l.TextControl,{label:(0,r.__)("Height","vl"),value:v,onChange:e=>{n({height:e})},help:(0,r.__)("Specify the block height","vl")}))),(0,t.createElement)("div",{className:"viarlive-tour-block-container"},(0,t.createElement)("div",{className:"viarlive-tour-block-header"},(0,t.createElement)("div",{className:"viarlive-logo"}),(0,t.createElement)("div",{className:"viarlive-settings-button"},(0,r.__)("Settings","vl"))),!o&&(0,t.createElement)("div",{className:"viarlive-tour-block-empty"},(0,t.createElement)("div",{className:"viarlive-empty-logo"}),(0,t.createElement)("div",{className:"viarlive-title"},(0,r.__)("No tour selected","vl")),(0,t.createElement)("div",{className:"viarlive-description"},(0,r.__)("Select a tour. You should create a tour in your Viar.Live panel and import via API key.","vl"))),o&&(0,t.createElement)("div",{className:"viarlive-tour-block","data-url":o,"data-width":c,"data-height":v})))},save:function({attributes:e}){const{tour:l,width:a,height:n}=e;return(0,t.createElement)("div",i.useBlockProps.save(),(0,t.createElement)("div",{class:"viarlive-tour-block-container"},!l&&(0,r.__)("No Viar.Live Tour Selected","vl"),l&&(0,t.createElement)("div",{class:"viarlive-tour-block","data-url":l,"data-width":a,"data-height":n})))}})}},r={};function i(e){var l=r[e];if(void 0!==l)return l.exports;var a=r[e]={exports:{}};return t[e](a,a.exports,i),a.exports}i.m=t,e=[],i.O=function(t,r,l,a){if(!r){var n=1/0;for(s=0;s<e.length;s++){r=e[s][0],l=e[s][1],a=e[s][2];for(var o=!0,c=0;c<r.length;c++)(!1&a||n>=a)&&Object.keys(i.O).every((function(e){return i.O[e](r[c])}))?r.splice(c--,1):(o=!1,a<n&&(n=a));if(o){e.splice(s--,1);var v=l();void 0!==v&&(t=v)}}return t}a=a||0;for(var s=e.length;s>0&&e[s-1][2]>a;s--)e[s]=e[s-1];e[s]=[r,l,a]},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={826:0,431:0};i.O.j=function(t){return 0===e[t]};var t=function(t,r){var l,a,n=r[0],o=r[1],c=r[2],v=0;if(n.some((function(t){return 0!==e[t]}))){for(l in o)i.o(o,l)&&(i.m[l]=o[l]);if(c)var s=c(i)}for(t&&t(r);v<n.length;v++)a=n[v],i.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return i.O(s)},r=self.webpackChunkviarlive_embed=self.webpackChunkviarlive_embed||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))}();var l=i.O(void 0,[431],(function(){return i(989)}));l=i.O(l)}();