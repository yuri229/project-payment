<?php
namespace App\Form;

use App\Entity\Facture;
use App\Repository\FactureRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('society', ChoiceType::class, [
                'choices' => [
                    'SBEE' => true,
                    'SONEB' => false,
                ]
            ])
            ->add('compteur', ChoiceType::class, [
                'choices' => [
                    'ordinaire' => null,
                    'prepaye' => false,
                    'a carte' => null,
                ]
            ])
            ->add('numCompteur', TextType::class, [
                'attr' => [
                    'placeholder' => "Numero du compteur"
                ]
            ])
            ->add('numAbn',[
                'attr' => [
                    'placeholder' => "Numero d'Abonne"]
                ])
            ->add('numPolice',[
                'attr' => [
                    'placeholder' => "Numero de police"]
                ])
            ->add('client')
            ->add('numFacture',[
                'attr' => [
                    'placeholder' => "Numero de la facture"]
                ])
            ->add('montant')
            ->add('mail')
            ->add('factPeriod',DateType::class,[
                'widget' => 'single_text'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}