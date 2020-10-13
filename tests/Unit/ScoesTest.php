<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;

class ScoesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        session(['moodle-token' => 'ABC123']);

        Http::fake([
            '*' => Http::response(
                [
                    'scoes' => [
                        0 => [
                            'id' => 1,
                            'scorm' => 1,
                            'manifest' => 'imsmanifest',
                            'organization' => '',
                            'parent' => '/',
                            'identifier' => 'imsmanifest_ORG',
                            'launch' => '',
                            'scormtype' => '',
                            'title' => 'Captivate E-Learning Course',
                            'sortorder' => 1,
                            'extradata' => [],
                        ],
                        1 => [
                            'id' => 2,
                            'scorm' => 1,
                            'manifest' => 'imsmanifest',
                            'organization' => 'imsmanifest_ORG',
                            'parent' => 'imsmanifest_ORG',
                            'identifier' => 'SCO_ID1',
                            'launch' => 'index_scorm.html',
                            'scormtype' => 'sco',
                            'title' => 'Course Object title',
                            'sortorder' => 2,
                            'extradata' => [
                                0 => [
                                    'element' => 'isvisible',
                                    'value' => 'true',
                                ],
                                1 => [
                                    'element' => 'parameters',
                                    'value' => '',
                                ],
                            ],
                        ],
                    ],
                    'warnings' => [],
                ],
                200
            ),
        ]);
    }

    public function test_scoes()
    {
        $scoes = LaraMoodle::getScormScoes(1);

        $this->assertEquals('imsmanifest_ORG', $scoes->scoes[0]->identifier);
        $this->assertEquals('sco', $scoes->scoes[1]->scormtype);
    }

    public function test_get_sco()
    {
        $sco = LaraMoodle::getScormScoes(1)->getSco();

        $this->assertNotNull($sco);
        $this->assertEquals('sco', $sco->scormtype);
        $this->assertEquals('2', $sco->id);
        $this->assertEquals('Course Object title', $sco->title);
    }
}
