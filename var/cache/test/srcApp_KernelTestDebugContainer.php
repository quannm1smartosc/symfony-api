<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCCVnDbY\srcApp_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCCVnDbY/srcApp_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerCCVnDbY.legacy');

    return;
}

if (!\class_exists(srcApp_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerCCVnDbY\srcApp_KernelTestDebugContainer::class, srcApp_KernelTestDebugContainer::class, false);
}

return new \ContainerCCVnDbY\srcApp_KernelTestDebugContainer([
    'container.build_hash' => 'CCVnDbY',
    'container.build_id' => '419abc94',
    'container.build_time' => 1632985821,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCCVnDbY');
