<?php
declare(strict_types=1);

namespace Application\Http;

use Codebase\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Controller extends AbstractController
{
    public function index()
    {
        return $this->render('index.twig');
    }

    public function start(SessionInterface $session)
    {
        $team = Team::form(16);
        $session->set('team', $team);

        return $this->render(
            'game.twig',
            [
                'codebase' => $team->inspectCodebase(),
                'iterations' => $team->lifecycle()->iterationCount()
            ]
        );
    }

    public function iterate(SessionInterface $session, Request $request)
    {
        $team = $this->getActiveTeam($session);

        if ($team->capacity() <= $team->codebase()->bugCount()) {
            return $this->render(
                'game-finished.twig',
                [
                    'codebase' => $team->inspectCodebase(),
                    'iteration' => $team->lifecycle()->iterationCount()
                ]);
        }

        $team->planIteration((int)$request->request->get('numberOfBugsToSolve', 0));

        return $this->render('game.twig', [
            'codebase' => $team->inspectCodebase(),
            'iteration' => $team->lifecycle()->iterationCount()
        ]);
    }

    private function getActiveTeam(SessionInterface $session): ?Team
    {
        return $session->get('team');
    }
}
