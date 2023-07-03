<?php

/**
 * Tina4 - This is not a 4ramework.
 * Copy-right 2007 - current Tina4
 * License: MIT https://opensource.org/licenses/MIT
 */

namespace Tina4;
/**
 * Initialize function loads the library for use
 */
function Initialize(): void
{
    if (file_exists("./Tina4/Initialize.php")) {
        require_once "./Tina4/Initialize.php";
    } else {
        require_once __DIR__."/Initialize.php";
    }
}
