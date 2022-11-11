<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    private KernelBrowser|null $client = null;

    /*public function setUp(): void
    {
        $this->client = static::createClient();
    }*/
     public function testSomething(): void
     {
         //$client = static::createClient();
         $crawler = $this->client->request('GET', '/');
         $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
     }

     public function testCreateActionRedirect()
     {
         //$urlGenerator = $this->client->getContainer()->get('router.default');
         $client = static::createClient();
         $crawler = $client->request('GET', '/tasks/create');
        $this->assertResponseIsSuccessful();
         /*$crawler = $this->client->request(Request::METHOD_GET, $urlGenerator->generate('task_create'));
         dd($crawler);
         $form = $crawler->selectButton('Ajouter')->form();
         dd($form);
         $form['task[title]'] = 'title';
         $form['task[content]'] = 'content';
         echo $this->client->getResponse()->getContent();*/
     }
}

public function testVisitingWhileLoggedIn()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);

        // retrieve the test user
        $testUser = $userRepository->findOneByEmail('john.doe@example.com');

        // simulate $testUser being logged in
        $client->loginUser($testUser);

        // test e.g. the profile page
        $client->request('GET', '/profile');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello John!');
    }

/*

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;

class TaskControllerTest extends TestCase
{
    public function testListAction(): void
    {
        $this->assertTrue(true);
    }

    public function testCreateActionRedirect()
    {

    }

    public function testCreateActionRender()
    {

    }

    public function testEditActionRedirect()
    {

    }

    public function testEditActionRender()
    {

    }

    public function testToggleTaskAction()
    {

    }

    public function testDeleteTaskActionRedirectOk()
    {

    }

    public function testDeleteTaskActionRedirectNotOk()
    {

    }
}*/
