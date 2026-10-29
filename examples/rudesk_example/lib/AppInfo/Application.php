<?php
declare(strict_types=1);

// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\RudeskExample\AppInfo;

use OCA\RudeskExample\Listener\TablesListener;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\AppFramework\Http\Events\BeforeTemplateRenderedEvent;

class Application extends App implements IBootstrap {
    public function __construct() {
        parent::__construct('rudesk_example');
    }

    public function register(IRegistrationContext $context): void {
        $context->registerEventListener(BeforeTemplateRenderedEvent::class, TablesListener::class);
    }

    public function boot(IBootContext $context): void {
    }
}
