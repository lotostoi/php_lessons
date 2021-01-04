<section class="reviews wrapper">
  <div class="reviews-header__fone">
    <div class="reviews-header__cont">
      <h1 class="reviews-header__h1">Отзывы_</h1>
      <div class="reviews-header__description">
        В данном разделе вы можете оставить отзыв обо мне и некоторых моих работах_
      </div>
    </div>
  </div>
  <div class="reviews-body">
    <div>
      <?php if ($user) : ?>
        <form class="reviews-body__form" id="add-reviews" method="POST">
          <label>
            <span>
              Напишите отзыв:
            </span>
            <textarea type="text" name="review" placeholder="Вашь отзыв" v-model="text"></textarea>
          </label>
          <?php if ($empty) : ?>
            <p class="message">Отзыв не может быть пусты...</p>
          <?php endif; ?>
          <input type="hidden" name="operation" value="add">
          <button type="submit">Добавить отзыв</button>
        </form>
      <?php else : ?>
        <div class="reviews-body__enter">
          <p class="title">Что бы оставить отзыв необходимо авторизироваться:</p>
          <div class="social-network">
            <div class="list">
              <a href="/api-auth-vk?start=1"><i class="fa fa-vk" aria-hidden="true"></i></a>
              <a href="/api-auth-fb?start=1"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="reviews-body__wrapper">
        <?php foreach ($reviews as $review) : ?>
          <form class="reviews-body__review" :key="review.id">
            <div class="user">
              <div class="nick">
                <img src=" <?= $review['img_small'] ?>" alt="user-image" />
                <a href="<?= $review['link_to_sosial_network'] ?>">
                  <?= $review['user'] ?>
                </a>
              </div>
              <p class="review"><?= $review['review'] ?></p>
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
  </script> -->
</section>