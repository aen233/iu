<?php

Route::get('{modules}/doc/{name}', DocHandler::class);
Route::get('{modules}/log', LogHandler::class);
