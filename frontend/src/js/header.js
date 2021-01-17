import { $ } from './functions'
switchViewHeader()
window.addEventListener('scroll', switchViewHeader)
function switchViewHeader() {
  let scroll = window.pageYOffset || document.documentElement.scrollTop
  let elsForModify = $.all('.modif')
  if (scroll > 5) {
    elsForModify.forEach((e) => e.classList.add('active'))
  } else {
    elsForModify.forEach((e) => e.classList.remove('active'))
  }
}
$.el('.header__cont').setAttribute('style', 'transition: padding .7s')


// switch on/off mobile menu

const onOf = $.el('.on-of')
const menu = $.el('.header__nav > .menu')
onOf.addEventListener('click', (e) => {
  e.preventDefault()
  menu.classList.toggle('active')
})

menu.addEventListener('click', (e) => {
  if (e.target.tagName === 'A') {
    menu.classList.remove('active')
  }
})
