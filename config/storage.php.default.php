<?php 
/**
 * This is your storage config file, you can have multiple configurations which
 * which you can switch between.
 *
 */
use Origin\Utility\Storage;

Storage::config(
    'default',[
        'engine' => 'Local'
        ]
    );
