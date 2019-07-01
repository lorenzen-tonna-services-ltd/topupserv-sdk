<?php
namespace TopUpService\Entity;

class TopUp
{
	/**
	 * @var string
	 */
	private $provider;

	/**
	 * @var string
	 */
	private $phone;

	/**
	 * @var integer
	 */
	private $amount;

	/**
	 * @var string
	 */
	private $currency;

	/**
	 * @var string
	 */
	private $operator;

	/**
	 * @var string
	 */
	private $reference;

	/**
	 * @var string
	 */
	private $callback_url;

	/**
	 * @var \DateTime
	 */
	private $date;

	/**
	 * @var string
	 */
	private $payload;

	/**
	 * @return string
	 */
	public function getProvider()
	{
		return $this->provider;
	}

	/**
	 * @param string $provider
	 */
	public function setProvider($provider)
	{
		$this->provider = $provider;
	}

	/**
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	/**
	 * @return int
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @param int $amount
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	/**
	 * @return string
	 */
	public function getCurrency()
	{
		return $this->currency;
	}

	/**
	 * @param string $currency
	 */
	public function setCurrency($currency)
	{
		$this->currency = $currency;
	}

	/**
	 * @return string
	 */
	public function getOperator()
	{
		return $this->operator;
	}

	/**
	 * @param string $operator
	 */
	public function setOperator($operator)
	{
		$this->operator = $operator;
	}

	/**
	 * @return string
	 */
	public function getReference()
	{
		return $this->reference;
	}

	/**
	 * @param string $reference
	 */
	public function setReference($reference)
	{
		$this->reference = $reference;
	}

	/**
	 * @return string
	 */
	public function getCallbackUrl()
	{
		return $this->callback_url;
	}

	/**
	 * @param string $callback_url
	 */
	public function setCallbackUrl($callback_url)
	{
		$this->callback_url = $callback_url;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate()
	{
		if (empty($this->date)) {
			return null;
		}
		return $this->date->format('d.m.Y H:i:s');
	}

	/**
	 * @param \DateTime $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
	}

	/**
	 * @param string $payload
	 */
	public function setPayload($payload)
	{
		$this->payload = $payload;
	}

	/**
	 * @return string
	 */
	public function getPayload()
	{
		return $this->payload;
	}
}