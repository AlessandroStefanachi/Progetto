<?php

function my_autoloader($className) {

    switch ($className[0]) {
        case 'E':
            include_once('Entity/'. $className . '.php' );
            break;

        case 'F':
            include_once('Foundation/'. $className . '.php' );
            break;

        case 'V':
            include_once('View/'. $className . '.php' );
            break;

        case 'C':
            include_once('Controller/'. $className . '.php' );
            break;
        case 'S':
            break;
        default:
            include_once( $className . '.php' );
            break;
    }

}

spl_autoload_register('my_autoloader');