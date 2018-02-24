<?php

namespace Notifications\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscriptions
 *
 * @ORM\Table(name="subscriptions")
 * @ORM\Entity
 */
class Subscription {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=25, nullable=false)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="endpoint", type="string", length=45, nullable=false)
     */
    private $endpoint;

    /**
     * @var string
     *
     * @ORM\Column(name="userPublicKey", type="string", length=255, nullable=false)
     */
    private $userPublicKey;

    /**
     * @var string
     *
     * @ORM\Column(name="userAuthToken", type="string", length=255, nullable=false)
     */
    private $userAuthToken;

    /**
     * Subscription constructor.
     *
     * @param string $site
     * @param string $endpoint
     * @param string $userPublicKey
     * @param string $userAuthToken
     */
    public function __construct(string $site, string $endpoint, string $userPublicKey, string $userAuthToken) {
        $this->site = $site;
        $this->endpoint = $endpoint;
        $this->userPublicKey = $userPublicKey;
        $this->userAuthToken = $userAuthToken;
    }


    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSite(): string {
        return $this->site;
    }

    /**
     * @param string $site
     * @return Subscription
     */
    public function setSite(string $site) {
        $this->site = $site;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return Subscription
     */
    public function setEndpoint(string $endpoint) {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserPublicKey(): string {
        return $this->userPublicKey;
    }

    /**
     * @param string $userPublicKey
     * @return Subscription
     */
    public function setUserPublicKey(string $userPublicKey) {
        $this->userPublicKey = $userPublicKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserAuthToken(): string {
        return $this->userAuthToken;
    }

    /**
     * @param string $userAuthToken
     * @return Subscription
     */
    public function setUserAuthToken(string $userAuthToken) {
        $this->userAuthToken = $userAuthToken;

        return $this;
    }
}
