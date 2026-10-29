<?php
declare(strict_types=1);

// SPDX-License-Identifier: AGPL-3.0-or-later
namespace OCA\RudeskExample\Listener;

use OCP\App\IAppManager;
use OCP\AppFramework\Http\Events\BeforeTemplateRenderedEvent;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;
use OCP\L10N\IFactory;
use OCP\Util;

/** @implements IEventListener<BeforeTemplateRenderedEvent> */
class TablesListener implements IEventListener {
    public function __construct(private IAppManager $apps, private IFactory $l10n) {
    }

    public function handle(Event $event): void {
        if (!$event instanceof BeforeTemplateRenderedEvent) {
            return;
        }
        try {
            $response = $event->getResponse();
            if (!$event->isLoggedIn()
                || $response->getApp() !== 'tables'
                || $response->getTemplateName() !== 'main'
                || $this->apps->getAppVersion('tables') !== '2.3.2'
                || $this->l10n->get('tables')->getLanguageCode() !== 'ru') {
                return;
            }
            Util::addInitScript('rudesk_example', 'example-l10n');
        } catch (\Throwable) {
            // Ошибка примера не должна мешать открытию страницы.
            return;
        }
    }
}
