<?php

namespace Main\Libraries;

use Main\Classes\MediaLibrary;

/**
 * MediaManager Class
 *
 * @deprecated replaced with \Main\Libraries\MediaLibrary
 */
class MediaManager extends MediaLibrary
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        traceLog('MediaManager Main\Libraries\MediaManager has been deprecated, use '.MediaLibrary::class.' instead.');
    }
}
