<?php

namespace AvoRed\Framework\Events\System;

use Illuminate\Queue\SerializesModels;
use AvoRed\Framework\Models\Database\Product;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ConfigurationAfterSave
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
