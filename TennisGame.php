<?php
declare(strict_types=1);

class TennisGame
{
    private $points = [];

    private string $player1Name = '';
    private string $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function winPoint($playerName): void
    {
        if (!isset($this->points[$playerName])) {
            $this->points[$playerName] = 0;
        }
        $this->points[$playerName]++;
    }

    public function score(): string
    {
        $player1Points = $this->points[$this->player1Name] ?? 0;
        $player2Points = $this->points[$this->player2Name] ?? 0;

        if ($player1Points >= 4 || $player2Points >= 4) {
            $minusResult = $player1Points - $player2Points;
            return match (true) {
                $minusResult == 1 => "Advantage " . $this->player1Name,
                $minusResult == -1 => "Advantage " . $this->player2Name,
                $minusResult >= 2 => "Win for " . $this->player1Name,
                default => "Win for " . $this->player2Name,
            };
        }

        if ($player1Points == $player2Points) {
            return $this->scoreText($player1Points) . "-All";
        }

        return $this->scoreText($player1Points) . "-" . $this->scoreText($player2Points);
    }

    private function scoreText($points): string
    {
        return match ($points) {
            0 => "Love",
            1 => "Fifteen",
            2 => "Thirty",
            3 => "Forty",
            default => "",
        };
    }
}