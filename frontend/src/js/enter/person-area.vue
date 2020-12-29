<template>
  <form class="person-area" id="enter">
    <h2>Вход_</h2>
    <label class="login">
      <p>Введите логин или email_</p>
      <input type="text" :class="error ? 'error' : ''" name="login" placeholder="Введите логин или email..." />
      <p v-if="error" class="message">Неверный логин или пароль...</p>
    </label>
    <label class="pass">
      <p>Введите пароль_</p>
      <input type="password" :class="error ? 'error' : ''" name="password" placeholder="Введите пароль..." />
      <p v-if="error" class="message">Неверный логин или пароль...</p>
    </label>
    <a href="/auth/reg">Если вы еще не зарегистрированы, вам сюда ...</a>
    <label class="save">
      <p>Запомнить пароль_:</p>
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
  }),
  methods: {
    async enter() {
      try {
        const body = new FormData(this.$el)
        const res = await http.post('api-auth', body)
        this.error = 'error' in res ? true : null
        if (res.result) {
          console.log('test')
          window.location = '/'
        }
      } catch (e) {
        console.log(e)
      }
    },
  },
}
</script>

<style lang="scss">
@mixin placeholder {
  &::-webkit-input-placeholder {
    @content;
  }
  &:-moz-placeholder {
    @content;
  }
  &::-moz-placeholder {
    @content;
  }
  &:-ms-input-placeholder {
    @content;
  }
}
$color-light: white;
$color-light-hover: rgba(255, 255, 255, 0.863);
$color-light-active: rgba(245, 163, 11, 0.863);
$color-dark: rgb(51, 50, 50);
$color-dark-hover: rgb(7, 4, 0);
$color-dark-active: rgba(245, 163, 11, 0.979);
$color-light-grey: rgba(199, 198, 198, 0.685);
$color-bright: rgba(249, 128, 7, 0.7987570028011204);
@mixin bc-fone {
  & {
    background: linear-gradient(
        90deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(1, 0, 0, 0.7987570028011204) 42%,
        rgba(255, 98, 0, 0.6671043417366946) 100%
      ),
      url('@/img/baner.jpg');
  }
}
@mixin bc-fone-rev {
  & {
    background: rgb(5, 3, 0);
    background: linear-gradient(
      90deg,
      rgba(5, 3, 0, 0.6671043417366946) 0%,
      rgba(249, 128, 7, 0.7987570028011204) 0%,
      rgba(1, 1, 0, 1) 100%
    );
  }
}
@mixin shadow {
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
@mixin shadow-bot {
  & {
    -webkit-box-shadow: 0px 5px 3px -2px rgba(0, 0, 0, 0.48);
    -moz-box-shadow: 0px 5px 3px -2px rgba(0, 0, 0, 0.48);
    box-shadow: 0px 5px 3px -2px rgba(0, 0, 0, 0.48);
  }
}

@mixin textIndent($value: 40px) {
  & {
    text-indent: $value;
  }
}
@mixin firstLetter($text-size: 2.5rem, $color: $color-bright) {
  &:first-letter {
    font-size: $text-size;
    color: $color;
    font-weight: 800;
  }
}

.person-area {
  width: 100%;
  color: gray;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 50vh;
  padding: 50px;
  & > h2 {
    color: $color-dark;
    font-size: 2rem;
    margin: 20px 0;
  }
  & > label {
    width: 100%;
    max-width: 700px;
    display: flex;
    flex-direction: column;
    margin: 10px 0;
    & > p {
      margin: 10px 0;
      color: $color-dark;
      font-size: 1.5rem;
    }
    & > p.message {
      margin: 10px 0;
      color: red;
      font-size: 1rem;
      font-style: italic;
      font-weight: 300;
    }
    & > input {
      outline: none;
      min-height: 50px;
      padding: 10px;
      font-size: 1.2rem;
      color: $color-dark;
      border-radius: 5px;
      border: 1px solid $color-light-grey;
      @include placeholder {
        font-size: 1.2rem;
      }
    }
  }
  & > label.save {
    align-self: center;
    flex-direction: row;
    & > input {
      margin-left: 10px;
      width: 30px;
      height: 30px;
    }
  }
  & > a {
    margin: 10px 0;
    width: 100%;
    max-width: 700px;
    display: flex;
    color: $color-dark;
    justify-content: flex-start;
  }
  & > button {
    width: 100%;
    max-width: 700px;
    outline: none;
    padding: 15px;
    background-image: url('@/img/fonforlittelelem.jpg');
    background-size: contain;
    background: rgb(0, 0, 0);
    border: none;
    @include shadow;
    border-radius: 20px;
    font-size: 1.3rem;
    @include bc-fone;
    color: $color-light;
    margin: 10px 0;
    &:active {
      transform: scale(0.99);
    }
  }
  .error {
    background-color: rgba(255, 0, 0, 0.205);
    border-color: red;
  }
  & .field {
    margin: 20px 0;
    display: flex;
    width: 100%;
    max-width: 700px;
    align-items: center;
    justify-content: flex-start;
    & .title {
      display: flex;
      color: $color-dark;
      font-size: 1.5rem;
      font-weight: 600;
    }
    & .value {
      display: flex;
      color: $color-dark;
      font-size: 1.5rem;
      margin-left: 20px;
    }
  }
}
</style>
