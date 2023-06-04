<?php

namespace Consumer\Service;

use PhpPact\Consumer\InteractionBuilder;
use PhpPact\Consumer\Matcher\Matcher;
use PhpPact\Consumer\Model\ConsumerRequest;
use PhpPact\Consumer\Model\ProviderResponse;
use PhpPact\Standalone\MockService\MockServerEnvConfig;
use PHPUnit\Framework\TestCase;
use PhpPact\Standalone\MockService\MockServerConfig;
use PhpPact\Standalone\MockService\MockServer;
use PhpPact\Consumer\ConsumerBuilder;

class ConsumerServiceHelloTest extends TestCase
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
		// Configure the Pact mock server settings
		$config->setHost('localhost');
		$config->setPort(8000);
		$config->setConsumer('Course');
		$config->setProvider('User');

		// Create and start the Pact mock server
		self::$pactMockServer = new MockServer($config);
		self::$pactMockServer->start();
	}

	public static function tearDownAfterClass(): void
	{
		// Stop the Pact mock server
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
				'list' => $matcher->eachLike([
					'id' => 1,
					'study_program_id' => 1,
					'creator_user_id' => 1,
					'name' => 'Pemrograman Web Lanjut',
					'code' => 'A123',
					'course_credit' => 3,
					'lab_credit' => 1,
					'type' => 'mandatory',
					'short_description' => 'Pemrograman Web tingkat Lanjut',
					'minimal_requirement' => 'Pemrograman Web',
					'study_material' => 'laravel',
					'learning_media' => 'slack',
				])
			]);

		// Create a configuration that reflects the server that was started. You can create a custom MockServerConfigInterface if needed.
		$config  = new MockServerEnvConfig();
		$builder = new InteractionBuilder($config);
		$builder
			->uponReceiving('A Get request to /course')
			->with($request)
			->willRespondWith($response); // This has to be last. This is what makes an API request to the Mock Server to set the interaction.

		$service = new HttpClientService($config->getBaseUri()); // Pass in the URL to the Mock Server.
		$result  = $service->getHelloString('Bob'); // Make the real API request against the Mock Server.

		$builder->verify(); // This will verify that the interactions took place.

		$this->assertEquals('Succesfully create course', $result); // Make your assertions.
	}
}
