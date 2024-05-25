<?php

namespace App\Services;

class GameTurnService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getTurns($data): array
    {
        $turns = false;

        $numPlayers =  $data['players'] ?? 3;
        $numTurns = $data['turns'] ?? 3;
        $startPlayer = $data['start'] ?? 'A';

        // Ensure the number of players does not exceed 26
        $numPlayers = min($numPlayers, 26);

        // Generate players list
        $players = range('A', chr(65 + $numPlayers - 1));

        // Find the starting index
        $startIndex = array_search($startPlayer, $players);
        if ($startIndex === false) {
             return ['turns' => $turns, 'message' => 'Invalid start player'];
        }

        $turns = [];
        $reverse = false;

        for ($i = 0; $i < $numTurns; $i++) {
            $currentTurn = [];
            for ($j = 0; $j < $numPlayers; $j++) {
                $index = ($startIndex + $j) % $numPlayers;
                $currentTurn[] = $players[$index];
            }
            if ($reverse) {
                $currentTurn = array_reverse($currentTurn);
            }
            $turns[] = $currentTurn;
            $startIndex = ($startIndex + 1) % $numPlayers;
            // Reverse the order for every group of 'numPlayers' turns
            if (($i + 1) % $numPlayers == 0) {
                $reverse = !$reverse;
            }
        }

        return ['turns' => $turns];

    }
}
