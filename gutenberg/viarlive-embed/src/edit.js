import { useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import './editor.scss';
import { useSelect } from '@wordpress/data';

export default function Edit({attributes, setAttributes}) {
	const { tour, width, height, toursObject } = attributes;
	const toursSelect = [
		{
			label: __('Select Tour', 'virtual-tours'),
			value: ''
		}
	];

	const viarLiveTours = useSelect(
		(select) => {
			return select('core').getEntityRecords( 'vl/v1', 'viarLiveTours' );
		},
		[]
	);

	useEffect( () => {

		if(viarLiveTours){
			let visible = viarLiveTours.filter( item => {
				return item.visibility !== 'PRIVATE';
			} );

			visible.map(item => (
				toursSelect.push(
					{
						label: item.name,
						value: item.url,
					}
				)
			));
		}
		setAttributes({toursObject: toursSelect})

	}, [ viarLiveTours ] );


	const onChangeTour = (newTour) => {
        setAttributes({tour: newTour})
    }

	const onChangeWidth = (newWidth) => {
        setAttributes({width: newWidth})
    }

	const onChangeHeight = (newHeight) => {
        setAttributes({height: newHeight})
    }

	useEffect( () => {

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

	}, [ tour, width, height ] );

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title={__('Viar.Live Settings', 'virtual-tours')} >
					<SelectControl
							label={__('Tours', 'virtual-tours')}
							options={ toursObject }
							value={ tour }
							onChange={ onChangeTour }
					/>

					<TextControl
						label={__('Width', 'virtual-tours')}
						value={ width }
                    	onChange={ onChangeWidth }
						help={__('Specify the block width', 'virtual-tours')}
					/>

					<TextControl
						label={__('Height', 'virtual-tours')}
						value={ height }
                    	onChange={ onChangeHeight }
						help={__('Specify the block height', 'virtual-tours')}
					/>
				</PanelBody>
			</InspectorControls>

			<div className="viarlive-tour-block-container">
				<div className="viarlive-tour-block-header">
					<div className="viarlive-logo"></div>
					<div className="viarlive-settings-button">{__('Settings', 'virtual-tours')}</div>
				</div>
				{!tour && (
					<div className="viarlive-tour-block-empty">
						<div className="viarlive-empty-logo"></div>
						<div className="viarlive-title">{ __('No tour selected', 'virtual-tours') }</div>
						<div className="viarlive-description">{ __('Select a tour. You should create a tour in your Viar.Live panel and import via API key.', 'virtual-tours') }</div>
					</div>
				 ) }

				{tour && (
					<div className="viarlive-tour-block" data-url={ tour } data-width={ width } data-height={ height }></div>
				) }
			</div>
		</div>
	);
}
