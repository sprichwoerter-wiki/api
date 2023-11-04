<?php

namespace App\Util;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Vich\UploaderBundle\Form\Type\VichImageType;

class VichImageField implements FieldInterface
{
    use FieldTrait;

    // Add All options from https://github.com/dustin10/VichUploaderBundle/blob/master/docs/form/vich_image_type.md
    public const OPTION_IMAGINE_PATTERN = 'imagine_pattern';

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplateName('crud/field/image')
            ->setFormType(VichImageType::class)
            ->addCssClass('field-image')
            ->setTextAlign('center')
            ->setCustomOption(self::OPTION_IMAGINE_PATTERN, null)
            ;
    }

    /**
     * If set, image will automatically transformed using LiipImagineBundle.
     */
    public function setImaginePattern(string $imagine_pattern): self
    {
        $this->setCustomOption(self::OPTION_IMAGINE_PATTERN, $imagine_pattern);

        return $this;
    }
}