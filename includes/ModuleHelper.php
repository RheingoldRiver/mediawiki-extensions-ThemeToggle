<?php
namespace MediaWiki\Extension\Ark\ThemeToggle;

use Config;
use ResourceLoader;
use ResourceLoaderContext;
use ResourceLoaderFileModule;

class ModuleHelper {
    public static function getSwitcherModuleId(): ?string {
        global $wgThemeToggleSwitcherStyle;
        switch ( $wgThemeToggleSwitcherStyle ) {
            case 'auto':
                return ( count( ThemeDefinitions::get()->getIds() ) <= 2 ) ? 'ext.themes.simpleSwitcher'
                    : 'ext.themes.dropdownSwitcher';
            case 'simple':
                return 'ext.themes.simpleSwitcher';
            case 'dropdown':
                return 'ext.themes.dropdownSwitcher';
        }
        return null;
    }

    public static function getCoreJsNameToInject(): string {
        global $wgThemeToggleDisableAutoDetection;
        if ( $wgThemeToggleDisableAutoDetection ) {
            return 'noAuto';
        }
        return 'withAuto';
    }

    /**
     * Returns the script to be added into the document head.
     * 
     * As themes can be managed via MediaWiki:Theme-definitions, do NOT use dark or light to decide if the auto-supporting
     * payload is best. This should be manually controlled because of cache constraints.
     */
    private function getCoreJsToInject(): string {
        global $wgThemeToggleDisableAutoDetection;
        if ( $wgThemeToggleDisableAutoDetection ) {
            return InlineJsConstants::NO_AUTO;
        }
        return InlineJsConstants::WITH_AUTO;
    }
}