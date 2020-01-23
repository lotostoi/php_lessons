let elements = $('.modal-overlay, .modal');

document.querySelector('.galary').addEventListener('click', function (evt) {

    if (evt.target.dataset['id']) {

        let params = new FormData();

        params.append('id', `${evt.target.dataset['id'] + ".jpg"}`);

        fetch(`server.php`, { // запрашиваем у сервера реальный размер картинки
                method: 'POST', // и адаптируем его в соответсвии размером 
                body: params // области просмотра
            })
            .then(data => data.json())
            .then(data => {
                let k = data.width / data.height
                if (data.height > ($(window).height() * 90 / 100)) {
                    let height = $(window).height() * 90 / 100
                    let width = k * height
                    $('.big').attr("height", `${height}`)
                    $('.big').attr("width", `${width}`)
                    $('.modal').attr("style", `height: ${+height + 10}px; width: ${+width + 10}px;`)
                } else {
                    $('.big').attr("height", `${data.height}`)
                    $('.big').attr("width", `${data.width}`)
                    $('.modal').attr("style", `height: ${+data.height + 10}px; width: ${+data.width + 10}px;`)
                }
                $('.big').attr("src", `./bImg/${evt.target.dataset['id']}.jpg `)
                elements.addClass('active');
                $('.close-modal').click(function () {
                    elements.removeClass('active');
                  //  location.reload();
                });
                document.querySelector('.quant').innerHTML = `Количество просмотров: ${data.quant}`
            })
    }
})

document.querySelector('.menudb').addEventListener('click', (evt) => {

    if (evt.target.className == 'creatDb') {
        let params = new FormData();
        params.append('creatDb', '1')
        fetch('db.php', {
                method: 'POST',
                body: params

            })
            .then(function (response) {
                if (response.status == 200) {
                    location.reload()
                    return;
                }
            })
    }
    if (evt.target.className == 'dellAll') {
        // console.log('test')
        let params = new FormData();
        params.append('dellAll', '1')
        fetch('db.php', {
                method: 'POST',
                body: params
            })
            .then((response) => {
                if (response.status == 200) {
                    location.reload()
                    return;
                }
            })
    }

})