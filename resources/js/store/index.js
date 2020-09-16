import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		ones: [],
		twos: [],
		stablishments: {},
		allStablishments: [],
		categories: []
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
		},
		GET_ALL_STABLISHMENT(state, stablishments) {
			state.allStablishments = stablishments;
		},
		GET_CATEGORIES(state, categories) {
			state.categories = categories
		}
	},
	getters: {
		getStablishment: state => {
			return state.stablishments;
		},
		getPhotoStablishment: state => {
			return state.stablishments.photos;
		},
		getAllStablishment: state => {
			return state.allStablishments;
		},
		getAllCategories: state => {
			return state.categories;
		}
	}
});