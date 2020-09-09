<?php

namespace Happyr\LinkedIn;

/**
 * @author Tobias Nyholm
 */
class AccessToken
{
    /**
     * @var null|string token
     */
    private $token;

    /**
     * @var null|string refreshToken
     */
    private $refreshToken;

    /**
     * @var \DateTime expiresAt
     */
    private $expiresAt;

    /**
     * @var \DateTime refreshExpiresAt
     */
    private $refreshExpiresAt;

    /**
     * @param string        $token
     * @param \DateTime|int $expiresIn
     */
    public function __construct($token = null, $expiresIn = null, $refreshToken = null, $refreshExpiresAt = null)
    {
        $this->token = $token;
        $this->refreshToken = $refreshToken;

        if ($expiresIn !== null) {
            if ($expiresIn instanceof \DateTime) {
                $this->expiresAt = $expiresIn;
            } else {
                $this->expiresAt = new \DateTime(sprintf('+%dseconds', $expiresIn));
            }
        }

        if ($refreshExpiresAt !== null) {
            if ($refreshExpiresAt instanceof \DateTime) {
                $this->refreshExpiresAt = $refreshExpiresAt;
            } else {
                $this->refreshExpiresAt = new \DateTime(sprintf('+%dseconds', $refreshExpiresAt));
            }
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->token ?: '';
    }

    /**
     * Does a token string exist?
     *
     * @return bool
     */
    public function hasToken()
    {
        return !empty($this->token);
    }

    /**
     * @param \DateTime $expiresAt
     *
     * @return $this
     */
    public function setExpiresAt(\DateTime $expiresAt = null)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $expiresAt
     *
     * @return $this
     */
    public function setRefreshExpiresAt(\DateTime $expiresAt = null)
    {
        $this->refreshExpiresAt = $expiresAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRefreshExpiresAt()
    {
        return $this->refreshExpiresAt;
    }

    /**
     * @param null|string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param null|string $token
     *
     * @return $this
     */
    public function setRefreshToken($token)
    {
        $this->refreshToken = $token;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}
