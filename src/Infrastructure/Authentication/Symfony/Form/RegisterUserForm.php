<?php

declare(strict_types=1);

namespace Infrastructure\Authentication\Symfony\Form;

use Application\Authentication\Command\RegisterUserCommand;
use Infrastructure\Authentication\Symfony\Form\ValueObject\UsernameType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RegisterUserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var RegisterUserCommand|null $command */
        $command = $builder->getData();

        $builder->add('username', UsernameType::class, [
            'label' => false,
        ]);

        if (null !== $command && false === $command->is_oauth) {
            $builder->add('email', EmailType::class, [
                'label' => 'authentication.forms.labels.email',
                'attr' => [
                    'placeholder' => 'authentication.forms.labels.placeholders.email',
                ],
            ])->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'authentication.forms.labels.password',
                    'attr' => [
                        'placeholder' => 'authentication.forms.labels.placeholders.password',
                        'minlength' => 6,
                        'autocomplete' => 'new-password',
                    ],
                ],
                'second_options' => [
                    'label' => 'authentication.forms.labels.password_confirm',
                    'attr' => [
                        'minlength' => 6,
                    ],
                ],
                'invalid_message' => 'authentication.validations.password_must_match',
            ]);
        }

        $builder->add('is_subscribed_newsletter', CheckboxType::class, [
            'label' => 'authentication.forms.labels.is_subscribed_newsletter',
            'required' => false,
        ])->add('is_subscribed_marketing', CheckboxType::class, [
            'label' => 'authentication.forms.labels.is_subscribed_marketing',
            'required' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RegisterUserCommand::class,
            'translation_domain' => 'authentication',
        ]);
    }
}
