let file = document.querySelector('#file')
let form = document.querySelector('.addpicture')

/* document.querySelector('input[type=submit]').addEventListener('click', (e) => {

    e.preventDefault();

    fetch('index.php', {
            method: 'post',
            body: new FormData(form)
        })
        .then(() => { form.reset() })
        .then(() => {
            location.reload()
        })

}) */

file.addEventListener('change', () => {

    console.log(file.files[1])

    document.querySelector(`input[type='submit']`).style.display = 'block'
    let arr = file.files



    for (let i = 0; i < arr.length; i++) {
        if (i != arr.length - 1) {
            document.querySelector('#link').innerHTML += arr[i].name + ", "

        } else {
            document.querySelector('#link').innerHTML += arr[i].name

        }

    }


})