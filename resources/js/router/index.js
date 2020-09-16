import Vue from 'vue';
import VueRouter from 'vue-router';
import VuePageTransition from 'vue-page-transition';
import homeStablishment from '../components/homeStablishment';
import showStablishment from '../components/showStablishment';

Vue.use(VueRouter);
Vue.use(VuePageTransition);

const routes = [
	{
		path: '/',
		component: homeStablishment
	},
	{
		path: '/establecimiento/:id',
		name: 'establecimiento',
		component: showStablishment
	}
];

const router = new VueRouter({
	mode: 'history',
	routes
});

export default router;