<?php

namespace GiveInitiatives\Library;

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return plugins_url( '/public/' . $asset, dirname( __DIR__ ) . '/give_initiatives.php' );
}
