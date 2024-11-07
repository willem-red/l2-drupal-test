<?php

namespace Drupal\l2_cases\Controllers;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class L2CasesController extends ControllerBase {

  public function getCaseListPage() {
    $nodes = \Drupal::entityTypeManager()->getStorage('node')
      ->loadByProperties(['type' => 'case', 'status' => 1]);

    $items = [];
    foreach ($nodes as $node) {
      $items[] = [
        '#theme' => 'item',
        '#markup' => $node->toLink($node->label())->toString(),
      ];
    }

    return [
      '#theme' => 'item_list',
      '#items' => $items,
      '#title' => 'List of Cases',
    ];
  
  }
}
