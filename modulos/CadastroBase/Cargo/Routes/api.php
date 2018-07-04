<?php

//Route::middleware('auth:api')->get('/api/cadastro-base/cargo', 'CargoController@consulta');
Route::get('/api/cadastro-base/cargo', 'CargoController@consulta');

Route::middleware('auth:api')->get('/api/cadastro-base/cargo/consulta/{CO_CADASTRO_BASE_CARGO}', 'CargoController@consultaCodigo');

Route::middleware('auth:api')->post('/api/cadastro-base/cargo/adicionar', 'CargoController@adicionar');

Route::middleware('auth:api')->post('/api/cadastro-base/cargo/alterar/{CO_CADASTRO_BASE_CARGO}', 'CargoController@alterar');

Route::middleware('auth:api')->delete('/api/cadastro-base/cargo/excluir/{CO_CADASTRO_BASE_CARGO}', 'CargoController@excluir');