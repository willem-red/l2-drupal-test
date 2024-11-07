<?php

namespace Drupal\l2_cases\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Provides a REST resource for Case nodes.
 *
 * @RestResource(
 *   id = "case_resource",
 *   label = @Translation("Case Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/cases"
 *   }
 * )
 */
class CaseResource extends ResourceBase {

  public function get() {
    $query = \Drupal::entityTypeManager()->getStorage('node')->getQuery();
    $query->condition('type', 'case')
      ->condition('status', 1);
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    $cases = [];
    foreach ($nodes as $node) {
      $cases[] = [
        'title' => $node->label(),
        'description' => $node->get('field_description')->value,
        'image' => $node->get('field_image')->entity->url(),
      ];
    }

    return new JsonResponse($cases);
  }
}
