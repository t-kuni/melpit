/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faAddressCard } from '@fortawesome/free-regular-svg-icons'
import { faSearch, faStoreAlt, faShoppingBag, faSignOutAlt } from '@fortawesome/free-solid-svg-icons'
// import {} from '@fortawesome/free-brands-svg-icons'
library.add(faSearch, faAddressCard, faStoreAlt, faShoppingBag, faSignOutAlt);
dom.watch();

document.querySelector('.image-picker input')
    .addEventListener('change', (e) => {
        const input = e.target;
        const reader = new FileReader();
        reader.onload = (e) => {
            input.closest('.image-picker').querySelector('img').src = e.target.result
        };
        reader.readAsDataURL(input.files[0]);
    });
