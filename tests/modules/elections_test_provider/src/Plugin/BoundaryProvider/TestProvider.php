<?php declare(strict_types=1);

namespace Drupal\elections_test_provider\Plugin\BoundaryProvider;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\localgov_elections_reporting\BoundaryProviderPluginBase;
use Drupal\localgov_elections_reporting\BoundarySourceInterface;
use Drupal\paragraphs\Entity\Paragraph;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the boundary_provider.
 *
 * @BoundaryProvider(
 *   id = "elections_test_provider",
 *   label = @Translation("Test provider"),
 *   description = @Translation("Test provider."),
 *   form = {
 *      "download" = "Drupal\elections_test_provider\Form\TestProviderForm",
 *    }
 * )
 */
class TestProvider extends BoundaryProviderPluginBase
{

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function isConfigurable()
  {
    return TRUE;
  }


  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state)
  {
    $form['option'] = [
        '#type' => 'textfield',
        '#title' => "Configure me",
        "#required" => TRUE,
        "#default_value"=> $this->configuration['option'] ?? ""
    ];
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function createBoundaries(BoundarySourceInterface $entity, array $form_values)
  {
    \Drupal::messenger()->addMessage("heya");
    \Drupal::messenger()->addMessage($form_values['plugin']['config']['option']);
  }

  /**
   * {@inheritdoc }
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state)
  {

  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state)
  {

  }

}
