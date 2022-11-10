<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Hyperf\Nacos\Provider;

use GuzzleHttp\RequestOptions;
use Hyperf\Nacos\AbstractProvider;
use Psr\Http\Message\ResponseInterface;

class ConfigProvider extends AbstractProvider
{
    public function get(string $dataId, string $group, ?string $namespaceId = null): ResponseInterface
    {
        return $this->request('GET', '/nacos/v1/cs/configs', [
            RequestOptions::QUERY => $this->filter([
                'dataId' => $dataId,
                'group' => $group,
                'namespaceId' => $namespaceId,
            ]),
        ]);
    }

    public function set(string $dataId, string $group, string $content, ?string $type = null, ?string $namespaceId = null): ResponseInterface
    {
        return $this->request('POST', '/nacos/v1/cs/configs', [
            RequestOptions::FORM_PARAMS => $this->filter([
                'dataId' => $dataId,
                'group' => $group,
                'namespaceId' => $namespaceId,
                'type' => $type,
                'content' => $content,
            ]),
        ]);
    }

    public function delete(string $dataId, string $group, ?string $namespaceId = null): ResponseInterface
    {
        return $this->request('DELETE', '/nacos/v1/cs/configs', [
            RequestOptions::QUERY => $this->filter([
                'dataId' => $dataId,
                'group' => $group,
                'namespaceId' => $namespaceId,
            ]),
        ]);
    }
}
