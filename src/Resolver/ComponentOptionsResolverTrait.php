<?php

namespace AppoloDev\UIToolboxBundle\Resolver;

use AppoloDev\UIToolboxBundle\Attribute\UIComponentProp;
use ReflectionClass;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Throwable;

trait ComponentOptionsResolverTrait
{
    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->configureOptions($resolver);

        return $resolver->resolve($data) + $data;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            if (!$property->isPublic() && !$property->isProtected()) {
                continue;
            }

            $attributes = $property->getAttributes(UIComponentProp::class);

            if (\count($attributes) === 0) {
                continue;
            }

            try {
                /** @var UIComponentProp $prop */
                $prop = $attributes[0]->newInstance();
            } catch (Throwable $e) {
                continue;
            }

            $name = $property->getName();

            $resolver->setDefault($name, $prop->default);

            try {
                if (!empty($prop->type)) {
                    $resolver->setAllowedTypes($name, $prop->type);
                }

                if (!empty($prop->acceptedValues)) {
                    $resolver->setAllowedValues($name, function ($value) use ($prop) {
                        return \in_array($value, $prop->acceptedValues, true);
                    });
                }
            } catch (Throwable $e) {
                dd(\sprintf('Erreur lors du traitement de l\'option "%s" : %s', $name, $e->getMessage()), \E_USER_WARNING);
            }
        }
    }
}
