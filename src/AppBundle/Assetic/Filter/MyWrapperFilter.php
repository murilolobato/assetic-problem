<?php

namespace AppBundle\Assetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

class MyWrapperFilter implements FilterInterface
{
    protected $twigEngine;

    // If I comment this entire constructor out, it works.
    public function __construct(TwigEngine $twigEngine)
    {
        $this->twigEngine = $twigEngine;
    }

    /**
     * Filters an asset after it has been loaded.
     *
     * @param AssetInterface $asset An asset
     */
    public function filterLoad(AssetInterface $asset)
    {

    }

    /**
     * Filters an asset just before it's dumped.
     *
     * @param AssetInterface $asset An asset
     */
    public function filterDump(AssetInterface $asset)
    {
        $assetContent = $asset->getContent();

        $asset->setContent('/*foo start*/'.$assetContent.'/*bar end*/');
    }
}