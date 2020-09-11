import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		ones: [],
		twos: [],
	},
	mutations: {
		ADD_ONE(state, one) {
			state.ones = one;
		},
		ADD_TWO(state, two) {
			state.twos = two;
		}
	}
});