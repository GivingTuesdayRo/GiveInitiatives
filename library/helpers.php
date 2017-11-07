<?php

namespace GiveInitiatives\Library;

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return plugin_dir_url( dirname(__DIR__).'give_initiatives.php' ) . '/public/'. $asset;
}
