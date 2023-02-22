import _ from 'lodash';
window._ = _;
import Popper from './admin/lib/popper.js';
import Swal from 'sweetalert2';

import 'bootstrap';

try {
   window.Popper = Popper;
   window.Swal = Swal;
} catch (e) { console.log(e) }

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
   broadcaster: 'pusher',
   key: import.meta.env.VITE_PUSHER_APP_KEY,
   cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
   wsHost: window.location.hostname,
   wsPort: 6001,
   forceTLS: false,
   disableStats: true,
   encrypted: false,
   authEndpoint: '/broadcasting/auth',
   csrfToken: $('meta[name="csrf-token"]').attr('content'),
   auth: {
      withCredentials: true,
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   },
});

window.Echo.channel('caoson')
   .listen('.server.created', (e) => {
      console.log(e);
   })

window.Echo.private(`lockacc.` + document.getElementById("user_id").value)
   .listen('.server.created', (event) => {
      console.log('Received message:', event);
   });