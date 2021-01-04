<template>
  <form class="person-area" id="enter">
    <p class="title">Вход через социальные сети:</p>
    <div class="social-network">
      <div class="list">
        <a :href="`/api-auth-vk?start=1&save_sn=${checked}`"><i class="fa fa-vk" aria-hidden="true"></i></a>
        <a :href="`/api-auth-fb?start=1&save_sn=${checked}`"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
      </div>
    </div>
    <label class="save">
      <p>Запомнить_:</p>
      <input type="checkbox" name="save_sn" v-model="checked"  />
    </label>
    <hr />
    <p class="title">Вход через сайт:</p>
    <label class="login">
      <p class="title-small">Введите логин или email_</p>
      <input type="text" :class="error ? 'error' : ''" name="login" placeholder="Введите логин или email..." />
      <p v-if="error" class="message">Неверный логин или пароль...</p>
    </label>
    <label class="pass">
      <p class="title-small">Введите пароль_</p>
      <input type="password" :class="error ? 'error' : ''" name="password" placeholder="Введите пароль..." />
      <p v-if="error" class="message">Неверный логин или пароль...</p>
    </label>
    <a href="/auth/reg">Если вы еще не зарегистрированы, вам сюда</a>
    <label class="save">
      <p>Запомнить_:</p>
      <input type="checkbox" name="save" checked />
      <input type="hidden" name="action" value="enter" />
    </label>
    <button @click.prevent="enter">Войти</button>
  </form>
</template>

<script>
import http from '@/js/server'

export default {
  data: () => ({
    error: null,
    checked: true,
  }),
  methods: {
    async enter() {
      try {
        const body = new FormData(this.$el)
        const res = await http.post('api-auth', body)
        this.error = 'error' in res ? true : null
        if (res.result) {
          window.location = '/reviews'
        }
      } catch (e) {
        console.log(e)
      }
    },
  },
}
</script>

<style lang="scss"></style>
