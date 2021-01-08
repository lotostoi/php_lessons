<?php
function portfolio($action)
{
    $params['layout'] = 'layouts/main';
    $params['admin'] = isAccessUser();
    $params['tags'] = get_assoc_result("SELECT name FROM " . TAGS);
    $params['user'] = getUser()['login'];
    switch ($action) {
        case 'get':
            $params['page'] = 'portfolio/portfolio';
            $params['catalog'] = getCatalog();      
            break;
        case 'add':
            blockedPage();
            $params['page'] = 'admin/portfolio/add-work';
            $params['errors'] = $_POST['errors'];
            addWork();
            break;
        case 'edit':
            blockedPage();
            $work = getWork();
            $params['page'] = 'admin/portfolio/edit-work';
            $params['errors'] = $_POST['errors'];
            $params['checked'] = getCheckedTags();
            $params['work'] = $work;
            editWork($work);
            break;
        case 'delete':
            blockedPage();
            deleteWork();
            break;
    }
    return $params;
}
