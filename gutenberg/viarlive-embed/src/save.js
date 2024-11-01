import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { useEffect} from '@wordpress/element';

export default function save({ attributes }) {
	const { tour, width, height } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			<div class="viarlive-tour-block-container">

				{!tour && ( __('No Viar.Live Tour Selected', 'virtual-tours') ) }

				{tour && (
					<div class="viarlive-tour-block" data-url={ tour } data-width={ width } data-height={ height }></div>
				) }

			</div>
		</div>
	);
}
