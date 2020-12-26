<div class="reviews">
    <form action="" class="reviews__form" id="reviews">
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

    <div class="reviews__wrapper">
        <?php foreach ($reviews as $review) : ?>
            <div class="reviews__review">
                <div class="user">
                    <p>User's name: <span><?= $review['user'] ?></span></p>
                    <p class="review" data-id="<?= $review['id'] ?>"><?= $review['review'] ?></p>
                    <textarea class="edit_review" style="display:none" type="text" name="edit_review" data-review="<?= $review['id'] ?>"><?= $review['review'] ?></textarea>
                </div>
                <div class="edit">
                    <button class='review_edit' data-edit="<?= $review['id'] ?>"> Edit</button>
                    <button style="display:none" class='save_review' data-save="<?= $review['id'] ?>"> Save</button>
                    <button class='review_del' data-id="<?= $review['id'] ?>">X</button>
                </div>
            </div>

        <?php endforeach; ?>
    </div>


</div>

<script>
    const form = document.querySelector('form')
    const reviews = document.querySelector('.reviews__wrapper')
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
           <div class="reviews__review">
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
</script>