<?php

test(
    'can get index (home) page', function () {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
);
