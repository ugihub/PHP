<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pegawai::index');
$routes->get('/pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->post('/simpan', 'Pegawai::simpan');
$routes->get('/pegawai/hapus/(:num)', 'Pegawai::hapus/$1');
