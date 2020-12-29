import 'font-awesome/scss/font-awesome.scss'
import '@/scss/style.scss'
import '@/index.html'
import '@babel/polyfill'
import header from '@/js/header'
import DropWindow from '@/js/DropWindows'
import {$} from '@/js/functions'
import SmoothScroll from 'smooth-scroll'
import personArea from "@/js/person-area"

window.onload = () => {
  const contacts =  document.getElementById('contacts')
  const resume =  document.getElementById('resume')

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
  // reviews
  const form = document.querySelector('.reviews-body__form')
  const reviews = document.querySelector('.reviews-body__wrapper')
  const message = document.querySelector('.message')
  form.addEventListener('submit', async (e) => {
      e.preventDefault()
      let body = new FormData(form)
      body.append('operation', 'add')
      let res = await fetch('./api-reviews', {
          method: 'POST',
          body
      })
      res = await res.json()
      if (res.result) {
          message.style.display = "none"
          renderList(reviews, res.reviews)
      }
      if (res.error) {
          message.style.display = "flex"
      }
  })
  reviews.addEventListener('click', async (e) => {
      if (e.target.className === 'review_del') {
          let body = new FormData()
          body.append('operation', 'delete')
          body.append('id', e.target.dataset.id)
          let res = await fetch('./api-reviews', {
              method: 'POST',
              body
          })
          res = await res.json()
          if (res.result) {
              message.style.display = "none"
              renderList(reviews, res.reviews)
          }
      }
      if (e.target.className === 'review_edit') {
          e.target.style.display = "none"
          document.querySelector(`button[data-save="${e.target.dataset.edit}"]`).style.display = "flex"
          document.querySelector(`p[data-id="${e.target.dataset.edit}"]`).style.display = "none"
          document.querySelector(`textarea[data-review="${e.target.dataset.edit}"]`).style.display = "flex"
      }
      if (e.target.className === 'save_review') {
          let body = new FormData()
          body.append('operation', 'edit')
          body.append('id', e.target.dataset.save)
          let val = document.querySelector(`p[data-id="${e.target.dataset.save}"]`).innerHTML
          let newVal = document.querySelector(`textarea[data-review="${e.target.dataset.save}"]`).value
          if (val !== newVal) {
              body.append('review', document.querySelector(`textarea[data-review="${e.target.dataset.save}"]`).value)
              let res = await fetch('./api-reviews', {
                  method: 'POST',
                  body
              })
              res = await res.json()
              if (res.result) {
                  message.style.display = "none"
                  renderList(reviews, res.reviews)
              }
          }
          e.target.style.display = "none"
          document.querySelector(`button[data-edit="${e.target.dataset.save}"]`).style.display = "flex"
          document.querySelector(`p[data-id="${e.target.dataset.save}"]`).style.display = "flex"
          document.querySelector(`textarea[data-review="${e.target.dataset.save}"]`).style.display = "none"
  
      }
  })
  
  function renderReview({
      id,
      user,
      review
  }) {
      return `
         <div class="reviews-body__review">
              <div class="user">
                  <p>User's name: <span>${user}</span></p>       
                  <p class="review" data-id="${id}">${review}</p>
                  <textarea class="edit_review" style="display:none" type="text" name="edit_review" data-review="${id}">${review}</textarea>
              </div>
              <div class="edit">
                  <button class='review_edit' data-edit="${id}"> Edit</button>
                  <button style="display:none" class='save_review' data-save="${id}"> Save</button>
                  <button class='review_del' data-id="${id}">X</button>
              </div>
          </div>
      `
  }
  
  function renderList(wrapper, array) {
      wrapper.innerHTML = ''
      array.forEach(r => {
          wrapper.insertAdjacentHTML('beforeend', renderReview(r))
      })
  }
}
