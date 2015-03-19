<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SecurityHandler
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var TokenRepository
     */
    protected $tokenRepository;

    /**
     * @param UserRepository $userRepository
     * @param TokenRepository $tokenRepository
     */
    public function __construct(UserRepository $userRepository, TokenRepository $tokenRepository)
    {
        $this->userRepository = $userRepository;
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function requireToken(Request $request)
    {
        $token = $request->query->get('token');

        if (! $token) {
            throw new AccessDeniedHttpException('Token not found');
        }

        $token = $this->tokenRepository->find($token);

        if (! $token) {
            throw new AccessDeniedHttpException('Token expired');
        }

        return $this->userRepository->findById($token['user_id']);
    }
}
