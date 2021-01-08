import http from '@/js/server'
import {$} from './functions'
;(() => {
  const wrapper = $.el('.portfolio-catalog__cont') || null
  if (wrapper) {
    const filter = $.el('#pf_filter')
    const catalog = http.get('api-catalog?action=get').catch(console.log)
    const tags = $.el('#pf_tags')
    const allTags = () => [...$.all("input[type='checkbox']")]
    const checkedTags = () =>
      [...$.all("input[type='checkbox']")].filter((f) => f.checked)
    const filteredWorks = (works) =>
      works.filter((work) =>
        work.tags.some((tag) =>
          checkedTags().some((checkedTag) => tag.includes(checkedTag.name))
        )
      )

    filter.addEventListener('click', async () => {
      const {catalog: works} = await catalog
      const worksForShow = !allTags()[0].checked ? filteredWorks(works) : works
      wrapper.innerHTML = ''
      if (worksForShow.length > 0) {
        worksForShow.forEach((work) =>
          wrapper.insertAdjacentHTML('beforeEnd', renderWork(work))
        )
      } else {
        wrapper.innerHTML = ` <p class="pf_message">По вашему запросу совпадений не найдено...</p>`
      }
    })

    tags.addEventListener('click', (e) => {
      const el = e.target
      if (el.dataset.name === 'all') {
        allTags().forEach((t, i) => {
          i > 0 && (t.checked = false)
        })
      } else if (
        el.tagName === 'LABEL' ||
        el.tagName === 'SPAN' ||
        (el.tagName === 'INPUT' && el.dataset.name !== 'all')
      ) {
        allTags()[0].checked = false
      }
    })

    function renderWork({id, title, img, tags}) {
      const _tags = tags.map((tag) => `<span>${tag}</span>`).join('')
      return `
    <div class="product">
        <div class="img">
          <img src="/src/smallimages/${img}" alt="">
        </div>
        <p class="title">${title}</p>
        <div class="tags">
            <span class="title">Tехнологии: </span>
            ${_tags}
        </div>
        <a href="/work?id=${id}" class="link">Подробнее...</a>
    </div>
    `
    }
  }
})()
