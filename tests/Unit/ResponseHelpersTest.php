<?php

namespace Tests;

use Exception;
use PDOException;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Helpers/response.php';

final class ResponseHelpersTest extends TestCase
{
    public function testRespondSuccessEchoesSuccess(): void
    {
        ob_start();
        respond_success();
        $output = ob_get_clean();

        $this->assertSame('success', $output);
    }

    public function testRespondFailureEchoesFail(): void
    {
        ob_start();
        respond_failure();
        $output = ob_get_clean();

        $this->assertSame('fail', $output);
    }

    public function testRespondDbErrorSetsStatusAndMessage(): void
    {
        ob_start();
        respond_db_error(new PDOException('connection refused'));
        $output = ob_get_clean();

        $this->assertSame('Database Error: connection refused', $output);
        $this->assertSame(500, http_response_code());
    }

    public function testRespondLogicErrorDefaultPrefix(): void
    {
        ob_start();
        respond_logic_error(new Exception('missing field'));
        $output = ob_get_clean();

        $this->assertSame('Logic Error: missing field', $output);
        $this->assertSame(400, http_response_code());
    }

    public function testRespondLogicErrorCustomPrefix(): void
    {
        ob_start();
        respond_logic_error(new Exception('missing field'), 'Error: ');
        $output = ob_get_clean();

        $this->assertSame('Error: missing field', $output);
    }
}
