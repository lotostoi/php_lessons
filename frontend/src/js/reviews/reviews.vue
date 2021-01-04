<template>
  <div>
    <form v-if="login" class="reviews-body__form" id="add-reviews">
      <label>
        <span>
          Напишите отзыв:
        </span>
        <textarea type="text" name="review" placeholder="Вашь отзыв" v-model="text"></textarea>
      </label>
      <p style="color: red;" v-if="error" class="message">Login or review are empty!</p>
      <button type="submit" @click.prevent="add">Добавить отзыв</button>
    </form>
    <div v-else class="reviews-body__enter">
      <p class="title">Что бы оставить отзыв необходимо авторизироваться:</p>
      <div class="social-network">
        <div class="list">""
          <a :href="`/api-auth-vk?start=1`"><i class="fa fa-vk" aria-hidden="true"></i></a>
          <a :href="`/api-auth-fb?start=1`"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>

    <div class="reviews-body__wrapper">
      <div v-for="review of reviews" class="reviews-body__review" :key="review.id">
        <div class="user">
          <div class="nick">
            <img :src="review.img_small" alt="user-image" />
            <a :href="review.link_to_sosial_network">
              {{ review.user }}
            </a>
          </div>
          <p v-if="review.show" class="review">{{ review.review }}</p>
          <textarea v-else class="edit_review" type="text" name="edit_review" v-model="review.review"> {{ review.review }} </textarea>
        </div>
        <div class="edit" v-if="(admin != 0 && admin !== null) || login === review.user">
          <button v-if="review.show" class="review_edit" @click.prevent="edit(review)"><i class="fa fa-pencil" aria-hidden="true"></i></button>
          <button v-else @click.prevent="save(review)"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
          <button class="review_del" @click.prevent="del(review)"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import http from '@/js/server'

const rev = http.get('api-reviews?operation=get').catch(console.log)
const res = http.get('api-auth?action=check').catch(console.log)
export default {
  data: () => ({
    reviews: [],
    login: '',
    text: '',
    error: false,
    login: null,
    first_name: '',
    last_name: '',
    email: '',
    admin: false,
  }),

  async mounted() {
    try {
      const {result, user, admin, reviews} = await rev
      this.admin = admin
      this.login = user
      console.log(admin, user)
      this.reviews = reviews.map((review) => ({...review, show: true}))
    } catch (e) {
      console.log(e)
    }
  },
  methods: {
    async add() {
      if (this.login !== '' && this.text !== '') {
        try {
          this.error = false
          let body = new FormData(this.$el.querySelector('#add-reviews'))
          body.append('operation', 'add')
          this.rerender(body)
        } catch (e) {
          console.log(e)
        }
      } else {
        this.error = true
      }
    },
    edit(review) {
      review.show = false
    },
    async save(review) {
      if (review.review === '') {
        review.show = true
        return false
      }
      try {
        let body = new FormData()
        body.append('operation', 'edit')
        body.append('id', review.id)
        body.append('review', review.review)
        this.rerender(body)
        review.show = true
      } catch (e) {
        console.log(e)
      }
    },
    async del(review) {
      try {
        let body = new FormData()
        body.append('operation', 'delete')
        body.append('id', review.id)
        this.rerender(body)
      } catch (e) {
        console.log(e)
      }
    },
    async rerender(body) {
      const {reviews} = await http.post('api-reviews', body)
      this.reviews = reviews.map((review) => ({...review, show: true}))
      this.text = ''
    },
  },
}
</script>

<style></style>
