<?php
namespace Drupal\myevents\EventSubscriber;

use Drupal\myevents\Event\MyeventsPreprocessEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Myevents event subscriber.
 */
class MyeventsSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      MyeventsPreprocessEvent::PREPROCESS_HTML => ['preprocessHtml', 100],
      MyeventsPreprocessEvent::PREPROCESS_PAGE => ['preprocessPage'],
    ];
  }

  /**
   * Example for MyeventsFrontpageEvent::PREPROCESS_HTML.
   */
  public function preprocessHtml(MyeventsPreprocessEvent $event) {
    /** @var \Drupal\Core\Messenger\MessengerInterface $messenger */
    $messenger = \Drupal::service('messenger');
    $messenger->addMessage('Event for preprocess HTML called');
  }

  /**
   * Example for MyeventsFrontpageEvent::PREPROCESS_HTML.
   */
  public function preprocessPage(MyeventsPreprocessEvent $event) {
    /** @var \Drupal\Core\Messenger\MessengerInterface $messenger */
    $messenger = \Drupal::service('messenger');
    $variables = $event->getVariables();
    $sidebars_found = 0;
    foreach ($variables['page'] as $key => $value) {
      if (preg_match("/sidebar_(.+)/", $key)) {
        $sidebars_found++;
      }
    }
    $messenger->addMessage("Found {$sidebars_found} sidebar(s) on the page");
    // Stop further execution.
    $event->stopPropagation();
  }

}
