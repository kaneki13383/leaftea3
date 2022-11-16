import './bootstrap';
import IndexComponent from './components/IndexComponent.vue';
import router from './router';
import {createApp} from 'vue';

createApp(IndexComponent).use(router).mount('#app');