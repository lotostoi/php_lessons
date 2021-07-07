<section class="common wrapper">
    <div class="common-header__fone">
        <div class="common-header__cont">
            <h1 class="common-header__h1">Редактировать фильтры_</h1>
        </div>
    </div>
    <div class="common-body">
        <div class="admin-filters">
            <p class="filters-message hiden" ></p>
            <p class="filters-error hiden" ></p>
            <div class="admin-filters__wrapper">
                <?php foreach ($tags as $tag) : ?>
                    <div class="filter" data-tag="<?= $tag['id'] ?>">
                        <input type="text" data-input="<?= $tag['id'] ?>" value="<?= $tag['name'] ?>">
                        <button data-save="<?= $tag['id'] ?>">Сохранить</button>
                        <button data-delete="<?= $tag['id'] ?>">Удалить</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="admin-filters__add">
                <form action="" method="POST" id="new-tag">
                    <input type="text" name="tag" id="admin-filters-tag" placeholder="новый фильтр">
                    <button id="add-tag" >Добавить</button>
                </form>
            </div>
        </div>
    </div>
    
<!--     <script>
        class $ {
            static el = (val, cont = document) => cont.querySelector(val)
            static all = (val, cont = document) => cont.querySelectorAll(val)
        }

        async function setMessage(message, value) {
            message.innerHTML = value
            message.classList.remove('hiden')
            await _await(3000)
            message.classList.add('hiden')
            message.innerHTML = ''
        }

        const _await = (time) =>
            new Promise((res) => {
                setTimeout(() => res(), time)
            })
        class Server {
            constructor(baseURL, options) {
                this.baseURL = baseURL
                this.options = options
            }
            _creatFromData(body) {
                const newBody = new FormData()
                if (typeof body === 'array') {
                    body.forEach((param) => newBody.append(Object.keys(param)[0], param))
                }
                if (typeof body === 'object') {
                    for (const key in body) {
                        if (Object.hasOwnProperty.call(body, key)) {
                            const element = body[key]
                            newBody.append(key, element)
                        }
                    }
                }
                return newBody
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
            post(url, body, formData = null) {
                const newBody = formData ? this._creatFromData(body) : body
                let options = {
                    method: 'POST',
                    body: newBody instanceof FormData ? newBody : JSON.stringify(body),
                }
                return this._request(url, options)
            }
            put(url, body, formData = null) {
                const newBody = formData ? this._creatFromData(body) : body
                let options = {
                    method: 'PUT',
                    body: newBody instanceof FormData ? newBody : JSON.stringify(body),
                }
                return this._request(url, options)
            }
        }

        const http = new Server('/', {});

        (() => {
            const wrapper = $.el('.admin-filters')
            if (wrapper) {
                const addTag = $.el('#add-tag')
                const inputTag = $.el('#admin-filters-tag')
                const newTag = $.el('#new-tag')
                const errorMessage = $.el('.filters-error')
                const message = $.el('.filters-message')
                const containerForTags = $.el('.admin-filters__wrapper')
                const textError = `Ошибка при обращении к серверу. Потворите попытку позже...`
                wrapper.addEventListener('click', async (e) => {
                    const el = e.target
                    e.preventDefault()
                    if (el === addTag) {
                        try {
                            const body = new FormData(newTag)
                            body.append('action', 'add')
                            const {
                                result,
                                error,
                                id
                            } = await http.post('api-filter', body)
                            if (error) {
                                setMessage(errorMessage, error)
                                newTag.reset()
                            }
                            if (result) {
                                const tag = {
                                    id: id,
                                    name: inputTag.value,
                                }
                                containerForTags.insertAdjacentHTML('beforeEnd', renderTag(tag))
                                setMessage(message, `Tэг ${inputTag.value} успешно добавлен!`)
                                newTag.reset()
                            }
                        } catch (e) {
                            console.log(e)
                            setMessage(errorMessage, textError)
                        }
                    }
                    if (el.dataset.delete) {
                        const id = el.dataset.delete
                        const tag = $.el(`input[data-input="${id}"]`).value
                        try {
                            await http.get(`api-filter?id=${id}&action=delete`)
                            setMessage(message, `Тэг ${tag.value} успешно удален`)
                            $.el(`div[data-tag="${id}"]`).classList.add('hiden')
                        } catch (e) {
                            console.log(e)
                            setMessage(errorMessage, textError)
                        }
                    }
                    if (el.dataset.save) {
                        const id = el.dataset.save
                        const tag = $.el(`input[data-input="${id}"]`)
                        try {
                            await http.post(
                                `api-filter`, {
                                    id,
                                    tag: tag.value,
                                    action: 'edit',
                                },
                                true
                            )
                            setMessage(message, `Тэг ${tag.value} успешно изменен`)
                        } catch (e) {
                            console.log(e)
                            setMessage(errorMessage, textError)
                        }
                    }
                })
            }

            function renderTag({
                id,
                name
            }) {
                return `
                    <div class="filter" data-tag = "${id}">
                        <input type="text" data-input="${id}" value="${name}">
                        <button data-save="${id}">Сохранить</button>
                        <button data-delete="${id}">Удалить</button>
                    </div>
                `
            }
        })()
    </script> -->
</section>