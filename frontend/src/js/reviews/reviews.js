import Vue from 'vue'
import authContent from '@/js/reviews/reviews.vue'

const reviews = () => {
  const el = document.querySelector('.reviews-body')
  if (el) {
    return new Vue({
      el: '.reviews-body',
      data: {},
      components: {
        authContent,
      },
    })
  } else {
    return false
  }
}
export default reviews
