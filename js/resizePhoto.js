window.onload = () => {
    let img = document.querySelector('.bigimg');

    let params = new FormData();

    params.append('id', `${img.src}`);

    fetch(`getSizeImg.php`, { // запрашиваем у сервера реальный размер картинки
            method: 'POST', // и адаптируем его в соответсвии размером
            body: params // области просмотра
        })
        .then(data => data.json())
        .then(data => {

            let k = data.width / data.height

            if (data.height > (document.querySelector('.contPhoto').offsetHeight)) {
                let height = document.querySelector('.contPhoto').offsetHeight * 85 / 100
                let width = k * height
                img.style.height = `${height}px`
                img.style.width = `${width}px`
            } else if (data.width > (document.querySelector('.contPhoto').offsetWidth)) {
                let width = document.querySelector('.contPhoto').offsetWidth * 85 / 100
                let height = width / k
                img.style.height = `${height}px`
                img.style.width = `${width}px`
            } else {
                img.style.height = `${data.height}px`
                img.style.width = `${data.width}px`
            }


        })
}