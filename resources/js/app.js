import './bootstrap';
import initAlpine from './init-alpine.js'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('initAlpine', initAlpine)
Alpine.start();
