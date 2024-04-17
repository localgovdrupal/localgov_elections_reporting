<?php

declare(strict_types=1);

namespace Drupal\Tests\localgov_elections_reporting\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test description.
 *
 * @group localgov_elections_reporting
 */
final class ExampleTest extends BrowserTestBase
{

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected $strictConfigSchema = FALSE;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
      'localgov_elections_reporting',
      'elections_test_provider'
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void
  {
    parent::setUp();
  }

  /**
   * Test callback.
   */
  public function testAccess(): void
  {
    $admin_user = $this->drupalCreateUser(['administer boundary_source']);
    $this->drupalLogin($admin_user);
    $this->drupalGet('/admin/structure/boundary-source');
    $this->assertSession()->statusCodeEquals(200);

    $this->drupalLogout();
    $this->drupalGet('/admin/structure/boundary-source');
    $this->assertSession()->statusCodeEquals(403);
  }

  public function testPluginListing(): void
  {
    $storage = $this->container->get('entity_type.manager')->getStorage('boundary_source');
    $entity = $storage->create([
      'id' => "cumberland",
      'label' => "Cumberland",
      'description' => "",
      'status' => TRUE,
      'plugin'=> "elections_test_provider",
      'settings' => [
          'option' => 'test_val'
      ]
    ]);
    $entity->save();

    $entities = $storage->loadByProperties([]);
    $cumberland = $entities['cumberland'];
    $this->assertTrue($cumberland->id() == "cumberland");

    $admin_user = $this->drupalCreateUser(['administer boundary_source']);
    $this->drupalLogin($admin_user);
    $this->drupalGet('/admin/structure/boundary-source');
    $this->assertSession()->pageTextContains("Cumberland");
  }

}
