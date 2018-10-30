<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Validators\GameValidator;
use App\Repositories\GameRepository;

class GamesController extends Controller
{
    protected $validator;
    protected $gameRepository;

    public function __construct(GameValidator $validator, GameRepository $gameRepository)
    {
        $this->validator      = $validator;
        $this->gameRepository = $gameRepository;
    }

    /**
     * Show games page
     *
     * @return View
     */
    public function index() : View
    {
        return view('games.index', [
            'games' => $this->gameRepository->getAll()
        ]);
    }

   /**
     * Update game
     *
     * @param Request $request
     * @param int $id
     *
     * @return null
     *
     * @throws Exception
     */
    public function update(Request $request, int $id)
    {
        $this->validator->validateUpdate($request);

        $game = $this->gameRepository->getById($id);

        $this->gameRepository->update($game, $request->get('settings'));
    }
}
