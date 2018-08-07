<?php

namespace App\Transformers;

use Illuminate\Validation\ValidationException;
use League\Fractal\TransformerAbstract;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

/**
 * Class ErrorTransformer
 *
 * @package App\Transformers
 */
class ErrorTransformer extends TransformerAbstract
{
    /**
     * @var int
     */
    private $code;

    /**
     * ErrorTransformer constructor.
     *
     * @param int $code
     */
    public function __construct(int $code)
    {
        $this->code = $code;
    }

    /**
     * @param Throwable $exception
     * @return array
     */
    public function transform(Throwable $exception) : array
    {
        $array = [
            'error' => [
                'message'     => $this->getMessage($exception),
                'status_code' => $this->code,
            ]
        ];

        if ($exception instanceof ValidationException) {
            $array['error']['validation'] = $exception->errors();
        }

        if (app()->environment('local', 'development') && ! $exception instanceof ValidationException) {
            $array['error']['debug'] = [
                'line'  => $exception->getLine(),
                'file'  => $exception->getFile(),
                'class' => get_class($exception),
                'trace' => explode("\n", $exception->getTraceAsString())
            ];
        }

        return $array;
    }

    /**
     * @param Throwable $e
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    protected function getMessage(Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return trans('errors.validation');
        }

        if (empty($e->getMessage()) && $e instanceof HttpException) {
            return Response::$statusTexts[$e->getStatusCode()];
        }

        return trans($e->getMessage());
    }
}
