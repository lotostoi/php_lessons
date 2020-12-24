<form method="POST" class = "calculator">
    <p> Введите две цифры и выберите операцию. </p>
    <div class="container">
        <input type="text" name="firstNumber" value="<?= $x ?>">
        <select name="operation">
            <option <?= set_atr_selected($_POST['operation'], '+') ?> value="+">+</option>
            <option <?= set_atr_selected($_POST['operation'], '-') ?> value="-">-</option>
            <option <?= set_atr_selected($_POST['operation'], '*') ?> value="*">*</option>
            <option <?= set_atr_selected($_POST['operation'], '/') ?> value="/">/</option>
        </select>
        <input type="text" name="secondNumber" value="<?= $y ?>">
        <input type="submit" name="calc_select" value="Выполнить операцию">
        <hr>
        <?php
        if ($result !== null) : ?>
            <p> Результат : <span><?= $result ?></span> </p>
        <?php
        endif;
        ?>
    </div>
</form>