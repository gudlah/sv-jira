<?php

function res($kode, $data) {
    get_instance()
        ->output
        ->set_content_type('application/json')
        ->set_status_header($kode)
        ->set_output(json_encode($data));
}

function bodyPost() {
    return json_decode(file_get_contents('php://input'), true);
}
