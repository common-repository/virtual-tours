window.addEventListener('load', (event) => {
    const viarLiveContainer = document.querySelectorAll('.viarlive-tour-block');

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
});