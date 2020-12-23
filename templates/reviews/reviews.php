<div class="reviews">
    <form action="" class="reviews__form" id="reviews">
        <label for="login">
            <span>
                Input login:
            </span>
            <input type="text" id="login" name="user" placeholder="Your name">
        </label>
        <label for="login">
            <span>
                Input reviews:
            </span>
            <input type="text" id="login" name="review" placeholder="Your name">
        </label>
        <button type="submit"> Add reviews </button>
    </form>

    <div class="reviews__wrapper">
        <?php foreach ($reviews as $review) : ?>
            <div class="reviews__review">
                <div class="user">
                    <b>User's name: </b>
                    <span><?= $review['user'] ?></span>
                </div>
                <div class="edit">
                    <button class='edit'> Edit</button>
                    <button class='review_del' data-id="<?= $review['id'] ?>">X</button>
                </div>
            </div>
            <p class="review"><?= $review['review'] ?></p>
        <?php endforeach; ?>
    </div>
</div>

<script>
    const form = document.querySelector('form')
    const reviews = document.querySelector('.reviews__wrapper')
    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        let body = new FormData(form)
        body.append('operation', 'add')
        let res = await fetch('./apireviews', {
            method: 'POST',
            body
        })
        res = await res.json()

        switch (res.res) {
            case 'ok':
                document.location.reload()
                break
        }
    })
    reviews.addEventListener('click', async (e) => {
        if (e.target.className === 'review_del') {
            let body = new FormData()
            body.append('operation', 'delete')
            body.append('id', e.target.dataset.id)
            let res = await fetch('./apireviews', {
                method: 'POST',
                body

            })
            res = await res.json()

            switch (res.result) {
                case 'ok':
                    document.location.reload()
                    break
            }
        }



    })
</script>