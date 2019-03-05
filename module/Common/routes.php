<?php

Route::get('{module}/doc/{name}', DocHandler::class);
Route::get('{module}/log', LogHandler::class);
