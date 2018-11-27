
// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });


import 'devextreme/bundles/modules/core'
import 'devextreme/bundles/modules/data'
import 'devextreme/ui/data_grid/ui.data_grid.js'
import 'devextreme/ui/check_box.js'
import 'devextreme/ui/date_box/ui.date_box.js'
import 'devextreme/ui/text_box/text_box'
import 'devextreme/ui/select_box.js'
import 'devextreme/ui/drop_down_box'
import 'devextreme/ui/tree_list/ui.tree_list'
import 'devextreme/ui/load_panel.js'
import 'devextreme/ui/toast.js'
import 'devextreme/ui/tag_box.js'
import 'devextreme/ui/switch.js'
import 'devextreme/ui/file_uploader.js'
import 'devextreme/ui/form.js'

// import 'devextreme/viz/chart.js'
// import 'devextreme/viz/linear_gauge.js'
// import 'devextreme/viz/pie_chart.js'

import deMessages from '../i18n/pt-BR.dx.json'
DevExpress.localization.loadMessages(deMessages)

require('./components')
require('./pages')
require('./features')