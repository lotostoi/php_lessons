<?php

function sentReviews($reviews)
{
    echo json_encode([
        'result' =>  'ok',
    ]);
}


function review_control()
{
    if (!empty($_POST['operation'])) {
        header("Location: /api-reviews?operation=" . $_POST['operation'] . "&review=" . $_POST['review']);
    }
}
