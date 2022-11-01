<?php
namespace MediaWiki\Extension\Ark\ThemeToggle;

class InlineJsConstants {
    // phpcs:disable Generic.Files.LineLength
    // modules/inline/noAuto.js
    public const NO_AUTO = 'var l=null,n=null,m=THEMELOAD;window.MwSkinTheme={getCurrent:function(){return n},set:function(e){var t=document.documentElement;n=e;try{null!==n&&(t.className=t.className.replace(/ theme-[^\s]+/gi,""),t.classList.add("theme-"+n)),RLCONF.wgThemeToggleSiteCssBundled.indexOf(n)<0?(null==l&&(l=document.createElement("link"),document.head.appendChild(l)),l.rel="stylesheet",l.type="text/css",l.href=m+"&modules=ext.theme."+currentThemeActual+"&only=styles"):null!=l&&(document.head.removeChild(l),l=null)}catch(e){}}},MwSkinTheme.set(localStorage.getItem("skin-theme")||RLCONF.wgThemeToggleDefault);';
    // modules/inline/withAuto.js
    public const WITH_AUTO = 'var a,s=window.matchMedia("(prefers-color-scheme: dark)"),c=null,d=null,m=THEMELOAD;window.MwSkinTheme={getCurrent:function(){return d},set:function(e){var t=document.documentElement;function n(e){a=e;try{null!==a&&(t.className=t.className.replace(/ theme-[^\s]+/gi,""),t.classList.add("theme-"+a)),RLCONF.wgThemeToggleSiteCssBundled.indexOf(a)<0?(null==c&&(c=document.createElement("link"),document.head.appendChild(c)),c.rel="stylesheet",c.type="text/css",c.href=m+"&modules=ext.theme."+a+"&only=styles"):null!=c&&(document.head.removeChild(c),c=null)}catch(e){}}function l(){n(s.matches?"dark":"light")}"auto"===(d=e)?(l(),t.classList.add("theme-auto"),s.addEventListener("change",l)):(n(d),s.removeEventListener("change",l))}},MwSkinTheme.set(localStorage.getItem("skin-theme")||RLCONF.wgThemeToggleDefault);';
}
