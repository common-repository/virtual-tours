(function ($) {
    $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/viarlive_embed.default", function ($scope, $) {
        "use strict";

        //Create embed
        const viarLiveContainer = document.querySelectorAll('.viarlive-tour-shortcode');

        viarLiveContainer.forEach(element => {

            //Create iframe and add attributes
            let viarLiveIframe = document.createElement("iframe");
            viarLiveIframe.src = element.dataset.url;
            viarLiveIframe.width = (element.dataset.width > 0) ? element.dataset.width : '';
            viarLiveIframe.height = (element.dataset.height > 0) ? element.dataset.height : '';
            viarLiveIframe.allowFullscreen = true;
            viarLiveIframe.style.border= "none";
            viarLiveIframe.style.background = "transparent";

            //Insert iframe
            element.replaceChildren(viarLiveIframe);
        });

        //Change iframe width because of default elementor iframe styles
        const elementorViarLiveIframe = document.querySelectorAll('.elementor-viarlive-widget iframe');

        if(elementorViarLiveIframe.length) {
            elementorViarLiveIframe.forEach(element => {
                let iframeWidth = element.getAttribute('width');

                $(element).css('width', iframeWidth);
            })
        }
      });
    });
})(jQuery);
