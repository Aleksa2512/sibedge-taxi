<?php

declare(strict_types=1);

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class JwtTransformer
 *
 * @package App\Transformers
 */
class JwtTransformer extends TransformerAbstract
{

    /**
     * @param string $token
     * @return array
     */
    public function transform(string $token) : array
    {
        return [
            'auth' => [
                'access_token' => $token,
                'ttl'          => (int) config('jwt.ttl'),
                'refresh_ttl'  => (int) config('jwt.refresh_ttl'),
            ]
        ];
    }
}
