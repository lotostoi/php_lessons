<section class="reviews wrapper" id="contats">
    <div class="reviews-header__fone">
      <div class="reviews-header__cont">
        <h1 class="reviews-header__h1">Отзывы_</h1>
        <div class="reviews-header__description">
          В данном разделе вы можете оставить отзыв обо мне и некоторых моих работах_
        </div>
      </div>
    </div>
    <div class="reviews-body">
      <form action="" class="reviews-body__form" id="reviews">
        <label>
          <span>
            Input login:
          </span>
          <input type="text" id="login" name="user" placeholder="Your name">
        </label>
        <label>
          <span>
            Input review:
          </span>
          <textarea type="text" name="review" placeholder="Your review"></textarea>
        </label>
        <p style="display: none; color: red;" class="message">Login or review are empty!</p>
        <button type="submit"> Add reviews </button>
      </form>
      <div class="reviews-body__wrapper">
        <?php foreach ($reviews as $review) : ?>
        <div class="reviews-body__review">
          <div class="user">
            <p>User's name: <span><?= $review['user'] ?></span></p>
            <p class="review" data-id="<?= $review['id'] ?>"><?= $review['review'] ?></p>
            <textarea class="edit_review" style="display:none" type="text" name="edit_review"
              data-review="<?= $review['id'] ?>"><?= $review['review'] ?></textarea>
          </div>
          <div class="edit">
            <button class='review_edit' data-edit="<?= $review['id'] ?>"> Edit</button>
            <button style="display:none" class='save_review' data-save="<?= $review['id'] ?>"> Save</button>
            <button class='review_del' data-id="<?= $review['id'] ?>">X</button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
  </section>