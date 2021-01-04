import 'font-awesome/scss/font-awesome.scss'
import '@/scss/style.scss'
import '@/index.html'
import '@babel/polyfill'
import header from '@/js/header'
import DropWindow from '@/js/DropWindows'
import {$} from '@/js/functions'
import SmoothScroll from 'smooth-scroll'
import http from '@/js/server'



new SmoothScroll(['a[href*="#"]'], {
  speed: 600,
})
header()
const blokes = [...$.all('.resume__allInformation')]

blokes.forEach(async (b) => {
  const bloke = {
    contSel: b,
    switchSel: '.title',
    contentSel: '.content',
    indicator: 'i',
    animTime: 700,
  }
  new DropWindow(bloke)
})
if (document.querySelector('.result_loader')) {
  setTimeout(() => {
    document.querySelector('.result_loader').style.opacity = '0'
  }, 3000)
}


const reviews = document.querySelector('.reviews.wrapper')
    reviews.addEventListener('click', async (e) => {
      if (e.target.dataset.edit) {
        e.preventDefault()
        const el = e.target
        const id = e.target.dataset.edit
        const parenet = el.parentNode
        parenet.querySelector('.review_save').classList.toggle('hiden')
        parenet.querySelector('.review_edit').classList.toggle('hiden')
        reviews.querySelector(`textarea[data-text="${id}"]`).classList.toggle('hiden')
      }
      if (e.target.dataset.save) {
        e.preventDefault()
        const el = e.target
        const id = e.target.dataset.save
        const parenet = el.parentNode
        const text = reviews.querySelector(`textarea[data-text="${id}"]`)
        let body = new FormData()
        body.append('operation', 'edit')
        body.append('id', id)
        body.append('review', text.value)
        try {
          const {
            result
          } = await http.post('api-reviews', body)
          window.location.reload()
        } catch (e) {
          console.log(e)
        }

      }
      if (e.target.dataset.del) {
        e.preventDefault()
        const el = e.target
        const id = e.target.dataset.del
        let body = new FormData()
        body.append('operation', 'delete')
        body.append('id', id)
        try {
          const {
            result
          } = await http.post('api-reviews', body)
          window.location.reload()
        } catch (e) {
          console.log(e)
        }

      }
    })