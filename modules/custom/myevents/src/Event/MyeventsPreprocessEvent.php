<?php
namespace Drupal\myevents\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event firing on page and html preprocesses.
 */
class MyeventsPreprocessEvent extends Event {

  /**
   * Called during hook_preprocess_html().
   */
  const PREPROCESS_HTML = 'myevents.frontpage.preprocess_html';

  /**
   * Called during hook_preprocess_page().
   */
  const PREPROCESS_PAGE = 'myevents.frontpage.preprocess_page';

  /**
   * Variables from preprocess.
   */
  protected $variables;

  /**
   * MyeventsFrontpageEvent constructor.
   */
  public function __construct($variables) {
    $this->variables = $variables;
  }

  /**
   * Returns variables array from preprocess.
   */
  public function getVariables() {
    return $this->variables;
  }

}
