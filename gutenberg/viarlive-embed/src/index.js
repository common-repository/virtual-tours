import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import icons from './icons.js';

var dispatch = wp.data.dispatch;
dispatch( 'core' ).addEntities( [
    {
        name: 'viarLiveTours',
        kind: 'vl/v1',
        baseURL: '/vl/v1/viarLiveTours'
    }
]);

registerBlockType( metadata.name, {
	icon: icons.viarlive,
	supports: {
		reusable: false,
		html: false,
	},
	attributes: {
		toursObject: {
			type: 'array',
		},
		width: {
			type: 'string',
			default: '600',
		},
		height: {
			type: 'string',
			default: '400',
		},
		tour: {
			type: 'string', 
		},

	},
	edit: Edit,
	save,
} );
