<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class AppAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    public function authenticate(Request $request): Passport
    {
        $nom = $request->request->get('nom', '');

        $request->getSession()->set(Security::LAST_USERNAME, $nom);

        return new Passport(
            new UserBadge($nom),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        $user = $token->getUser();
        
        if (in_array('ROLE_EMS', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_ems'));
        }
        if (in_array('ROLE_FDO', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_fdo'));
        }
        if (in_array('ROLE_GOV', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_gouv'));
        }
        if (in_array('ROLE_BURGER', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_burgershot'));
        }
        if (in_array('ROLE_BENNYS', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_bennys'));
        }
        if (in_array('ROLE_WEAZEL', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_weazel'));
        }
        if (in_array('ROLE_ROGERS', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_rogers'));
        }
        if (in_array('ROLE_DINER', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_diner'));
        }
        if (in_array('ROLE_FARM', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_farm'));
        }
        if (in_array('ROLE_TAXI', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_taxi'));
        }
        if (in_array('ROLE_HUMANE', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_humane'));
        }
        if (in_array('ROLE_GRUPPE', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_gruppe'));
        }
        if (in_array('ROLE_ADMIN', $user->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('app_home_admin'));
        }

        return new RedirectResponse($this->urlGenerator->generate('app_login'));

    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
