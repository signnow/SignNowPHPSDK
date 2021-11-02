<?php
declare(strict_types=1);

namespace Helper;

use Exception;

/**
 * Class Str
 *
 * @package Helper
 */
class Str
{
    private const TINY_IMG = 'iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAABHNCSVQICAgIfAhkiAAAABl0RVh0U29mdHdhcmUAZ25vbWUtc2NyZWVuc2hvdO8Dvz4AAAApSURBVAiZVcvBCQAgEMTAObH/itX1IYgG8ksqc8RDA9WO6CDrFpXkWzZ2uwn/AFD5ZAAAAABJRU5ErkJggg==';
    private const FOUR_BYTE_CHARACTER = "\u{1F600}"; // 😀
    private const SMALL_IMAGE_PATH = 'small_image.jpg';
    private const ONE_PIXEL_IMAGE = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhWlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9TpUUrHSwi4pChOlkQFREnrUIRKpRaoVUHk0s/hCYNSYqLo+BacPBjserg4qyrg6sgCH6AuLg6KbpIif9LCi1iPDjux7t7j7t3gFAvM9XsGAVUzTLSibiYza2IgVcE0YcwujEtMVOfTaWS8Bxf9/Dx9S7Gs7zP/Tl6lLzJAJ9IPMN0wyJeJ57ctHTO+8QRVpIU4nPiEYMuSPzIddnlN85FhwWeGTEy6TniCLFYbGO5jVnJUIkniKOKqlG+kHVZ4bzFWS1XWfOe/IWhvLa8xHWag0hgAYtIQYSMKjZQhoUYrRopJtK0H/fwDzj+FLlkcm2AkWMeFaiQHD/4H/zu1iyMj7lJoTjQ+WLbH0NAYBdo1Gz7+9i2GyeA/xm40lr+Sh2Y+iS91tKiR0B4G7i4bmnyHnC5A/Q/6ZIhOZKfplAoAO9n9E05oPcW6Fp1e2vu4/QByFBXyRvg4BAYLlL2mse7g+29/Xum2d8PhFhyrmGSGBYAAAAJcEhZcwAALiMAAC4jAXilP3YAAAAHdElNRQfjCBYPDgcSvX8eAAAAGXRFWHRDb21tZW50AENyZWF0ZWQgd2l0aCBHSU1QV4EOFwAAAAxJREFUCNdjYGBgAAAABAABJzQnCgAAAABJRU5ErkJggg==';
    private const USER_SIGNATURE_DATA = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAABhWlDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9TpUUrHSwi4pChOlkQFREnrUIRKpRaoVUHk0s/hCYNSYqLo+BacPBjserg4qyrg6sgCH6AuLg6KbpIif9LCi1iPDjux7t7j7t3gFAvM9XsGAVUzTLSibiYza2IgVcE0YcwujEtMVOfTaWS8Bxf9/Dx9S7Gs7zP/Tl6lLzJAJ9IPMN0wyJeJ57ctHTO+8QRVpIU4nPiEYMuSPzIddnlN85FhwWeGTEy6TniCLFYbGO5jVnJUIkniKOKqlG+kHVZ4bzFWS1XWfOe/IWhvLa8xHWag0hgAYtIQYSMKjZQhoUYrRopJtK0H/fwDzj+FLlkcm2AkWMeFaiQHD/4H/zu1iyMj7lJoTjQ+WLbH0NAYBdo1Gz7+9i2GyeA/xm40lr+Sh2Y+iS91tKiR0B4G7i4bmnyHnC5A/Q/6ZIhOZKfplAoAO9n9E05oPcW6Fp1e2vu4/QByFBXyRvg4BAYLlL2mse7g+29/Xum2d8PhFhyrmGSGBYAAAAJcEhZcwAALiMAAC4jAXilP3YAAAAHdElNRQfjCBYPDgcSvX8eAAAAGXRFWHRDb21tZW50AENyZWF0ZWQgd2l0aCBHSU1QV4EOFwAAAAxJREFUCNdjYGBgAAAABAABJzQnCgAAAABJRU5ErkJggg==';

    /**
     * @return string
     */
    public static function getLocalHost(): string
    {
        return '127.0.0.1';
    }
    
    /**
     * @return string
     *
     * @throws Exception
     */
    public static function generateUniqueId(): string
    {
        return strtolower(bin2hex(random_bytes(20)));
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public static function generateRandomString(int $length = 20): string
    {
        $length = $length > 53 ? 53 : $length;
        
        $string =  str_shuffle(implode('', range('a', 'z')) . '_' . implode('', range('A', 'Z')));
        
        return substr($string, 0, $length);
    }
    
    /**
     * @return string
     *
     * @throws Exception
     */
    public static function generateEmail(): string
    {
        return 'test-user-' . static::generateUniqueId() . '@test.com';
    }
    
    /**
     * @param string $phoneInvite
     *
     * @return string
     */
    public static function generatePhoneInviteEmail(string $phoneInvite): string
    {
        return 'sms_signer_' . $phoneInvite . '@no.reply';
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function generateHash32(): string
    {
        return md5(random_bytes(100) . microtime());
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function generateHash64(): string
    {
        return substr(hash('sha256', microtime()), 0, 128);
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function generateHash8chars(): string
    {
        return substr(self::generateHash32(), 0, 8);
    }

    /**
     * @return string
     */
    public static function getBase64Image(): string
    {
        return self::TINY_IMG;
    }

    /**
     * @return string
     */
    public static function getFourByteCharacter(): string
    {
        return self::FOUR_BYTE_CHARACTER;
    }

    /**
     * @return string
     */
    public static function getSmallImage(): string
    {
        static $result = null;

        if ($result === null) {
            $result = base64_encode(file_get_contents(codecept_data_dir(self::SMALL_IMAGE_PATH)));
        }

        return $result;
    }

    /**
     * @return string
     */
    public static function getOnePixelImage(): string
    {
        return self::ONE_PIXEL_IMAGE;
    }

    /**
     * @return string
     */
    public static function getUserSignatureData(): string
    {
        return self::USER_SIGNATURE_DATA;
    }
}
