<?php

namespace Drupal\Tests\orange_ecom\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the basic install.
 *
 * @group orange_ecom
 */
class OrangeEcomTest extends BrowserTestBase {

    protected $profile = 'orange_ecom';

    /**
     * Tests pages exist.
     */
    public function testOrangeEcomPages() {
        $this->drupalGet('livecss');
        $this->assertSession()->statusCodeEquals(200);
    }

}
