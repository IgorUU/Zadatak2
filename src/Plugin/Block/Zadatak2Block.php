<?php

namespace Drupal\zadatak2\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 *
 * @Block(
 *   id = "zadatak2",
 *   admin_label = @Translation("Zadatak 2"),
 *   category = @Translation("Custom"),
 * )
 */

class Zadatak2Block extends BlockBase
{
  public function build()
  {
    $config = \Drupal::config('zadatak2.settings');
    $user = \Drupal::currentUser()->getAccountName();
    $poruka = str_replace('@username', $user, $config->get('Unos'));

    return [
      '#title' => $poruka
    ];
  }

  public function getCacheMaxAge()
  {
    return 0;
  }
}
