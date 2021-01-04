<template>
  <form  class="person-area">
    <div class="img">
      <img :src="img_big" alt="user-image" />
    </div>
    <div class="field">
      <span class="title">Login:</span>
      <span class="value">{{ login }}</span>
    </div>
    <div class="field">
      <span class="title">Имя:</span>
      <span class="value">{{ first_name }}</span>
    </div>
    <div class="field">
      <span class="title">Фамилия:</span>
      <span class="value">{{ last_name }}</span>
    </div>
    <div class="field">
      <span class="title">Email:</span>
      <span class="value">{{ email }}</span>
    </div>
    <button @click.prevent="exit" class="exit">Выйти</button>
  </form>
</template>

<script>
import http from '@/js/server'
const res = http.get('api-auth?action=check').catch(console.log)
export default {
  data: () => ({
    error: null,
    user: {},
    login: '',
    first_name: '',
    last_name: '',
    img_big: '',
    email: '',
  }),
  async mounted() {
    try {
      this.user = await res
      if (this.user) {
        this.login = this.user.login
        this.first_name = this.user.first_name
        this.last_name = this.user.last_name
        this.img_big = this.user.img_big
        this.email = this.user.email
      }
    } catch (e) {
      console.log(e)
    }
  },
  methods: {
    async exit() {
      try {
        const res = await http.get('api-auth?action=logout')
        window.location = '/auth/enter'
      } catch (e) {
        console.log(e)
      }
    },
  },
}
</script>

<style lang="scss"></style>
