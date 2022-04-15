import { createStore } from "vuex";
import axios from "axios";

const $http = axios.create({
  baseURL: "http://localhost/api/",
});

const store = createStore({
  state() {
    return {
      league: null,
    };
  },
  getters: {
    currentGroup(state) {
      return state.league.groups[0];
    },
    fixtures(state, getters) {
      return getters.currentGroup.fixtures
    }
  },
  actions: {
    syncLeague({ commit }, league) {
      commit("SYNC_LEAGUE", league);
    },
  },
  mutations: {
    SYNC_LEAGUE(state, league) {
      state.league = league;
    },
    
  },
});

export default store;
