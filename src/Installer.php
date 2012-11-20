<?php

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller {

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package) {
        return '.';
    }

    /**
     * {@inheritDoc}
     */
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package) {

        parent::install();

        @rmdir('src');

    }

}
