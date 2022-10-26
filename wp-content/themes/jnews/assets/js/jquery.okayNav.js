/*!
 * jquery.okayNav.js 2.0.4 (https://github.com/VPenkov/okayNav)
 * Author: Vergil Penkov (http://vergilpenkov.com/)
 * MIT license: https://opensource.org/licenses/MIT
 */
!function(n){"function"==typeof define&&define.amd?define(["jquery"],n):"object"==typeof module&&module.exports?module.exports=function(i,e){return void 0===e&&(e="undefined"!=typeof window?require("jquery"):require("jquery")(i)),n(e),e}:n(jQuery)}((function(n){var i=!!("object"==typeof jnews&&"object"==typeof jnews.library)&&jnews.library,e={parent:"",toggle_icon_class:"okayNav__menu-toggle",toggle_icon_content:"<span /><span /><span />",align_right:!0,swipe_enabled:!0,threshold:50,resize_delay:10,beforeOpen:function(){},afterOpen:function(){},beforeClose:function(){},afterClose:function(){},itemHidden:function(){},itemDisplayed:function(){}};function t(t,o){var a=this;a.options=n.extend({},e,o),a.navigation=n(t),a.document=n(document),a.window=n(window),""==a.options.parent&&(this.options.parent=this.navigation.parent()),a.nav_open=!1,a.parent_full_width=0,a.radCoef=180/Math.PI,a.sTouch={x:0,y:0},a.cTouch={x:0,y:0},a.sTime=0,a.nav_position=0,a.percent_open=0,a.nav_moving=!1,i&&(a.jnewsLibrary=i,a.init())}t.prototype={init:function(){var i=this;n("body").addClass("okayNav-loaded"),i.navigation.addClass("okayNav loaded").children("ul").addClass("okayNav__nav--visible"),i.options.align_right?i.navigation.append('<ul class="okayNav__nav--invisible transition-enabled nav-right" />').append('<a href="#" class="'+i.options.toggle_icon_class+' okay-invisible">'+i.options.toggle_icon_content+"</a>"):i.navigation.prepend('<ul class="okayNav__nav--invisible transition-enabled nav-left" />').prepend('<a href="#" class="'+i.options.toggle_icon_class+' okay-invisible">'+i.options.toggle_icon_content+"</a>"),i.nav_visible=i.navigation.children(".okayNav__nav--visible"),i.nav_invisible=i.navigation.children(".okayNav__nav--invisible"),i.toggle_icon=i.navigation.children("."+i.options.toggle_icon_class),i.toggle_icon_width=i.toggle_icon.outerWidth(!0),i.default_width=i.getChildrenWidth(i.navigation),i.parent_full_width=n(i.options.parent).outerWidth(!0),i.last_visible_child_width=0,i.initEvents(),i.nav_visible.contents().filter((function(){return this.nodeType=Node.TEXT_NODE&&!1===/\S/.test(this.nodeValue)})).remove(),1==i.options.swipe_enabled&&i.initSwipeEvents()},initEvents:function(){var i=this;i.options.parent.on("click.okayNav",(function(e){var t=n(e.target);!0===i.nav_open&&0==t.closest(".okayNav").length&&i.closeInvisibleNav(),t.hasClass(i.options.toggle_icon_class)&&(e.preventDefault(),i.toggleInvisibleNav())})),n(document).on("mouseup.okayNav",(function(e){n(e.target);!n(e.target).parents(".okayNav").length>0&&i.closeInvisibleNav()}));var e=i._debounce((function(){i.recalcNav()}),i.options.recalc_delay);i.window.on("load.okayNav ready.okayNav resize.okayNav",e),n(document).on("ready.okayNav",e),e()},initSwipeEvents:function(){var i=this;i.document.on("touchstart.okayNav",(function(e){if(i.nav_invisible.removeClass("transition-enabled"),1==e.originalEvent.touches.length){var t=e.originalEvent.touches[0];(t.pageX<25&&0==i.options.align_right||t.pageX>n(i.options.parent).outerWidth(!0)-25&&1==i.options.align_right||!0===i.nav_open)&&(i.sTouch.x=i.cTouch.x=t.pageX,i.sTouch.y=i.cTouch.y=t.pageY,i.sTime=Date.now())}})).on("touchmove.okayNav",(function(n){var e=n.originalEvent.touches[0];i._triggerMove(e.pageX,e.pageY),i.nav_moving=!0})).on("touchend.okayNav",(function(n){i.sTouch={x:0,y:0},i.cTouch={x:0,y:0},i.sTime=0,i.percent_open>100-i.options.threshold?(i.nav_position=0,i.closeInvisibleNav()):1==i.nav_moving&&(i.nav_position=i.nav_invisible.width(),i.openInvisibleNav()),i.nav_moving=!1,i.nav_invisible.addClass("transition-enabled")}))},_getDirection:function(n){return this.options.align_right?n>0?-1:1:n<0?-1:1},_triggerMove:function(n,i){var e=this;e.cTouch.x=n,e.cTouch.y=i;var t=Date.now(),o=e.cTouch.x-e.sTouch.x,a=e.cTouch.y-e.sTouch.y,s=a*a,l=Math.sqrt(o*o+s),v=Math.sqrt(s),r=Math.asin(Math.sin(v/l))*e.radCoef;e.sTime;if(e.sTouch.x=n,e.sTouch.y=i,r<20){var c=e._getDirection(o),d=e.nav_position+c*l,p=e.nav_invisible.width(),u=0;d<0?u=-d:d>p&&(u=p-d);var _=(p-(e.nav_position+c*l+u))/p*100;e.nav_position+=c*l+u,e.percent_open=_}},getParent:function(){return this.options.parent},getVisibleNav:function(){return this.nav_visible},getInvisibleNav:function(){return this.nav_invisible},getNavToggleIcon:function(){return this.toggle_icon},_debounce:function(n,i,e){var t,o=this;return function(){var i=this,a=arguments,s=function(){t&&o.jnewsLibrary.cancelAnimationFrame.call(o.jnewsLibrary.win,t),e||n.apply(i,a)},l=e&&!t;t&&o.jnewsLibrary.cancelAnimationFrame.call(o.jnewsLibrary.win,t),t=o.jnewsLibrary.requestAnimationFrame.call(o.jnewsLibrary.win,s),l&&n.apply(i,a)}},openInvisibleNav:function(){var n=this;n.options.enable_swipe||n.options.beforeOpen.call(),n.toggle_icon.addClass("icon--active"),n.nav_invisible.addClass("nav-open"),n.nav_open=!0,n.options.afterOpen.call()},closeInvisibleNav:function(){var n=this;n.options.enable_swipe||n.options.beforeClose.call(),n.toggle_icon.removeClass("icon--active"),n.nav_invisible.removeClass("nav-open"),n.nav_open=!1,n.options.afterClose.call()},toggleInvisibleNav:function(){var n=this;n.nav_open?n.closeInvisibleNav():n.openInvisibleNav()},getChildrenWidth:function(i){for(var e=0,t=n(i).children(),o=0;o<t.length;o++)e+=n(t[o]).outerWidth(!0);return e},getVisibleItemCount:function(){return n("li",this.nav_visible).length},getHiddenItemCount:function(){return n("li",this.nav_invisible).length},recalcNav:function(){var i=this,e=n(i.options.parent).outerWidth(!0),t=i.getChildrenWidth(i.options.parent),o=i.navigation.outerWidth(!0),a=i.getVisibleItemCount(),s=i.nav_visible.outerWidth(!0)+i.toggle_icon_width,l=t+i.last_visible_child_width+i.toggle_icon_width;if(e>t-o+i.default_width)return i._expandAllItems(),void i.toggle_icon.addClass("okay-invisible");a>0&&o<=s&&e<=l&&i._collapseNavItem(),e>l+i.toggle_icon_width+15&&i._expandNavItem(),0==i.getHiddenItemCount()?i.toggle_icon.addClass("okay-invisible"):i.toggle_icon.removeClass("okay-invisible")},_collapseNavItem:function(){var i=this,e=n("li:last-child",i.nav_visible);i.last_visible_child_width=e.outerWidth(!0),i.document.trigger("okayNav:collapseItem",e),e.detach().prependTo(i.nav_invisible),i.options.itemHidden.call(),i.jnewsLibrary.requestAnimationFrame.call(i.jnewsLibrary.win,(function(){i.recalcNav()}))},_expandNavItem:function(){var i=this,e=n("li:first-child",i.nav_invisible);i.document.trigger("okayNav:expandItem",e),e.detach().appendTo(i.nav_visible),i.options.itemDisplayed.call()},_expandAllItems:function(){var i=this;n("li",i.nav_invisible).detach().appendTo(i.nav_visible),i.options.itemDisplayed.call()},_collapseAllItems:function(){var i=this;n("li",i.nav_visible).detach().appendTo(i.nav_invisible),i.options.itemHidden.call()},destroy:function(){var i=this;n("li",i.nav_invisible).appendTo(i.nav_visible),i.nav_invisible.remove(),i.nav_visible.removeClass("okayNav__nav--visible"),i.toggle_icon.remove(),i.document.unbind(".okayNav"),i.window.unbind(".okayNav")}},n.fn.okayNav=function(e){var o,a=arguments;return void 0===e||"object"==typeof e?this.each((function(){var o=this;i&&i.requestAnimationFrame.call(i.win,(function(){n.data(o,"plugin_okayNav")||n.data(o,"plugin_okayNav",new t(o,e))}))})):"string"==typeof e&&"_"!==e[0]&&"init"!==e?(this.each((function(){var s=this;i&&i.requestAnimationFrame.call(i.win,(function(){var i=n.data(s,"plugin_okayNav");i instanceof t&&"function"==typeof i[e]&&(o=i[e].apply(i,Array.prototype.slice.call(a,1))),"destroy"===e&&n.data(s,"plugin_okayNav",null)}))})),void 0!==o?o:this):void 0}}));