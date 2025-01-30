<?php

/**
 * Lantmäteriet map module.
 */

declare(strict_types=1);

namespace Lantmateriet;

use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleMapProviderInterface;
use Fisharebest\Webtrees\Module\ModuleMapProviderTrait;

/**
 * Class Lantmateriet
 */
class Lantmateriet extends AbstractModule implements ModuleCustomInterface, ModuleMapProviderInterface
{
    use ModuleCustomTrait;
    use ModuleMapProviderTrait;

    public const CUSTOM_AUTHOR = 'Fredrik Ekdahl';
    public const CUSTOM_VERSION = '1.0.0';
    public const GITHUB_REPO = 'ekdahl/webtrees-lantmateriet';
    public const CUSTOM_SUPPORT_URL = 'https://github.com/ekdahl/webtrees-lantmateriet';
    public const CUSTOM_LATEST_VERSION = 'https://raw.githubusercontent.com/' . self::GITHUB_REPO . '/main/latest-version.txt';

    /**
     * Description of the map provider.
     *
     * @return string
     */
    public function description(): string
    {
        $link = '<a href="https://www.lantmateriet.se" dir="ltr">www.lantmateriet.se</a>';

        // I18N: %s is a link/URL
        return I18N::translate('Create maps using %s.', $link);
    }

    /**
     * Name of the map provider.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Lantmäteriet';
    }

    /**
     * Parameters to create a TileLayer in LeafletJs.
     *
     * @return array<object>
     */
    public function leafletJsTileLayers(): array
    {
        return [
            (object) [
                'attribution' => '<a href="https://www.lantmateriet.se">Lantmäteriet</a>',
                'default'     => true,
                'label'       => 'Karta',
                'maxZoom'     => 17,
                'minZoom'     => 2,
                'url'         => 'https://minkarta.lantmateriet.se/map/topowebbcache?layer=topowebb&style=default&tilematrixset=3857&Service=WMTS&Request=GetTile&Version=1.0.0&Format=image%2Fpng&TileMatrix={z}&TileCol={x}&TileRow={y}',
            ],
        ];
    }
}
