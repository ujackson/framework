<?php

namespace AvoRed\Framework\Listeners\System;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use AvoRed\Framework\Models\Contracts\ConfigurationInterface;
use AvoRed\Framework\Models\Database\MultiStore;

class ConfigurationSaveListener
{

    /**
     * Configuration Repository
     * @var \AvoRed\Framework\Models\Repository\ConfigurationRepository
     */
    protected $configurationRepository;

    /**
     * Create the Configuration Event listener.
     * @param \AvoRed\Framework\Models\Repository\ConfigurationRepository $configurationRepository
     * @return void
     */
    public function __construct(ConfigurationInterface $configurationRepository)
    {
        $this->configurationRepository = $configurationRepository;
    }

    /**
     * Handle the Configuration After Save Event Listener.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $value = $this
            ->configurationRepository
            ->getValueByKey('multi_stores_enabled');

        if ($value) {
            MultiStore::enable();
        }
        else {
            MultiStore::disable();
        }
    }
}
