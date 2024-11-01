jQuery(function($) {
    "use strict";

    //Change iframe width because of default elementor styles
    const elementorViarLiveIframe = document.querySelectorAll('.elementor-viarlive-widget iframe');
    
    if(elementorViarLiveIframe.length) {
        elementorViarLiveIframe.forEach(element => {
            let iframeWidth = element.getAttribute('width');
            
            $(element).css('width', iframeWidth);
        })
    }
});