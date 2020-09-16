<?php

namespace Drupal\module_hero;

use Drupal\Core\Entity\Query\QueryFactory;
use  Drupal\Core\Entity\EntityManager;

/**
 * Our hero article service class.
 */
class HeroArticleService {

  private $entityQuery;
  private $entityManager;

  public function __construct(QueryFactory $entityQuery, EntityManager $entityManager) {
    $this->entityQuery = $entityQuery;
    $this->entityManager = $entityManager;
  }

  /**
   * Methood for getting Articles, regarding heroes.
   */
  public function getHeroArticles() {
    $articleNids = $this->entityQuery->get('node')->condition('type', 'article')->execute();

    return $this->entityManager->getStorage('node')->loadMultiple($articleNids);
  }
}
