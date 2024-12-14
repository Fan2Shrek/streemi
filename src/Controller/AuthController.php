<?php

namespace App\Controller;

use App\Entity\ResetPassword;
use App\Repository\ResetPasswordRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class AuthController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private ResetPasswordRepository $resetPasswordRepository,
        private EntityManagerInterface $entityManager,
        private MailerInterface $mailer,
    ) {}

    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('auth/register.html.twig');
    }

    #[Route('/forgot', name: 'forgot_password')]
    public function forgotPassword(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->get('_email');
            $user = $this->userRepository->findOneBy(['email' => $email]);

            if (!$user) {
                $this->addFlash('error', 'User not found');
            } else {
                $resetToken = new ResetPassword();
                $resetToken->setUser($user);

                $old = $this->resetPasswordRepository->findOneBy(['user' => $user]);
                if ($old) {
                    $this->entityManager->remove($old);
                    $this->entityManager->flush();
                }

                $this->entityManager->persist($resetToken);
                $this->entityManager->flush();

                $email = new Email();
                $email->from('fornite@game.com');
                $email->to($user->getEmail());
                $email->html($this->renderView('emails/reset.mail.twig', [
                    'token' => $resetToken->getToken(),
                ]));

                $this->mailer->send($email);
            }
        }

        return $this->render('auth/forgot.html.twig');
    }

    #[Route('/reset', name: 'reset_password')]
    public function resetPassword(Request $request, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $token = $request->query->get('token');
        $resetToken = $this->resetPasswordRepository->findOneBy(['token' => $token]);
        if (!$resetToken) {
            throw $this->createNotFoundException('Token not found');
        }

        if ($request->isMethod('POST')) {
            if (($password = $request->get('_password')) !== $request->get('_confirm_password')) {
                $this->addFlash('error', 'Passwords do not match');

                return $this->render('auth/reset.html.twig');
            }

            $resetToken = $this->resetPasswordRepository->findOneBy(['token' => $token]);
            if (!$resetToken) {
                throw $this->createNotFoundException('Token not found');
            } else {
                $user = $resetToken->getUser();
                $user->getId();
                $user->setPassword($userPasswordHasher->hashPassword($user, $password));

                $this->entityManager->flush();

                $this->addFlash('success', 'Password reset successfully');
            }
        }

        return $this->render('auth/reset.html.twig');
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
        return $this->render('auth/logout.html.twig');
    }

    #[Route('/confirm', name: 'confirm')]
    public function confirm(): Response
    {
        return $this->render('auth/confirm.html.twig');
    }

    #[Route(path: '/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('auth/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}
