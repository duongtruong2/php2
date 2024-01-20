<?php
require_once "./env.php";
require_once "./config.php";
require_once __DIR__ . "/vendor/autoload.php";

use App\Models\BaseModel;
use App\Models\ProductModel;

dd(ProductModel::all());