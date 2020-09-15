import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		ones: [],
		twos: [],
		stablishments: [],
	},
	mutations: {
		ADD_ONE(state, one) {
			state.ones = one;
		},
		ADD_TWO(state, two) {
			state.twos = two;
		},
		GET_STABLISHMENT(state, stablishment) {
			state.stablishments = stablishment;
		}
	},
	getters: {
		getStablishment: state => {
			return state.stablishments;
		},
		getPhotoStablishment: state => {
			return state.stablishments.photos;
		},
	}
});