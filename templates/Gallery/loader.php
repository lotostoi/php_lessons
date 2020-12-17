<?php 
if (!empty($_POST['files'])) {
    
}

?>

<div class="loader">
    <form  method="POST" class="loader__form">
        <input type="file" name="files[]" id="files"  required multiple enctype='multipart/form-data'>>
        <button type="submit">Add images</button>
    </form>
</div>