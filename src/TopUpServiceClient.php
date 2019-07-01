<?php
namespace TopUpService;

use TopUpService\Entity\TopUp;

class TopUpServiceClient
{
	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var string
	 */
	private $apiSecret;

	/**
	 * @var integer
	 */
	private $apiClientId;


	public function __construct(array $configuration)
	{
		$this->apiSecret   = $configuration['secret'];
		$this->apiKey      = $configuration['key'];
		$this->apiClientId = $configuration['client'];
	}

	/**
	 * @return string
	 */
	public function getApiKey()
	{
		return $this->apiKey;
	}

	/**
	 * @param string $apiKey
	 */
	public function setApiKey($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	/**
	 * @return string
	 */
	public function getApiSecret()
	{
		return $this->apiSecret;
	}

	/**
	 * @param string $apiSecret
	 */
	public function setApiSecret($apiSecret)
	{
		$this->apiSecret = $apiSecret;
	}

	/**
	 * @return int
	 */
	public function getApiClientId()
	{
		return $this->apiClientId;
	}

	/**
	 * @param int $apiClientId
	 */
	public function setApiClientId($apiClientId)
	{
		$this->apiClientId = $apiClientId;
	}

	/**
	 * @param TopUp $topUp
	 * @return integer
	 */
	public function create(TopUp $topUp)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://api.topupserv.lorenzentonna.com/topup");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, [
			'provider'     => $topUp->getProvider(),
			'phone'        => $topUp->getPhone(),
			'amount'       => $topUp->getAmount(),
			'currency'     => $topUp->getCurrency(),
			'operator'     => $topUp->getOperator(),
			'reference'    => $topUp->getReference(),
			'callback_url' => $topUp->getCallbackUrl(),
			'date'         => $topUp->getDate(),
			'payload'      => $topUp->getPayload()
		]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$headers = [
			'X-Api-Key: '. $this->getApiKey(),
			'X-Api-Secret: '. $this->getApiSecret(),
			'X-Api-Client-Id: '. $this->getApiClientId()
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($ch);
		curl_close($ch);

		$data = json_decode($response, true);

		return $data['id'];
	}

	/**
	 * @param integer $topUpId
	 */
	public function delete($topUpId)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://api.topupserv.lorenzentonna.com/topup?id=". $topUpId);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

		curl_exec($ch);
		curl_close($ch);
	}
}
