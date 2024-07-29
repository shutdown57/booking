<?php

test(
    'tennis courts page is displayed',
    function () {
        $response = $this->get('/tennis-court');

        $response->assertStatus(200);
    }
);

test(
    'tennis court create page is displayed',
    function () {
        $response = $this->get('/tennis-court/create');

        $response->assertStatus(200);
    }
);

// test(
//     'can create a tennis court',
//     function () {
//         $response = $this->post('/tennis-court', [
//             'name' => 'court number 1',
//             'per_hour_rate' => 12,
//             'image' => null,
//         ]);
//
//         $response->assertStatus(201);
//     }
// );
