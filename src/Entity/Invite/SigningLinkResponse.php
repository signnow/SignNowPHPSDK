<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Invite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SigningLinkResponse
 *
 * @package SignNow\Api\Entity\Invite
 */
class SigningLinkResponse
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $url;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $urlNoSignup;
    
    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    
    /**
     * @param string|null $url
     *
     * @return SigningLinkResponse
     */
    public function setUrl(?string $url): SigningLinkResponse
    {
        $this->url = $url;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getUrlNoSignup(): ?string
    {
        return $this->urlNoSignup;
    }
    
    /**
     * @param string|null $urlNoSignup
     *
     * @return SigningLinkResponse
     */
    public function setUrlNoSignup(?string $urlNoSignup): SigningLinkResponse
    {
        $this->urlNoSignup = $urlNoSignup;
        
        return $this;
    }
}
