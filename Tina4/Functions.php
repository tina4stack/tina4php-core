<?php

/**
 * Tina4 - This is not a 4ramework.
 * Copy-right 2007 - current Tina4
 * License: MIT https://opensource.org/licenses/MIT
 */

namespace Tina4;


//Get the sub folders etc using the data class
(new Data());

/**
 * Initialize function loads the library for use
 */
function Initialize(): void
{
    if (defined("TINA4_PROJECT_ROOT") && file_exists(TINA4_PROJECT_ROOT. DIRECTORY_SEPARATOR. "tina4php". DIRECTORY_SEPARATOR. "Tina4". DIRECTORY_SEPARATOR ."Initialize.php")) {
        require_once TINA4_PROJECT_ROOT. DIRECTORY_SEPARATOR. "tina4php". DIRECTORY_SEPARATOR. "Tina4". DIRECTORY_SEPARATOR ."Initialize.php";
    } else {
        require_once __DIR__."/Initialize.php";
    }
}
