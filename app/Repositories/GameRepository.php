<?php

namespace App\Repositories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GameRepository
{

    protected $game;

    /**
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * Get the list of users
     *
     * @return Collection
     */
    public function getAll() : Collection
    {
        return $this->game->all();
    }

    /**
     * Get user by id
     *
     * @param int $id
     *
     * @return Game
     */
    public function getById(int $id) : Game
    {
        return $this->game->findOrFail($id);
    }

    /**
     * Update a game
     *
     * @param Game $game
     * @param string $settings
     *
     * @return null
     */
    public function update(Game $game, string $settings)
    {
        $game->settings = $settings;

        $game->save();
    }
}
