<?php

declare(strict_types=1);

return [
    'Terminology' => \DI\create('\Boatrace\Venture\Project\Terminology')->constructor(
        \DI\get('MainTerminology')
    ),
    'MainTerminology' => function ($container) {
        return $container->get('\Boatrace\Venture\Project\MainTerminology');
    },
];
