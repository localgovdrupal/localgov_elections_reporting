<?php declare(strict_types = 1);

namespace Drupal\localgov_elections_reporting;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a boundary source entity type.
 */
interface BoundarySourceInterface extends ConfigEntityInterface {

  /**
   * Get the plugin instance.
   *
   * @return mixed
   */
  public function getPlugin();

  /**
   * Get the plugin's settings.
   *
   * @return mixed
   */
  public function getSettings();

}
