<section class="common wrapper">
  <div class="common-header__fone">
    <div class="common-header__cont">
      <h1 class="common-header__h1">Отзывы_</h1>
      <div class="common-header__description">
        В данном разделе вы можете оставить отзыв обо мне и некоторых моих работах_
      </div>
    </div>
  </div>
  <div class="common-body" id="reviews">
    <div>
      <?php if ($user) : ?>
        <form class="reviews-body__form" id="add-reviews" method="POST">
          <label>
            <span>
              Напишите отзыв:
            </span>
            <textarea type="text" name="review" placeholder="Вашь отзыв" v-model="text"></textarea>
          </label>
          <p class="message hiden">Отзыв не может быть пусты...</p>
          <button type="submit" id="add-review">Добавить отзыв</button>
        </form>
      <?php else : ?>
        <div class="reviews-body__enter">
          <p class="title">Что бы оставить отзыв необходимо авторизироваться:</p>
          <div class="social-network">
            <div class="list">
              <form action="../api/auth-vk" method="POST">
                <input type="hidden" name="start" value="1">
                <input type="hidden" name="save_sn" value="1" id="vk_save">
                <input type="hidden" name="redirect" value="reviews">
                <button type="submit" name="sn" value="vk" method="POST">
                  <i class="fa fa-vk" aria-hidden="true"></i>
                </button>
              </form>
              <form action="../api/auth-fb" method="POST">
                <input type="hidden" name="start" value="1">
                <input type="hidden" name="redirect" value="reviews">
                <input type="hidden" name="save_sn" value="1" id="fb_save">
                <button type="submit" name="sn" value="fb">
                  <i class="fa fa-facebook-square" aria-hidden="true"></i>
                </button>
              </form>
            </div>
            <label class="save">
              <p>Запомнить_:</p>
              <input type="checkbox" name="save_sn" checked id="checked_network" />
            </label>
          </div>

        </div>
      <?php endif; ?>

      <div class="reviews-body__wrapper">
        <?php foreach ($reviews as $review) : ?>
          <form class="reviews-body__review" data-form="<?= $review['id'] ?>">
            <div class="user">
              <div class="nick">
                <img src=" <?= $review['img_small'] ?>" alt="user-image" />
                <a href="<?= $review['link_to_sosial_network'] ?>">
                  <?= $review['user'] ?>
                </a>
              </div>
              <p class="review" data-rev="<?= $review['id'] ?>"><?= $review['review'] ?></p>
              <textarea class="edit_review hiden" type="text" name="edit_review" v-model="review.review" data-text="<?= $review['id'] ?>"> <?= $review['review'] ?> </textarea>
            </div>
            <?php if ($admin || $user == $review['user']) : ?>
              <div class="edit" data-parent="<?= $review['id'] ?>">
                <button class="review_edit" data-edit="<?= $review['id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button class="hiden review_save" data-save="<?= $review['id'] ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                <button class="review_del" data-del="<?= $review['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </div>
            <?php endif; ?>
          </form>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- <script>
     class Server {
      constructor(baseURL, options) {
        this.baseURL = baseURL
        this.options = options
      }
      _request(url, options = null) {
        const URL = this.baseURL + url
        return fetch(URL, options ? {
            ...this.options,
            ...options
          } : this.options)
          .then((res) => {
            if (res.status === 200) {
              return res.json()
            }
            throw new Error("Server's answer isn't correct...")
          })
          .catch((err) => console.error(err))
      }
      get(url) {
        let options = {
          method: 'GET'
        }
        return this._request(url, options)
      }
      delete(url) {
        let options = {
          method: 'DELETE'
        }
        return this._request(url, options)
      }
      post(url, body) {
        let options = {
          method: 'POST',
          body: body instanceof FormData ? body : JSON.stringify(body)
        }
        return this._request(url, options)
      }
      put(url, body) {
        let options = {
          method: 'PUT',
          body: body instanceof FormData ? body : JSON.stringify(body)
        }
        return this._request(url, options)
      }
    }

    const http = new Server('/', {

    })
    const reviews = document.querySelector('#reviews')
    const wrapperForReviews = document.querySelector('.reviews-body__wrapper')
    reviews.addEventListener('click', async (e) => {
      if (e.target.id) {
        e.preventDefault()
        let body = new FormData(document.getElementById('add-reviews'))
        body.append('operation', 'add')
        try {
          const review = await http.post('api-reviews', body)
          if (review.result === 'ok') {
            document.querySelector('.message').classList.add('hiden')
            const rev = renderReview(review)
            insertReview(wrapperForReviews, rev)
          } else {
            document.querySelector('.message').classList.remove('hiden')
          }
        } catch (e) {
          console.log(e)
        }
      }
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
        const rev = reviews.querySelector(`p[data-rev="${id}"]`)
        let body = new FormData()
        body.append('operation', 'edit')
        body.append('id', id)
        body.append('review', text.value)
        try {
          const result = await http.post('api-reviews', body)
          rev.innerHTML = text.value
          el.classList.toggle('hiden')
          text.classList.toggle('hiden')
          parenet.querySelector('.review_edit').classList.toggle('hiden')
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
          const  result = await http.post('api-reviews', body)
          reviews.querySelector(`form[data-form="${id}"]`).classList.toggle('hiden')
        } catch (e) {
          console.log(e)
        }

      }
    })

    function insertReview(container, review) {
      container.insertAdjacentHTML('afterbegin', review)
    }

    function renderReview({
      img_small,
      link_network,
      user,
      review,
      id
    }) {
      return `
      <form class="reviews-body__review" data-form="${id}">
              <div class="user">
                <div class="nick">
                  <img src="${img_small}" alt="user-image" />
                  <a href="${link_network}"> ${user} </a>
                </div>
                <p data-rev="${id}" class="review">${review}w</p>
                <textarea class="edit_review hiden" type="text" name="edit_review"data-text="${id}"> ${review}</textarea>
              </div>        
              <div class="edit" data-parent="${id}">
                <button class="review_edit" data-edit="${id}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <button class="hiden review_save" data-save="${id}"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                <button class="review_del" data-del="${id}"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </div>
          </form>
      `
    }
  </script>-->
</section>