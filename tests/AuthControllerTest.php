<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\AuthController;


class AuthControllerTest extends TestCase
{
    protected function setUp(): void
    {
        // Initialiser les objets nécessaires
    }

    protected function tearDown(): void
    {
        // Nettoyer les objets
    }

    public function testValidateCredentials()
    {
        $authController = new AuthController();

        // Tester avec des mots de passe valides
        $this->assertTrue($authController->validateCredentials('Abcd1234!@#$', 'Abcd1234!@#$'));

        // Tester avec des mots de passe invalides
        $this->assertFalse($authController->validateCredentials('weakpassword', 'weakpassword'));
        $this->assertFalse($authController->validateCredentials('Abcd1234!@#$', 'DifferentPassword'));
    }

    public function testGetOrSetPoint()
    {
        $authController = new AuthController();

        // Mock data for testing
        $zip = '12345';
        $city = 'TestCity';
        $latitude = '12.345';
        $longitude = '67.890';

        // Test getting an existing point
        $point = $authController->getOrSetPoint($zip, $city, $latitude, $longitude);
        $this->assertInstanceOf('App\Models\Point', $point);

        // Test getting a non-existing point (should create and return a new point)
        $point = $authController->getOrSetPoint('67890', 'NewCity', '34.567', '89.012');
        $this->assertInstanceOf('App\Models\Point', $point);
    }
    public function testValidatePicture()
    {
        $authController = new AuthController();

        // Mock the $_FILES superglobal for testing
        $_FILES['photo']['name'] = 'test.jpg';
        $_FILES['photo']['tmp_name'] = '/tmp/test.jpg';
        $_FILES['photo']['size'] = 1000000;

        // Test with valid picture
        $this->assertTrue($authController->validatePicture('test.jpg'));

        // Test with invalid picture extension
        $_FILES['photo']['name'] = 'test.txt';
        $this->assertFalse($authController->validatePicture('test.txt'));

        // Test with invalid picture size
        $_FILES['photo']['name'] = 'large.jpg';
        $_FILES['photo']['size'] = 2000000;
        $this->assertFalse($authController->validatePicture('large.jpg'));
    }

    public function testGetPointById()
    {
        $authController = new AuthController();

        // Test with existing point
        $point = $authController->getPointById('12345', 'TestCity', '12.345', '67.890');
        $this->assertInstanceOf('App\Models\Point', $point);

        // Test with non-existing point
        $point = $authController->getPointById('67890', 'NewCity', '34.567', '89.012');
        $this->assertFalse($point);
    }
    public function testInsertPoint()
    {
        $authController = new AuthController();

        // Mock data for testing
        $zip = '12345';
        $city = 'TestCity';
        $latitude = '12.345';
        $longitude = '67.890';

        // Test point insertion
        $this->expectNotToPerformAssertions();
        $authController->insertPoint($zip, $city, $latitude, $longitude);
    }
    public function testGetIdPoint()
    {
        $authController = new AuthController();

        // Test with existing point
        $point = $authController->getIdPoint('12345', 'TestCity', '12.345', '67.890');
        $this->assertInstanceOf('App\Models\Point', $point);

        // Test with non-existing point
        $point = $authController->getIdPoint('67890', 'NewCity', '34.567', '89.012');
        $this->assertFalse($point);
    }

    public function testValidateLatLon()
    {
        $authController = new AuthController();

        // Test with valid latitude and longitude
        $this->assertNull($authController->validateLatLon(12.345, 67.890));

        // Test with invalid latitude and longitude
        $this->expectExceptionMessage("l'adresse n'est pas valide");
        $authController->validateLatLon(-1, -1);
    }
}
