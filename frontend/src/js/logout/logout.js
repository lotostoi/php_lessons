import Vue from 'vue'
import authContent from '@/js/logout/person-area.vue'

const logout = () => {
  const el = document.querySelector('.auth-logout')
  if (el) {
    return new Vue({
      el: '.auth-logout',
      data: {},
      components: {
        authContent,
      },
    })
  } else {
    return false
  }
}
export default logout