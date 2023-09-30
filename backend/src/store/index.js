import {createStore} from "vuex";
import state from './state'
import * as actions from './actions'
import * as mutations from './mutations';
import * as authStore from './auth'

const store = createStore({
  state,
  getters: {},
  actions,
  authStore,
  mutations,
})

export default store
