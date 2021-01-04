import Vue from 'vue'
import authContent from '@/js/enter/person-area.vue'

const enter = () => {
  const el = document.querySelector('.auth-enter')
  if (el) {
    return new Vue({
      el: '.auth-enter',
      data: {},
      components: {
        authContent,
      },
    })
  } else {
    return false
  }
}

export default enter
