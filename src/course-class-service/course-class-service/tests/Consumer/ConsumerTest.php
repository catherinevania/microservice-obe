<?php

namespace Tests\Consumer;

use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Matcher\Matcher;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PHPUnit\Framework\TestCase;
use App\OutsideAPI\HttpClientService;
use PhpPact\Standalone\MockService\MockServerConfig;
use PhpPact\Standalone\MockService\MockServer;

class ConsumerTest extends TestCase
{
    /**
     * Example PACT test.
     *
     * @throws \Exception
     */
    protected static $pactMockServer;

	public static function setUpBeforeClass(): void
	{
		$config = new MockServerConfig();
		$config->setHost('localhost');
		$config->setPort(7200);
		$config->setConsumer('Course');
		$config->setProvider('User');

		self::$pactMockServer = new MockServer($config);
		self::$pactMockServer->start();
	}

	public static function tearDownAfterClass(): void
	{
		self::$pactMockServer->stop();
	}
     public function testGetHelloString()
    {
        $matcher = new Matcher();

        // Create your expected request from the consumer.
        $request = new ConsumerRequest();
        $request
            ->setMethod('GET')
            ->setPath('/api/course')
            ->addHeader('Content-Type', 'application/json');

        // Create your expected response from the provider.
        $response = new ProviderResponse();
        $response
            ->setStatus(200)
            ->addHeader('Content-Type', 'application/json')
            ->setBody([
                'message' => $matcher->eachLike([
                    'id' => 1,
                    'course_id' => 5,
                    'name' => 'Pemrograman Web Lanjut A',
                    'class_code' => 'PWL-A',
                    'thumbnail_img' => 'https://via.placeholder.com/640x480.png/000088?text=cats',
                    'creator_user_id' => 1,
                    'syllabus_id' => 1,
                ])
            ]);

        // Create a configuration that reflects the server that was started. You can create a custom MockServerConfigInterface if needed.
        $config  = new MockServerEnvConfig();
        $builder = new InteractionBuilder($config);
        $builder
            ->uponReceiving('A get request to /api/course')
            ->with($request)
            ->willRespondWith($response); // This has to be last. This is what makes an API request to the Mock Server to set the interaction.

        $service = new HttpClientService($config->getBaseUri()); // Pass in the URL to the Mock Server.
        $result  = $service->getHelloString('Course'); // Make the real API request against the Mock Server.

        $builder->verify(); // This will verify that the interactions took place.

        $this->assertEquals('Succesfully grabbed all course', $result); // Make your assertions.
    }
}
