<form id="form" class = "calculator">
    <p> Введите две цифры и выберите операцию. </p>
    <div class="container">
        <input type="text" name="firstNumber" value="0" style="width:50px;">
        <input type="text" name="secondNumber" value="0" style="width:50px;">
        <hr>
        <input type="submit" value="+" name="+">
        <input type="submit" value="-" name="-">
        <input type="submit" value="*" name="*">
        <input type="submit" value="/" name="/">
        <hr>
        <p id="message_result" style="display: none"> <b>Результат: </b> <span id="result"> <span> </p>
        <hr>
    </div>
</form>

<script>
    const from = document.getElementById('from')
    const message = document.getElementById('message_result')
    const res = document.getElementById('result')
    form.addEventListener('click', async (e) => {
        e.preventDefault()
        if (e.target.tagName === 'INPUT') {
            let data = new FormData(form)
            data.append('operation', e.target.name)
            let response = await fetch('./api-calculator', {
                method: "POST",
                body: data
            })
            let {
                result
            } = await response.json()
            if (result !== undefined) {
                message.style.display = "flex"
                res.innerHTML = result ;
            }
        }
    })
</script>