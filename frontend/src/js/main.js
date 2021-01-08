import 'normalize.css'
import 'font-awesome/scss/font-awesome.scss'
import '@/scss/style.scss'
import '@/index.html'
import {$} from './functions'
import DropWindow from '@/js/DropWindows'
import SmoothScroll from 'smooth-scroll'
import '@/js/reviews'
import '@/js/header'
import '@/js/portfolio'
import '@/js/filters'

new SmoothScroll(['a[href*="#"]'], {
  speed: 600,
})

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

const checkedNetwork = $.el('#checked_network')
if (checkedNetwork) {
  checkedNetwork.addEventListener('change', (e) => {
    if (checkedNetwork.checked) {
      $.el('#vk_save').value = $.el('#fb_save').value = 1
    } else {
      $.el('#vk_save').value = $.el('#fb_save').value = 0
    }
  })
}

if (document.querySelector('.result_loader')) {
  setTimeout(() => {
    document.querySelector('.result_loader').style.opacity = '0'
  }, 3000)
}
