<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/task/new');
        $this->assertResponseIsSuccessful();

        $buttonCrawlerNode = $crawler->selectButton('create-task-submit');
        $form = $buttonCrawlerNode->form();
        
        $client->submit($form, [
            'task[name]' => 'taskTest',
            'task[date][day]' => '1',
            'task[date][month]' => '1',
            'task[date][year]' => '2025'
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_SEE_OTHER);
    }
}
