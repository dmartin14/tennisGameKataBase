<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{

    /** @test */
    public function throwExceptionIfPlayerNameIsInvalid(): void
    {
        $game = new TennisGame('Djokovic', 'Nadal');

        $this->expectException(Exception::class);

        $game->winPoint("Federer");
    }

    public function throwExceptionIfInvalidTennisScore(): void
    {
        $game = new TennisGame('Djokovic', 'Nadal');

        $game->winPoint("Djokovic");
        $game->winPoint("Djokovic");
        $game->winPoint("Djokovic");
        $game->winPoint("Djokovic");
        $game->winPoint("Djokovic");

        $this->expectException(Exception::class);
    }

    /** @test */
    public function hasWinAPoint()
    {
        $game = new TennisGame('Djokovic', 'Nadal');

        $game->winPoint("Djokovic");

        $this->assertEquals("Fifteen-Love", $game->score());
    }

    /** @test  */
    public function hasDeuce(): void
    {
        $game = new TennisGame('Djokovic', 'Nadal');

        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");

        $this->assertEquals("Deuce", $game->score());
    }

    /** @test */
    public function tennisMatchAndWinPlayer1(): void
    {
        $game = new TennisGame('Djokovic', 'Nadal');

        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");

        $this->assertEquals("Win for Djokovic", $game->score());
    }

    /** @test */
    public function tennisMatchAndWinPlayer2(): void
    {
        $game = new TennisGame('Djokovic', 'Nadal');

        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");
        $game->winPoint("Djokovic");
        $game->winPoint("Nadal");

        $this->assertEquals("Win for Nadal", $game->score());
    }
}